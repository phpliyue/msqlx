<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
 * 小程序公用接口
 * */
Route::post('wx_getOpenid','Api\WxPublicApiController@getOpenid');
//
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('getUser','Api\SnowBallController@test');
/*
 * 宿舍管理接口
 */
//获取openid
//Route::get('getOpenid','Api\GetOpenidController@getOpenid');
//Route::get('dorm_saveUserInfo','Api\DormController@saveUserInfo');//存储用户基本信息，分配房间
//Route::get('dorm_saveUserLogin','Api\DormController@saveUserLogin');//记录登入平台用户
//Route::get('dorm_backRoom','Api\DormController@backRoom');//退房
//Route::get('dorm_getUserInfo','Api\DormController@getUserInfo');//在退房时显示用户基本信息

Route::get('getOpenid','Api\GetOpenidController@getOpenid');//获取openid
Route::get('dorm_saveUserInfo','Api\DormController@saveUserInfo');//存储用户基本信息，分配房间
Route::get('dorm_saveUserLogin','Api\DormController@saveUserLogin');//记录登入平台用户
Route::get('dorm_backRoom','Api\DormController@backRoom');//退房
Route::get('dorm_getUserInfo','Api\DormController@getUserInfo');//在退房时显示用户基本信息
Route::get('dorm_notice', 'Api\NoticeController@index');//获取公告
Route::get('dorm_noticeInfo', 'Api\NoticeController@noticeInfo');//公告详情
Route::post('dorm_outreg', 'Api\DormController@outreg');//外来人员登记
Route::post('dorm_roomrepair', 'Api\DormController@roomrepair');//宿舍报修
Route::post('dorm_adjustroom', 'Api\DormController@adjustroom');//房间调整
Route::get('dorm_getEntryNotice', 'Api\EntryNoticeController@index');//入住须知
Route::post('dorm_myrepair', 'Api\DormController@myrepair');//我的报修
Route::post('dorm_distinguishCard', 'Api\DormController@distinguishCard');//身份证识别
Route::get('dorm_getAdvert', 'Api\DormController@getAdvert');//获取首页广告
Route::get('dorm_getAdContent', 'Api\DormController@getAdContent');//获取广告详情
Route::post('dorm_getXuZi','Api\DormController@getMyXuZi');//获取我的页面须知
Route::get('dorm_getDepartment','Api\DormController@getDepartment');//获取部门

/*
 * 雪球社区
 * */
Route::get('snowBall_getAd','Api\SnowBallController@getAd');//获取轮播图
Route::get('snowBall_getAdContent','Api\SnowBallController@getAdContent');//获取轮播图内容
Route::get('snowBall_getActivity','Api\SnowBallController@getActivity');//获取活动
Route::get('snowBall_getActivityContent','Api\SnowBallController@getActivityContent');//获取活动内容
