<?php

namespace App\Http\Controllers\Dorm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdjustRoomController extends Controller
{
    //首页
    public function index()
    {
        $data = DB::table('dorm_adjustroom')->orderby('created_at','desc')->get();
        return view('dorm.adjustRoom',['data'=>$data]);
    }
}
