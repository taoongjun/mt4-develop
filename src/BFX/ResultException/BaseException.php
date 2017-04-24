<?php
namespace BFX\ResultException; // 命名空间，返回结果错误
use Exception; // 使用公共的错误类

class BaseException {
     /** @var $config 基础的错误 */
    public static $base_exception = [
        '8000'=> '未知错误, 技术错误',
        '8001'=> '签名验证失败',
        '8002'=> '请求超时',
        '8003'=> '无传参或传输方法错误',
        '5000'=> '数据检测失败, 未定义的报文类型',
        '5999'=> '成功, 但有未定义的范围',
        '5001'=> '必填报文为空',
        '5002'=> '传输的报文中, 某个长度或范围检测不通过',
        '5003'=> '传输的报文中, 某个数据类型检测不通过'
    ];
    
    /**
     * 排除错误
     * 
     * @param  [type]  $message     [description]
     * @param  integer $message_add [description]
     * @return [type]               [description]
     */
    public static function throw_exception($message = null, $message_add = 0) {
        if ($message) {
            try {
                throw new Exception($message, $message_add);
            } catch(Exception $e) { 
                echo $e->getCode(),    '<br>'; // 错误代码
                echo $e->getMessage(), '<br>'; // 错误的信息
/*                echo $e->getFile(),    '<br>'; // 文件
                echo $e->getLine(),    '<br>'; // 行号*/
            }
        }
    }
    /**
     * 判断是否发生错误
     */
    public function if_failed($result) {
        // 说明有数据返回
        if (is_object($result)) {
            if ($result->status === 0) { // 此处需留意
                // 正则找出错误代码
                preg_match('/\d+/', $result->msg, $failed_code);
                $failed_code = $failed_code[0]; // 获取错误代码
                $message     = self::$base_exception[$failed_code] ? self::$base_exception[$failed_code] : '未知的错误，请核实'; // 找到匹配的错误信息
            }
        // 连对象都没返回，说明根本无法提交等重大错误
        } else {
            $message = '位置的重大错误，请核查路进';
            $failed_code = '0000';
        }

        if ($message) {
            self::throw_exception($message, $failed_code);
        }
    }
}
