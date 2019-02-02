<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class CateController extends Controller
{
    //类别
    public function index()
    {
        return view('shop.cate',['data'=>DB::table('shop_cate')->get()]);
    }

    //新增类别
    public function addcate(Request $request)
    {
        if($request->isMethod('post')){
            // 规则
            $rules = [
                'name' => 'required|unique:shop_cate',
                'sort' => 'required'
            ];
            // 自定义消息
            $messages = [
                'name.required' => '请输入类别名称',
                'name.unique' => '该类别已存在',
                'sort.required' => '请输入序列号'
            ];
            //创建验证器
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return json_encode(['code'=>200,'info'=>$validator->errors()->all()[0]]);
            }
            $data['name'] = $request->input('name');
            $data['sort'] = $request->input('sort');
            $cid = $request->input('cid');
            if(!empty($cid)){
                $data['edit_time'] = time();
                $res = DB::table('shop_cate')->where('cid',$cid)->update($data);
            }else{
                $data['add_time'] = time();
                $res = DB::table('shop_cate')->insert($data);
            }
            if($res){
                return json_encode(['code'=>100,'info'=>'添加成功！']);
            }else{
                return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
            }
        }else{
            $id = $request->id;
            $info = DB::table('shop_cate')->where('cid',$id)->first();
            return view('shop.addcate',['info'=>$info]);
        }
    }
}
