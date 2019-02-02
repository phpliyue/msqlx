<?php

namespace App\Http\Controllers\Root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SnowBallController extends Controller
{
    public function index()
    {
        $adData = DB::table('snowball-ad')->get();
        return view('root.snowball', array('user' => Auth::user(), 'data' => $adData));
    }

    public function adCreate(Request $request)
    {
        $title = $request->get('title');
        $imagepath = $request->get('path');
        $content = $request->get('cont');

        $result = DB::table('snowball-ad')->insert([
            'title' => $title,
            'imagepath' => $imagepath,
            'content' => $content,
            'datetime' => date('Y-m-d H:i:s', time())
        ]);
        if ($result){
            $successMessages = '上传成功';
            return redirect('snowball')->with('success',$successMessages);
        }
    }
    public function adDelete($id)
    {
        $result = DB::table('snowball-ad')->where('id',$id)->delete();
        if($result)
        {
            $successMessages = '删除成功';
            return redirect('snowball')->with('success',$successMessages);
        }
    }
}
