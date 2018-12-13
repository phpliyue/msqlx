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
}
