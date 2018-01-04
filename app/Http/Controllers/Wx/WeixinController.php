<?php

namespace App\Http\Controllers\Wx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeixinController extends Controller
{
    public function getAdPic(Request $request){
        return '11213';
    }

    public function getProInfo(Request $request){
        $type = $request->get('type');
        if($type == 'zb'){
            return '你想要周边旅游信息，请求正确我歹给啊。';
        }else{
            return '别他妈的瞎请求';
        }
    }
}
