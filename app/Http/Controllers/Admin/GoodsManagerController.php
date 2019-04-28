<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GoodsManagerController extends Controller
{
    public function index()
    {
        $goods_type = DB::table('snowball_goodsType')->get();
        return view('admin.goodsManager',array('user' => Auth::user(),'type'=>$goods_type));
    }
    public function add(Request $request)
    {
        $type = $request->get('type');
        $result = DB::table('snowball_goodsType')->insert(['name'=>$type]);
        if($result){
            return 1;
        }else{
            return 0;
        }
    }
    public function del($id)
    {

    }

    /**
     * @purpose 上传商品页面
     */
    public function addGoodsView($type)
    {
        return view('admin.addGoods',array('user' => Auth::user(),'type'=>$type));
    }

    /**
     * @purpose 上传商品图片
     */
    public function addGoodsImage(Request $request)
    {
        $files = $request->all();
        $pictures = [];
        foreach($files['file'] as $k=>$v){
            $pic_path = $this->uploadImage($v,'/upload/goodsimg/');
            $id = DB::table('snowball_picture')->insertGetId([
                'pic_path' => $pic_path,
                'create_time' => date('Y-m-d H:i:s',time())
            ]);
            $pictures[] = $id;
        }
        return json_encode($pictures);
    }

    /**
     * @purpose 上传商品内容描述图
     */
    public function addDescImage(Request $request)
    {
        $file = $request->all();
        dd($file);
        $pic_path = $this->uploadImage($v,'/upload/goodsimg/');
        $id = DB::table('snowball_picture')->insertGetId([
            'pic_path' => $pic_path,
            'create_time' => date('Y-m-d H:i:s',time())
        ]);
        return json_encode($pictures);
    }

    /**
     * @purpose 上传商品功能
     */
    public function addGoods(Request $request)
    {
        $data = $request->all();
        $data['create_time'] = time();
        $res = DB::table('snowball_goods')->insertGetId($data);
        if($res){
            return ['code'=>200,'info'=>'上传成功！'];
        }else{
            return ['code'=>100,'info'=>'服务器繁忙！'];
        }
    }

    /**
     * @purpose 文件上传
     * @param  $file 文件
     */
    public function uploadImage($file,$path)
    {
        if($file -> isValid()){
            //检验一下上传的文件是否有效
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $newName = date('YmdHis').mt_rand(100,999).".".$entension;  //重新命名
            $path =  $path.date('Y-m-d');
            if(!file_exists($path)){
                mkdir($path, 0777,true);
            }
            $img = $path.'/'.$newName;
            $file->move(public_path().'/'.$path,$newName);  //移动缓存的文件到新的目录下
        }else{
            $img = '';
        }
        return $img;
    }

    /**
     * [将Base64图片转换为本地图片并保存]
     * @E-mial wuliqiang_aa@163.com
     * @TIME   2017-04-07
     * @WEB    http://blog.iinu.com.cn
     * @param  [Base64] $base64_image_content [要保存的Base64]
     * @param  [目录] $path [要保存的路径]
     */
    public function base64_image_content($base64_image_content,$path){
        //匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
            $type = $result[2];
            $new_file = $path."/".date('Ymd',time())."/";
            if(!file_exists($new_file)){
                //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($new_file, 0777,true);
            }
            $new_file = $new_file.time().".{$type}";
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)))){
                return '/'.$new_file;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
