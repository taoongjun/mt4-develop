<?php
const BFX_CONFIG = __DIR__ . '/config.php';
require 'vendor/autoload.php';
use BFX\Account;
use BFX\Base;
use BFX\Publics;
use BFX\Index;
use BFX\Trades;
$Account = new Account;

## 获取密码
$param = array(
    'A_Ctype'=> 'JSON',
    'ispage' =>1, // 是否分页（0不分页（默认），1分页）
    'pagenum'=> 1,// 当前页（默认第一页）
    'pagelimit'=> 13 // 每页的页数(默认是10)
    );
 $UserList = $Account->mt4userlist()
                    ->to_object();

 echo "<pre>";
     print_r($UserList);
 echo "</pre>";

// 
/**
stdClass object
(
    [status] => 0
    [msg] => failed - 8001
)
Array
(
    [status] => 0
    [msg] => failed - AC4002
)
*/


### 修改密码
/*$param = [
    'login'=> '10000',
    'newgroup'=> '123456'

];
$change_pwd = $bfxAccount->change_group($param)->to_array();
echo "<pre>";
    print_r($change_pwd);
echo "</pre>";*/
### 
/*$public = new Publics;
$param = [
    'name'=> 'taozice',
    'phone'=> '13113614521',
    'email'=> '6122@qq.com',
    'mt4group'=> 'demo1',
    'leverage'=> 300,
    'country'=>'123',
    'address'=>'12312'

];
$reg = $public->reg($param)->to_array();*/

/*  [aid] => 115
    [name] => taozice
    [login] => 88083493
    [password] => qwjxz8y
    [check_status] => 1
    [password_investor] => h782578
    [create_at] => 2017-04-13 14:22:59*/
###登录
// $public = new Publics;
/*
$param = [
    'account'=>88083493,
    'password'=> 'qwjxz8y'
];
$login = $public->login($param)->to_array();
echo "<pre>";
    print_r($login);
echo "</pre>";*/
###获取中文
/*$param = [
          'symbol'=>'BCOUSD',
          'period'=> 'h1',
          'barnum'=>12
];
$bfxprice = $public->get_bfx_price()->to_array();
echo "<pre>";
    print_r($bfxprice);
echo "</pre>";*/

## 测试下单操作
/*$orderExe = new Trades();
$param = [
        ## 必须参数
        'action' => 'market', //  操作选项
        'exc'    => 'BUY', // 操作行为
        'login'  => '10000', // mt4账号
        'symbol' => 'BCOUSD', // 
        'volume' => 1,
        'price'=>100,
        'sl'=>110,
        'tp'=>90,
        'orderno'=>4527465
];
$order_exe_market = $orderExe->OrderExe_edit($param)->to_array();
echo "<pre>";
    print_r($order_exe_market);
echo "</pre>";*/

## 测试Trades
/*$trades = new Trades();
$param = [
    'login'=>'10001',
    'orderby'=>'openprice'
    'symbol'=>'EURJPY',
    'pagelimit'=>1
];*/
/*$history = $trades->get_history_list($param)->to_array();
echo "<pre>";
    print_r($history);
echo "</pre>";*/

/*$make_list = $trades->get_maket_list()->to_array();
echo "<pre>";
    print_r($make_list);
echo "</pre>";*/
