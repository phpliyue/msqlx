<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function PHPSTORM_META\type;

class AjaxController extends Controller
{
    /*
     * 商户号核实
     * */
    public function checkShopId(Request $request)
    {
        $shopId = $request->get('shop_id');
        $res = DB::table('shopID')->where('shopId',$shopId)->get();
        if (count($res)){
            return 1;
        }else{
            return 0;
        }


    }

}
