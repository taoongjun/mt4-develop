<?php 
namespace BFX;
// 开源类获取curl数据
use Ixudra\Curl\CurlService;
// 参数异常类
use BFX\ParamException\AccountException As ParamException;
// 结果异常类
use BFX\ResultException\AccountException As ResultException;

/**
 * 对账户的操作
 * 
 */
class Account extends Base {
    public function __construct($param = null) {
        parent::__construct($param);
    }
    
    /**
     * 获取用户账号
     * 
     * @param array $param 获取数据的格式
     */
    public function mt4userlist($param = null) {
        ## 此处的参数格式简单，不需要进行过多的错误抛出
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 是否查询指定账号
        if ($param['login']) {
            $this->signArray['login']     = $param['login'];
        }
        ## 是否分页
        if ($param['ispage']) {
            $this->signArray['ispage']    = 1; // 分页
            // 当前页,默认第一页
            $this->signArray['pagenum']   = $param['pagenum'] ? $param['pagenum'] : 1;
            // 每页的范围，默认是20条
            $this->signArray['pagelimit'] = $param['pagelimit'] ? $param['pagelimit'] : 20;
        }
        ## 必须base_64加密解密的
        $this->reskey = ['login'];
        ## 获取数据的接口url地址
        $apiurl = 'Account/mt4userlist'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否有错误
        ResultException::get_mt4userlist_ex($this->return_data);
        ## 返回自身，方便链式操作
        return $this; // 方便链式操作
    }

    /**
     * 账号修改功能 修改密码
     * 
     */
    public function Changeset_pwd($param) {
/*      $param = [
            'login'=> // 账号，必选
            'action'=> // 行为1changemtpwd(修改密码),2changemtgroup修改分组
            'newpsword'=>  // 新密码（和action的changemtpwd对应） 
        ];*/
        ## 参数是否完整，参数不完整直接抛出异常
        ParamException::get_Changeset_pwd_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }

        ## 必选参数
        $this->signArray['login']     = $param['login']; // 账号，必填
        $this->signArray['action']    = 'changemtpwd'; // 修改密码
        $this->signArray['newpsword'] = $param['newpsword']; // 新密码

        ## 必须base_64转码的字段
        $this->config['reskey'] = ['login', 'newpsword']; // 必须base_64
        
        ## url地址
        $apiurl = 'Account/Changeset'; // api的url地址，前半部分
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否有错误
        ResultException::get_Changeset_ex($this->return_data);
        ## 返回类
        return $this;
    }

    /**
     * 账号修改功能 修改分组
     * 
     */
    public function Changeset_group($param) {
/*      $param = [
            'login'=> // 账号，必选
            'action'=> // 行为1changemtpwd(修改密码),2changemtgroup修改分组
            'newgroup'=>  // 新分组（和action的changemtgroup对应） 
        ];*/
        ## 参数是否完整，参数不完整直接抛出异常
        ParamException::get_Changeset_group_ex($param);
        ## 获取数据的格式(若不传，默认是json)
        if ($param['A_Ctype']) {
            $A_Ctype = in_array(strtoupper($param['A_Ctype']), ['JSON', 'XML']) ? 
                strtoupper($param['A_Ctype']) : 'JSON';
            $this->signArray['apictype'] = $A_Ctype;
        } else {
            $A_Ctype = 'JSON'; // 默认是JSON
        }
        ## 
        $this->signArray['login']    = $param['login']; // 账号，必填
        $this->signArray['action']   = 'changemtgroup'; // 修改分组
        $this->signArray['newgroup'] = $param['newgroup']; // 新分组
        ## 设定必须经过base_64转码的参数
        $this->reskey = ['login', 'newgroup']; // 必须base_64
        ## 拼接url地址
        $apiurl = 'Account/Changeset'; // api的url地址，前半部分为公共参数．
        ## 获取数据
        $this->get_post_data($apiurl);
        ## 结果是否有错误
        ResultException::get_Changeset_ex($this->return_data);
        ## 返回类本身
        return $this;
    }
}
