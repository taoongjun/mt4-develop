<?php
namespace BFX\ResultException;
use BFX\ResultException\BaseException; // 自定义的异常类


class TradesException extends BaseException {
    /**
     * 获取指定账户(或旗下所有账户)的历史平仓记录
     *
     */
    public static function get_historylist_ex($result) {
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 获取指定账户(或旗下所有账户)的当前持仓(市场单)记录
     *
     */
    public static function get_maketlist_ex($result) {
        ## 新增加错误提示
        self::$base_exception['4001'] = '旗下没有该login账号或旗下login账号为空';
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 获取指定账户(或旗下所有账户)的当前挂单记录
     *
     */
    public static function get_pendinglist_ex($result) {
        ## 新增加错误提示
        self::$base_exception['4001'] = '旗下没有该login账号 或 旗下login账号为空';
        ## 返回错误提示信息
        self::if_failed($result);
    }

    /**
     * 下单操作: 开市场单、挂单、平仓、删单、改单
     *
     */
    public static function get_OrderExe_ex($result) {
        ## 新增加错误提示
        self::$base_exception['4001'] = '未知命令|未定义指令|指令错误';
        self::$base_exception['4002'] = 'action指令为空';
        self::$base_exception['4003'] = '未指定修改对象或缺少必填项或未按照[条件]提交参数';
        self::$base_exception['4004'] = 'BFX端操作执行行行失败, 返回的msg中有携带具体信息';
        ## 返回错误提示信息
        self::if_failed($result);
    }
}
