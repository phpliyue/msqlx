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
Route::get('/','Web\IndexController@index');
/*
 *
 * 后台
 * */
//注册登入auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
/*
 * 商户
 * */
Route::group(['middleware'=>'auth'],function(){
    Route::get('/adminIndex','Admin\AdminController@firstPage');
    //后台图片管理
    Route::get('/administrator','Admin\AdminController@imageMag');
    //个人信息页
    Route::get('/profile','Admin\AdminController@profile');
    //个人信息图片修改方法
    Route::post('/profile_upload','Admin\AdminController@profileUpload');
    //轮播图上传
    Route::post('/circleImages','Admin\AdminController@circleImages')->name('circleImages');
    //导游
    Route::get('/userMag','Admin\AdminController@userMag');
    //导游添加
    Route::get('/cUserAdd','Admin\AdminController@cUserAdd');
    //导游管理
    Route::get('/cUserMag','Admin\AdminController@cUserMag');
    Route::get('/cUserDel/{id}','Admin\AdminController@cUserDel');
    //产品管理
    Route::get('/product','Admin\AdminController@product');
    //产品修改页
    Route::get('/productUpdate/{id}','Admin\AdminController@productUpdateId');
    //产品修改方法
    Route::post('/productUpdateM','Admin\AdminController@productUpdateM')->name('proUp');
    //产品删除方法
    Route::get('/productDelete/{id}','Admin\AdminController@productDelete');
    //后台模板
    Route::get('/temp',function(){
        return view('temp');
    });
    Route::any('/one/{k}','Admin\AdminController@productUpdate');
    //富文本编辑器提交
    Route::post('/productInsert','Admin\AdminController@productInsert')->name('Insert');
    Route::post('/productUpdate','Admin\AdminController@productUpdate')->name('Update');
    Route::post('/productImageUpload','Admin\AdminController@productImageUpload');
    //导游添加
    Route::post('/daoYouAdd','Admin\AdminController@ciceroniAdd')->name('cDaoYouAdd');
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

/*
 * 管理员路由
 * */
ROute::group(['middleware'=>'auth'],function(){
    Route::get('/root','Admin\RootController@index');
    Route::get('/daoyou','Admin\RootController@daoyou');
    Route::get('/lxs','Admin\RootController@lxs');
    Route::get('/meisi','Admin\RootController@meisi');
    Route::get('/bibei','Admin\RootController@bibei');
    Route::get('/seying','Admin\RootController@seying');
    Route::get('/gonglve','Admin\RootController@gonglve');
    Route::get('/more','Admin\RootController@more');
    Route::get('/shopId','Admin\RootController@shopId');
    Route::post('/shopAdd','Admin\RootController@shopAdd')->name('shopAdd');
    Route::get('/shopIdUpdate/{id}','Admin\RootController@shopIdUpdate');
    Route::get('/addLxs','Admin\RootController@addLxs');
    Route::post('/addLxsM','Admin\RootController@addLxsM')->name('addLxsM');
    Route::get('/deleteShopId/{id}','Admin\RootController@deleteShopId');
    Route::post('/videoUpload','Admin\RootController@videoUpload')->name('videoUpload');
});
/*
 * 后台ajax
 * */
Route::get('ajax_checkShopId','Admin\AjaxController@checkShopId');

/*
 * 码上去旅行微信接口
 * */
Route::get('x_getAdPic','Wx\WeixinController@getAdPic');
//获取产品信息接口
Route::get('x_getProductInfo','Wx\WeixinController@getProInfo');
//get product detail
Route::get('x_getProductDetail','Wx\WeixinController@getProDetail');
//get customer login information
Route::get('x_getCustomerLogin','Wx\WeixinController@getCustomerLogin');
//save customer information
Route::get('x_saveCustomerInfo','Wx\WeixinController@saveCustomerInfo');
//save customer order
Route::get('x_saveCustomerOrder','Wx\WeixinController@saveCustomerOrder');
// get guide info
Route::get('x_getGuideDetail','Wx\WeixinController@getGuideDetail');
//get lxs info
Route::get('x_getLxsInfo','Wx\WeixinController@getLxsInfo');
