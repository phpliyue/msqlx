@extends('web.temp')
@section('meta')
    @parent
@endsection
@section('link')
    @parent
@endsection
@section('style')
    <style>
        .qserver__overlay--gradient {
            background: -webkit-gradient(linear, left top, right top, from(#51c332), to(#51c332));
            background: linear-gradient(90deg, #51c332, #51c332)
        }

        .navbar {
            position: fixed;
            z-index: 100;
            width: 100%;
            background-color: #51c332;
            -webkit-transition: .7s;
            transition: .7s
        }
        .navbar--extended {
            background-color: transparent;
        }
    </style>
@endsection
@section('title','码上互联-雪球社区')
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
        <div class="hero__overlay qserver__overlay--gradient"></div>
        <div class="hero__mask"></div>
        <div class="page__header__inner">
            <div class="container">
                <div class="page__header__content">
                    <div class="page__header__content__inner" id='navConverter'>
                        <h1 class="page__header__title">雪球社区</h1>
                        <p class="page__header__text">连接你我他，幸福千万家。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="page" style="height:100vh;">
        <div class="container">
            <div class="page__inner">
                <div class="page__menu">
                    <ul class="vMenu">
                        <li><a href="#" class="menu1 vMenu--active">产品介绍</a></li>
                        <li><a href="#" class="menu2">服务理念与宗旨</a></li>
                        <li><a href="#" class="menu3">合作与运营</a></li>
                    </ul>
                </div>
                <div class="page__main">
                    <div class="text-container doc1">
                        <h3 class="page__main__title">产品介绍</h3>
                        <p>--暂无介绍--</p>
                    </div>
                    <div class="text-container doc2">
                        <h3 class="page__main__title">服务理念与宗旨</h3>
                        <p>--暂无介绍--</p>
                    </div>
                    <div class="text-container doc3">
                        <h3 class="page__main__title">合作与运营</h3>
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
            $('.doc2,.doc3').hide();
            $('.menu1').click(function(){
                $('.menu2').attr('class','menu2');
                $('.menu3').attr('class','menu3');
                $(this).attr('class','menu1 vMenu--active');
                $('.doc2,.doc3').hide();
                $('.doc1').show();
            });
            $('.menu2').click(function(){
                $('.menu1').attr('class','menu1');
                $('.menu3').attr('class','menu3');
                $(this).attr('class','menu2 vMenu--active');
                $('.doc1,.doc3').hide();
                $('.doc2').show();
            });
            $('.menu3').click(function(){
                $('.menu1').attr('class','menu1');
                $('.menu2').attr('class','menu2');
                $(this).attr('class','menu3 vMenu--active');
                $('.doc1,.doc2').hide();
                $('.doc3').show();
            })
        })
    </script>
@endsection




