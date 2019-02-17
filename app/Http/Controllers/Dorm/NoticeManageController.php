<?php

namespace App\Http\Controllers\Dorm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NoticeManageController extends Controller
{
    public function subtext($text, $length)
    {
        if(mb_strlen($text, 'utf8') > $length) {
            return mb_substr($text, 0, $length, 'utf8').'...';
        } else {
            return $text;
        }
    }
    //公告管理首页
    public function index()
    {
        $data = DB::table('dorm_notice')->where('status',0)->get();
        if(!empty($data)){
            foreach($data as $k=>$v){
                $data[$k]->content = subtext(filterSpecail(strip_tags($v->content)),60);
            }
        }
        return view('dorm.noticeManage',['data'=>$data]);
    }

    //添加公告
    public function addNotice(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $data['admin'] = session('dorm_account');
            $data['status'] = 0;
            $data['created_at'] = date('Y-m-d H:i:s',time());
            $data['updated_at'] = date('Y-m-d H:i:s',time());
            $res = DB::table('dorm_notice')->insert($data);
            if($res){
                return json_encode(['code'=>100,'info'=>'成功！']);
            }else{
                return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
            }
        }else{
            return view('dorm.addNotice');
        }
    }

    //图片上传
    public function upload(Request $request)
    {
        if ($_FILES) {
            if (!$_FILES['file']['error']) {
                //生成的文件名（时间戳，精确到毫秒）
                $ext = explode('.', $_FILES['file']['name']);
                $filename = time().rand(100,999). '.' . $ext[1];
                $targetDir = 'notice/'.date("Y-m-d");
                //如果上传的文件夹不存在，则创建之
                if (! file_exists ( $targetDir )) {
                    mkdir("$targetDir", 0777, true);
                }
                is_dir($targetDir) or (makeDir(dirname($targetDir)) and @mkdir($targetDir, 0777));
                //图片上传的具体路径就出来了
                $destination = $targetDir.'/'.$filename; //change this directory
                $location = $_FILES["file"]["tmp_name"];
                //将图片移动到指定的文件夹****核心代码
                move_uploaded_file($location, $destination);
                return $destination;
            } else {
                return $_FILES['file']['error'];
            }
        }
    }

    //编辑公告
    public function editNotice(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $data['admin'] = 1;
            $data['updated_at'] = date('Y-m-d H:i:s',time());
            $res = DB::table('dorm_notice')->where('id',$data['id'])->update($data);
            if($res != false){
                return json_encode(['code'=>100,'info'=>'成功！']);
            }else{
                return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
            }
        }else{
            $id = $request->id;
            $data = DB::table('dorm_notice')->where('id',$id)->first();
            return view('dorm.editNotice',['data'=>$data]);
        }
    }

    //删除公告
    public function delNotice(Request $request)
    {
        $id = $request->id;
        $data = DB::table('dorm_notice')->where('id',$id)->update(['status'=>1]);
        return redirect('dorm_noticeManage');
    }


}
