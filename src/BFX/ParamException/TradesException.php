<?php
namespace BFX\ParamException;
use BFX\ParamException\BaseException; // 自定义的异常类

class TradesException {

    /**
     * 历史平仓记录
     *
     */
    public static function get_historylist_ex($param = null) {
        if ($param['openstarttime']) {
            if (!$param['openendtime']) {
                $message = '请添加开仓结束时间';
            }
        } else if ($param['closestarttime']) {
            if (!$param['closeendtime']) {
                $message = '请添加平仓结束时间';
            }
        }

        BaseException::throw_exception($param);
    }

    /**
     * 当前持仓记录
     * 
     */
    public function get_makelist_ex($param = null) {

    }

    /**
     * 下单操作——开市场单
     *
     */
    public static function get_OrderExe_maket_ex($param = null)
    {
       // 1:exc , login, symbol, volume为必传参数
       // 2:exec 只能是'BUY','SELL','BUYLIMIT','SELLLIMIT','BUYSTOP','BUYSTOP'
        $message = ''; // 反馈信息
        ## 必须字段
        // exc 操作行为
        if (!$param['exc']) {
            $message = '请填写操作行为';
        } 
        // 操作行为必须为以下几个选一
        else if ($param['exc']) {
            if (!in_array($param['exc'], ['BUY','SELL','BUYLIMIT','SELLLIMIT','BUYSTOP','BUYSTOP'])) {
                $message = '操作行为不合法';
            }
        }
        // 账号
        else if ($param['login']) {
            $message = '账号必须填写';
        }
        // 交易品种
        else if ($param['symbol']) {
            $message = '交易品种必须填写';
        }
        // 手数
        else if (!$param['volume']) {
            $message = '手数必须填写';
        }
        // 如果有错误信息，则进行抛出
        BaseException::throw_exception($message);
    }

    /**
     * 下单操作——挂单
     *
     */
    public static function get_OrderExe_pending_ex($param = null) {
       // 1:exc , login, symbol, volume, price, sl, tp 为必传参数
       // 2:exec 只能是'BUY','SELL','BUYLIMIT','SELLLIMIT','BUYSTOP','BUYSTOP'
        $response = ''; // 反馈信息
        ## 必须字段
        // exc 操作行为
        if (!$param['exc']) {
            $response = '请填写操作行为';
        } 
        // 操作行为必须为以下几个选一
        else if (isset($param['exc'])) {
            if (!in_array($param['exc'], ['BUY','SELL','BUYLIMIT','SELLLIMIT','BUYSTOP','BUYSTOP'])) {
                $response = '操作行为不合法';
            }
        }
        // 账号
        else if ($param['login']) {
            $response = '账号必须填写';
        }
        // 交易品种
        else if ($param['symbol']) {
            $response = '交易品种必须填写';
        }
        // 手数
        else if (!is_numeric($param['volume'])) {
            $response = '手数必须填写';
        }
        // 金额
        else if (!is_numeric($param['price'])) {
            $response = '金额度必须填写';
        }
        // 止盈
        else if (!is_numeric($param['sl'])) {
            $response = '止盈必须填写';
        }
        // 止损
        else if (!is_numeric($param['tp'])) {
            $response = '止损必须填写';
        }
        // 如果有错误信息，则进行抛出
        BaseException::throw_exception($message);
    }

    /**
     * 下单操作——平仓
     *
     */
    public static function get_OrderExe_close_ex($param = null) {
        if (!$param['orderno']) {
            $message = '交易单号为必填参数';
        }
        // 操作行为必须为以下几个选一
        else if (isset($param['exc'])) {
            if (!in_array($param['exc'], ['BUY','SELL','BUYLIMIT','SELLLIMIT','BUYSTOP','BUYSTOP'])) {
                $response = '操作行为不合法';
            }
        }
        BaseException::throw_exception($message);
    }

    /**
     * 下单操作——删单
     *
     */
    public static function get_OrderExe_delete_ex($param = null) {
        if (!$param['orderno']) {
            $message = '交易单号为必填参数';
        }
        // 操作行为必须为以下几个选一
        else if (isset($param['exc'])) {
            if (!in_array($param['exc'], ['BUY','SELL','BUYLIMIT','SELLLIMIT','BUYSTOP','BUYSTOP'])) {
                $response = '操作行为不合法';
            }
        }
        BaseException::throw_exception($message);
    }

    /**
     * 下单操作——改单
     *
     */
    public static function get_OrderExe_edit_ex($param = null) {
        if (!$param['orderno']) {
            $message = '请添加订单号';
        } 
        else if (!$param['price']) {
            $message = '请添加价格';
        } 
        else if (!$param['sl']) {
            $message = '请添加止盈';
        } 
        else if (!$param['tp']) {
            $message = '请添加止损';
        }
        // 操作行为必须为以下几个选一
        else if (isset($param['exc'])) {
            if (!in_array($param['exc'], ['BUY', 'SELL', 'BUYLIMIT', 'SELLLIMIT', 'BUYSTOP', 'BUYSTOP'])) {
                $response = '操作行为不合法';
            }
        }
        BaseException::throw_exception($message);
    }
}
