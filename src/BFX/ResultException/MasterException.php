<?php
namespace BFX\ResultException;
use BFX\ResultException\BaseException; // 自定义的异常类

class MasterException extends BaseException {
    /**
     * 申请成为高手 结果判断
     *
     */
    public static function get_apply_ex($result) {
        ## 新增加错误提示
        self::$base_exception['0'] = '各种错误提示';
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 编辑高手资料
     *
     */
    public static function get_edit_ex($result) {
        ## 新增加错误提示
        self::$base_exception['0'] = '各种错误提示';
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 获取高手基本信息
     *
     */
    public static function get_info_ex($result) {
        ## 新增加错误提示
        self::$base_exception['0'] = '各种错误提示';
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     *  高手审核
     *
     */
    public static function get_check_ex($result) {
        ## 新增加错误提示
        self::$base_exception['0'] = '各种错误提示';
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 跟随高手
     *
     */
    public static function get_follow_ex($result) {
        ## 新增加错误提示
        self::$base_exception['0'] = '各种错误提示';
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 取消跟随高手
     *
     */
    public static function get_nofollow_ex($result) {
        ## 新增加错误提示
        self::$base_exception['0'] = '各种错误提示';
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 关注高手
     *
     */
    public static function get_focus_ex($result) {
        ## 新增加错误提示
        self::$base_exception['0'] = '各种错误提示';
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 取消关注高手
     *
     */
    public static function get_nofocus_ex($result) {
        ## 新增加错误提示
        self::$base_exception['0'] = '各种错误提示';
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     *  获取跟随高高手手当前订单/历史订单
     *
     */
    public static function get_followtickets_ex($result) {
        ## 新增加错误提示
        self::$base_exception['0'] = '各种错误提示';
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     *  获取跟随高高手手当前订单/历史订单
     *
     */
    public static function get_followtickets_ex($result) {
        ## 新增加错误提示
        self::$base_exception['0'] = '各种错误提示';
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 说明 获取高手排名
     *
     */
    public static function get_ranking_ex($result) {
        ## 新增加错误提示
        self::$base_exception['0'] = '各种错误提示';
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 说明 关注的高手信息
     *
     */
    public static function get_focusinfo_ex($result) {
        ## 新增加错误提示
        self::$base_exception['0'] = '各种错误提示';
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 说明 已复制的高手信息
     *
     */
    public static function get_mycopy_ex($result) {
        ## 新增加错误提示
        self::$base_exception['0'] = '各种错误提示';
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 说明 高手被跟随或被关注信息
     *
     */
    public static function get_masterRelation_ex($result) {
        ## 新增加错误提示
        self::$base_exception['0'] = '各种错误提示';
        ## 返回错误提示信息
        self::if_failed($result);
    }
}
