@extends('base')
@section('css')
    @parent
@show
@section('title','宿舍管理-登入')
@section('content')
    <div class="container-fluid">
        <div style="text-align: center;margin-top:100px;">
            <h2>宿舍管理</h2>
        </div>
        <div class="row" style="margin-top:5%;">
            <form class="form-horizontal" method="POST">
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
                <div class="form-group" style="text-align: center;">
                    <div class="col-md-offset-4 col-md-4">
                        <button type="submit" class="btn btn-default J_submit">登入</button>
                        <a href="{{url('dorm_register')}}" class="btn btn-default">注册</a>
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
            if(account == ''){
                alert('请输入账号！');
                return false;
            }
            if(password == ''){
                alert('请输入密码！');
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
                        window.location.href = '{{url('dorm_home')}}';
                    }else{
                        alert(data.info);
                    }
                },
                complete:function(){
                    is_submit = false;
                }
            })
        });
    </script>
@endsection