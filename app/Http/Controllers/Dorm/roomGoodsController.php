<?php

namespace App\Http\Controllers\Dorm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoomGoodsController extends Controller
{
    //首页
    public function index()
    {
        $admin = session('dorm_account');
        $data = DB::table('dorm_goods')->where('admin',$admin)->get();
        return view('dorm.roomGoods',['data'=>$data]);
    }
    public function addGoods()
    {
        return view('dorm.addGoods');
    }
    public function addGoodsInfos(Request $request)
    {
        $admin = session('dorm_account');
        $name = $request->get('goods_name');
        $spec = $request->get('goods_spec');
        $num = $request->get('goods_num');
        $price = $request->get('goods_price');
        $remark = $request->get('goods_remark');
        $result = DB::table('dorm_goods')->insert([
            'admin' => $admin,
            'name' => $name,
            'spec' => $spec,
            'num' => $num,
            'price' => $price,
            'remark' => $remark
        ]);
        if($result)
        {
            return json_encode(['code'=>100,'info'=>'成功！']);
        }else
        {
            return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
        }
    }

    public function delGoodsInfos(Request $request)
    {
        $id = $request->get('id');
        $result = DB::table('dorm_goods')->where('id',$id)->delete();
        if($result)
        {
            return json_encode(['code'=>100,'info'=>'删除成功！']);
        }else
        {
            return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
        }
    }
}
