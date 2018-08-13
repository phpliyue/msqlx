<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AdminAjaxController extends Controller
{
    public function imgUpdate(Request $request)
    {
//        echo 111;
//        $path = $request->file('avatar')->storeAs(
//            'avatars', $request->user()->id
//        );
//        return $path;
//        var_dump($request->all());
    }
    /*
     *
     * */
    public function imageUploadPost()
    {
//        dd(request()->image);
//        ->getClientOriginalExtension()
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }

}
