<?php
namespace BFX;
// 开源类获取curl数据
use Ixudra\Curl\CurlService;
// 使用抛出异常的类
use BFX\ParamException\MasterException As ParamException;
// 结果异常类
use BFX\ResultException\MasterException As ResultException;
class Master extends Base {
    /** 
     * 构造函数
     * 
     */
    public function __construct($param = null) {
        // 父级构造函数自启
        parent::__construct($param);
    }

    /**
     * Master/apply 普通交易易列列表/申请成为高手
     */
    public function apply($param = null) {
        ## 获取参数错误
        ParamException::get_apply_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 必选参数
        $this->signArray['account']         = $param['account']; // 申请账号
        $this->signArray['followFunds']     = $param['followFunds']; // 最低跟随资金金金
        $this->signArray['tradeExperience'] = $param['tradeExperience']; //  0:没有经验;1:1年年经验,2:2年年经验;3:3年年经验;4:3年年以上经验

        ###可选参数
        // 'tradeWay' => '⻓长线交易易',//字符串串类型,内容自自定义
        if ($param['tradeWay']) {
            $this->signArray['tradeWay'] = $param['tradeWay'];
        }
        // 'tradeDesc' => '交易易策略略',//字符串串类型,内容自自定义
        if ($param['tradeDesc']) {
            $this->signArray['tradeDesc'] = $param['tradeDesc']; 
        }
        // 更更多介绍,字符串串类型,内容自自定义
        if ($param['moreDesc']) {
            $this->signArray['moreDesc'] = $param['moreDesc'];
        }
        // 初始复制人人数,可作假
        if ($param['ini_cpeople']) {
            $this->signArray['ini_cpeople'] = $param['ini_cpeople'];
        }
        // 初始复制金金金额,可作假
        if ($param['ini_cmoney']) {
            $this->signArray['ini_cmoney'] = $param['ini_cmoney'];
        }
        
        ## 必须加密的字段
        $this->reskey = [];
        ## url地址
        $apiurl = 'Master/apply'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否异常
        ResultException::get_apply_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }

    /**
     * Master/apply 普通交易易列列表/编辑高手资料
     * 
     */
    public function edit($param = null) {
        ## 获取参数错误
        ParamException::get_edit_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 必选参数
        $this->signArray['account']         = $param['account']; // 申请账号
        $this->signArray['followFunds']     = $param['followFunds']; // 最低跟随资金金金
        $this->signArray['tradeExperience'] = $param['tradeExperience']; //  0:没有经验;1:1年年经验,2:2年年经验;3:3年年经验;4:3年年以上经验
 
        ###可选参数
        // 'tradeWay' => '⻓长线交易易',//字符串串类型,内容自自定义
        if ($param['tradeWay']) {
            $this->signArray['tradeWay']    = $param['tradeWay'];
        }
        // 'tradeDesc' => '交易易策略略',//字符串串类型,内容自自定义
        if ($param['tradeDesc']) {
            $this->signArray['tradeDesc']   = $param['tradeDesc']; 
        }
        // 更更多介绍,字符串串类型,内容自自定义
        if ($param['moreDesc']) {
            $this->signArray['moreDesc']    = $param['moreDesc'];
        }
        // 初始复制人人数,可作假
        if ($param['ini_cpeople']) {
            $this->signArray['ini_cpeople'] = $param['ini_cpeople'];
        }
        // 初始复制金金金额,可作假
        if ($param['ini_cmoney']) {
            $this->signArray['ini_cmoney']  = $param['ini_cmoney'];
        }
        
        ## 必须加密的字段
        $this->reskey = [];
        ## url地址
        $apiurl = 'Master/edit'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否异常
        ResultException::get_edit_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }

    /**
     * Master/info 普通交易易列列表/高手信息
     * 
     */
    public function info($param = null) {
        ## 获取参数错误
        ParamException::get_info_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 必选参数
        $this->signArray['masterid'] = $param['masterid']; // 申请账号
        
        ## 必须加密的字段
        $this->reskey = [];
        ## url地址
        $apiurl = 'Master/info'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否异常
        ResultException::get_info_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }

    /**
     * Master/check 普通交易易列列表/高手审核
     * 
     */
    public function check($param = null) {
        ## 获取参数错误
        ParamException::get_check_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 必选参数
        $this->signArray['account'] = $param['account']; // 高手BFX帐号
        
        ## 必须加密的字段
        $this->reskey = [];
        ## url地址
        $apiurl = 'Master/check'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否异常
        ResultException::get_check_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }

