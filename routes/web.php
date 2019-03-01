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
Route::get('/new','Web\IndexController@new');
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
    Route::get('/adminIndex','Admin\AdminController@index');
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
Route::group(['middleware'=>'auth'],function(){
    Route::get('root','Root\RootController@index');
    Route::get('folders','Root\RootController@folders');//素材管理
    Route::post('folders/create','Root\RootController@foldersCreate')->name('folders_create');
    Route::get('snowball','Root\SnowBallController@index');
    //广告管理
    Route::get('snowballAdAddView','Root\SnowBallController@adAddView');
    Route::get('snowballAdUpdateView/{id}','Root\SnowBallController@adUpdateView');
    Route::post('ad/update','Root\SnowBallController@adUpdate')->name('ad_update');
    Route::post('ad/create','Root\SnowBallController@adCreate')->name('ad_create');
    Route::get('ad/delete/{id}','Root\SnowBallController@adDelete');
    //活动管理
    Route::get('snowballActivityAddView','Root\SnowBallController@activityAddView');
    Route::get('snowballActivityUpdateView/{id}','Root\SnowBallController@activityUpdateView');
    Route::post('activity/update','Root\SnowBallController@activityUpdate')->name('activity_update');
    Route::post('activity/create','Root\SnowBallController@activityCreate')->name('activity_create');
    Route::get('activity/delete/{id}','Root\SnowBallController@activityDelete');
    //优惠管理
    Route::get('snowballSaleAddView','Root\SnowBallController@saleAddView');
    Route::get('snowballSaleUpdateView/{id}','Root\SnowBallController@saleUpdateView');
    Route::post('sale/update','Root\SnowBallController@saleUpdate')->name('sale_update');
    Route::post('sale/create','Root\SnowBallController@saleCreate')->name('sale_create');
    Route::get('sale/delete/{id}','Root\SnowBallController@saleDelete');
    //小宿舍设置
    Route::get('/dorm','Root\DormController@dorm');//轮播图列表
    Route::any('/rollpicAdd/{id?}','Root\DormController@rollpicAdd')->name('addRollpic');//添加轮播图
    Route::any('/rollpicDel/{id}','Root\DormController@rollpicDel');//删除轮播图
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

/*
 * 码上去签到
 */
Route::get('/signIn_index','SignIn\IndexController@index');
Route::group(['middleware'=>'signInAuth'],function(){
    Route::get('/signIn_home','SignIn\HomeController@index');
    Route::get('/signIn_message','SignIn\MessageController@index');
});
/*
 * 宿舍管理
 */
//Route::get('/dorm_index','Dorm\IndexController@index');
//Route::post('/dorm_login','Dorm\IndexController@login');
//Route::any('/dorm_register','Dorm\IndexController@register');
//Route::any('/dorm_logout','Dorm\IndexController@logout');
//Route::group(['middleware'=>'dormAuth'],function(){
//    Route::get('/dorm_home','Dorm\HomeController@index');
//    Route::get('/dorm_roomManage','Dorm\RoomManageController@index');
//    Route::post('/dorm_getRoomInfo','Dorm\RoomManageController@getRoomInfo');
//    Route::get('/dorm_getRooms','Dorm\RoomManageController@getRooms');
//});
Route::get('/dorm_index','Dorm\IndexController@index');
Route::post('/dorm_login','Dorm\IndexController@login');
Route::any('/dorm_register','Dorm\IndexController@register');
Route::any('/dorm_logout','Dorm\IndexController@logout');
Route::group(['middleware'=>'dormAuth'],function(){
    Route::get('/dorm_home','Dorm\HomeController@index');
    Route::get('/dorm_roomManage','Dorm\RoomManageController@index');//房间管理
    Route::get('/dorm_getRoom','Dorm\RoomManageController@getRooms');//入住管理
    Route::get('/dorm_getBedInfo/{id}','Dorm\RoomManageController@getBedInfo');//床位信息
    Route::post('/dorm_getRoomInfo','Dorm\RoomManageController@getRoomInfo');//生成住宿信息
    Route::post('/dorm_delRoomInfo','Dorm\RoomManageController@delRoomInfo');//删除住宿信息
    Route::post('/dorm_edituser','Dorm\RoomManageController@edituser');//修改员工信息
    Route::post('/dorm_roomIn','Dorm\RoomManageController@roomIn');//员工入住
    Route::post('/dorm_roomOut','Dorm\RoomManageController@roomOut');//员工退房
    Route::post('/dorm_adjustRoom','Dorm\RoomManageController@adjustRoom');//员工调整房间
    Route::get('/dorm_addRoom','Dorm\RoomManageController@addRoom');
    Route::get('/dorm_updateRoom/{id}','Dorm\RoomManageController@updateRoom');//修改宿舍
    Route::post('/dorm_roomInfos','Dorm\RoomManageController@roomInfos');//上传宿舍信息
    Route::post('/dorm_addRoomInfo','Dorm\RoomManageController@addRoomInfo');
    Route::get('/dorm_noticeManage','Dorm\NoticeManageController@index');
    Route::any('/dorm_addNotice','Dorm\NoticeManageController@addNotice');
    Route::any('/dorm_upload','Dorm\NoticeManageController@upload');
    Route::any('/dorm_editNotice/{id}','Dorm\NoticeManageController@editNotice');
    Route::any('/dorm_editNotice','Dorm\NoticeManageController@editNotice');
    Route::any('/dorm_delNotice/{id}','Dorm\NoticeManageController@delNotice');
    Route::any('/dorm_entryNotice','Dorm\EntryNoticeController@index');//入住须知
    Route::get('/dorm_roomGoods','Dorm\RoomGoodsController@index');//物料管理
    Route::get('/dorm_roomRepair','Dorm\RoomRepairController@index');//房间报修
    Route::get('/dorm_roomRepairReply/{id}','Dorm\RoomRepairController@repairReply');//处理报修页面
    Route::any('/dorm_roomRepairReplyMethod','Dorm\RoomRepairController@updateRepairReply');//处理报修方法
    Route::get('/dorm_outReg','Dorm\OutRegController@index');//外来人员登记
    Route::get('/dorm_addGoods','Dorm\RoomGoodsController@addGoods');//添加物料页面
    Route::post('/dorm_addGoodsInfo','Dorm\RoomGoodsController@addGoodsInfos');//添加物料方法
    Route::get('/dorm_delGoodsInfo','Dorm\RoomGoodsController@delGoodsInfos');//删除物料
});

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

Route::get('error',function(){
    abort(404, 'Unauthorized action.');
});
