<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class DormController extends Controller
{
    public function saveUserInfo(Request $request)
    {
        $arr['admin'] = $request->get('admin');
        $arr['openid'] = $request->get('openid');
        $arr['name'] = $request->get('name');
        $arr['phone'] = $request->get('phone');
        $arr['card'] = $request->get('card');
        $arr['sex'] = $request->get('sex');
        return $arr;
    }
    /*
     * 记录登入过小程序的用户并建立档案
     * */
    public function saveUserLogin(Request $request)
    {
        $wx_name = $request->get('name');
        $wx_head_img = $request->get('headImg');
        $wx_openid = $request->get('openid');
        $login_time = date('Y-m-d H:i:s',time());
        $data = DB::table('dorm_user')->where('wx_openid',$wx_openid)->get();
        if(!$data->count()){
            DB::table('dorm_user')->insert([
                'wx_name' => $wx_name,
                'wx_head_img' => $wx_head_img,
                'wx_openid' => $wx_openid,
                'login_time' => $login_time

            ]);
            return 'customer add';
        }

    }
}
