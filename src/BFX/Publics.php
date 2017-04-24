<?php
namespace BFX;
// 开源类获取curl数据
use Ixudra\Curl\CurlService;
// 使用抛出异常的类
use BFX\ParamException\PublicsException AS ParamException;
// 结果异常类
use BFX\ResultException\PublicsException As ResultException;

class Publics extends Base{
    /** 
     * 构造函数
     * 
     */
    public function __construct($param = null) {
        // 父级构造函数自启
        parent::__construct($param);
    }

    /**
     * 用户注册
     * 
     */
    public function reg($param) {
        ParamException::get_reg_ex($param); // 排除错误
        ## 必选参数
        $this->signArray['name']     = trim($param['name']); // 姓名
        $this->signArray['phone']    = trim($param['phone']); // 电话
        $this->signArray['email']    = trim($param['email']); // 邮箱
        $this->signArray['mt4group'] = trim($param['mt4group']); // 分组
        $this->signArray['leverage'] = trim($param['leverage']); // 杠杆率
        ###可选字段
        // 国家
        if (trim($param['country'])) {
            $this->signArray['country'] = trim($param['country']);
        }
        // 地址
        if (trim($param['address'])) {
            $this->signArray['address'] = trim($param['address']);
        }
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 必须加密的字段
        $this->reskey = [
            'name', 'phone', 'email', 'mt4group', 'leverage', 'country', 'address'
        ];
        ## url地址
        $apiurl = 'Public/Reg'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 返回结果异常
        ResultException::get_reg_ex($this->return_data);
        ## 返回自身，形成链式操作
        return $this;
    }
    
    /**
     * 登录
     * 
     * @param array $param
     * $param = [
     *      'account'=> , // 帐号
     *      'password'=> // 密码
     * ];
     */
    public function login($param) {
        ###必须字段
        // 帐号
        $this->signArray['account']  = $param['account']; 
        // 密码
        $this->signArray['password'] = $param['password'];
        ###必须base_64加密
        $this->reskey = ['account', 'password']; // 必须base_64
        
        ## 拼接url地址
        $apiurl       = 'Public/login'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 返回结果异常
        ResultException::get_login_ex($this->return_data);
        return $this;
    }

    /**
     * 商品的当前报价和历史报价记录
     * 
     * @param array $param 
     * $param = [
     *      'symol'=> 可给可不给
     *      'period'=> 给了symbol就必须给，否则，可给可不给
     *      'barnum'=> 给了symbol就必须给，否则，可给可不给
     *      'isfilter'=> // 可给可不给
     * ];
     */
    public function mt4price($param = null) {
        ## 参数不合法，直接抛出错误
        ParamException::get_mt4price_ex($param); // 反馈参数数据是否合法
        ## 必
        // 是否查询具体的商品
        if ($param['symbol']) {
            $this->reskey = ['symol'];
            $this->signArray['symbol']  = trim($param['symbol']); // 是否查询具体的商品
        }
        // 查询的周期
        if ($param['period']) {
            $this->signArray['period'] = trim($param['period']); // 周期
        }
        // 查询的条数
        if ($param['barnum']) {
            $this->signArray['barnum'] = trim($param['barnum']); // 获取记录的条数
        }
        // 是否过滤数据
        if ($param['isfilter']) {
            $this->$signArray['isfilter'] = 'notbo'; // 目前只有一个可选值，‘notbo’过滤掉二元期权数据
        }

        ## 必须base_64转码
        $this->reskey = ['symbol'];

        ## 生成签名和url地址
        $apiurl = 'Public/mt4price'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 返回结果异常
        ResultException::get_mt4price_ex($this->return_data);

        return $this;
    }
}
