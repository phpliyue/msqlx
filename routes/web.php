<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','Admin\AdminController@liyue');
/*
 *
 * 后台
 * */
//注册登入auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//后台登入首页
Route::get('/administrator','Admin\AdminController@index')->middleware('auth');
//个人信息页
Route::get('/profile','Admin\AdminController@profile')->middleware('auth');
//个人信息图片修改方法
Route::post('/profile_upload','Admin\AdminController@profileUpload');
Route::post('/upload','Admin\AdminController@upload');
//轮播图上传
Route::post('/circleImages','Admin\AdminController@circleImages')->name('circleImages');
//产品管理
Route::get('/product','Admin\AdminController@product')->middleware('auth');
//后台模板
Route::get('/temp',function(){
    return view('temp');
});

/*
*   微信小程序接口
*
*/
//获取轮播图
Route::get('wx_api_banner_ads',function(){
    $arr = ['https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1511352258508&di=4334088e04f6f36a72d9384cc383815b&imgtype=0&src=http%3A%2F%2Fimgsrc.baidu.com%2Fimage%2Fc0%253Dshijue1%252C0%252C0%252C294%252C40%2Fsign%3D2e02d53a9ddda144ce0464f1dadebad7%2Fac345982b2b7d0a22e2175b4c1ef76094b369a2a.jpg','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1511352258515&di=9c28d66b01b1fddab9c43eaf785061bb&imgtype=0&src=http%3A%2F%2Fwww.hbbacts.com%2Ffiles%2F2015-11%2Ff20151109151211114876.jpg','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1511352259702&di=f3e3c00488eac4c199199383f872ba4f&imgtype=0&src=http%3A%2F%2Ff.hiphotos.baidu.com%2Fimage%2Fpic%2Fitem%2F0823dd54564e925844f7b52f9582d158cdbf4e2b.jpg'];
    return $arr;
});
Route::post('img_update','AdminAjaxController@imgUpdate');
Route::get('image-upload',['as'=>'image.upload','uses'=>'AdminController@index']);
Route::post('image-upload',['as'=>'image.upload.post','uses'=>'AdminAjaxController@imageUploadPost']);


