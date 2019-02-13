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
}
