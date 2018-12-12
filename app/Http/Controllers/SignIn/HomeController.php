<?php

namespace App\Http\Controllers\SignIn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('signIn.home');
    }
}
