<?php
namespace BFX;
// 开源类获取curl数据
use Ixudra\Curl\CurlService;
// 使用抛出异常的类
use BFX\ParamException\TradesException AS ParamException;
// 结果异常类
use BFX\ResultException\TradesException As ResultException;

/**
 * 交易类
 * 
 */
class Trades extends Base {
    // 构造函数
    public function __construct($param = null) {
        // 父级构造函数自启
        parent::__construct($param);
    }

    /**
     * 历史平仓记录
     *
     */
    public function historylist($param = null) {
        ## 排除参数错误，稍后再做
        ParamException::get_historylist_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 参数 
        if ($param['login']) {
            $this->signArray['login'] = $param['login']; // bfx帐号．是否指定login, 不不指定则拉取所有账户的记录
        }
        // 分页
        if ($param['ispage']) {
            $this->signArray['ispage'] = 1; // 是否分页，0不分，1分
            // 当前页
            if ($param['pagenum']) {
                $this->signArray['pagenum'] = $param['pagenum'];
            }
            // 每页显示的数量
            if ($param['pagelimit']) {
                $this->signArray['pagelimit'] = $param['pagelimit'];
            }
        // 不分页
        } else {
            $this->signArray['ispage'] = 0; // 不分页
        }
        // 排序
        if ($param['orderby']) {
            $this->signArray['orderby'] = $param['orderby'];
        }
        // 开仓时间－开始
        if ($param['openstarttime']) {
            $this->signArray['openstarttime'] = $param['openstarttime'];
        }
        // 开仓时间－结束
        if ($param['openendtime']) {
            $this->signArray['openendtime'] = $param['openendtime'];
        }
        // 平仓时间－开始
        if ($param['closestarttime']) {
            $this->signArray['closestarttime'] = $param['closestarttime'];
        }
        // 平仓时间－结束
        if ($param['closeendtime']) {
            $this->signArray['closeendtime'] = $param['closeendtime'];
        }
        // 分组
        if ($param['group']) {
            $this->signArray['group'] = $param['group'];
        }
        
        ## 必须base_64转码的参数
        $this->reskey = 
            ['login','orderby','openstarttime','openendtime','closestarttime','closeendtime','group'];

        ## 获取数据的接口url地址
        $apiurl = 'Trades/historylist'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果异常
        ResultException::get_historylist_ex($this->return_data);
        ## 返回类自身，便于链式操作
        return $this; // 方便链式操作
    }

    /**
     * 当前持仓记录
     *
     */
    public function maketlist($param = null) {
        ## 排除参数错误，参数简单，此处不需要排除
        // ParamException::get_maketlist_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        
        ## 参数 
        if ($param['login']) {
            $this->signArray['login'] = $param['login']; // bfx帐号．是否指定login, 不不指定则拉取所有账户的记录
        }
        // 分页
        if ($param['ispage']) {
            $this->signArray['ispage'] = 1; // 是否分页，0不分，1分
            // 当前页
            if ($param['pagenum']) {
                $this->signArray['pagenum'] = $param['pagenum'];
            }
            // 每页显示的数量
            if ($param['pagelimit']) {
                $this->signArray['pagelimit'] = $param['pagelimit'];
            }
        // 不分页
        } else {
            $this->signArray['ispage'] = 0; // 不分页
        }
        // 交易品种
        if ($param['symbol']) {
            $this->signArray['symbol'] = $param['symbol'];
        }
        // 排序????不能传orderby
/*      if ($param['orderby']) {
            $this->signArray['orderby'] = $param['orderby'];
        }*/

        ## 必须base_64转码的参数
        $this->reskey = ['login', 'orderby'];

        ## 获取数据的接口url地址
        $apiurl = 'Trades/maketlist'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果异常
        ResultException::get_maketlist_ex($this->return_data);
        ## 返回类自身，便于链式操作
        return $this; // 方便链式操作
    }

