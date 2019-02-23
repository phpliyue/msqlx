@extends('base')
@section('css')
    {{--@parent--}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        body{
            background-color: #e0fbfe;
        }
    </style>
@show
@section('title','宿舍管理-登入')
@section('content')
    {{--<body class="gray-bg">--}}

    <div class="loginColumns animated fadeInDown" style="background-color:#e0fbfe ">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">欢迎使用 小宿舍</h2>

                <p>
                    小宿舍是一款多平台管理企业宿舍,酒店,学校宿舍,公寓的高效可视化工具.
                </p>

                <p>
                    利用社交平台微信,工作平台钉钉等常用工具进行有效管理,优点有覆盖面广,操作简单,可以简单有效的进行管理.
                </p>

                {{--<p>--}}
                    {{--<img src="/img/dorm_wx.jpg" style="height:150px;width:40%;float:left;">--}}
                    {{--<img src="/img/dorm_wx.jpg" style="height:150px;width:40%;float:right;">--}}
                {{--</p>--}}


            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    {{--<form class="m-t" role="form" action="index.html">--}}
                        <div class="form-group">
                            <input type="text" class="form-control" id="account" name="account" placeholder="账号" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="密码" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b J_submit">登入</button>

                        <a href="#">
                            <small>忘记密码?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>如果你还没有账户?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="{{url('dorm_register')}}">创建新账户</a>
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
        {{--<div class="row" style="margin-top:10%;text-align:center;">--}}
            {{--<div class="form-horizontal">--}}
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
                {{--<div class="form-group" style="text-align: center;">--}}
                    {{--<div class="col-md-offset-4 col-md-4 col-xs-10 col-xs-offset-1">--}}
                        {{--<a href="{{url('dorm_register')}}" class="btn btn-default" style="width:100px;float:left;color:#aa3400">注册</a>--}}
                        {{--<button type="submit" class="btn btn-default J_submit" style="width:100px;float:right;color:#08aa30;">登入</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}

@endsection
@section('js')
    @parent
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //点击提交
        var is_submit = false;
        $('.J_submit').click(function(){
            if(is_submit){
                return false;
            }
            var account = $('#account').val();
            var password = $('#password').val();
            if(account == ''){
                swal('请输入账号！');
                return false;
            }
            if(password == ''){
                swal('请输入密码！');
                return false;
            }
            is_submit = true;
            $.ajax({
                type:"POST",
                url:'{{url('dorm_login')}}',
                dataType:"json",
                data:{
                    "account":account,
                    "password":password
                },
                success:function(data){
                    if(data.code == 100){
                        swal("登入成功", "欢迎回来!", "success");
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