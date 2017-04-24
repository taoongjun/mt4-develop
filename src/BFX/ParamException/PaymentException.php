<?php 
namespace BFX\ParamException;
use BFX\ParamException\BaseException; // 自定义的异常类

class PaymentException {
    /**
     * 出入金操作(余额调整)
     * 
     */
    public static function get_Changebalance_ex($param = null) {
        if (!$param['login']) {
            $message = '请设置BFX帐号';
        } else if (!$param['biasvalue']) {
            $message = '请设置余额增减值';
        }

        BaseException::throw_exception($message);
    }

    /**
     * 入金记录
     *
     */
    public static function get_inRecords_ex($param = null) {
        if (isset($param['type'])) {
            if (!in_array($param['type'], [0, 1])) {
                $message = '非法的入金类型';
            }
        }
        BaseException::throw_exception($message);
    }

    /**
     * 出金记录
     *
     */
    public static function get_outRecords_ex($param = null) {
        if (isset($param['type'])) {
            if (!in_array($param['type'], [0, 1])) {
                $message = '非法的出金方式';
            }
        }
        BaseException::throw_exception($message);
    }

    /**
     * 出入金记录
     *
     */
    public static function get_mt4payment_ex($param) {
        if (isset($param['type'])) {
            if (!in_array($param['type'], [0, 1])) {
                $message = '非法的入金类型';
            }
        }
        BaseException::throw_exception($message);
    }
}