    /**
     * 当前挂单记录
     *
     */
    public function pendinglist($param = null) {
        ## 参数简单，不需要进行排除
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        
        ## 参数 
        if ($param['login']) {
            $this->signArray['login'] = $param['login']; // bfx帐号．是否指定login, 不不指定则拉取所有账户的记录
        }
        // 分页
        if ($param['ispage']) {
            $this->signArray['ispage'] = 1; // 是否分页，0不分，1分
            // 当前页
            if ($param['pagenum']) {
                $this->signArray['pagenum'] = $param['pagenum'];
            }
            // 每页显示的数量
            if ($param['pagelimit']) {
                $this->signArray['pagelimit'] = $param['pagelimit'];
            }
        // 不分页
        } else {
            $this->signArray['ispage'] = 0; // 不分页
        }
        // 排序????不能传orderby
/*        if ($param['orderby']) {
            $this->signArray['orderby'] = $param['orderby'];
        }*/

        ## 必须base_64转码的参数
        $this->reskey = ['login', 'orderby'];

        ## 获取数据的接口url地址
        $apiurl = 'Trades/pendinglist'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果异常
        ResultException::get_pendinglist_ex($this->return_data);
        ## 返回类自身，便于链式操作
        return $this; // 方便链式操作
    }

    ### 下单操作
    /**
     * 下单操作———开市挂单
     */
    public function OrderExe_maket($param = null) {
        ## 排除参数错误
        ParamException::get_OrderExe_maket_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }

        ## 必须参数
        $this->signArray['action'] = 'maket'; //  操作选项
        $this->signArray['exc']    = $param['exc']; // 操作行为
        $this->signArray['login']  = $param['login']; // mt4账号
        $this->signArray['symbol'] = $param['symbol']; // 交易品种
        $this->signArray['volume'] = $param['volume']; // 手数
        ## 可选参数
        if ($param['price']) {
            $this->signArray['price'] = $param['price']; // 价格
        }
        if ($param['sl']) {
            $this->signArray['sl'] = $param['sl']; // 止盈
        }
        if ($param['tp']) {
            $this->signArray['tp'] = $param['tp']; // 止亏
        }
        if ($param['orderno']) {
            $this->signArray['orderno'] = $param['orderno']; // 订单号
        }
        ## 必须base_64转码的参数
        $this->config['reskey'] = ['login', 'symbol'];

