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
                        $res[count($data)]['room'] = $i < 10 ? $i : $i;
                        $res[count($data)]['bed'] = $j < 10 ? $j : $j;
                        $res[count($data)]['num'] = $res[count($data)]['floor'].$res[count($data)]['room'].$res[count($data)]['bed'];
                        $res[count($data)]['sex'] = $room_info->sex;
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
            $res = DB::table('dorm_addroom')->where('id',$id)->delete();
            if($res == false){
                return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
            }else{
                return json_encode(['code'=>100,'info'=>'删除成功！']);
            }
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

    //获取床位信息
    public function getBedInfo(Request $request)
    {
        $id = $request->id;
        $admin = session('dorm_account');
        $data = DB::table('dorm_room')
            ->leftJoin('dorm_user','dorm_room.uid', '=', 'dorm_user.uid')
            ->select('dorm_room.*','card','name','phone','in_time','out_time')
            ->where(['dorm_room.id'=>$id])
            ->first();
        $parts = DB::table('dorm_addroom')->where(['admin'=>$data->admin,'dorm_name'=>$data->dorm_name,'floor'=>$data->floor])->select('room_start','room_end','sex','part')->get();
        $data->part = null;
        $data->sex = null;
        foreach($parts as $v){
            if(in_array($data->room,[$v->room_start,$v->room_end])){
                $data->part = $v->part;
                $data->sex = $v->sex;
            }
        }
        $getAdjust = DB::table('dorm_room')->where(['admin'=>$admin,'status'=>0,'sex'=>$data->sex])->get();
        return view('dorm.getBedInfo',['data'=>$data,'adjust'=>$getAdjust]);
    }

    //添加宿舍页面
    public function addRoom()
    {
        return view('dorm.addRoom');
    }

    //修改宿舍信息页面
    public function updateRoom(Request $request)
    {
        $id = $request->id;
        $data = DB::table('dorm_addroom')->where('id',$id)->first();
        $room_info = DB::table('dorm_room')
            ->leftJoin('dorm_user','dorm_room.uid', '=', 'dorm_user.uid')
            ->select('dorm_user.uid','room','bed','status','wx_head_img','name','phone','card','in_time')
            ->where(['addroom_id'=>$id,'dorm_room.admin'=>session('dorm_account')])
            ->orderBy('dorm_room.id', 'ASC')
            ->get();
        $room = [];
        foreach($room_info as $k=>$v){
            if(!isset($room[$v->room])){
                $room[$v->room]['people_notin'] = 0;
                $room[$v->room]['people_in'] = 0;
            }
            $room[$v->room]['user'][] = (array)$v;
            if($v->status == 0){
                $room[$v->room]['people_notin'] += 1;
            }else{
                $room[$v->room]['people_in'] += 1;
            }
        }
        $data->room = $room;
        return view('dorm.updateRoom',['data'=>$data]);
    }

    //修改员工信息
    public function edituser(Request $request){
        $arr['id'] = $request->get('id');
        $arr['name'] = $request->get('name');
        $arr['phone'] = $request->get('phone');
        $arr['card'] = $request->get('card');
        $arr['admin'] = session('dorm_account');
        $uid = DB::table('dorm_room')->where(['id'=>$arr['id'],'admin'=>$arr['admin']])->value('uid');
        if(empty($uid)){
            return json_encode(['code'=>200,'info'=>'该房间未入住！']);
        }else{
            //先判断该用户信息是否存在
            $res = DB::table('dorm_user')->where(['uid'=>$uid])->update([
                'name' => $arr['name'],
                'phone' => $arr['phone'],
                'card' => $arr['card']
            ]);
            if ($res !== false) {
                return json_encode(['code' => 200, 'info' => '修改成功！']);
            } else {
                return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
            }
        }
    }

    //员工入住
    public function roomIn(Request $request)
    {
        $arr['id'] = $request->get('id');
        $arr['name'] = $request->get('name');
        $arr['phone'] = $request->get('phone');
        $arr['card'] = $request->get('card');
        $arr['sex'] = $request->get('sex');
        $arr['admin'] = session('dorm_account');
        $room_status = DB::table('dorm_room')->where(['id'=>$arr['id'],'admin'=>$arr['admin']])->value('status');
        if($room_status == 1){
            return json_encode(['code'=>200,'info'=>'该房间已入住！']);
        }else{
            //先判断该用户信息是否存在
            $uid = DB::table('dorm_user')->where(['card'=>$arr['card'],'admin'=>$arr['admin']])->value('uid');
            //不存在则新增用户信息
            if (empty($uid)) {
                $uid = DB::table('dorm_user')->insertGetId([
                    'name' => $arr['name'],
                    'phone' => $arr['phone'],
                    'card' => $arr['card'],
                    'sex' => $arr['sex'],
                    'admin' => $arr['admin']
                ]);
            }
            if (empty($uid)) {
                return json_encode(['code' => 200, 'info' => '服务器繁忙！']);
            } else {
                //判断该用户是否入住
                $info = DB::table('dorm_room')->where(['admin'=>$arr['admin'],'uid'=>$uid])->first();
                if(empty($info)){
                    DB::beginTransaction();
                    $res1 = DB::table('dorm_user')->where('card', $arr['card'])->update(['in_time' => date('Y-m-d', time()),'out_time' => null]);
                    $res2 = DB::table('dorm_room')->where('id', $arr['id'])->update(['uid' => $uid,'sex' => $arr['sex'], 'status' => 1]);
                    if($res1 == false || $res2 == false){
                        DB::rollBack();
                        return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
                    }else{
                        DB::commit();
                        return json_encode(['code'=>100,'info'=>'入住成功！']);
                    }
                }else{
                    return json_encode(['code'=>200,'info'=>'该员工已入住其他房间！']);
                }
            }
        }
    }

    //员工退房
    public function roomOut(Request $request)
    {
        $arr['id'] = $request->get('id');
        //先判断该房间是否入住
        $info = DB::table('dorm_room')->where('id', $arr['id'])->first();
        if ($info->status == 0) {
            return json_encode(['code' => 200, 'info' => '该房间未入住！']);
        } else {
            DB::beginTransaction();
            $res1 = DB::table('dorm_room')->where(['id'=>$arr['id']])->update(['uid'=>null,'status'=>0]);
            $res2 = DB::table('dorm_user')->where('uid', $info->uid)->update(['out_time' => date('Y-m-d', time())]);
            if($res1 && $res2){
                DB::commit();
                return json_encode(['code'=>100,'info'=>'退房成功！']);
            }else{
                DB::rollBack();
                return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
            }
        }
    }

    //员工调整房间
    public function adjustRoom(Request $request)
    {
        $arr['old_id'] = $request->get('old_id');//原住房间id
        $arr['id'] = $request->get('id');//调整房间id
        //先判断该房间是否入住
        $info = DB::table('dorm_room')->where('id', $arr['id'])->first();
        $uid = DB::table('dorm_room')->where('id', $arr['old_id'])->value('uid');
        if ($info->status == 1) {
            return json_encode(['code' => 200, 'info' => '该房间已入住！']);
        } else {
            DB::beginTransaction();
            $res0 = DB::table('dorm_room')->where(['id'=>$arr['old_id']])->update(['uid'=>null,'status'=>0]);
            $res1 = DB::table('dorm_room')->where(['id'=>$arr['id']])->update(['uid'=>$uid,'status'=>1]);
            $res2 = DB::table('dorm_user')->where('uid', $uid)->update(['in_time' => date('Y-m-d', time()),'out_time' => null]);
            if($res0 && $res1 && $res2 == false){
                DB::commit();
                return json_encode(['code'=>100,'info'=>'房间调换成功！']);
            }else{
                DB::rollBack();
                return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
            }
        }
    }
}
