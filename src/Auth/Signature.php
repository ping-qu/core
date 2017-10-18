<?php
/**
 * Created by PhpStorm.
 * User: yuelin
 * Date: 2017/9/29
 * Time: 上午11:01
 */

namespace Pingqu\Auth;


class Signature
{
    //POST时采用的签名算法
    public static function doSignMd5($data, $secret = '') {

        //签名步骤一：按字典序排序参数
        ksort($data);
        $string = self::ToUrlParams($data);
        //签名步骤二：在string后加入KEY
        $string = $string . "&key=" . $secret;
        //签名步骤三：MD5加密
        $string = md5($string);
        //签名步骤四：所有字符转为大写
        $result = strtoupper($string);
        return $result;

    }

    protected static function ToUrlParams($data) {

        $buff = "";
        foreach ($data as $k => $v)
        {
            if($k != "sign" && $v != "" && !is_array($v)){
                $buff .= $k . "=" . $v . "&";
            }
        }

        $buff = trim($buff, "&");
        return $buff;
    }

    //GET是采用的签名算法
    protected function getSign($query, $method = "GET",$secret)
    {
        $str = $method . '&' . rawurlencode('/') . '&' . rawurlencode($query);
        return base64_encode(hash_hmac('sha1', $str, $secret . '&', true));
    }
}