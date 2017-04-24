<?php
namespace BFX\ResultException;
use BFX\ResultException\BaseException; // 自定义的异常类

class PaymentException extends BaseException {
    /**
     * 出入金操作(余额调整)
     *
     */
    public static function get_Changebalance_ex($result) {
        ## 新增加错误提示
        self::$base_exception['4001'] = '未指定修改对象或缺少必填项';
        self::$base_exception['4002'] = '对指定的login没有操作权限';
        self::$base_exception['4003'] = '修改失败';

        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 入金记录
     *
     */
    public static function get_inRecords_ex($result) {
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 出金记录
     *
     */
    public static function get_outRecords_ex($result) {
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 出入金记录
     *
     */
    public static function get_mt4payment_ex($result) {
        ## 返回错误提示信息
        self::if_failed($result);
    }
}
