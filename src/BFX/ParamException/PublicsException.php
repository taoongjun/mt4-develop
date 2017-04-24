<?php
namespace BFX\ParamException;
use BFX\ParamException\BaseException; // 自定义的异常类

class PublicsException
{
    /**
     * 注册
     * 
     */
    public static function get_reg_ex($param = null) {
        if (trim($param['name'])) {
            $message = '请填写姓名'; // 姓名
        } 
        else if (trim($param['phone'])) {
            $message = '请填写电话'; // 电话
        }
        else if (trim($param['email'])) {
            $message = '请填写邮箱'; // 邮箱
        }
        else if (trim($param['mt4group'])) {
            $message = '请填写分组'; // 分组
        } 
        else if(trim($param['leverage'])) {
            $message = '请填写杠杆率'; // 杠杆率
        } 

        BaseException::throw_exception($message);
    }

    /**
     * 登录
     *
     */
    public static function get_login_ex($param = null) {
        if (!$param['account']) {
            $message = '请填写帐号';
        } 
        else if (!$param['password']) {
            $message = '请填写密码';
        }

        BaseException::throw_exception($message);
    }

    /**
     * get_mt4price
     * 商品的当前报价和历史报价记录
     *
     */
    public static function get_mt4price_ex($param = null) {
        if ($param['symbol']) {
            // symol不为空。period和barum为必传参数
            if (!$param['period'] || !$param['barnum']) {
                $message = 'symol不为空。period和barum为必传参数';
            } 
        }

        BaseException::throw_exception($message);
    }
}