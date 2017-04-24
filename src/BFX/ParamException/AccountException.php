<?php
namespace BFX\ParamException;
use BFX\ParamException\BaseException; // 自定义的异常类

/**
　* Account
　*/
class AccountException{
    /**
     * 修改密码时，参数异常
     *
     */
    public static function get_Changeset_pwd_ex($config) {
        $message = '';
        ## 没有给帐号
        if (!$config['login']) {
            $message = "帐号为必选参数";
        }
        ## 没有给新密码
        if (!$config['newpsword']) {
            $message = "新密码为必选参数";
        }
        BaseException::throw_exception($message);
    }

    /**
     * 修改分组时，参数异常
     *
     */
    public static function get_Changeset_group_ex($config) {
        $message = '';
        ## 没有给帐号
        if (!$config['login']) {
            $message = "帐号为必选参数";
        }
        ## 修改分组时没有给新的分组名称
        if (!$config['newgroup']) {
            $message = "新分组为必选参数";
        }
        BaseException::throw_exception($message);
    }

    /**
     * masterRelation 高手被跟随或被关注信息
     * 
     */
    public static function get_masterRelation_ex($param = null) {
        $message = '';
        if (!$param['account']) {
            $message = '请设置高手用户BFX帐号';
        } else if (isset($param['type'])) {
            if (in_array($param['type'], [1, 2])) {
                $message = '非法的关注类型';
            }
        }
        BaseException::throw_exception($param);
    }
}
