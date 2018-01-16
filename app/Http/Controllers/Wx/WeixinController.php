<?php

namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class WeixinController extends Controller
{
    public function getAdPic(Request $request){
        return '11213';
    }
    /*
     * 返回旅游信息
     * 接口地址:www.msqlx/x_getProductInfo?type=
     *
     * */
    public function getProInfo(Request $request){
        $type = $request->get('type');
        $Data = DB::table('product')->where('type',$type)->get();
        return json_encode($Data);
    }
    /*
     * 获取产品详情
     * 接口地址:https://www.msqlx.com/x_getProductDetail?id=
     * */
    public function getProDetail(Request $request){
        $id = $request->get('id');
        $Data = DB::table('product')->where('id',$id)->get();
        return json_encode($Data);
    }
    /*
     * customer login get customer wx name wx headImage openid
     * interface : https://wwww.msqlx.com/x_getCustomerLogin
     * */
    public function getCustomerLogin(Request $request){
//        $wx_name = $request->get('wxName');
//        $wx_image = $request->get('wxImage');
//        $wx_openid = $request->get('wxOpenId');
        $code = $request->get('code');
//        $appid = 'wx5eb8e41173cf7ac2';
//        $secret = 'e3bf7d92c1d041344eabf1dededfec3d';
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=wx5eb8e41173cf7ac2&secret=e3bf7d92c1d041344eabf1dededfec3d&js_code=$code&grant_type=authorization_code";
        $userinfo = json_decode(file_get_contents($url),true);
        return $userinfo;
    }
}
