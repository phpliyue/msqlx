@extends('base')
@section('css')
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        body{
            background-color: #e5fefe;
        }
    </style>
@show
@section('title','宿舍管理-注册')
@section('content')
    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">欢迎注册 小宿舍</h2>

                <p>
                    请你认真填写相关数据.
                </p>

                {{--<p>--}}
                    {{--利用社交平台微信,工作平台钉钉等常用工具进行有效管理,优点有覆盖面广,操作简单,可以简单有效的进行管理.--}}
                {{--</p>--}}

                {{--<div>--}}
                    {{--<img src="/img/dorm_wx.jpg" style="height:150px;width:150px;float:left;">--}}
                    {{--<img src="/img/dorm_wx.jpg" style="height:150px;width:150px;float:right;">--}}
                {{--</div>--}}


            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    {{--<form class="m-t" role="form" action="index.html">--}}
                    <div class="form-group">
                        <input type="text" class="form-control" id="account" name="account" placeholder="请输入正确账号" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="请输入正确密码" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="请输入电话号" required>
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b J_submit">注册</button>

                    <a href="#">
                        <small>忘记密码?</small>
                    </a>

                    <p class="text-muted text-center">
                        <small>如果你有账户</small>
                    </p>
                    <a class="btn btn-sm btn-white btn-block" href="{{url('dorm_index')}}">登入</a>
                    {{--</form>--}}
                    <p class="m-t">
                        <small>有任何问题请联系  small_dorm@126.com</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                码上互联
            </div>
            <div class="col-md-6 text-right">
                <small>© 2019-2020</small>
            </div>
        </div>
    </div>
    {{--<div class="container-fluid">--}}
        {{--<div style="text-align: center;margin-top:100px;">--}}
            {{--<h2>宿舍管理</h2>--}}
        {{--</div>--}}
        {{--<div class="row" style="margin-top:10%;">--}}
            {{--<div class="form-horizontal">--}}
                {{--{{ csrf_field() }}--}}
                {{--<div class="form-group">--}}
                    {{--<label for="account" class="col-xs-2 col-xs-offset-1 col-md-4 col-md-offset-0 control-label">账号</label>--}}
                    {{--<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">--}}
                        {{--<input type="text" class="form-control" id="account" name="account" placeholder="请输入正确账号" required>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="password" class="col-xs-2 col-xs-offset-1 col-md-4 col-md-offset-0 control-label">密码</label>--}}
                    {{--<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">--}}
                        {{--<input type="password" class="form-control" id="password" name="password" placeholder="请输入正确密码" required>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="number" class="col-xs-2 col-xs-offset-1 col-md-4 col-md-offset-0 control-label">电话</label>--}}
                    {{--<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">--}}
                        {{--<input type="number" class="form-control" id="phone" name="phone" placeholder="请输入电话号" required>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group" style="text-align: center;">--}}
                    {{--<div class="col-md-offset-4 col-md-4 col-xs-10 col-xs-offset-1">--}}
                        {{--<a href="{{url('dorm_index')}}" class="btn btn-default" style="width:100px;float:left;color:#08aa30;">登录</a>--}}
                        {{--<button type="submit" class="btn btn-default J_submit" style="width:100px;float:right;color:#aa3400">注册</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}

@endsection
@section('js')
    @parent
    <script>
        //点击提交
        var is_submit = false;
        $('.J_submit').click(function(){
            if(is_submit){
                return false;
            }
            var account = $('#account').val();
            var password = $('#password').val();
            var phone = $('#phone').val();
            if(account == ''){
                swal('请输入账号！');
                return false;
            }
            if(password == ''){
                swal('请输入密码！');
                return false;
            }
            if(phone == ''){
                swal('请输入手机号！');
                return false;
            }
            is_submit = true;
            $.ajax({
                type:"post",
                url:'{{url('dorm_register')}}',
                dataType:"json",
                data:{
                    "account":account,
                    "password":password,
                    "phone":phone
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    if(data.code == 100){
                        swal("注册成功", "欢迎使用!", "success");
                        window.location.href = '{{url('dorm_home')}}';
                    }else{
                        swal(data.info);
                    }
                },
                complete:function(){
                    is_submit = false;
                }
            })
        });
    </script>
@endsection
