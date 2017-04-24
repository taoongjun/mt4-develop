<?php
namespace BFX\ResultException;
use BFX\ResultException\BaseException; // 自定义的异常类

class PublicsException extends BaseException {
    /**
     * 注册
     *
     */
    public static function get_reg_ex($result) {
        ## 新增加错误提示
        self::$base_exception['4001'] = '请求的BFX分组没有权限';
        self::$base_exception['4002'] = 'BFX账号创建失败';
        self::$base_exception['4003'] = 'CRM账号创建失败';
        self::$base_exception['4004'] = '请求的手机或邮箱已被注册过';

        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * BFX账号登录
     *
     */
    public static function get_login_ex($result) {
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     *  商品的当前报价和历史报价记录
     *
     */
    public static function get_mt4price_ex($result) {
        ## 新增加错误提示
        self::$base_exception['4001'] = '未指定修改对象或缺少必填项';
        self::$base_exception['4002'] = '拉取历史记录失败, 请联系技术员';
        self::$base_exception['4003'] = '指定的时间间隔period的传参不符合规定';

        ## 返回错误提示信息
        self::if_failed($result);
    }


}
