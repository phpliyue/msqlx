@extends('base')
@section('css')
    @parent
    <style>
        body{
            background-color: #FEE918;
        }
    </style>
@show
@section('title','宿舍管理-登入')
@section('content')
    <div class="container-fluid">
        <div style="text-align: center;margin-top:100px;">
            <h2>宿舍管理</h2>
        </div>
        <div class="row" style="margin-top:10%;text-align:center;">
            <div class="form-horizontal">
                <div class="form-group">
                    <label for="account" class="col-xs-2 col-xs-offset-1 col-md-4 col-md-offset-0 control-label">账号</label>
                    <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
                        <input type="text" class="form-control" id="account" name="account" placeholder="请输入正确账号" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-xs-2 col-xs-offset-1 col-md-4 col-md-offset-0 control-label">密码</label>
                    <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0">
                        <input type="password" class="form-control" id="password" name="password" placeholder="请输入正确密码" required>
                    </div>
                </div>
                <div class="form-group" style="text-align: center;">
                    <div class="col-md-offset-4 col-md-4 col-xs-10 col-xs-offset-1">
                        <a href="{{url('dorm_register')}}" class="btn btn-default" style="width:100px;float:left;color:#aa3400">注册</a>
                        <button type="submit" class="btn btn-default J_submit" style="width:100px;float:right;color:#08aa30;">登入</button>
                    </div>
                </div>
            </div>
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
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
