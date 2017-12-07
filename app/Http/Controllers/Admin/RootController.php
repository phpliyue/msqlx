<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RootController extends Controller
{
    public function index()
    {
        return view('root.index',array('user'=>Auth::user()));
    }
}
