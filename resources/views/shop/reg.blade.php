@extends('base')
@section('title','商品管理-注册')
@section('css')
    @parent
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown" style="margin-top:15%;">
        <div>
            <h3>商品管理</h3>
            <div class="form-group">
                <input type="account" class="form-control" placeholder="账号" required="" id="account">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="密码" required="" id="password">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b J_submit">注册</button>
        </div>
    </div>
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
                url:'{{url('shop_reg')}}',
                dataType:"json",
                data:{
                    "account":account,
                    "password":password
                },
                success:function(data){
                    if(data.code == 100){
                        swal("注册成功","", "success");
                        window.location.href = '{{url('shop_index')}}';
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
