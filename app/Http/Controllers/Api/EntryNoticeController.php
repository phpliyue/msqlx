<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EntryNoticeController extends Controller
{
    //入住须知
    public function index(Request $request)
    {
        $openid = $request->get('openid');
        $info = DB::table('dorm_user')->where('wx_openid',$openid)->first();
        $admin = '';
        if(!empty($info)){
            $admin = DB::table('dorm_room')->where('uid',$info->uid)->value('admin');
        }
        if(!empty($admin)){
            $content = DB::table('dorm_entrynotice')->where('admin',$admin)->value('content');
        }else{
            $content = '0';
        }

        return json_encode(['code'=>100,'info'=>'成功！','data'=>$content]);
    }
}