        ## 获取数据的接口url地址
        $apiurl = 'Trades/OrderExe'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 抛出结果异常
        ResultException::get_OrderExe_ex($this->return_data);
        ## 返回类自身，便于链式操作
        return $this; // 方便链式操作
    }

    ### 下单操作
    /**
     * 下单操作———挂单交易
     */
    public function OrderExe_pending($param = null) {
        ## 排除参数错误
        ParamException::get_OrderExe_pending_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }

        ## 必须参数
        $this->signArray['action'] = 'pending'; // 操作选项
        $this->signArray['exc']    = $param['exc']; // 操作行为
        $this->signArray['login']  = $param['login']; // mt4账号
        $this->signArray['symbol'] = $param['symbol']; // 交易品种
        $this->signArray['volume'] = $param['volume']; // 手数
        $this->signArray['price']  = $param['price']; // 价格
        $this->signArray['sl']     = $param['sl']; // 止盈
        $this->signArray['tp']     = $param['tp']; // 止亏

        ## 可选参数
        if ($param['orderno']) {
            $this->signArray['orderno'] = $param['orderno'];
        }
        ## 必须base_64转码的参数
        $this->config['reskey'] = ['login', 'symbol'];

        ## 获取数据的接口url地址
        $apiurl = 'Trades/OrderExe'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 抛出结果异常
        ResultException::get_OrderExe_ex($this->return_data);
        ## 返回类自身，便于链式操作
        return $this; // 方便链式操作
    }

    ### 下单操作
    /**
     * 下单操作———平仓交易
     */
    public function OrderExe_close($param = null) {
        ## 排除参数错误
        ParamException::get_OrderExe_close_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }

        ## 必须参数
        $this->signArray['action']  = 'close'; // 操作选项
        $this->signArray['orderno'] = $param['orderno'];

        ## 可选参数
        if ($param['exc']) {
            $this->signArray['exc']    = $param['exc']; // 操作行为
        }
        if ($param['login']) {
            $this->signArray['login']  = $param['login']; // mt4账号
        }
        if ($param['symbol']) {
            $this->signArray['symbol'] = $param['symbol']; // 交易品种
        }
        if ($param['volume']) {
            $this->signArray['volume'] = $param['volume']; // 手数
        }
        if ($param['price']) {
            $this->signArray['price']  = $param['price']; // 价格
        }
        if ($param['sl']) {
            $this->signArray['sl']     = $param['sl']; // 止盈
        }
        if ($param['tp']) {
            $this->signArray['tp']     = $param['tp']; // 止亏
        }
        
        ## 必须base_64转码的参数
        $this->config['reskey'] = ['login', 'symbol'];

        ## 获取数据的接口url地址
        $apiurl = 'Trades/OrderExe'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 抛出结果异常
        ResultException::get_OrderExe_ex($this->return_data);
        ## 返回类自身，便于链式操作
        return $this; // 方便链式操作
    }

    ### 下单操作
    /**
     * 下单操作———删除取消
     */
    public function OrderExe_delete($param = null) {
        ## 排除参数错误，稍后再做
        ParamException::get_OrderExe_delete_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }

        ## 必须参数
        $this->signArray['action']  = 'delete'; // 操作选项
        $this->signArray['orderno'] = $param['orderno'];

        ## 可选参数
        if ($param['exc']) {
            $this->signArray['exc']    = $param['exc']; // 操作行为
        }
        if ($param['login']) {
            $this->signArray['login']  = $param['login']; // mt4账号
        }
        if ($param['symbol']) {
            $this->signArray['symbol'] = $param['symbol']; // 交易品种
        }
        if ($param['volume']) {
            $this->signArray['volume'] = $param['volume']; // 手数
        }
        if ($param['price']) {
            $this->signArray['price']  = $param['price']; // 价格
        }
        if ($param['sl']) {
            $this->signArray['sl']     = $param['sl']; // 止盈
        }
        if ($param['tp']) {
            $this->signArray['tp']     = $param['tp']; // 止亏
        }
        
        ## 必须base_64转码的参数
        $this->config['reskey'] = ['login', 'symbol'];

        ## 获取数据的接口url地址
        $apiurl = 'Trades/OrderExe'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 抛出结果异常
        ResultException::get_OrderExe_ex($this->return_data);
        ## 返回类自身，便于链式操作
        return $this; // 方便链式操作
    }

    ### 下单操作
    /**
     * 下单操作——修改订单
     */
    public function OrderExe_edit($param = null) {
        ## 排除参数错误，稍后再做
        ParamException::get_OrderExe_edit_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 必须参数
        $this->signArray['action']  = 'edit'; // 操作选项
        $this->signArray['orderno'] = $param['orderno']; // 订单号
        $this->signArray['price']   = $param['price']; // 价格
        $this->signArray['sl']      = $param['sl']; // 止盈
        $this->signArray['tp']      = $param['tp']; // 止亏

        ## 可选参数
        if ($param['exc']) {
            $this->signArray['exc']    = $param['exc']; // 操作行为
        }
        if ($param['login']) {
            $this->signArray['login']  = $param['login']; // mt4账号
        }
        if ($param['symbol']) {
            $this->signArray['symbol'] = $param['symbol']; // 交易品种
        }
        if ($param['volume']) {
            $this->signArray['volume'] = $param['volume']; // 手数
        }
        
        ## 必须base_64转码的参数
        $this->config['reskey'] = ['login', 'symbol'];

        ## 获取数据的接口url地址
        $apiurl = 'Trades/OrderExe'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 抛出结果异常
        ResultException::get_OrderExe_ex($this->return_data);
        ## 返回类自身，便于链式操作
        return $this; // 方便链式操作
    }
}
