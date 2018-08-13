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
    /**
     * if user is new user initialise circle images table
     *
     * @param array
     * @return object
     * */
    public function insertPic($array){

    }
    /**
     * check user picture table is Null
     * @param string $
     *
     * */


}
