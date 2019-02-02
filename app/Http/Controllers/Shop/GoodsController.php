<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    //商品列表
    public function goods()
    {
        $data = DB::table('shop_goods')->where('status',0)->get();
        if(!empty($data)){
            foreach($data as $k=>$v){
                $data[$k]->cname = DB::table('shop_cate')->where('cid',$v->cid)->value('name');
            }
        }
        return view('shop.goods',['data'=>$data]);
    }

    //上架商品
    public function upgoods(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $data['desc_img'] = trim($data['desc_img'],',');
            $gid = $data['gid'];
            if(!empty($gid)){
                $data['edit_time'] = time();
                $res = DB::table('shop_goods')->where('gid',$gid)->update($data);
            }else{
                $data['add_time'] = time();
                $res = DB::table('shop_goods')->insert($data);
            }
            if($res){
                return json_encode(['code'=>100,'info'=>'成功！']);
            }else{
                return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
            }
        }else{
            $id = $request->id;
            $data['info'] = DB::table('shop_goods')->where('gid',$id)->first();
            $data['cate'] = DB::table('shop_cate')->get();
            return view('shop.upgoods',['data'=>$data]);
        }
    }

    //上传图片
    public function upload(Request $request)
    {
        $file = $request->file('file');//获取文件
        if($file -> isValid()){
            //检验一下上传的文件是否有效
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $newName = date('YmdHis').mt_rand(100,999).".".$entension;  //重新命名
            $path =  '/goodsimg/'.date('Y-m-d');
            if(!file_exists($path)){
                makeDir($path);
            }
            $img = $path.'/'.$newName;
            $file->move(public_path().'/goodsimg/'.date('Y-m-d'),$newName);  //移动缓存的文件到新的目录下
        }else{
            $img = '';
        }
        return json_encode($img);
    }
}
