<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Storage;

class RootController extends Controller
{
    public function index()
    {
        return view('root.index', array('user' => Auth::user()));
    }

    /*
     *
     * */
    public function daoyou()
    {

        return view('root.daoyou', array('user' => Auth::user()));
    }

    /*
     *travel
     * */
    public function lxs()
    {
        return view('root.lxs', array('user' => Auth::user()));
    }
    /*
     *
     * */
    public function meisi()
    {
        return view('root.meisi', array('user' => Auth::user()));
    }

    /*
     *
     * */
    public function bibei()
    {
        return view('root.bibei', array('user' => Auth::user()));
    }

    /*
     *
     * */
    public function seying()
    {
        return view('root.seying', array('user' => Auth::user()));
    }

    /*
     *
     * */
    public function gonglve()
    {
        return view('root.gonglve', array('user' => Auth::user()));
    }

    /*
     *
     * */
    public function more()
    {
        return view('root.more', array('user' => Auth::user()));
    }

    /*
     * shop id
     * */
    public function shopId()
    {
        $data = DB::table('shopID')->get();
        return view('root.shopId', array('user' => Auth::user(), 'data' => $data));
    }

    /*
     *
     * */
    public function shopAdd(Request $request)
    {
        $shopName = $request->get('shopName');
        $shopId = $request->get('shopId');
        $date = date('Y:m:d H:i:m', time());
        $data = DB::table('shopID')->insert([
            'shopName' => $shopName,
            'shopId' => $shopId,
            'created_at' => $date
        ]);
        if ($data) {
            return redirect('/shopId');
        }
    }
    /*
     * add lxs page
     * */
    public function addLxs(Request $request){
        return view('root.addLxs', array('user' => Auth::user()));
    }
    /*
     * add lxs M
     * */
    public function addLxsM(Request $request){
        $shopId = $request->get('shopId');
        $companyName = $request->get('company');
        $address = $request->get('address');
        $link = $request->get('link');
        $cover = $request->file('cover');
        $detail = $request->get('detail');
        $coverName = $cover->getClientOriginalName();
        $cover_ext = substr(strrchr($coverName, '.'), 1);
        $lxsImg_name = 'lxs'.time().'.'.$cover_ext;
        Image::make($cover)->resize(200,300)->save(public_path('/images/lxs/'.$lxsImg_name));
        $cover_path = '/images/lxs/'.$lxsImg_name;
        DB::table('lxs')->insert([
            'name' => $companyName,
            'detail' => $detail,
            'address' => $address,
            'contact' => $link,
            'shop_id' => $shopId,
            'cover' => $cover_path,
            'created_at' => date('Y:m:d H:i:s',time()),
        ]);
        return redirect('/shopId');
    }

    public function shopIdUpdate($id){

        $shopId = $id;
//        dd($id);
        return view('root.addLxs', array('user' => Auth::user(),'shopId' => $shopId));
    }
    public function deleteShopId($id){
        $info = DB::table('lxs')->where('shop_id',$id)->get();
        foreach ($info as $key => $value){
            $cover = $value -> cover;
        }
        $coverName = substr(strrchr($cover, '/'), 1);
        Storage::disk('lxs')->delete($coverName);
        DB::table('lxs')->where('shop_id',$id)->delete();
        DB::table('shopId')->where('shopId',$id)->delete();

        return redirect('/shopId');
    }
    public function videoUpload(Request $request){
        $video = $request->file('video');
        dd($video);
    }
}
