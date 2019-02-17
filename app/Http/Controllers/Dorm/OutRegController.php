<?php

namespace App\Http\Controllers\Dorm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OutRegController extends Controller
{
    //首页
    public function index()
    {
        $admin = session('dorm_account');
        $data = DB::table('dorm_outreg')->where('admin',$admin)->orderby('created_at','desc')->get();
        return view('dorm.outReg',['data'=>$data]);
    }
}
