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

Route::get('/', function () {
    return view('welcome');
});

/*
 * app admin
 * */
Route::get('appAdmin','Admin\App\AppAdminController@index');
Route::get('/temp',function (){
    return view('pc.template.template');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
*   微信小程序接口
*
*/
Route::get('wx_api_banner_ads',function(){
    $arr = ['https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1511352258508&di=4334088e04f6f36a72d9384cc383815b&imgtype=0&src=http%3A%2F%2Fimgsrc.baidu.com%2Fimage%2Fc0%253Dshijue1%252C0%252C0%252C294%252C40%2Fsign%3D2e02d53a9ddda144ce0464f1dadebad7%2Fac345982b2b7d0a22e2175b4c1ef76094b369a2a.jpg','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1511352258515&di=9c28d66b01b1fddab9c43eaf785061bb&imgtype=0&src=http%3A%2F%2Fwww.hbbacts.com%2Ffiles%2F2015-11%2Ff20151109151211114876.jpg','https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1511352259702&di=f3e3c00488eac4c199199383f872ba4f&imgtype=0&src=http%3A%2F%2Ff.hiphotos.baidu.com%2Fimage%2Fpic%2Fitem%2F0823dd54564e925844f7b52f9582d158cdbf4e2b.jpg'];
    return $arr;
});
