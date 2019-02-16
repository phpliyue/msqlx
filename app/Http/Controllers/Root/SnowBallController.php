<?php

namespace App\Http\Controllers\Root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SnowBallController extends Controller
{
    public function index()
    {
        $adData = DB::table('snowball_ad')->get();//广告数据
        $folder = DB::table('folder')->get();//素材数据
        $activityData = DB::table('snowball_activity')->get();//活动数据
        $saleData = DB::table('snowball_sale')->get();//优惠数据
        return view('root.snowball', array('user' => Auth::user(), 'data' => $adData,'folder'=>$folder,'activityData'=>$activityData,'saleData'=>$saleData));
    }
    /*
     * 广告添加页面
     * */
    public function adAddView()
    {
        return view('root.adAdd', array('user' => Auth::user()));
    }
    /*
     * 广告修改页面
     * */
    public function adUpdateView($id)
    {
        $adData = DB::table('snowball_ad')->where('id',$id)->get();
        $folder = DB::table('folder')->get();
        return view('root.adUpdate', array('user' => Auth::user(),'data' => $adData,'folder'=>$folder));
    }
    /*
     * 广告修改方法
     * */
    public function adUpdate(Request $request)
    {
        $id = $request->get('id');
        $title = $request->get('title');
        $imagepath = $request->get('path');
        $content = $request->get('cont');

        $result = DB::table('snowball_ad')->where('id',$id)->update([
            'title' => $title,
            'imagepath' => $imagepath,
            'content' => $content,
            'datetime' => date('Y-m-d H:i:s', time())
        ]);
        if ($result){
            $successMessages = '修改成功';
            return redirect('snowball')->with('success',$successMessages);
        }
    }
    /*
     * 添加广告方法
     * */
    public function adCreate(Request $request)
    {
        $title = $request->get('title');
        $imagepath = $request->get('path');
        $content = $request->get('cont');

        $result = DB::table('snowball_ad')->insert([
            'title' => $title,
            'imagepath' => $imagepath,
            'content' => $content,
            'datetime' => date('Y-m-d H:i:s', time())
        ]);
        if ($result){
            $successMessages = '上传广告成功';
            return redirect('snowball')->with('success',$successMessages);
        }
    }
    /*
     * 广告删除方法
     * */
    public function adDelete($id)
    {
        $result = DB::table('snowball_ad')->where('id',$id)->delete();
        if($result)
        {
            $successMessages = '删除成功';
            return redirect('snowball')->with('success',$successMessages);
        }
    }
    /*
     * 添加活动页面
     * */
    public function activityAddView()
    {
        $folder = DB::table('folder')->get();
        return view('root.activityAdd', array('user' => Auth::user(),'folder'=>$folder));
    }
    /*
     * 活动修改页面
     * */
    public function activityUpdateView($id)
    {
        $activityData = DB::table('snowball_activity')->where('id',$id)->get();
        $folder = DB::table('folder')->get();
        return view('root.activityUpdate', array('user' => Auth::user(),'data' => $activityData,'folder'=>$folder));
    }
    /*
     * 活动添加
     * */
    public function activityCreate(Request $request)
    {
        $title = $request->get('title');
        $imagepath = $request->get('path');
        $sponsor = $request->get('sponsor');
        $startdate = $request->get('startdate');
        $enddate = $request->get('enddate');
        $content = $request->get('cont');

        $result = DB::table('snowball_activity')->insert([
            'title' => $title,
            'imagepath' => $imagepath,
            'sponsor' => $sponsor,
            'startdate' => $startdate,
            'enddate' => $enddate,
            'content' => $content,
            'datetime' => date('Y-m-d H:i:s', time())
        ]);
        if ($result){
            $successMessages = '添加活动成功';
            return redirect('snowball')->with('success',$successMessages);
        }
    }
    /*
     * 活动修改
     * */
    public function activityUpdate(Request $request)
    {
        $id = $request->get('id');
        $title = $request->get('title');
        $imagepath = $request->get('path');
        $sponsor = $request->get('sponsor');
        $startdate = $request->get('startdate');
        $enddate = $request->get('enddate');
        $content = $request->get('cont');

        $result = DB::table('snowball_activity')->where('id',$id)->update([
            'title' => $title,
            'imagepath' => $imagepath,
            'sponsor' => $sponsor,
            'startdate' => $startdate,
            'enddate' => $enddate,
            'content' => $content,
            'datetime' => date('Y-m-d H:i:s', time())
        ]);
        if ($result){
            $successMessages = '修改活动成功';
            return redirect('snowball')->with('success',$successMessages);
        }
    }
    /*
     * 活动删除
     * */
    public function activityDelete($id)
    {
        $result = DB::table('snowball_activity')->where('id',$id)->delete();
        if($result)
        {
            $successMessages = '删除活动成功';
            return redirect('snowball')->with('success',$successMessages);
        }
    }

    /*
     * 添加优惠页面
     * */
    public function saleAddView()
    {
        $folder = DB::table('folder')->get();
        return view('root.saleAdd', array('user' => Auth::user(),'folder'=>$folder));
    }
    /*
     * 优惠修改页面
     * */
    public function saleUpdateView($id)
    {
        $saleData = DB::table('snowball_sale')->where('id',$id)->get();
        $folder = DB::table('folder')->get();
        return view('root.saleUpdate', array('user' => Auth::user(),'data' => $saleData,'folder'=>$folder));
    }
    /*
     * 优惠添加
     * */
    public function saleCreate(Request $request)
    {


        $result = DB::table('snowball_sale')->insert([

        ]);
        if ($result){
            $successMessages = '添加活动成功';
            return redirect('snowball')->with('success',$successMessages);
        }
    }
    /*
     * 优惠修改
     * */
    public function saleUpdate(Request $request)
    {
        $id = $request->get('id');


        $result = DB::table('snowball_sale')->where('id',$id)->update([

        ]);
        if ($result){
            $successMessages = '修改活动成功';
            return redirect('snowball')->with('success',$successMessages);
        }
    }
    /*
     * 活动删除
     * */
    public function saleDelete($id)
    {
        $result = DB::table('snowball_sale')->where('id',$id)->delete();
        if($result)
        {
            $successMessages = '删除优惠活动成功';
            return redirect('snowball')->with('success',$successMessages);
        }
    }

}
