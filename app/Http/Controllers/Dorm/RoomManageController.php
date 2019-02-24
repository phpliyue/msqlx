<?php
namespace App\Http\Controllers\Dorm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class RoomManageController extends Controller
{
    public function index()
    {
        $admin = session('dorm_account');
        $data = DB::table('dorm_addroom')->where('admin',$admin)->get();
        if(!empty($data)){
            $ids = array_column($data->toArray(),'id');
            $addroom_ids = DB::table('dorm_room')->whereIn('addroom_id',$ids)->groupBy('addroom_id')->pluck('addroom_id')->toArray();
            foreach($ids as $k=>$v){
                if(in_array($v,$addroom_ids)){
                    $data[$k]->is_create = 1;
                }else{
                    $data[$k]->is_create = 0;
                }
            }
        }
        return view('dorm.roomManage',['data'=>$data]);
    }

    //添加宿舍页面
    public function addRoom()
    {
        return view('dorm.addRoom');
    }

    //添加宿舍信息处理
    public function roomInfos(Request $request)
    {
        $data = $request->all();
        if(!empty($data['dorm_info'])){
            $res = [];
            foreach($data['dorm_info'] as $k=>$v){
                $res[$k]['dorm_name'] = $data['dorm_name'];
                $res[$k]['floor'] = $v['floor'];
                $res[$k]['room_start'] = $v['room_start'];
                $res[$k]['room_end'] = $v['room_end'];
                $res[$k]['bed_num'] = $v['bed_num'];
                $res[$k]['sex'] = $v['sex'];
                $res[$k]['part'] = $v['part'];
                $res[$k]['room_end'] = $v['room_end'];
                $res[$k]['admin'] = session('dorm_account');
                $res[$k]['add_time'] = time();
            }
            $result = DB::table('dorm_addroom')->insert($res);
            if($result)
            {
                return json_encode(['code'=>100,'info'=>'成功！']);
            }else
            {
                return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
            }
        }else{
            return json_encode(['code'=>200,'info'=>'参数非法！']);
        }
    }

    //生成住宿信息
    public function getRoomInfo(Request $request)
    {
        $id = $request->input('id');
        $rooms = DB::table('dorm_room')->where('addroom_id',$id)->get();
        if(count($rooms)){
            return json_encode(['code'=>200,'info'=>'住宿信息已存在！']);
        }else{
            $admin = session('dorm_account');
            $room_info = DB::table('dorm_addroom')->where(['id'=>$id,'admin'=>$admin])->first();
            if(!empty($room_info)){
                $data = [];
                $dorm_name = $room_info->dorm_name;
                $room_num = ($room_info->room_end - $room_info->room_start) + 1;
                for($i = 1; $i <= $room_num; $i++)
                {
                    for($j = 1; $j <= $room_info->bed_num; $j++)
                    {
                        $res[count($data)]['admin'] = $admin;
                        $res[count($data)]['addroom_id'] = $id;
                        $res[count($data)]['dorm_name'] = $dorm_name;
                        $res[count($data)]['floor'] = $room_info->floor;
                        $res[count($data)]['room'] = $i < 10 ? '0'.$i : $i;
                        $res[count($data)]['bed'] = $j < 10 ? '0'.$j : $j;
                        $res[count($data)]['num'] = $res[count($data)]['floor'].$res[count($data)]['room'].$res[count($data)]['bed'];
                        array_push($data,$res[count($data)]);
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
            }else{
                return json_encode(['code'=>200,'info'=>'信息不存在！']);
            }
        }
    }

    //删除住宿信息
    public function delRoomInfo(Request $request)
    {
        $id = $request->input('id');
        $rooms = DB::table('dorm_room')->where('addroom_id',$id)->get();
        if(!count($rooms)){
            return json_encode(['code'=>200,'info'=>'住宿信息不存在！']);
        }else{
            $status = array_unique(array_column($rooms->toArray(),'status'));
            if(in_array(1,$status)){
                return json_encode(['code'=>200,'info'=>'已有人入住，请先清除入住人信息！']);
            }else{
                DB::beginTransaction();
                $res = DB::table('dorm_room')->where('addroom_id',$id)->delete();
                $res1 = DB::table('dorm_addroom')->where('id',$id)->delete();
                if($res == false || $res1 == false){
                    DB::rollBack();
                    return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
                }else{
                    DB::commit();
                    return json_encode(['code'=>100,'info'=>'删除成功！']);
                }
            }
        }
    }

    //获取宿舍详细信息
    public function getRooms()
    {
        $admin = session('dorm_account');
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
<<<<<<< HEAD
=======
    //添加宿舍页面
    public function addRoom()
    {
        return view('dorm.addRoom');
    }
    //添加宿舍信息处理
    public function roomInfos(Request $request)
    {
        $data = $request->all();
        $data['admin'] = session('dorm_account');
        $data['add_time'] = time();
        $result = DB::table('dorm_addroom')->insert($data);
        if($result)
        {
            return json_encode(['code'=>100,'info'=>'成功！']);
        }else
        {
            return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
        }
    }
    //修改宿舍信息页面
    public function updateRoom()
    {
        return view('dorm.updateRoom');
    }
>>>>>>> 8ff1f92f0f5bcda0545d38223ae8e60e8bbf1974
}