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
/*
 * 官网路由
 * */
Route::get('/','Web\IndexController@index');
Route::get('/web_new','Web\IndexController@new');
Route::get('/web_xss','Web\IndexController@xss');
Route::get('/web_xssR','Web\IndexController@xssR');
Route::get('/web_iserver','Web\IndexController@iserver');
Route::get('/web_xserver','Web\IndexController@xserver');
Route::get('/web_qserver','Web\IndexController@qserver');
/*
 *
 * 后台
 * */
//注册登入auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::post('img_update','AdminAjaxController@imgUpdate');
Route::get('image-upload',['as'=>'image.upload','uses'=>'AdminController@index']);
Route::post('image-upload',['as'=>'image.upload.post','uses'=>'AdminAjaxController@imageUploadPost']);
//Route::redirect('/here', '/there', 301);
/*
 * 管理员路由
 * */
Route::group(['middleware'=>'auth'],function(){
    //商品管理
    Route::get('goodsManager','Admin\GoodsManagerController@index');
    Route::any('addGoodsType','Admin\GoodsManagerController@add');
    Route::any('goods/del/{id}','Admin\GoodsManagerController@del');
    Route::any('addGoodsView/{type}','Admin\GoodsManagerController@addGoodsView');
    Route::post('/addGoodsImage','Admin\GoodsManagerController@addGoodsImage');
    Route::post('/addGoods','Admin\GoodsManagerController@addGoods');//商品上传
    Route::post('/addDescImage','Admin\GoodsManagerController@addDescImage');//商品内容图片上传

    //
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
});
/*
 * 后台ajax
 * */
Route::get('ajax_checkShopId','Admin\AjaxController@checkShopId');
/*
 * 宿舍管理
 */
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
    Route::get('/dorm_company','Dorm\CompanyController@index');//公司管理页面
    Route::get('/dorm_addManager/{id?}','Dorm\CompanyController@addManager');
    Route::post('/dorm_addManagerInfo','Dorm\CompanyController@addManagerInfo');
    Route::post('/dorm_delManager','Dorm\CompanyController@delManager');//删除管理员
    Route::get('/dorm_addDepartment','Dorm\CompanyController@addDepartment');//添加部门方法
    Route::get('/dorm_delDepartment','Dorm\CompanyController@delDepartment');
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

