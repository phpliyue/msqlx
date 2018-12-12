<?php

namespace App\Http\Controllers\SignIn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $account = $request->get('account');
        $password = $request->get('password');
        if ($account != 'liyue' && $password != '123456'){
            return view('signIn.index');
        }else{
            $request->session()->put('signIn_account',$account);

            return redirect('/signIn_home');
        }
    }
}
