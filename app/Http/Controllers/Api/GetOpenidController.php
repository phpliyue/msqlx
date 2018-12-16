<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class GetOpenidController extends Controller
{
    /*
     * 获取小程序openid
     *
     * */
    public function getOpenid(Request $request)
    {
        // $wx_name = $request->get('wxName');
        $code = $request->get('code');
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=wx5eca6b48e3be02bf&secret=94f245e81a5517fe0b3b05d2eafea555&js_code=$code&grant_type=authorization_code";
        $data = json_decode(file_get_contents($url),true);
        return $data;
    }
}
