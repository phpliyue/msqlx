<?php

namespace App\Http\Controllers\Dorm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $account = $request->get('account');
        $password = $request->get('password');
        if ($account != 'liyue' && $password != '123456'){
            return view('dorm.index');
        }else{
            $request->session()->put('dorm_account',$account);

            return redirect('/dorm_home');
        }

    }
}
