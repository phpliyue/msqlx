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
        dd($request->get('type'));
    }
}
