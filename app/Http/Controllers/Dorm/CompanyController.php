<?php

namespace App\Http\Controllers\Dorm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /*
     * 侧边栏公司管理页面
     * */
    public function index()
    {
        return view('dorm.company');
    }
    /*
     * 添加管理员页面
     * */
    public function addManager()
    {
        return view('dorm.addManager');
    }
    /*
     * 添加管理员方法 post
     * */
    public function dorm_addManagerInfo(Request $request)
    {

    }
}
