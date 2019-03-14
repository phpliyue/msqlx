<?php

namespace App\Http\Controllers\Dorm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class CompanyController extends Controller
{
    /*
     * 侧边栏公司管理页面
     * */
    public function index()
    {
        $uid = DB::table('dorm_admin')->where('account',session('dorm_account'))->value('id');
        $data = DB::table('dorm_admin')->where(['pid'=>$uid,'status'=>0])->get();
        return view('dorm.company',['data'=>$data]);
    }
    /*
     * 添加管理员页面
     * */
    public function addManager(Request $request)
    {
        $id = $request->id;
        $data = DB::table('dorm_admin')->where('id',$id)->first();
        return view('dorm.addManager',['data'=>$data]);
    }
    /*
     * 添加管理员方法 post
     * */
    public function addManagerInfo(Request $request)
    {
        if($request->isMethod('post')){
            $result = $request->all();
            $data['salt'] = rand(100,999);
            $data['account'] = $result['account'];
            $data['password'] = md5(md5($result['password']).$data['salt']);
            $data['name'] = $result['name'];
            $data['phone'] = $result['phone'];
            $data['remark'] = $result['remark'];
            $data['type'] = 1;
            $data['pid'] = DB::table('dorm_admin')->where('account',session('dorm_account'))->value('id');
            if(empty($result['id'])){
                // 规则
                $rules = [
                    'account' => 'required|max:15|unique:dorm_admin',
                    'password' => 'required',
                ];
                // 自定义消息
                $messages = [
                    'account.required' => '请输入账号',
                    'account.max' => '用户名的长度不能超过15个字符',
                    'account.unique' => '账号已存在',
                    'password.required' => '请输入密码'
                ];
                //创建验证器
                $validator = Validator::make($request->all(), $rules, $messages);
                if ($validator->fails()) {
                    return json_encode(['code'=>200,'info'=>$validator->errors()->all()[0]]);
                }
                $data['created_at'] = date('Y-m-d H:i:s',time());
                $data['updated_at'] = date('Y-m-d H:i:s',time());
                $res = DB::table('dorm_admin')->insert($data);
            }else{
                $data['id'] = $result['id'];
                $data['updated_at'] = date('Y-m-d H:i:s',time());
                $res = DB::table('dorm_admin')->where('id',$result['id'])->update($data);
            }
            if($res)
            {
                return json_encode(['code'=>100,'info'=>'成功！']);
            }else
            {
                return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
            }
        }
    }
    /*
     * 删除管理员
     * */
    public function delManager(Request $request)
    {
        $id = $request->id;
        $res = DB::table('dorm_admin')->where('id',$id)->update(['status'=>1]);
        if($res)
        {
            return json_encode(['code'=>100,'info'=>'删除成功！']);
        }else
        {
            return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
        }
    }
}
