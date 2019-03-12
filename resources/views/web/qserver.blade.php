@extends('web.temp')
@section('meta')
    @parent
@endsection
@section('link')
    @parent
@endsection
@section('style')
    <style>
        .iserver__overlay--gradient {
            background: -webkit-gradient(linear, left top, right top, from(#0e1a54), to(#c59b6a));
            background: linear-gradient(90deg, #0e1a54, #c59b6a)
        }

        .navbar {
            position: fixed;
            z-index: 100;
            width: 100%;
            background-color: #0e1a54;
            -webkit-transition: .7s;
            transition: .7s
        }
        .navbar--extended {
            background-color: transparent;
        }
    </style>
@endsection
@section('title','码上互联-商企服务')
@section('header')
    {{--@parent--}}
    <div class="navbar navbar--extended">
        <nav class="nav__mobile"></nav>
        <div class="container">
            <div class="navbar__inner">
                <a href="/" class="navbar__logo">码上互联</a>
                <nav class="navbar__menu">
                    <ul>
                        {{--<li><a href="/web_new">关于</a></li>--}}
                        {{--<li><a href="/web_xss">小宿舍</a></li>--}}
                        {{--<li><a href="/login">登入</a></li>--}}
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
    <div class="page__header">
        <div class="hero__overlay iserver__overlay--gradient"></div>
        <div class="hero__mask"></div>
        <div class="page__header__inner">
            <div class="container">
                <div class="page__header__content">
                    <div class="page__header__content__inner" id='navConverter'>
                        <h1 class="page__header__title">商企服务</h1>
                        <p class="page__header__text"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="page">
        <div class="container">
            <div class="page__inner">
                <div class="page__menu">
                    <ul class="vMenu">
                        <li><a href="#" class="vMenu--active menu1">企业登记与注册</a></li>
                        <li><a href="#" class="menu2">税务相关</a></li>
                        <li><a href="#" class="menu3">政策前沿</a></li>
                        <li><a href="#" class="menu4">服务代办</a></li>
                        <li><a href="#" class="menu5">注意事项</a></li>
                    </ul>
                </div>
                <div class="page__main">
                    <div class="text-container doc1">
                        <h3 class="page__main__title">企业登记与注册</h3>
                        <p>--暂无介绍--</p>
                    </div>
                    <div class="text-container doc2">
                        <h3 class="page__main__title">税务相关</h3>
                        <p>--暂无介绍--</p>
                    </div>
                    <div class="text-container doc3">
                        <h3 class="page__main__title">政策前沿</h3>
                        <p>--暂无介绍--</p>
                    </div>
                    <div class="text-container doc4">
                        <h3 class="page__main__title">服务代办</h3>
                        <p>--暂无介绍--</p>
                    </div>
                    <div class="text-container doc5">
                        <h3 class="page__main__title">注意事项</h3>
                        <p>--暂无介绍--</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--@parent--}}
@endsection
@section('footer')
    @parent
@endsection
@section('js')
    @parent
    <script>
        $(document).ready(function(){
            $('.doc2,.doc3,.doc4,.doc5').hide();
            $('.menu1').click(function(){
                $('.menu2').attr('class','menu2');
                $('.menu3').attr('class','menu3');
                $('.menu4').attr('class','menu4');
                $('.menu5').attr('class','menu5');
                $(this).attr('class','menu1 vMenu--active');
                $('.doc2,.doc3,.doc4,.doc5').hide();
                $('.doc1').show();
            });
            $('.menu2').click(function(){
                $('.menu1').attr('class','menu1');
                $('.menu3').attr('class','menu3');
                $('.menu4').attr('class','menu4');
                $('.menu5').attr('class','menu5');
                $(this).attr('class','menu2 vMenu--active');
                $('.doc1,.doc3,.doc4,.doc5').hide();
                $('.doc2').show();
            });
            $('.menu3').click(function(){
                $('.menu1').attr('class','menu1');
                $('.menu2').attr('class','menu2');
                $('.menu4').attr('class','menu4');
                $('.menu5').attr('class','menu5');
                $(this).attr('class','menu3 vMenu--active');
                $('.doc1,.doc2,.doc4,.doc5').hide();
                $('.doc3').show();
            });
            $('.menu4').click(function(){
                $('.menu1').attr('class','menu1');
                $('.menu2').attr('class','menu2');
                $('.menu3').attr('class','menu3');
                $('.menu5').attr('class','menu5');
                $(this).attr('class','menu4 vMenu--active');
                $('.doc1,.doc2,.doc3,.doc5').hide();
                $('.doc4').show();
            });
            $('.menu5').click(function(){
                $('.menu1').attr('class','menu1');
                $('.menu2').attr('class','menu2');
                $('.menu4').attr('class','menu4');
                $('.menu3').attr('class','menu3');
                $(this).attr('class','menu5 vMenu--active');
                $('.doc1,.doc2,.doc4,.doc3').hide();
                $('.doc5').show();
            });
        })
    </script>
@endsection




