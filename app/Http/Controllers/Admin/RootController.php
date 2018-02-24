<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RootController extends Controller
{
    public function index()
    {
        return view('root.index',array('user'=>Auth::user()));
    }
    /*
     *
     * */
    public function daoyou()
    {
        return view('root.daoyou',array('user'=>Auth::user()));
    }
    /*
     *
     * */
    public function lxs(){
        return view('root.lxs',array('user'=>Auth::user()));
    }
    /*
     *
     * */
    public function meisi(){
        return view('root.meisi',array('user'=>Auth::user()));
    }
    /*
     *
     * */
    public function bibei(){
        return view('root.bibei',array('user'=>Auth::user()));
    }
    /*
     *
     * */
    public function seying(){
        return view('root.seying',array('user'=>Auth::user()));
    }
    /*
     *
     * */
    public function gonglve(){
        return view('root.gonglve',array('user'=>Auth::user()));
    }
    /*
     *
     * */
    public function more(){
        return view('root.more',array('user'=>Auth::user()));
    }
    /*
     * shop id
     * */
    public function shopId()
    {
        $data = DB::table('shopID')->get();
        return view('root.shopId',array('user'=>Auth::user(),'data'=>$data));
    }
    /*
     *
     * */
    public function shopAdd(Request $request)
    {
        $shopName = $request->get('shopName');
        $shopId = $request->get('shopId');
        $date = date('Y:m:d H:i:m',time());
        $data = DB::table('shopID')->insert([
            'shopName' => $shopName,
            'shopId' => $shopId,
            'created_at' => $date
        ]);
        if($data){
            return redirect('/shopId');
        }
    }
}
