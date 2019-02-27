<?php

namespace App\Http\Controllers\Dorm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoomRepairController extends Controller
{
    //首页
    public function index()
    {
        $admin = session('dorm_account');
        $data = DB::table('dorm_roomrepair')->where('admin',$admin)->orderby('created_at','desc')->get();
        return view('dorm.roomRepair',['data'=>$data]);
    }
    /*
     * 处理页面
     * */
    public function repairReply($id)
    {
        $result = DB::table('dorm_roomrepair')->where('id',$id)->first();
//        dd($result);
        return view('dorm.roomRepairReply',['data'=>$result]);
    }
    public function updateRepairReply(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $res = DB::table('dorm_roomrepair')->where('id',$data['id'])->update([
                'reply' => $data['content'],
                'status' => 1,
                'updated_at' => date('Y-m-d H:i:s',time())
            ]);
            if($res){
                return json_encode(['code'=>100,'info'=>'成功！']);
            }else{
                return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
            }
        }
    }

}
