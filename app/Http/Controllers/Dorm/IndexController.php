<?php
namespace App\Http\Controllers\Dorm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
class IndexController extends Controller
{
    //首页
    public function index()
    {
        return view('dorm.index');
    }
    public function iview()
    {
        return view('dorm_login');
    }
    //登录
    public function login(Request $request)
    {
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
        $info = DB::table('dorm_admin')->where(['account'=>$account,'status'=>0])->first();
        $role = 0;
        if(!empty($info))
        {
            if($info->type == 1){
                $role = 1;
                $account = DB::table('dorm_admin')->where(['id'=>$info->pid,'type'=>0,'status'=>0])->value('account');
                if(empty($account)){
                    return json_encode(['code'=>200,'info'=>'请联系管理员！']);
                }
            }
            session(['dorm_account' => $account,'dorm_role' => $role]);
            if(md5(md5($password).$info->salt) == $info->password)
            {
                return json_encode(['code'=>100,'info'=>'登录成功！']);
            }else
            {
                return json_encode(['code'=>200,'info'=>'密码错误！']);
            }
        }else
        {
            return json_encode(['code'=>200,'info'=>'账号不存在！']);
        }
    }
    //注册
    public function register(Request $request)
    {
        if($request->isMethod('post'))
        {
            // 规则
            $rules = [
                'account' => 'required|max:15|unique:dorm_admin',
                'password' => 'required',
                'phone' => 'required|regex:/^1[345789]\d{9}$/|unique:dorm_admin'
            ];
            // 自定义消息
            $messages = [
                'account.required' => '请输入账号',
                'account.max' => '用户名的长度不能超过15个字符',
                'account.unique' => '账号已存在',
                'password.required' => '请输入密码',
                'phone.required' => '请输入手机号',
                'phone.regex' => '手机号格式不正确',
                'phone.unique' => '手机号已存在'
            ];
            //创建验证器
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return json_encode(['code'=>200,'info'=>$validator->errors()->all()[0]]);
            }
            $data['salt'] = rand(100,999);
            $data['account'] = $request->get('account');
            $data['password'] = md5(md5($request->get('password')).$data['salt']);
            $data['phone'] = $request->get('phone');
            $data['created_at'] = date('Y-m-d H:i:s',time());
            $data['updated_at'] = date('Y-m-d H:i:s',time());
            $res = DB::table('dorm_admin')->insert($data);
            if($res)
            {
                session(['dorm_account' => $data['account'],'dorm_role' => 0]);
                return json_encode(['code'=>100,'info'=>'登录成功！']);
            }else
            {
                return json_encode(['code'=>200,'info'=>'服务器繁忙！']);
            }
        }else
        {
            return view('dorm.register');
        }
    }
    //退出登录
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('web_xss');
    }
}