<?php
#参数配置
$apiid  = 'crm1'; #签名ID
$apiurl = 'http://crmv2.bbryt.cn/WebAPI/'; // 登录入口，url地址的前部分,需与接口端保持一致
$apikey = 'v66YKULHFld2JElhm'; // 'v66YKULHFld2JElhm' // 签名ID专属md5加盐
$reskey = array('account', 'password', 'login', 'newpsword'); // 设置需要用BASE64转码的参数(涉及中文或空格特殊符号的参数),需与接口端保持一致
/*$apitime =  apitime('http://crmv2.bbryt.cn/WebAPI/Public/servertime'); //获取接口端时间*/
return [
    'apiid'  => $apiid,
    'apiurl' => $apiurl,
    'apikey' => $apikey,
/*    'apitime'  => '', // 时间，先不配置
    'account'  => '530592',
    'password' => 'ddd223'*/
];