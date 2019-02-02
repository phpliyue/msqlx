<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Storage;
use Image;
use App\Model\Picture;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
class AdminController extends Controller
{
    public function __construct()
    {
        //初始化picture表
        $this->Picture = new Picture();
    }
    /*
    *后台首页
    */
    public function index()
    {
        $data = DB::table('product')->get();
        return view('admin.index',array('user'=>Auth::user(),'data'=>$data));
    }
    public function liyue(){
        return view('welcome');
    }
    /*
     *导游
     * */
    public function userMag()
    {
        $data = DB::table('ciceroni')->where('shop_id',Auth::user()->shop_id)->get();
        return view('admin.userMag',array('user'=>Auth::user(),'data'=>$data));
    }
    /*
     * 导游管理页
     * */
    public function cUserMag()
    {
        $data = DB::table('ciceroni')->where('shop_id',Auth::user()->shop_id)->get();
        return view('admin.cUserMag',array('user'=>Auth::user(),'data'=>$data));
    }
    /*
    * 导游添加页
    * */
    public function cUserAdd()
    {
        return view('admin.cUserAdd',array('user'=>Auth::user()));
    }
    /*
     * 导游添加方法
     * */
    public function ciceroniAdd(Request $request)
    {
        $headImg = $request->file('headImg');
        $credentials = $request->file('credentials');
        $name = $request->get('name');
        $belongTo = $request->get('belongTo');
        $headImgName = $headImg->getClientOriginalName();
        $credentialsName = $credentials->getClientOriginalName();
        $cred_ext = substr(strrchr($credentialsName, '.'), 1);
        $head_ext = substr(strrchr($headImgName, '.'), 1);
        $headImg_name = 'dy'.time().'.'.$head_ext;
        $credentials_name = 'zs'.time().'.'.$cred_ext;
        Image::make($headImg)->resize(200,300)->save(public_path('/images/ciceroni/headImg/'.$headImg_name));
        Image::make($credentials)->resize(200,300)->save(public_path('/images/ciceroni/credentials/'.$credentials_name));
        $head_path = '/images/ciceroni/headImg/'.$headImg_name;
        $cred_path = '/images/ciceroni/credentials/'.$credentials_name;
        $date = date("Y:m:d H:i:s",time());
        DB::table('ciceroni')->insert([
            'name' => $name,
            'headImg' => $head_path,
            'credentials' => $cred_path,
            'belong_to' => $belongTo,
            'shop_id' => Auth::user()->shop_id,
            'created_at' => $date
        ]);
        return redirect('/userMag');
    }
    /*
     *商家导游移除方法
     * */
    public function cUserDel($id)
    {
        $info = DB::table('ciceroni')->where('id',$id)->get();
        foreach ($info as $key => $value){
            $headImg = $value->headImg;
            $credentials = $value->credentials;
        }
        $headImgName = substr(strrchr($headImg, '/'), 1);
        $credentialsName = substr(strrchr($credentials, '/'), 1);
        Storage::disk('dy_head')->delete($headImgName);
        Storage::disk('dy_credentials')->delete($credentialsName);
        $data = DB::table('ciceroni')->where('id',$id)->delete();
        if($data){
            return redirect('/cUserMag');
        }
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
                    'pic_path'=>'/images/circleImages/default.jpg',
                    'sort'=>1,
                    'shop_id'=>Auth::user()->shop_id,
                    'created_at'=>$date,
                    'updated_at'=>$date
                ],
                [
                    'uid'=>Auth::user()->id,
                    'type'=>'cp',
                    'pic_path'=>'/images/circleImages/default.jpg',
                    'sort'=>2,
                    'shop_id'=>Auth::user()->shop_id,
                    'created_at'=>$date,
                    'updated_at'=>$date
                ],
                [
                    'uid'=>Auth::user()->id,
                    'type'=>'cp',
                    'pic_path'=>'/images/circleImages/default.jpg',
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
            $pic_path = 'images/circleImages/'.$circleImagesName;
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
    /*
       * product management
       * */
    public function product()
    {
        $data = DB::table('product')->where('shop_id',Auth::user()->shop_id)->get();
        return view('admin.product',array('user'=>Auth::user(),'data'=>$data));
    }
/*
 * product add
 *
 *
 * */
    public function productInsert(Request $request){
       if($request->hasFile('cover')){
           $shopId = Auth::user()->shop_id;
           $coverInfo = $request->file('cover');
           $coverName = $coverInfo->getClientOriginalName();
           $cover_ext = substr(strrchr($coverName, '.'), 1);
           $type = $request->get('type');
           $cover = $type.$shopId.time().'.'.$cover_ext;
           Image::make($coverInfo)->resize(300,200)->save(public_path('/images/product/'.$cover));
           $cover_path = '/images/product/'.$cover;
       }
       $data = DB::table('product')->insert([
                'title' => $request->get('title'),
                'cover' => $cover_path,
                'cover_name' => $cover,
                'auth' => $request->get('auth'),
                'type' => $request->get('type'),
                'detail' => $request->get('cont'),
                'shop_id' => $request->get('shop_id'),
                'time' => date('Y:m:d',time()),
                'created_at' => date('Y:m:d H:i:s',time()),
                'updated_at' => date('Y:m:d H:i:s',time())
        ]);
       if($data){
           return redirect('/product');
       }
    }
    /*
     * 产品更新页面
     *
     * */
    public function productUpdateId($id){
        $data = DB::table('product')->where('id',$id)->get();
        return view('admin.productUpdate',array('user'=>Auth::user(),'data'=>$data));
    }
    /*
     * 产品修改方法
     *
     * */
    public function productUpdateM(Request $request){
        $cover_name = $request->get('cover_name');
        $id = $request->get('id');
        if($request->hasFile('cover')){
            $shopId = Auth::user()->shop_id;
            $coverInfo = $request->file('cover');
            $coverName = $coverInfo->getClientOriginalName();
            $cover_ext = substr(strrchr($coverName, '.'), 1);
            $type = $request->get('type');
            $cover = $type.$shopId.time().'.'.$cover_ext;
            Image::make($coverInfo)->resize(300,200)->save(public_path('/images/product/'.$cover));
            $cover_path = '/images/product/'.$cover;
            $data = DB::table('product')->where('id',$id)->update([
                'title' => $request->get('title'),
                'cover' => $cover_path,
                'auth' => $request->get('auth'),
                'type' => $request->get('type'),
                'cover_name' => $cover,
                'detail' => $request->get('cont'),
                'time' => date('Y:m:d',time()),
                'updated_at' => date('Y:m:d H:i:s',time())
            ]);
            if($cover_name !== 'default.jpg'){
                Storage::disk('proImg')->delete($cover_name);
            }
            if($data){
                return redirect('/product');
            }
        }
        $data = DB::table('product')->where('id',$id)->update([
            'title' => $request->get('title'),
            'auth' => $request->get('auth'),
            'type' => $request->get('type'),
            'detail' => $request->get('cont'),
            'time' => date('Y:m:d',time()),
            'updated_at' => date('Y:m:d H:i:s',time())
        ]);
        if($data){
            return redirect('/product');
        }
    }
    /*
     * 产品删除方法
     * */
    public function productDelete($id){
        $data = DB::table('product')->where('id',$id)->delete();
        if($data)
        {
            return redirect('/product');
        }
    }
    public function productImageUpload(Request $request)
    {
        $data = $request->all();
        $imgInfo = $data{'file'};
        $imgName = $imgInfo->getClientOriginalName();
        $img_ext = substr(strrchr($imgName, '.'), 1);
        $imgNewName = 'p'.time().'.'.$img_ext;
        Image::make($imgInfo)->save(public_path('/images/product/'.$imgNewName));
        $img_path = '/images/product/'.$imgNewName;
        return $img_path;
    }
}
