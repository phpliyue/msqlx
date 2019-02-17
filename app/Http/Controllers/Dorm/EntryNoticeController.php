<?php

namespace App\Http\Controllers\Dorm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EntryNoticeController extends Controller
{
    //入住须知
    public function index(Request $request)
    {
        $admin = session('dorm_account');
        if($request->isMethod('post')){
            $data['admin'] = $admin;
            $data['content'] = $request->input('content');
            $info = DB::table('dorm_entrynotice')->where('admin',$admin)->first();
            if(empty($info)){
                $data['created_at'] = date('Y-m-d H:i:s',time());
                $data['updated_at'] = date('Y-m-d H:i:s',time());
                $res = DB::table('dorm_entrynotice')->insert($data);
            }else{
                $data['updated_at'] = date('Y-m-d H:i:s',time());
                $res = DB::table('dorm_entrynotice')->where('admin',$admin)->update($data);
            }
            if($res){
                return json_encode(['code'=>100,'info'=>'成功！']);
            }else{
                return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
            }
        }else{
            $content =  DB::table('dorm_entrynotice')->where('admin',$admin)->value('content');
            return view('dorm.entrynotice',['content'=>$content]);
        }
    }

}
