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
        $data = DB::table('product')->where('type',$type)->get();
        return json_encode($data);
    }
    /*
     * 获取产品详情
     * 接口地址:https://www.msqlx.com/x_getProductDetail?id=
     * */
    public function getProDetail(Request $request){
        $id = $request->get('id');
        $data = DB::table('product')->where('id',$id)->get();
        return json_encode($data);
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
    /*
     * save customer order
     * */
    public function saveCustomerOrder(Request $request)
    {
        $name = $request->get('name');
        $phone = $request->get('phone');
        $pNumber = $request->get('pNumber');
        $pid = $request->get('pid');
        $openid = $request->get('openid');
//        dd($openid);
        $cusT = DB::table('customer')->where('wx_openid',$openid)->get();
        $proT = DB::table('product')->where('id',$pid)->get();
        if($cusT->count() and $proT->count()){
            return 'success';
        }
//        dd($data);
    }
    /*
     * get guide info
     * */
    public function getGuideDetail(Request $request){
        $data = DB::table('ciceroni')->get();
        return json_encode($data);
    }
    /*
     * get lxs info
     * */
    public function getLxsInfo(Request $request){
        $data = DB::table()->get();
        return json_encode($data);
    }
}
