<?php

namespace App\Http\Controllers\Dorm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class roomGoodsController extends Controller
{
    //首页
    public function index()
    {
        $admin = session('dorm_account');
        $data = DB::table('dorm_adjustroom')->where('admin',$admin)->orderby('created_at','desc')->get();
        return view('dorm.adjustRoom',['data'=>$data]);
    }
}