    /**
     * Master/follow 普通交易易列列表/跟随高手
     * 
     */
    public function follow($param = null) {
        ## 获取参数错误
        ParamException::get_fllow_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 必选参数
        $this->signArray['masterid']  = $param['masterid']; // 高高手手BFX账号
        $this->signArray['followid']  = $param['followid']; // 跟随BFX账号
        $this->signArray['copymoney'] = $param['copymoney']; // 复制金金金额
        $this->signArray['copyway']   = $param['copyway']; // 复制方方式

        ## 可选参数
        if ($param['copyvolume']) {
            $this->signArray['copyvolume'] = $param['copyvolume']; // 复制手手数
        }
        if ($param['ismin_copy']) {
            $this->signArray['ismin_copy'] = $param['ismin_copy']; // 是否最低手手数跟随
        }
        if ($param['is_reverse']) {
            $this->signArray['is_reverse'] = $param['is_reverse']; // 是否反向跟单
        }
        ## 必须加密的字段
        $this->reskey = [];
        ## url地址
        $apiurl = 'Master/follow'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否异常
        ResultException::get_follow_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }

    /**
     * Master/nofollow 普通交易易列列表/取消跟随
     * 
     */
    public function nofollow($param = null) {
        ## 获取参数错误
        ParamException::get_nofollow_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 必选参数
        $this->signArray['masterid'] = $param['masterid']; // 高高手手BFX账号
        $this->signArray['followid'] = $param['followid']; // 跟随BFX账号
        ## 必须加密的字段
        $this->reskey = [];
        ## url地址
        $apiurl = 'Master/nofollow'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否异常
        ResultException::get_nofollow_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }

    /**
     * Master/focus 普通交易易列列表/关注高手
     * 
     */
    public function focus($param = null) {
        ## 获取参数错误
        ParamException::get_focus_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 必选参数
        $this->signArray['focusid']   = $param['focusid']; // 被关注人账号
        $this->signArray['accountid'] = $param['accountid']; // 关注人账号
        ## 必须加密的字段
        $this->reskey = [];
        ## url地址
        $apiurl = 'Master/focus'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否异常
        ResultException::get_focus_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }

    /**
     * Master/nofocus 普通交易易列列表/取消关注
     * 
     */
    public function nofocus($param = null) {
        ## 获取参数错误
        ParamException::get_nofocus_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 必选参数
        $this->signArray['focusid']   = $param['focusid']; // 被关注人账号
        $this->signArray['accountid'] = $param['accountid']; // 关注人账号
        ## 必须加密的字段
        $this->reskey = [];
        ## url地址
        $apiurl = 'Master/nofocus'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否异常
        ResultException::get_nofocus_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }

    /**
     * Master/followtickets 获取跟随高高手手当前订单/历史订单
     * 
     */
    public function followtickets($param = null) {
        ## 获取参数错误
        ParamException::get_followtickets_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 必选参数
        $this->signArray['masterid'] = $param['masterid']; // 高手帐号
        $this->signArray['followid'] = $param['followid']; // 跟随帐号
        $this->signArray['now']      = $param['now']; // 订单类型 1当前跟随订单,0历史跟随订单
        ## 可选字段(当now=0必填)
        if ($param['page_size']) {
            $this->signArray['page_size'] = $param['page_size']; // 每页记录
        }
        if ($param['page_no']) {
            $this->signArray['page_no']   = $param['page_no']; // 第几页
        }
        ## 必须加密的字段
        $this->reskey = [];
        ## url地址
        $apiurl = 'Master/followtickets'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否异常
        ResultException::get_followtickets_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }

    /**
     * Master/ranking  获取高手排名
     * 
     */
    public function ranking($param = null) {
        ## 获取参数错误
        ParamException::get_ranking_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 必选参数
        $this->signArray['rankType'] = $param['rankType'];
        ## 可选参数
        if ($param['login']) {
            $this->signArray['login'] = $param['login'];
        }
        ## 必须加密的字段
        $this->reskey = [];
        ## url地址
        $apiurl = 'Master/ranking'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否异常
        ResultException::get_ranking_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }

    /**
     * Master/focusinfo 关注的高手信息
     * 
     */
    public function focusinfo($param = null) {
        ## 获取参数错误
        ParamException::get_focusinfo_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }

        ## 必选参数 普通用户BFX账号
        $this->signArray['account'] = $param['account'];

        ## 必须加密的字段
        $this->reskey = [];
        ## url地址
        $apiurl = 'Master/focusinfo'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否异常
        ResultException::get_focusinfo_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }

    /**
     * Master/mycopy 复制的高手信息
     * 
     */
    public function mycopy($param = null) {
        ## 获取参数错误
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }

        ## 必选参数 普通用户BFX账号
        $this->signArray['account'] = $param['account'];

        ## 必须加密的字段
        $this->reskey = [];
        ## url地址
        $apiurl = 'Master/mycopy'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否异常
        ResultException::get_mycopy_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }

    /**
     * Master/masterRelation 高手被跟随或被关注信息
     * 
     */
    public function masterRelation($param = null) {
        ## 获取参数错误
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 必选参数 普通用户BFX账号
        $this->signArray['account'] = $param['account'];
        ## 可选参数
        if ($param['type']) {
            $this->signArray['type'] = $param['type'];
        }
        ## 必须加密的字段
        $this->reskey = [];
        ## url地址
        $apiurl = 'Master/masterRelation'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否异常
        ResultException::get_masterRelation_ex($this->return_data);
        ## 返回自身的值，便于链式操作
        return $this;
    }
}
