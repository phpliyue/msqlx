<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        //网站首页
        return view('web.index');
    }
    /*
     * 新闻页面
     * */
    public function new()
    {
        return view('web.new');
    }
}
