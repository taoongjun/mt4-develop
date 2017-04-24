<?php
namespace BFX;
// 获取数据的类
use Ixudra\Curl\CurlService;
// 使用抛出异常的类
use BFX\ParamException\BaseException as ParamException;
// 抛出错误
use Exception;
// 基础类
use stdClass;

// 基础公共类
class Base {
    ## p配置参数和签名参数（因为签名参数和配置参数不一定相同，所以分开配置）。在子类和子类的方法中，可以随时进补充。
    /** @var $config 必备的公共参数 */
    protected $config = [];

    /** @var $signArray 参与签名的参数 获取、传输数据 参数数组 */
    protected $signArray = [];

    /** @var 必须经过base_64加密的字段 */
    protected $reskey = [];

    /** @var $return_data 返回的数据，作为一个中间变量 */
    protected $return_data;
 
    /**
     * 构造函数
     * 
     */
    public function __construct($config = null) {
        ## 配置参数以文件的形式
        // 判断BFX_CONFIG常量（即BFX参数配置文件的路径（例如__DIR__.'/'.'bfxConfig.php'））是否存在。
        if (defined('BFX_CONFIG')) {
            // 判断文件路径是否存在
            if (file_exists(BFX_CONFIG)) {
                $this->config = require BFX_CONFIG;
            }
        }
        ## 配置参数以传参的方式
        // 如果实例化时new function_name($config)，进行传参,可以对配置文件的参数进行覆盖
        if (is_array($config)) {
            foreach ($config as $key => $value) {
                $this->config[$key] = $value;
            }
        }
        ## 参数是否抛出异常(必须参数是否具备)
        ParamException::get_must_ex($this->config);
        ## 参与签名的参数 必传参数
        $this->signArray = [
            "apiid"   => $this->config['apiid'] ? $this->config['apiid'] : '', #签名ID
            "apitime" => $this->apitime($this->config['apiurl'] . 'Public/servertime') // 获取接口端时间
        ];
    }

    /**
     * 获取服务器的配置时间
     *
     * @param $url string 获取系统时间
     * @return Builder
     */
    protected function apitime($url) {
        $content = CurlService::to($url)
            ->get();
        $content = json_decode($content, TRUE); // 直接变成数组，不加TRUE就变成对象
        $apitime = $content['data'];
        ### 抛出异常
        ParamException::get_apitime_ex($apitime);
        return $content['data'];
    }

    /**
     * 设置加签数据
     * 
     * @param unknown $array
     * @param unknown $md5Key
     * @return string
     */
    protected function get_sign_msg($array) {
        ### 签名时，任何一个必备参数（appiid,apttime,）不具备,就会提前抛出异常
        $msg = "";
        $i   = 0;
        // 转换为字符串 key=value&key.... 加签
        foreach ($array as $key => $val) {
            // 不参与签名
            if ($key != "apisign" && $key != "apitoken") {
                if (in_array($key, $this->reskey)) {
                    $temval = base64_encode($val); //特殊参数用BASE64转码
                } else {
                    $temval = $val;
                }
                
                if ($i == 0 ) {
                    $msg = $msg . "$key=$temval";
                } else {
                    $msg = $msg . "&$key=$temval";
                }
                $i++;
            }
        }
        return  $msg;
    }

    /**
     * 通过post接口获取数据
     * 
     * @param string $apiurl 完整的url地址
     */
    public function get_post_data($apiurl) {
        ## 参数排序
        ksort($this->signArray);
        ## 生成签名的url地址
        $apiurl = $this->config['apiurl'] . $apiurl;
        $api_sign_url = $apiurl . '?' . $this->get_sign_msg($this->signArray); ////////// 接口key,
        ## 生成签名
        $this->signArray['apisign'] = MD5($api_sign_url . $this->config['apikey']);
        ## 将需要转码的字段进行转码
        if ($this->reskey) {
            foreach ($this->reskey as $reskeys) {
                if (isset($this->signArray[$reskeys])) {
                    $this->signArray[$reskeys] = base64_encode($this->signArray[$reskeys]);
                }
            }
        }
        ## 提交数据，获取结果
        $response = CurlService::to($apiurl)
            ->withData($this->signArray)
            ->post();
        ## 先变成对像
        $response = json_decode($response);
        ## 将原始的json数据赋给中间变量
        $this->return_data = $response; // 结果值赋到公共
    }

    /**
     * 将数据作为json输出
     * 
     */
     public function to_json($data = null) {
        if (!$data) {
            $data = $this->return_data;
        }
        ## json直接输出
        if (is_string($data)) { // 说明是json(这么判断并不严谨，但是远程获取，能获取到{开头，就基本完全确定是json)
            if (preg_match('/^{/', $data)) {
                return $result = $data;
            } else {
                $result = '{}';
            }
            
        }
        ## 对象转化为json字符串
        else if (is_object($data)) {
            $array = json_decode(json_encode($data), true); // 对象转数组
            $result = json_encode($array); // 转化为json
        } 
        ## 数组转化为字符串
        else if (is_array($data)) {
            $result = json_encode($data);
        }
        ## 返回结果
        return $result;
     }

    /**
     * 将数据作为对象输出
     * 
     * @param string | array | null $data
     */
    public function to_object($data = null) {
        if (!$data) {
            $data = $this->return_data;
        }
        ## 把json转化为数组
        if (is_string($data)) { // 说明是json(这么判断并不严谨，但是远程获取，能获取到{开头，就基本完全确定是json)
            $result = json_decode($data); // 加true转化为数组
            if (json_last_error() != JSON_ERROR_NONE) {
                $result = new stdClass;
            }
        }
        ## 如果是对象就直接返回
        else if (is_object($data)) {
            return $data;
        } 
        ## 如果是数组就转换成对象
        else if (is_array($data)) {
            $result = new StdClass();
            foreach ($data as $key => $val){
              $result->$key = $val;
            }
        ## 字符串
        } else {
            $result = new stdClass;
        }
        // 返回结果
        return $result;
    }

    /**
     * 将数据转化为数组
     * 
     * @param string $data
     */
    public function to_array($data = null) {
        if (!$data) {
            $data = $this->return_data;
        }
        // 把json转化为数组
        if (is_string($data)) { // 说明是json(这么判断并不严谨，但是远程获取，能获取到{开头，就基本完全确定是json)
            $array = json_decode($data, TRUE); // 加true转化为数组
            if (json_last_error() == JSON_ERROR_NONE) {
                return $array;
            } else {
                return $data;
            }
        // 把对象转成数组
        } else if (is_object($data)) {
            $array = json_decode(json_encode($data), true);
            return  $array;
        
        // 把数组原格式返回
        } else if (is_array($data)) {
            return $data;

        // 否则，返回空值
        } else {
            return [];
        }
    }
}
