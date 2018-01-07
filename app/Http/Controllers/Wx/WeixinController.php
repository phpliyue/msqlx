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
}
