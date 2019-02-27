<?php

namespace App\Http\Controllers\Root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DormController extends Controller
{
    //轮播图首页
    public function dorm()
    {
        $data = DB::table('dorm_rollpic')->where('status',0)->get();
        return view('root.dorm',array('user' => Auth::user(),'data'=>$data));
    }

    //添加轮播图
    public function rollpicAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $id = $request->get('id');
            $type = $request->get('type');
            $imagepath = $request->get('path');
            $content = $request->get('cont');
            if (!empty($id)) {
                $result = DB::table('dorm_rollpic')->where('id', $id)->update([
                    'type' => $type,
                    'cover_img' => $imagepath,
                    'content' => $content
                ]);
                $successMessages = '修改成功';
            } else {
                $result = DB::table('dorm_rollpic')->insert([
                    'type' => $type,
                    'cover_img' => $imagepath,
                    'content' => $content,
                    'datetime' => date('Y-m-d H:i:s', time())
                ]);
                $successMessages = '上传广告成功';
            }
            if ($result) {
                return redirect('dorm')->with('success', $successMessages);
            }
        } else {
            $id = $request->id;
            $data = DB::table('dorm_rollpic')->where('id', $id)->first();
            return view('root.rollpicAdd', array('user' => Auth::user(), 'data' => $data));
        }
    }

    /*
    * 轮播图删除方法
    * */
    public function rollpicDel($id)
    {
        $result = DB::table('dorm_rollpic')->where('id',$id)->update(['status'=>1]);
        if($result)
        {
            $successMessages = '删除成功';
            return redirect('dorm')->with('success',$successMessages);
        }
    }
}
