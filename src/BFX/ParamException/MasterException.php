<?php 
namespace BFX\ParamException;
use BFX\ParamException\BaseException; // 自定义的异常类

class MasterException {
    /**
     * 申请成为高手
     * 
     */
    public static function get_apply_ex($param = null) {
       // 1:account,followFunds,tradeExperience为必传参数
        $message = ''; // 反馈信息
        ## 必须字段
        // BFX账号
        if (!$param['account']) {
            $message = '请填写BFX账号';
        } 
        // 最低跟随金额
        else if ($param['followFunds']) {
            $message = '请填写最低跟随金额';
        }
        // 交易经验
        else if (isset($param['tradeExperience'])) {
            if (!in_array($param['tradeExperience'], [1,2,3,4])) {
                $message = '交易经验非法';
            }
        // 没有填写交易经验
        } else if (!isset($param['tradeExperience'])) {
            $message = '请填写交易经验';
        }
 
        // 如果有错误信息，则进行抛出
        BaseException::throw_exception($message);
    }

    /**
     * 编辑高手资料
     * 
     */
    public static function get_edit_ex($param = null) {
       // 1:account,followFunds,tradeExperience为必传参数
        $message = ''; // 反馈信息
        ## 必须字段
        // BFX账号
        if (!$param['account']) {
            $message = '请填写BFX账号';
        } 
        // 最低跟随金额
        else if ($param['followFunds']) {
            $message = '请填写最低跟随金额';
        }
        // 交易经验
        else if (isset($param['tradeExperience'])) {
            if (!in_array($param['tradeExperience'], [1,2,3,4])) {
                $message = '交易经验非法';
            }
        // 没有填写交易经验
        } else if (!isset($param['tradeExperience'])) {
            $message = '请填写交易经验';
        }
        // 如果有错误信息，则进行抛出
        BaseException::throw_exception($message);
    }

    /**
     * 获取高手信息
     * 
     */
    public static function get_info_ex($param = null) {
        if (!$param['masterid']) {
            $message = '请填写申请帐号';
        }
        // 如果有错误信息
        BaseException::throw_exception($message);
    }

    /**
     * 普通交易易列列表/高手审核
     *
     */
    public static function get_check_ex($param = null) {
        if (!$param['account']) {
            $message = '请填写高手BFX帐号';
        }
        BaseException::throw_exception($message);
    }

    /**
     * 普通交易易列列表/跟随高手
     *
     */
    public static function get_follow_ex($param = null) {
        if (!$param['masterid']) {
            $message = '请填写高手BFX帐号';
        } else if (!$param['followid']) {
            $message = '请填写跟随帐号';
        } else if (!$param['copymoney']) {
            $message = '请填写金额';
        } else if (!$param['copyway']) {
            $message = '请填写复制方式';
        } else if ($param['copyway']) {
            if (in_array($param['copyway'], [1, 2, 3])) {
                $message = '非法的复制方式';
            }
        // 复制方式为2,3时，复制手数必填
        } else if (in_array($param['copyway'], [2, 3])) {
            if (!$param['copyvolume']) {
                $message = '复制手数必须填写';
            } 
            else {
                if ($param['copyway'] == 2) {
                    if ($param['copyvolume'] < 0.01) {
                        $message = '非法的复制手数，复制手数必须大于０．０１';
                    }
                } else {
                    if ($param['copyvolume'] > 1000 || $param['copyvolume'] < 1) {
                        $message = '非法的复制手数，复制手数必须在１～１０００之间';
                    }
                }
            }
        }
        // 如果计算出的跟随手手数小小于系统设置最低手手数是否跟进,1:跟进2不不跟
        else if (isset($param['ismin_copy'])) {
            if (!in_array($param['ismin_copy'], [1, 2])) {
                $message = '非法的最低手数';
            }
        }
        // 是否反向跟单:0正向;1反向
        else if (isset($param['is_reverse'])) {
            if (!in_array($param['is_reverse'], [0, 1])) {
                $message = '跟单参数错误';
            }
        }
        BaseException::throw_exception($message);
    }

    /**
     * 取消跟随
     *
     */
    public static function get_nofollow_ex($param = null) {
        if (!$param['masterid']) {
            $message = '高手BFX帐号';
        } else if (!$param['followid']) {
            $message = '请填写跟随帐号';
        }
        BaseException::throw_exception($message);
    }

    /**
     * 关注高手
     *
     */
    public static function get_focus_ex($param = null) {
        if ($param['masterid']) {
            $message = '请设置高手BFX帐号';
        } else if ($param['followid']) {
            $message = '请设置BFX跟随帐号';
        }
        BaseException::throw_exception($message);
    }
    
    /**
     * 取消关注高手
     *
     */
    public static function get_nofocus_ex($param = null) {
        if (!$param['focusid']) {
            $message = '被关注人账号';
        } else if (!$param['accountid']) {
            $message = '关注人账号';
        }
        BaseException::throw_exception($message);
    }

    /**
     * 获取跟随高高手手当前订单/历史订单
     * followtickets
     *
     */
    public static function get_followtickets_ex($param = null) {
        if (!$param['masterid']) {
            $message = '请设置高手帐号';
        } 
        else if (!$param['followid']) {
            $message = '请设置跟随帐号';
        } 
        else if (!is_set($param['now'])) {
            $message = '请设置订单类型';
        } else if (isset($param['now'])) {
            if (in_array($param['now'], [1, 0])) {
                $message = '订单类型非法';
            }
        }

        BaseException::throw_exception($message);
    }

    /**
     * 获取高高手手排名
     * 
     */
    public static function get_ranking_ex($param = null) {
        if (!$param['rankType']) {
            $message = '请设置排名方式';
        } else {
            if (!in_array($param['rankType'], ['per', 'money', 'people'])) {
                $message = '非法的排名方式';
            }
        }
        BaseException::throw_exception($param);
    }

    /**
     * 关注的高手信息
     *
     */
    public static function get_focusinfo_ex($param = null) {
        if (!$param['account']) {
            $message = '请设置普通用户BFX帐号';
        }
        BaseException::throw_exception($message);
    }

    /**
     * 已复制的高手信息
     *
     */
    public static function get_mycopy_ex($param = null) {
        if (!$param['account']) {
            $message = '请设置普通用户BFX帐号';
        }
        BaseException::throw_exception($message);
    }

    /**
     * 高手被跟随或被关注信息
     *
     */
    public static function get_
}
