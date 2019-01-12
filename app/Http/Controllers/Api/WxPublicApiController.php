<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class WxPublicApiController extends Controller
{
    /*
     * 获取小程序openid
     *
     * */
    public function getOpenid(Request $request)
    {
        // $wx_name = $request->get('wxName');
        $code = $request->get('code');
        $appid = $request->get('appid');
        $AppSecret = $request->get('AppSecret');
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=$appid&secret=$AppSecret&js_code=$code&grant_type=authorization_code";
        $data = json_decode(file_get_contents($url),true);
        return $data;
    }
}
