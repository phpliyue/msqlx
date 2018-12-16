<?php

namespace App\Http\Controllers\Dorm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $admin = $request->session()->get('dorm_account');
        $sexData['sexMan'] = count(DB::table('dorm_room')->where(['admin'=>$admin,'sex'=>'男','status'=>'1'])->get());
        $sexData['sexWom'] = count(DB::table('dorm_room')->where(['admin'=>$admin,'sex'=>'女','status'=>'1'])->get());
        $numData['num1'] = count(DB::table('dorm_room')->where(['admin'=>$admin,'status'=>'1'])->get());
        $numData['num0'] = count(DB::table('dorm_room')->where(['admin'=>$admin,'status'=>'0'])->get());
        return view('dorm.home',['sexData'=>$sexData,'numData'=>$numData]);
    }
}
