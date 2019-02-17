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
        $data = DB::table('dorm_outreg')->orderby('created_at','desc')->get();
        return view('dorm.outReg',['data'=>$data]);
    }
}
