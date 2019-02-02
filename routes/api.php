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
Route::get('wx_getOpenid','Api\WxPublicApiController@getOpenid');
//
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('getUser','Api\SnowBallController@test');
/*
 * 宿舍管理接口
 */
//获取openid
Route::get('getOpenid','Api\GetOpenidController@getOpenid');
Route::get('dorm_saveUserInfo','Api\DormController@saveUserInfo');//存储用户基本信息，分配房间
Route::get('dorm_saveUserLogin','Api\DormController@saveUserLogin');//记录登入平台用户
Route::get('dorm_backRoom','Api\DormController@backRoom');//退房
Route::get('dorm_getUserInfo','Api\DormController@getUserInfo');//在退房时显示用户基本信息

/*
 * 商品管理
 */
Route::any('/shop_login','Shop\LoginController@login');
Route::any('/shop_reg','Shop\LoginController@register');
Route::any('/shop_logout','Shop\LoginController@logout');
Route::group(['middleware'=>'ShopAuth'],function(){
    Route::get('/shop_index','Shop\IndexController@index');//首页
    Route::get('/shop_goods','Shop\GoodsController@goods');//商品列表
    Route::any('/shop_upgoods/{id?}','Shop\GoodsController@upgoods');//上架商品
    Route::post('/shop_upload','Shop\GoodsController@upload');//上传图片
    Route::get('/shop_cate','Shop\CateController@index');//类目
    Route::any('/shop_addcate/{id?}','Shop\CateController@addcate');//新增类目
});

