<?php

namespace App\Http\Controllers\Root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Storage;
use Validate;
use App\Http\Requests\CreateFoldersRequest;
class RootController extends Controller
{
    public function index()
    {
        return view('root.index', array('user' => Auth::user()));
    }

    /*
     *素材管理
     * */
    public function folders()
    {
        $data = DB::table('folder')->get();
//        dd($data);
        return view('root.folder', array('user' => Auth::user(),'data'=>$data));
    }
    /*
     * 添加素材
     * */
    public function foldersCreate(CreateFoldersRequest $request)
    {

        $type = $request->get('type');
        $platform = $request->get('platform');
        $fileName = $request->get('fileName');
        $savePath = $request->get('filePath');
        $filePath = '/folder/'.str_replace("\\", "/", $savePath);
        $remark = $request->get('remark');
//        $filesName = $filesData->getClientOriginalName();
//        $filesExt = substr(strrchr($filesName, '.'), 1);
//        $filesData_name = time().'.'.$filesExt;
//        switch ($type)
//        {
//            case 'image':
//                Storage::disk('folderImg')->put($filesData_name, file_get_contents($filesData));
//                $path = '/folder/image/'.$filesData_name;
//            break;
//            case 'video':
//                Storage::disk('folderVideo')->put($filesData_name, file_get_contents($filesData));
//                $path = '/folder/video/'.$filesData_name;
//                break;
//            case 'icon':
//                Storage::disk('folderIcon')->put($filesData_name, file_get_contents($filesData));
//                $path = '/folder/icon/'.$filesData_name;
//                break;
//            case 'document':
//                Storage::disk('folderDocument')->put($filesData_name, file_get_contents($filesData));
//                $path = '/folder/document/'.$filesData_name;
//                break;
//            case 'music':
//                Storage::disk('folderMusic')->put($filesData_name, file_get_contents($filesData));
//                $path = '/folder/music/'.$filesData_name;
//                break;
//            default:
//                return redirect('folders');
//        }
        DB::table('folder')->insert([
            'type' => $type,
            'path' => $filePath,
            'filesname' => $fileName,
            'remark'=>$remark,
            'platform' => $platform,
            'datetime' => date('Y-m-d H:i:s',time())
        ]);
        $successMessages = '上传成功';
        return redirect('folders')->with('success',$successMessages);
    }

    /*
     *travel
     * */
    public function lxs()
    {
        return view('root.lxs', array('user' => Auth::user()));
    }
    /*
     *
     * */
    public function meisi()
    {
        return view('root.meisi', array('user' => Auth::user()));
    }

    /*
     *
     * */
    public function bibei()
    {
        return view('root.bibei', array('user' => Auth::user()));
    }

    /*
     *
     * */
    public function seying()
    {
        return view('root.seying', array('user' => Auth::user()));
    }

    /*
     *
     * */
    public function gonglve()
    {
        return view('root.gonglve', array('user' => Auth::user()));
    }

    /*
     *
     * */
    public function more()
    {
        return view('root.more', array('user' => Auth::user()));
    }

    /*
     * shop id
     * */
    public function shopId()
    {
        $data = DB::table('shopID')->get();
        return view('root.shopId', array('user' => Auth::user(), 'data' => $data));
    }

    /*
     *
     * */
    public function shopAdd(Request $request)
    {
        $shopName = $request->get('shopName');
        $shopId = $request->get('shopId');
        $date = date('Y:m:d H:i:m', time());
        $data = DB::table('shopID')->insert([
            'shopName' => $shopName,
            'shopId' => $shopId,
            'created_at' => $date
        ]);
        if ($data) {
            return redirect('/shopId');
        }
    }
    /*
     * add lxs page
     * */
    public function addLxs(Request $request){
        return view('root.addLxs', array('user' => Auth::user()));
    }
    /*
     * add lxs M
     * */
    public function addLxsM(Request $request){
        $shopId = $request->get('shopId');
        $companyName = $request->get('company');
        $address = $request->get('address');
        $link = $request->get('link');
        $cover = $request->file('cover');
        $detail = $request->get('detail');
        $coverName = $cover->getClientOriginalName();
        $cover_ext = substr(strrchr($coverName, '.'), 1);
        $lxsImg_name = 'lxs'.time().'.'.$cover_ext;
        Image::make($cover)->resize(200,300)->save(public_path('/images/lxs/'.$lxsImg_name));
        $cover_path = '/images/lxs/'.$lxsImg_name;
        DB::table('lxs')->insert([
            'name' => $companyName,
            'detail' => $detail,
            'address' => $address,
            'contact' => $link,
            'shop_id' => $shopId,
            'cover' => $cover_path,
            'created_at' => date('Y:m:d H:i:s',time()),
        ]);
        return redirect('/shopId');
    }

    public function shopIdUpdate($id){

        $shopId = $id;
//        dd($id);
        return view('root.addLxs', array('user' => Auth::user(),'shopId' => $shopId));
    }
    public function deleteShopId($id){
        $info = DB::table('lxs')->where('shop_id',$id)->get();
        foreach ($info as $key => $value){
            $cover = $value -> cover;
        }
        $coverName = substr(strrchr($cover, '/'), 1);
        Storage::disk('lxs')->delete($coverName);
        DB::table('lxs')->where('shop_id',$id)->delete();
        DB::table('shopId')->where('shopId',$id)->delete();

        return redirect('/shopId');
    }
    public function videoUpload(Request $request){
        $video = $request->file('video');
        dd($video);
    }
}
