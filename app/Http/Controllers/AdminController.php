<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Storage;
use Image;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin',array('user'=>Auth::user()));
    }
    public function profile()
    {
        if(empty(Auth::user()))
        {
            return redirect('/');
        }
//        dd(Storage::disk('lunbotu')->delete('1511939293.png'));
        return view('profile',array('user'=>Auth::user()));
    }
    public function profile_upload(Request $request)
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
            return redirect('profile');
//            return view('profile',array('user'=>Auth::user()));


        }
    }
}
