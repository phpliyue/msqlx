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
// $userData['sexMan'] = DB::table('dorm_room')->where(['admin'=>$admin,'sex'=>'男','status'=>'1'])->count();
// $userData['sexWom'] = DB::table('dorm_room')->where(['admin'=>$admin,'sex'=>'女','status'=>'1'])->count();
// $userData['num1'] = DB::table('dorm_room')->where(['admin'=>$admin,'status'=>'1'])->count();
// $userData['num0'] = DB::table('dorm_room')->where(['admin'=>$admin,'status'=>'0'])->count();
// //今日入住、今日退房人数
// $time = date('Y-m-d',time());
// $where = ['admin'=>$admin,'status'=>'1','in_time'=>$time];
// $outwhere = ['admin'=>$admin,'status'=>'0','out_time'=>$time];
// $userData['innum'] = DB::table('dorm_user')->where($where)->count() + DB::table('dorm_user_arz')->where($where)->count();
// $userData['outnum'] = DB::table('dorm_user')->where($outwhere)->count() + DB::table('dorm_user_arz')->where($outwhere)->count();
// //统计每层楼的入住情况(先获取宿舍楼名称)
// $dorm_name = array_unique(DB::table('dorm_addroom')->where('admin',$admin)->pluck('dorm_name')->toArray());
// //获取每栋楼每层的入住情况
//
// return view('dorm.home',['userData'=>$userData,'admin'=>$admin]);
        $nowTime = date('Y-m-d',time());
        $inMobile = DB::table('dorm_user')->where(['admin'=>$admin,'in_time'=>$nowTime])->count();
        $outMobile = DB::table('dorm_user')->where(['admin'=>$admin,'out_time'=>$nowTime])->count();
        $inPC = DB::table('dorm_user_arz')->where(['admin'=>$admin,'in_time'=>$nowTime])->count();
        $outPC = DB::table('dorm_user_arz')->where(['admin'=>$admin,'out_time'=>$nowTime])->count();
        $nowData['inMobile'] = $inMobile;
        $nowData['outMobile'] = $outMobile;
        $nowData['inPC'] = $inPC;
        $nowData['outPC'] = $outPC;
        $sexData['sexMan'] = count(DB::table('dorm_room')->where(['admin'=>$admin,'sex'=>'男','status'=>'1'])->get());
        $sexData['sexWom'] = count(DB::table('dorm_room')->where(['admin'=>$admin,'sex'=>'女','status'=>'1'])->get());
        $numData['num1'] = count(DB::table('dorm_room')->where(['admin'=>$admin,'status'=>'1'])->get());
        $numData['num0'] = count(DB::table('dorm_room')->where(['admin'=>$admin,'status'=>'0'])->get());
        return view('dorm.home',['sexData'=>$sexData,'numData'=>$numData,'admin'=>$admin,'nowData'=>$nowData]);
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
