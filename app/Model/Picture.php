<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Picture extends Model
{
    public function getPic(){
        $info = DB::table('users')->get();
        return $info;
    }
    public function insertPic(){

    }


}
