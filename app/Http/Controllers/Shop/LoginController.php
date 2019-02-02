<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class LoginController extends Controller
{
    //登录
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            // 规则
            $rules = [
                'account' => 'required|max:15',
                'password' => 'required'
            ];
            // 自定义消息
            $messages = [
                'account.required' => '请输入账号',
                'account.max' => '用户名的长度不能超过15个字符',
                'password.required' => '请输入密码'
            ];
            //创建验证器
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return json_encode(['code'=>200,'info'=>$validator->errors()->all()[0]]);
            }
            $account = $request->get('account');
            $password = $request->get('password');
            $info = DB::table('shop_admin')->where('account',$account)->first();
            if(!empty($info))
            {
                if(md5($password) == $info->password)
                {
                    session(['shop_account' => $account]);
                    return json_encode(['code'=>100,'info'=>'登录成功！']);
                }else
                {
                    return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
                }
            }else
            {
                return json_encode(['code'=>200,'info'=>'账号不存在！']);
            }
        }else{
            return view('shop.login');
        }
    }

    //注册
    public function register(Request $request)
    {
        if($request->isMethod('post'))
        {
            // 规则
            $rules = [
                'account' => 'required|max:15|unique:shop_admin',
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
            $data['account'] = $request->get('account');
            $data['password'] = md5($request->get('password'));
            $data['reg_time'] = time();
            $res = DB::table('shop_admin')->insert($data);
            if($res)
            {
                session(['shop_account' => $data['account']]);
                return json_encode(['code'=>100,'info'=>'登录成功！']);
            }else
            {
                return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
            }
        }else
        {
            return view('shop.reg');
        }
    }

    //退出登录
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('shop_index');
    }
}
