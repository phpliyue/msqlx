<?php

namespace App\Http\Controllers\Dorm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class RoomManageController extends Controller
{
    public function index()
    {
        return view('dorm.roomManage');
    }
    //添加宿舍信息
    public function getRoomInfo(Request $request)
    {
        $dorm_name = $request->input('dorm_name');
        $dorm_info = $request->input('dorm_info');
        $data = [];
        foreach($dorm_info as $k=>$v)
        {
            for($i = 1; $i <= $v['room_num']; $i++)
            {
                for($j = 1; $j <= $v['bed_num']; $j++)
                {
                    $res[count($data)]['admin'] = session('dorm_account');
                    $res[count($data)]['dorm_name'] = $dorm_name;
                    $res[count($data)]['floor'] = $v['floor_num'];
                    $res[count($data)]['room'] = $i < 10 ? '0'.$i : $i;
                    $res[count($data)]['bed'] = $j < 10 ? '0'.$j : $j;
                    $res[count($data)]['num'] = $res[count($data)]['floor'].$res[count($data)]['room'].$res[count($data)]['bed'];
                    array_push($data,$res[count($data)]);
                }
            }
        }
        $result = DB::table('dorm_room')->insert($data);
        if($result)
        {
            return json_encode(['code'=>100,'info'=>'成功！']);
        }else
        {
            return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
        }
    }
    //获取宿舍详细信息
    public function getRooms(Request $request)
    {
        $admin = $request->session()->get('dorm_account');//session('dorm_account');
        $rooms = DB::table('dorm_room')->where(['dorm_room.admin'=>$admin])->get()->toArray();
        $uids = array_filter(array_column($rooms,'uid'));
        $user_infos = DB::table('dorm_user')->select('uid','name','phone','card','in_time','out_time')->whereIn('uid',$uids)->get()->toArray();
        $users = array_reduce($user_infos,function($users,$v){
            $users[$v->uid] = $v;
            return $users;
        });
        foreach($rooms as $k=>$v)
        {
            $rooms[$k]->user_info = empty($v->uid) ? [] :$users[$v->uid];
        }
        return view('dorm.roomInfo',['rooms'=>$rooms]);
    }
}
