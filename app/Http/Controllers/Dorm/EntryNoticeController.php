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
        if($request->isMethod('post')){
            $data['content'] = $request->input('content');
            if(!DB::table('dorm_entrynotice')->get()){
                $data['created_at'] = date('Y-m-d H:i:s',time());
                $data['updated_at'] = date('Y-m-d H:i:s',time());
                $res = DB::table('dorm_entryNotice')->insert($data);
            }else{
                $data['updated_at'] = date('Y-m-d H:i:s',time());
                $res = DB::table('dorm_entryNotice')->where('id',1)->update($data);
            }
            if($res){
                return json_encode(['code'=>100,'info'=>'成功！']);
            }else{
                return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
            }
        }else{
            $content =  DB::table('dorm_entrynotice')->value('content');
            return view('dorm.entryNotice',['content'=>$content]);
        }
    }

}
