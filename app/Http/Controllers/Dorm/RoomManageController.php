<?php

namespace App\Http\Controllers\Dorm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomManageController extends Controller
{
    public function index()
    {
        return view('dorm.roomManage');
    }
}
