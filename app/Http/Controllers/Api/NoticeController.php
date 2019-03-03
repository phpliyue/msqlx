<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    //公告
    public function index(Request $request)
    {
        $openid = $request->get('openid');
        $info = DB::table('dorm_user')->where('wx_openid',$openid)->first();
        $admin = '';
        if(!empty($info)){
            $admin = DB::table('dorm_room')->where('uid',$info->uid)->value('admin');
        }
        $data = DB::table('dorm_notice')->where(['admin'=>$admin,'status'=>0])->orderby('created_at','desc')->get();
        if(count($data)){
            foreach($data as $k=>$v){
                $data[$k]->content = $this->filterSpecail(strip_tags($v->content));
            }
        }else{
            $data = '您还没有入住,无法查看相关公告!';
            return json_encode(['code'=>100,'info'=>$data]);
        }
        return json_encode(['code'=>200,'info'=>'成功！','data'=>$data]);
    }

    //公告详情
    public function noticeInfo(Request $request)
    {
        $id = $request->id;
        $data = DB::table('dorm_notice')->where(['id'=>$id,'status'=>0])->first();
        return json_encode(['code'=>100,'info'=>'成功！','data'=>$data]);
    }

    //字符串过滤script代码以及特殊标签
    public function filterSpecail($str = ''){
        $str = str_replace(array("\r\n", "\r", "\n","&nbsp;","&lt;","&gt;","&amp;","&zwnj;","&quot;","&nb","&amp;nbsp;","&amp;nbsp","&apos;","&cent;","&pound;","&yen;","&euro;","&sect;","&times;","&divide;"), "",$str);
        $arr = preg_replace("/<(script.*?)>(.*?)<(\/script.*?)>/si","",$str);
        $arr = preg_replace("/<(embed.*?)>/si","",$arr);
        $arr = preg_replace("/<(video.*?)>(.*?)<(\/video.*?)>/si","",$arr);
        $arr = preg_replace("/<(audio.*?)>(.*?)<(\/audio.*?)>/si","",$arr);
        $arr = preg_replace("/<(source.*?)>/si","",$arr);
        return $arr;
    }
}
