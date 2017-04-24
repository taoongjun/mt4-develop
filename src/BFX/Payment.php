<?php
namespace BFX;
// 开源类获取curl数据
use Ixudra\Curl\CurlService;
// 使用抛出异常的类
use BFX\ParamException\PaymentException AS ParamException;
// 结果异常类
use BFX\ResultException\PaymentException As ResultException;

class Payment extends Base{
    /** 
     * 构造函数
     * 
     */
    public function __construct($param = null) {
        // 父级构造函数自启
        parent::__construct($param);
    }

    /**
     * Payment/Changebalance出入金操作(余额调整)
     * 
     */
    public function Changebalance($param = null) {
        ## 获取参数错误
        ParamException::get_Changebalance_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }

        ## 必选参数
        $this->signArray['login']     = $param['login']; // BFX账号
        $this->signArray['biasvalue'] = $param['biasvalue']; // 余额增减值
                
        ## 必须加密的字段
        $this->reskey = ['login'];
        
        ## url地址
        $apiurl = 'Payment/Changebalance';
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 返回结果错误
        ResultException::get_Changebalance_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }

    /**
     * Payment/inRecords 入金记录
     * 
     */
    public function inRecords($param) {
        ## 获取参数错误
        ParamException::get_inRecords_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ##可选参数
        if ($param['login']) {
            $this->signArray['login'] = $param['login']; // BFX账号
        }
        if ($param['type']) {
            $this->signArray['type'] = $param['type']; // 入金类型
        }
        if ($param['ispage']) {
            $this->signArray['ispage'] = $param['ispage']; // 是否分页
            if ($param['pagenum']) {
               $this->signArray['pagenum'] = $param['pagenum']; // 当前页数
            }
            if ($param['pagelimit']) {
               $this->signArray['pagelimit'] = $param['pagelimit']; // 每⻚显示个数
            }
        }
        
        ## 必须加密的字段
        $this->reskey = ['login'];
        
        ## url地址
        $apiurl = 'Payment/inRecords';
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 返回结果错误
        ResultException::get_inRecords_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }

    /**
     * Payment/outRecords 出金记录
     * 
     */
    public function outRecords($param = null) {
        ## 获取参数错误
        ParamException::get_outRecords_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ##可选参数
        if ($param['login']) {
            $this->signArray['login'] = $param['login']; // BFX账号
        }
        if ($param['type']) {
            $this->signArray['type'] = $param['type']; // 出金方式
        }
        if ($param['ispage']) {
            $this->signArray['ispage'] = $param['ispage']; // 是否分页
            if ($param['pagenum']) {
               $this->signArray['pagenum'] = $param['pagenum']; // 当前页数
            }
            if ($param['pagelimit']) {
               $this->signArray['pagelimit'] = $param['pagelimit']; // 每⻚显示个数
            }
        }
        
        ## 必须加密的字段
        $this->reskey = ['login'];
        
        ## url地址
        $apiurl = 'Payment/outRecords';
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 返回结果错误
        ResultException::get_outRecords_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }

    /**
     * PAYMENT/BFXpayment – BFX出入金记录
     * 
     */
    public function mt4payment($param = null) {
        ## 获取参数错误
        ParamException::get_mt4payment_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ##可选参数
        if ($param['login']) {
            $this->signArray['login'] = $param['login']; // BFX账号
        }
        if ($param['type']) {
            $this->signArray['type'] = $param['type']; // 筛选: 出、入金.out: 出金 in: 入金
        }
        if ($param['begtime']) {
            $this->signArray['begtime'] = $param['begtime']; // 数据记录时间-开始时间
        }
        if ($param['endtime']) {
            $this->signArray['endtime'] = $param['endtime']; // 数据记录时间-结束时间
        }
        if ($param['ispage']) {
            $this->signArray['ispage'] = $param['ispage']; // 是否分页
            if ($param['pagenum']) {
               $this->signArray['pagenum'] = $param['pagenum']; // 当前页数
            }
            if ($param['pagelimit']) {
               $this->signArray['pagelimit'] = $param['pagelimit']; // 每⻚显示个数
            }
        }

        ## 必须加密的字段
        $this->reskey = ['login', 'type', 'begtime', 'endtime'];
        
        ## url地址
        $apiurl = 'Payment/mt4payment';
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 返回自身的值，便于链式操作
        ## 返回结果错误
        ResultException::get_mt4payment_ex($this->return_data);
        return $this;
    }
}
