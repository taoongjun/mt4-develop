<?php
namespace BFX;
// 开源类获取curl数据
use Ixudra\Curl\CurlService;
// 使用抛出异常的类
use BFX\ParamException\IndexException AS ParamException;

class Index extends Base {
    /** 
     * 构造函数
     * 
     */
    public function __construct($param = null) {
        // 父级构造函数自启
        parent::__construct($param);
    }
}
