<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Storage;
use Image;
use App\Model\Picture;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function __construct()
    {
        //初始化picture表
        $this->Picture = new Picture();
    }
    /*
    *
    */
    public function firstPage()
    {
        return view('admin.index',array('user'=>Auth::user()));
    }
    public function liyue(){
        return view('welcome');
    }
    /*
    *图片管理页
    */
    public function imageMag()
    {
        //get user shop_id
        $shop_id = Auth::user()->shop_id;
        //select user picture info
        $res = DB::table('picture')->where('shop_id',$shop_id)->get();
        $date = date("Y:m:d H:i:s",time());
        if(!$res->count())
        {
            DB::table('picture')->insert([
                [
                    'uid'=>Auth::user()->id,
                    'type'=>'cp',
                    'pic_path'=>public_path('/images/circleImages/'),
                    'sort'=>1,
                    'shop_id'=>Auth::user()->shop_id,
                    'created_at'=>$date,
                    'updated_at'=>$date
                ],
                [
                    'uid'=>Auth::user()->id,
                    'type'=>'cp',
                    'pic_path'=>public_path('/images/circleImages/'),
                    'sort'=>2,
                    'shop_id'=>Auth::user()->shop_id,
                    'created_at'=>$date,
                    'updated_at'=>$date
                ],
                [
                    'uid'=>Auth::user()->id,
                    'type'=>'cp',
                    'pic_path'=>public_path('/images/circleImages/'),
                    'sort'=>3,
                    'shop_id'=>Auth::user()->shop_id,
                    'created_at'=>$date,
                    'updated_at'=>$date
                ]
            ]);
        }
        $res = DB::table('picture')->where('shop_id',$shop_id)->get();
        return view('admin.admin',array('user'=>Auth::user(),'res'=>$res));
    }
    /*
    *   后台管理者个人信息页
    */
    public function profile()
    {
        if(empty(Auth::user()))
        {
            return redirect('/');
        }
        return view('admin.profile',array('user'=>Auth::user()));
    }
    /*
    * 个人信息页头像上传
    */
    public function profileUpload(Request $request)
    {
        //判断头像图片是否存在
        if($request->hasFile('headImage'))
        {
            //获取头像信息
            $head_image = $request->file('headImage');
            //file name
            $file_name = $head_image->getClientOriginalName();
            // get file extension
            $file_ext = substr(strrchr($file_name, '.'), 1);
            //user head image name
            $image_name = 'user'.time().'.'.$file_ext;
            //改变图片大小 设置存放路径
            Image::make($head_image)->resize(300,300)->save(public_path('/images/profile/'.$image_name));
            //获取现有头像的名称 在前台接收的
            $old_head_image = $request->get('oldHeadImage');
            //获取当前登入用户信息
            $user = Auth::user();
            //头像更新
            $user->head_image = $image_name;
            if($old_head_image !== 'default.jpg'){
                Storage::delete($old_head_image);
            }
            $user->save();
            return redirect('/profile');
        }
        return redirect('/profile');
    }
    /*
     * product management
     * */
    public function product()
    {
        return view('admin.product',array('user'=>Auth::user()));
    }
    /*
     *  circle image upload
     *
     * */
    public function circleImages(Request $request)
    {
        if($request->hasFile('image'))
        {
            //get image sort
            $imageSort = $request->get('imageSort');
            //get image old_name
            $oldCirImg = $request->get('oldCirImg');
            //get upload image info
            $circleImages = $request->file('image');
            //get upload image name
            $fileName = $circleImages->getClientOriginalName();
            //get upload image extension
            $file_ext = substr(strrchr($fileName, '.'), 1);
            //fix upload image name [type][time]
            $circleImagesName = 'cp'.time().'.'.$file_ext;
            $time = date("Y:m:d h:i:s",time());
            Image::make($circleImages)->resize(300,200)->save(public_path('/images/circleImages/'.$circleImagesName));
            $pic_path = public_path('images/circleImages/');
            DB::table('picture')->where('type','cp')
                                ->where('sort',$imageSort)
                                ->where('shop_id',Auth::user()->shop_id)
                                ->update(['pic_name'=>$circleImagesName,'pic_path'=>$pic_path,'updated_at'=>$time]);
            if($oldCirImg !== 'default.jpg'){
                Storage::disk('cirImg')->delete($oldCirImg);
            }
            return redirect('/administrator');
        }
        return redirect('/administrator');
    }
}
