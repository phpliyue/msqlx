<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Storage;
use Image;
use App\Model\Picture;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->Picture = new Picture();
    }
    public function liyue(){
        return view('welcome');
    }
    public function index()
    {

        return view('admin.admin',array('user'=>Auth::user()));
    }
    public function upload(Request $request)
    {
        //id 类型 图片名 图片路径
        $pic = $request->file('image');
        $pic_name = time().$pic->getClientOriginalName();
        Image::make($pic)->resize(300,200)->save(public_path('/images/circleImages/'.$pic_name));
        $type = 'cp';

        dd(public_path());

    }
    public function profile()
    {
        if(empty(Auth::user()))
        {
            return redirect('/');
        }
        return view('admin.profile',array('user'=>Auth::user()));
    }
    public function profileUpload(Request $request)
    {
        //判断头像图片是否存在
        if($request->hasFile('headImage'))
        {
            //获取头像信息
            $head_image = $request->file('headImage');
            //重新为图像命名 getClientOriginalName() 是获取图片类型
            $image_name = time() . $head_image->getClientOriginalName();
            Image::make($head_image)->resize(300,300)->save(public_path('/images/profile/'.$image_name));
            $old_head_image = $request->get('oldHeadImage');

            $user = Auth::user();
            $user->head_image = $image_name;
//            dd($old_head_image);
            if($old_head_image !== 'default.jpg'){
                Storage::delete($old_head_image);
            }
            $user->save();
            return redirect('/profile');
//            return view('profile',array('user'=>Auth::user()));
        }
    }
    /*
     * product management
     * */
    public function product()
    {
        return view('admin.product',array('user'=>Auth::user()));
    }
    public function circleImages(Request $request)
    {
        $imageSort = $request ->get('imageSort');
        $circleImages = $request->file('image');
        $circleImagesName = time().$circleImages->getClientOriginalName();
        Image::make($circleImages)->resize(300,200)->save(public_path('/images/circleImages/'.$circleImagesName));
        return back()->with('liyue','上传成功');

    }
}
