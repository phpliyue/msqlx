<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class SnowBallController extends Controller
{
    public function test()
    {
        $data = DB::table('dorm_room')->where('floor','1')->where('room','01')->update([
            'sex'=>'男'
        ]);
    }
    /*
     * 获取首页广告栏图片
     *
     * */
    public function getAd()
    {
        $ad = DB::table('snowball_ad')->get(['id','imagepath']);
        return $ad;
    }
    /*
     * 获取广告内容
     *
     * */
    public function getAdContent(Request $request)
    {
        $id = $request->get('id');
        $adContent = DB::table('snowball_ad')->where('id',$id)->get(['content','datetime']);
        return $adContent;
    }
    /*
     * 获取活动
     *
     * */
    public function getActivity()
    {
        $activity = DB::table('snowball_activity')->get(['id','imagepath']);
        return $activity;
    }
    /*
     * 获取广告内容
     *
     * */
    public function getActivityContent(Request $request)
    {
        $id = $request->get('id');
        $activityContent = DB::table('snowball_activity')->where('id',$id)->get();
        return $activityContent;
    }
}
