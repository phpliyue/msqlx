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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('getUser','Api\SnowBallController@test');
/*
 * 宿舍管理接口
 */
Route::get('getOpenid','Api\GetOpenidController@getOpenid');//获取openid
Route::get('dorm_saveUserInfo','Api\DormController@saveUserInfo');//存储用户基本信息，分配房间
Route::get('dorm_saveUserLogin','Api\DormController@saveUserLogin');//记录登入平台用户
Route::get('dorm_backRoom','Api\DormController@backRoom');//退房
Route::get('dorm_getUserInfo','Api\DormController@getUserInfo');//在退房时显示用户基本信息

