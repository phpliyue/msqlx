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
        $uid = DB::table('dorm_user')->where('wx_openid',$arr['openid'])->value('uid');
        $info = DB::table('dorm_room')->where('uid',$uid)->first();
        if(empty($info))
        {
            //查询该性别是否有空位的房间
            $room = DB::table('dorm_room')->select('id','dorm_name','floor','room','bed')->where(['admin'=>$arr['admin'],'sex'=>$arr['sex'],'status'=>0])->orderBy('num','asc')->first();
            //若没有该性别的人员入住，则随机分配一间空房间
            if(empty($room))
            {
                $room = DB::table('dorm_room')->select('id','dorm_name','floor','room','bed')->where(['admin'=>$arr['admin'],'status'=>0])->where('sex',null)->orWhere('sex','')->orderBy('num','asc')->first();
                if(empty($room))
                {
                    return json_encode(['code'=>100,'info'=>'宿舍已满，暂无空位置！']);
                }else
                {
                    $res = DB::table('dorm_room')->where('id',$room->id)->update(['uid'=>$uid,'sex'=>$arr['sex'],'status'=>1]);
                    $result = DB::table('dorm_room')->where(['dorm_name'=>$room->dorm_name,'floor'=>$room->floor,'room'=>$room->room])->update(['sex'=>$arr['sex']]);
                    if($res == false || $result == false)
                    {
                        return json_encode(['code'=>100,'info'=>'服务器繁忙！']);
                    }else
                    {
                        $data = DB::table('dorm_user')->where('wx_openid',$arr['openid'])->update([
                            'name'=>$arr['name'],
                            'phone'=>$arr['phone'],
                            'card'=>$arr['card'],
                            'sex'=>$arr['sex'],
                            'admin'=>$arr['admin'],
                            'in_time'=>date('Y-m-d H:i:s',time())
                        ]);
                        return json_encode(['code'=>200,'info'=>'入住成功！','data'=>$room]);
                    }
                }
            }else
            {
                //若该性别有人员入住，则按房间标识大小优先排序
                $res = DB::table('dorm_room')->where('id',$room->id)->update(['uid'=>$uid,'status'=>1]);
                if($res == false)
                {
                    return json_encode(['code'=>100,'info'=>'服务器繁忙！']);
                }else
                {
                    DB::table('dorm_user')->where('wx_openid',$arr['openid'])->update(['in_time'=>date('Y-m-d H:i:s',time())]);
                    return json_encode(['code'=>200,'info'=>'入住成功！','data'=>$room]);
                }
            }
        }else
        {
            return json_encode(['code'=>100,'info'=>'该员工已入住！']);
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
        $login_time = date('Y-m-d H:i:s',time());
        $data = DB::table('dorm_user')->where('wx_openid',$wx_openid)->get();
        if(!$data->count()){
            DB::table('dorm_user')->insert([
                'wx_name' => $wx_name,
                'wx_head_img' => $wx_head_img,
                'wx_openid' => $wx_openid,
                'login_time' => $login_time
            ]);
            return 'customer add';
        }

    }
    /*
     * 退房
     * */
    public function backRoom(Request $request)
    {
        $openid = $request->get('openid');
        $admin = $request->get('admin');;
        $name = 'aa';//$request->input('name');
        $card = '11111';//$request->input('card');
        //先判断该用户是否入驻
//        $info = (object)['uid'=>13];
        $info = DB::table('dorm_user')->where('wx_openid',$openid)->first();
        if(!empty($info))
        {
            //查询该员工是否入住
            $room = DB::table('dorm_room')->where(['admin'=>$admin,'uid'=>$info->uid,'status'=>1])->first();
            //若没有该性别的人员入住，则随机分配一间空房间
            if(!empty($room))
            {
                //查询该房间是否只剩当前一人
                $count = DB::table('dorm_room')->where(['admin'=>$admin,'floor'=>$room->floor,'room'=>$room->room,'status'=>1])->count();
                if($count == 1)
                {
                    $res = DB::table('dorm_room')->where(['admin'=>$admin,'floor'=>$room->floor,'room'=>$room->room])->update(['uid'=>null,'sex'=>null,'status'=>0]);
                }else
                {
                    $res = DB::table('dorm_room')->where('id',$room->id)->update(['uid'=>null,'status'=>0]);
                }
                if($res)
                {
                    $res = DB::table('dorm_user')->where('wx_openid',$openid)->update(['out_time'=>date('Y-m-d H:i:s',time())]);
                    return json_encode(['code'=>200,'info'=>'退房成功！']);
                }else
                {
                    return json_encode(['code'=>100,'info'=>'服务器繁忙！']);
                }
            }else
            {
                return json_encode(['code'=>100,'info'=>'该员工未入住！']);
            }
        }else
        {
            return json_encode(['code'=>100,'info'=>'该员工信息不存在！']);
        }
    }
    /*
     * 获取用户信息
     * */
    public function getUserInfo(Request $request)
    {
        $openid = $request->get('openid');
        $info = DB::table('dorm_user')->where('wx_openid',$openid)->first();
        if($info->in_time){//判断这个地方会出现问题 如果已经退房了 再进退房流程 没有房间信息 退房后没有清空入住时间
            $data['name'] = $info->name;
            $data['phone'] = $info->phone;
            $data['card'] = $info->card;
            $data['sex'] = $info->sex;
            $data['in_time'] = $info->in_time;
            $roomInfo = DB::table('dorm_room')->where('uid',$info->uid)->first();
            if($roomInfo){
                $data['floor'] = $roomInfo->floor;
                $data['room'] = $roomInfo->room;
                $data['bed'] = $roomInfo->bed;
            }
            return json_encode(['code'=>200,'info'=>'返回用户信息！','data'=>$data]);
        }
        return json_encode(['code'=>100,'info'=>'暂无用户信息！']);
    }
}
