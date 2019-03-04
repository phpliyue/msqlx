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
    /*
     * 小宿舍
     * */
    public function xss()
    {
        return view('web.xss');
    }
    /*
     * 小宿舍注册页面
     * */
    public function xssR()
    {
        return view('web.xssR');
    }
}
