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
Route::get('dorm_saveUserInfo','Api\DormController@saveUserInfo');
Route::get('dorm_saveUserLogin','Api\DormController@saveUserLogin');
