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
    /*
     * save customer infomation
     * interface: https://www.msqlx.com/x_saveCustomerInfo
     * */
    public function saveCustomerInfo(Request $request){
        $cusName = $request->get('customerName');
        $cusImage = $request->get('customerImageUrl');
        $openid = $request->get('openid');
        $data = DB::table('customer')->where('wx_openid',$openid)->get();
        if(!$data->count()){
            DB::table('customer')->insert([
                'wx_name' => $cusName,
                'wx_head_image' => $cusImage,
                'wx_openid' => $openid,
                'create_time' => date('Y:m:d H:i:s',time()),
                'last_login' => date('Y:m:d H:i:s',time())
            ]);
            //新增用户信息表
            DB::table('customer_info')->insert([
                'wx_openid' => $openid,
            ]);
            //新增用户活动表
            DB::table('customer_activity')->insert([
                'wx_openid' => $openid,
            ]);
            return 'customer add';
        }else{
            $result = DB::table('customer')->where('wx_openid',$openid)->update([
                'last_login' => date('Y:m:d H:i:s',time())
            ]);
            return $result;
        }

    }
}
