@extends('web.temp')
@section('meta')
    @parent
@endsection
@section('link')
    @parent
@endsection
@section('style')
    <style>
        .new__overlay--gradient {
            background: -webkit-gradient(linear, left top, right top, from(#ff7e77), to(#36fe29));
            background: linear-gradient(90deg, #ff7e77, #1efe67)
        }
    </style>
@endsection
@section('title','码上互联')
@section('header')
    <div class="navbar">
        <nav class="nav__mobile"></nav>
        <div class="container">
            <div class="navbar__inner">
                <a href="/" class="navbar__logo">码上互联</a>
                <nav class="navbar__menu">
                    <ul>
                        <li><a href="/web_new">关于</a></li>
                        <li><a href="/web_xss">小宿舍</a></li>
                        <li><a href="/login">登入</a></li>
                    </ul>
                </nav>
                <div class="navbar__menu-mob"><a href="" id='toggle'>
                        <svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor"
                                  d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"
                                  class=""></path>
                        </svg>
                    </a></div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="auth">
        <div class="container">
            <div class="auth__inner">
                <div class="auth__media">
                    <img src="{{URL::asset('web/img/R.svg')}}">
                </div>
                <div class="auth__auth">
                    <h1 class="auth__title">欢迎注册小宿舍</h1>
                    <p>为您提供简单高效宿舍管理工具。</p>
                    <label>用户名</label>
                    <input type="text" class="form-control" id="account" name="account" placeholder="请输入正确账号" required>
                    <label>密码</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="请输入正确密码" required>
                    <label>电话</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="请输入电话号" required>
                    <a href="/web_xss" style="margin-right:10px;"><button class="button button__warning">登入</button>　</a>
                    <button type='submit' class="button button__accent J_submit">注册</button>
                </div>
            </div>
        </div>
    </div>

    {{--@parent--}}
@endsection
@section('footer')

@endsection
@section('js')
    @parent
    <script src="{{URL::asset('js/jquery-2.1.1.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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




