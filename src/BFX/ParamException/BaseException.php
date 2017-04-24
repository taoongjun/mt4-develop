<?php
namespace BFX\ParamException;
use Exception;

class BaseException {
    /**
     * 抛出错误,打印出来，调试和生产时，不能一样
     * 
     */
    public static function throw_exception($message = null, $message_add = 0) {
        if ($message) {
            try {
                throw new Exception($message, $message_add);
            } catch(Exception $e) { 
                echo $e->getCode(),    '<br>'; // 错误代码
                echo $e->getMessage(), '<br>'; // 错误的信息
                echo $e->getFile(),    '<br>'; // 文件
                echo $e->getLine(),    '<br>'; // 行号
            }
        }
    }
     
    /**
     * 必传参数是否具备
     *
     * $param array $config
     */
    public static function get_must_ex($config) {
        ## 接口地址的前半部分必须进行配置（例如'http://crmv2.bbryt.cn/WebAPI/'）
        if (!$config['apiurl']) {
            $message = "apiurl为空";

        }
        ## 缺少签名id
        else if (!$config['apiid']) {
            $message = "签名ID为空";
        }
        ## 应用id的专属密钥为空
        else if (!$config['apikey']) {
            $message = "应用id的专属密钥为空";
        }
        self::throw_exception($message);
    }

    /**
     * 获取系统时间失败
     * 
     * 2
     */
    public static function get_apitime_ex($apitime) {
        // 字符串的长度不正确（14位），说明获取时间不正确
        if (!isset($apitime{13})) {
            $message = "获取系统时间失败";
            self::throw_exception($message);
        }
    }
    
    /**
     * 注册的异常抛出
     *
     * 5
     */
    public static function get_reg_ex($param) {
        $message = ''; // 反馈信息
        ## 必须字段
        // 姓名
        if (!trim($param['name'])) {
            $message = '姓名必须填写';
        }
        // 电话
        else if (!trim($param['phone'])) {
            $message = '电话必须填写';
        }
        // 邮箱
        else if (!trim($param['email'])) {
            $message = '邮箱必须填写';
        }
        // 组别
        else if (!trim($param['mt4group'])) {
            $message = '分组必须填写';
        }
        // 杠杆倍数
        else if (!trim($param['leverage'])) {
            $message = '刚刚倍数必须填写';
        }
        self::throw_exception($message);
    }

    /**
     * 获取产品报价时的异常
     *
     * 错误代码6
     */
    public static function get_price_ex($param = null) {
        if ($param) {
            // 请求具体的产品时，产品的周期和记录的条数为必选参数
            if (trim($param['symbol'])) {
                if (!$param['period'] || !trim($param['barnum'])) {
                    $message = '周期和请求条数不能缺少';
                }
            }
            // 若存在周期值，周期值是否合法
            if ($param['period']) {
                $array = ['m1', 'm5', 'm15', 'm30', 'h1', 'h4', 'd1', 'w1', 'mn1'];
                if (!in_array($param['period'], $array)) {
                    $message = '周期值非法';
                }
            }
            self::throw_exception($message);
        }
    }
}
