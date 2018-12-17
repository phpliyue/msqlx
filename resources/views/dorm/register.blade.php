@extends('base')
@section('css')
    @parent
    <style>
        body{
            background-color: #FEE918;
        }
    </style>
@show
@section('title','宿舍管理-注册')
@section('content')
    <div class="container-fluid">
        <div style="text-align: center;margin-top:100px;">
            <h2>宿舍管理</h2>
        </div>
        <div class="row" style="margin-top:5%;">
            <form class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="account" class="col-md-4 control-label">账号</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="account" name="account" placeholder="请输入正确账号" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">密码</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" id="password" name="password" placeholder="请输入正确密码" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">电话</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" id="phone" name="phone" placeholder="请输入电话号" required>
                    </div>
                </div>
                <div class="form-group" style="text-align: center;">
                    <div class="col-md-offset-4 col-md-4">
                        <button type="submit" class="btn btn-default J_submit">注册</button>
                        <a href="{{url('dorm_index')}}" class="btn btn-default">登录</a>
                    </div>
                </div>
            </form>
        </div>

    </div>

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