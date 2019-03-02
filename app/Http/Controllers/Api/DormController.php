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
        //先判断该用户是否入驻
        $uid = DB::table('dorm_user')->where(['card'=>$arr['card'],'admin'=>$arr['admin']])->value('uid');
        $info = DB::table('dorm_room')->where('uid', $uid)->first();
        if (empty($info)) {
            //查询该性别是否有空位的房间
            $room = DB::table('dorm_room')->select('id', 'dorm_name', 'floor', 'room', 'bed')->where(['admin' => $arr['admin'], 'sex' => $arr['sex'], 'status' => 0])->orderBy('num', 'asc')->first();
            //若没有该性别的人员入住，则随机分配一间空房间
            if (empty($room)) {
                return json_encode(['code' => 100, 'info' => '宿舍已满，暂无空位置！']);
            } else {
                DB::beginTransaction();
                $res = DB::table('dorm_room')->where('id', $room->id)->update(['uid' => $uid, 'sex' => $arr['sex'], 'status' => 1]);
                if(empty($uid)){
                    $res1 = DB::table('dorm_user')->where('wx_openid', $arr['openid'])->update([
                        'name' => $arr['name'],
                        'phone' => $arr['phone'],
                        'card' => $arr['card'],
                        'sex' => $arr['sex'],
                        'admin' => $arr['admin'],
                        'in_time' => date('Y-m-d', time()),
                        'out_time' => null
                    ]);
                }else{
                    DB::table('dorm_user')->where('wx_openid', $arr['wx_openid'])->delete();
                    $res1 = DB::table('dorm_user')->where('card', $arr['card'])->update([
                        'wx_openid' => $arr['wx_openid'],
                        'name' => $arr['name'],
                        'phone' => $arr['phone'],
                        'card' => $arr['card'],
                        'sex' => $arr['sex'],
                        'admin' => $arr['admin'],
                        'in_time' => date('Y-m-d', time()),
                        'out_time' => null
                    ]);
                }
                if($res && $res1){
                    DB::commit();
                    return json_encode(['code'=>100,'info'=>'入住成功！','data'=>$room]);
                }else{
                    DB::rollBack();
                    return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
                }
            }
        } else {
            return json_encode(['code' => 100, 'info' => '该员工已入住！']);
        }
    }

    /*
     * 记录登入过小程序的用户并建立档案
     * */
    public function saveUserLogin(Request $request)
    {
        $wx_name = $request->get('name');
        $wx_head_img = $request->get('headImg');
        $wx_openid = $request->get('openid');
        $login_time = date('Y-m-d H:i:s', time());
        $data = DB::table('dorm_user')->where('wx_openid', $wx_openid)->get();
        if (!$data->count()) {
            DB::table('dorm_user')->insert([
                'wx_name' => $wx_name,
                'wx_head_img' => $wx_head_img,
                'wx_openid' => $wx_openid,
                'login_time' => $login_time
            ]);
            return json_encode(['code' => 100, 'info' => '初次登入,已记录']);
        }else{
            $uid = DB::table('dorm_user')->where('wx_openid',$wx_openid)->value('uid');
            $result = DB::table('dorm_room')->where('uid',$uid)->first();
            // return $result;
            if ($result == "") {
                return json_encode(['code' => 100, 'info' => '已登入,未入住']);
            }else{
                return json_encode(['code' => 200, 'info' => '已入住,返回基本信息']);
            }
        }

    }

    /*
     * 退房
     * */
    public function backRoom(Request $request)
    {
        $openid = $request->get('openid');
        $admin = $request->get('admin');
        //先判断该用户是否入驻
//        $info = (object)['uid'=>13];
        $info = DB::table('dorm_user')->where('wx_openid', $openid)->first();
        if (!empty($info)) {
            //查询该员工是否入住
            $room = DB::table('dorm_room')->where(['admin' => $admin, 'uid' => $info->uid, 'status' => 1])->first();
            if (!empty($room)) {
                $res = DB::table('dorm_room')->where('id', $room->id)->update(['uid' => null, 'status' => 0]);
                if ($res) {
                    DB::table('dorm_user')->where('wx_openid', $openid)->update(['out_time' => date('Y-m-d', time())]);
                    return json_encode(['code' => 200, 'info' => '退房成功！']);
                } else {
                    return json_encode(['code' => 100, 'info' => '服务器繁忙！']);
                }
            }  else {
                return json_encode(['code' => 100, 'info' => '该员工未入住！']);
            }
        } else {
            return json_encode(['code' => 100, 'info' => '该员工信息不存在！']);
        }
    }

    /*
     * 获取用户信息
     * */
    public function getUserInfo(Request $request)
    {
        $openid = $request->get('openid');
        $info = DB::table('dorm_user')->where('wx_openid', $openid)->first();
        if ($info->in_time) {//判断这个地方会出现问题 如果已经退房了 再进退房流程 没有房间信息 退房后没有清空入住时间
            $data['name'] = $info->name;
            $data['phone'] = $info->phone;
            $data['card'] = $info->card;
            $data['sex'] = $info->sex;
            $data['in_time'] = $info->in_time;
            $roomInfo = DB::table('dorm_room')->where('uid', $info->uid)->first();
            if ($roomInfo) {
                $data['floor'] = $roomInfo->floor;
                $data['room'] = $roomInfo->room;
                $data['bed'] = $roomInfo->bed;
                $data['dorm_name'] = $roomInfo->dorm_name;
                $data['is_in'] = 1;
            }else{
                $data['is_in'] = 0;
            }
            return json_encode(['code' => 200, 'info' => '返回用户信息！', 'data' => $data]);
        }
        return json_encode(['code' => 100, 'info' => '暂无用户信息！']);
    }
    //身份证识别
    public function distinguishCard(Request $request)
    {
        $file = $request->file('file');
        $newName = $file->getClientOriginalName();
        $path = '/images/'.date('Y-m-d');
        $file->move(public_path().'/images/'.date('Y-m-d'),$newName);
        $client = new \AipOcr('15621226', 'AttCpwef7ZpAAIYwF5GAcSGQ', 'd1fnYujAp5ErD4EmnxtzVgETymdqOkkR');
        $img = public_path().$path.'/'.$newName;
        $content = file_get_contents($img);
        $idCardSide = "front";
        // 调用身份证识别
        $result = $client->idcard($content, $idCardSide);
        $data['name'] = $result['words_result']['姓名']['words'];
        $data['sex'] = $result['words_result']['性别']['words'];
        $data['card'] = $result['words_result']['公民身份号码']['words'];
        return $data;
    }
    /*
     * 获取广告
     * */
    public function getAdvert(Request $request)
    {
        $type = $request->type;
        $data = DB::table('dorm_rollpic')->where(['type'=>$type,'status'=>0])->get(['id','cover_img']);
        return json_encode(['code' => 100, 'info' => '成功！','data'=>$data]);
    }
    /*
    * 获取广告内容
    *
    * */
    public function getAdContent(Request $request)
    {
        $id = $request->get('id');
        $adContent = DB::table('dorm_rollpic')->where('id',$id)->get(['content','datetime']);
        return $adContent;
    }
    /*
     * 外来人员登记
     * */
    public function outreg(Request $request)
    {
        $admin = $request->get('admin');
        $name = $request->get('name');
        $phone = $request->get('phone');
        $remark = $request->get('remark');
        $sex = $request->get('sex');
        $result = DB::table('dorm_outreg')->insert([
            'admin' => $admin,
            'name' => $name,
            'phone' => $phone,
            'remark' => $remark,
            'sex' => $sex,
            'created_at' => date('Y-m-d H:i:s',time())
        ]);
        if($result){
            return json_encode(['code' => 200, 'info' => '登记成功！']);
        }else{
            return json_encode(['code' => 100, 'info' => '登记失败！']);
        }
    }
    /*
     * 报修
     * */
    public function roomrepair(Request $request)
    {
        $openid = $request->get('openid');
        $uid = DB::table('dorm_user')->where('wx_openid',$openid)->value('uid');
        $admin = DB::table('dorm_room')->where('uid',$uid)->value('admin');
        $dorm_name = $request->get('dorm_name');
        $room_num = $request->get('room_num');
        $name = $request->get('name');
        $phone = $request->get('phone');
        $remark = $request->get('remark');
        $result = DB::table('dorm_roomrepair')->insert([
            'admin' => $admin,
            'uid' => $uid,
            'dorm_name' => $dorm_name,
            'room_num' => $room_num,
            'name' => $name,
            'phone' => $phone,
            'remark' => $remark,
            'created_at' => date('Y-m-d H:i:s',time())
        ]);
        if($result){
            return json_encode(['code' => 200, 'info' => '报修成功！']);
        }else{
            return json_encode(['code' => 100, 'info' => '报修失败！']);
        }
    }

}
