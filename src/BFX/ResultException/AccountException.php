<?php
namespace BFX\ResultException;
use BFX\ResultException\BaseException; // 自定义的异常类

class AccountException extends BaseException {
    /**
     * 获取用户列表结果，没有特殊的应答码
     * 
     */
    public static function get_mt4userlist_ex($result) {
        self::if_failed($result);
    }

    /**
     * 修改密码结果判断,和修改密码结果判断
     *
     */
    public static function get_Changeset_ex($result)
    {
        self::$base_exception['4001'] = '未知命令|未定义指令|指令错误';
        self::$base_exception['4002'] = '对指定的login没有操作权限';
        self::$base_exception['4003'] = '未指定修改对象或缺少必填项';
        self::$base_exception['4004'] = '密码修改失败';
        self::$base_exception['4005'] = '改组失败,或该用用户有持仓, 系统拒绝改组操作';
        ## 返回错误
        self::if_failed($result);
    }
} 
