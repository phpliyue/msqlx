<?php
namespace App\Http\Controllers\Dorm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $admin = $request->session()->get('dorm_account');
        $result = DB::table('dorm_department')->where('admin',$admin)->get();
        foreach($result as $key){
            $arr[] = $key->department;
        }
        var_dump($arr);
        $sexData['sexMan'] = count(DB::table('dorm_room')->where(['admin'=>$admin,'sex'=>'男','status'=>'1'])->get());
        $sexData['sexWom'] = count(DB::table('dorm_room')->where(['admin'=>$admin,'sex'=>'女','status'=>'1'])->get());
        $numData['num1'] = count(DB::table('dorm_room')->where(['admin'=>$admin,'status'=>'1'])->get());
        $numData['num0'] = count(DB::table('dorm_room')->where(['admin'=>$admin,'status'=>'0'])->get());
        return view('dorm.home',['sexData'=>$sexData,'numData'=>$numData,'admin'=>$admin]);
    }
    //上传图片
    public function upload(Request $request)
    {
        $file = $request->file('file');//获取文件
        if($file -> isValid()){
            //检验一下上传的文件是否有效
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $newName = date('YmdHis').mt_rand(100,999).".".$entension; //重新命名
            $path = '/goodsimg/'.date('Y-m-d');
            if(!file_exists($path)){
                makeDir($path);
            }
            $img = $path.'/'.$newName;
            $file->move(public_path().'/goodsimg/'.date('Y-m-d'),$newName); //移动缓存的文件到新的目录下
        }else{
            $img = '';
        }
        return json_encode($img);
    }
}