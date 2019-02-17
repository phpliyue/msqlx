<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/30
 * Time: 23:25
 */

function makeDir($path)
{
    if (! file_exists ( $path )) {
        mkdir("$path", 0777, true);
    }
    return is_dir($path) or (makeDir(dirname($path)) and @mkdir($path, 0777));
}

//字符串过滤script代码以及特殊标签
function filterSpecail($str = ''){
    $str = str_replace(array("\r\n", "\r", "\n","&nbsp;","&lt;","&gt;","&amp;","&zwnj;","&quot;","&nb","&amp;nbsp;","&amp;nbsp","&apos;","&cent;","&pound;","&yen;","&euro;","&sect;","&times;","&divide;"), "",$str);
    $arr = preg_replace("/<(script.*?)>(.*?)<(\/script.*?)>/si","",$str);
    $arr = preg_replace("/<(embed.*?)>/si","",$arr);
    $arr = preg_replace("/<(video.*?)>(.*?)<(\/video.*?)>/si","",$arr);
    $arr = preg_replace("/<(audio.*?)>(.*?)<(\/audio.*?)>/si","",$arr);
    $arr = preg_replace("/<(source.*?)>/si","",$arr);
    return $arr;
}

function subtext($text, $length)
{
    if(mb_strlen($text, 'utf8') > $length) {
        return mb_substr($text, 0, $length, 'utf8').'...';
    } else {
        return $text;
    }
}