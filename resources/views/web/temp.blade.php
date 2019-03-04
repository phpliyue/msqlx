<!DOCTYPE html>
<html lang='en'>
<head>
    @section('meta')
        <meta class="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @show
    @section('link')
        <link rel='stylesheet' href='{{URL::asset('web/css/style.min1.css')}}'/>
@show
@section('style')
@show
<!-- Site Title -->
    <title>@yield('title')</title>
</head>
<body>
@section('header')
    <!-- Hero unit -->
    <div class="hero">
        <div class="navbar navbar--extended">
            <nav class="nav__mobile"></nav>
            <div class="container">
                <div class="navbar__inner">
                    <a href="/" class="navbar__logo">码上互联</a>
                    <nav class="navbar__menu">
                        <ul>
                            <li><a href="/web_new">关于</a></li>
                            <li><a href="/web_xss">小宿舍</a></li>
                            {{--<li><a href="/dorm_index">小宿舍</a></li>--}}
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
        <div class="hero__overlay hero__overlay--gradient"></div>
        <div class="hero__mask"></div>
        <div class="hero__inner">
            <div class="container">
                <div class="hero__content">
                    <div class="hero__content__inner" id='navConverter'>
                        <h1 class="hero__title">创新改变世界，齐心改变未来。</h1>
                        <p class="hero__text">让人生体现价值，让社会富有责任，让我们齐心协力，振兴东北，不喊空口号，撸起袖子加油干。劳动创造美好未来永不过时。</p>
                        <a href="#" class="button button__accent">合作</a>
                        <a href="#" class="button hero__button">更多</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@show

@section('content')

@show
@section('footer')
<div class="footer footer--dark">
    <div class="container">
        <div class="footer__inner">
            <a href="index.html" class="footer__textLogo">xxxxxx</a>
            <div class="footer__data">
                <div class="footer__data__item">
                    <div class="footer__row">
                        {{--Created by <a href="https://twitter.com/ninalimpi" target="_blank" class="footer__link">Katerina Limpitsouni</a>--}}
                    </div>
                    <div class="footer__row">
                        {{--Code/design by <a href="https://twitter.com/anges244" target="_blank" class="footer__link">Aggelos Gesoulis</a>--}}
                    </div>
                </div>
                <div class="footer__data__item">
                    <div class="footer__row">xxxxxxxxxxxxxx <a href="/" target="_blank" class="footer__link">xxxxxx</a>
                    </div>
                    <div class="footer__row">xxxxxxxxxxxxxx <a href="/" target="_blank" class="footer__link">xxxxxx</a>
                        xxxxxx
                    </div>
                </div>
                <div class="footer__data__item">
                    <div class="footer__row">
                        <a href="/dorm_index" target="_blank" class="footer__link">宿舍管理</a>
                    </div>
                    <div class="footer__row">
                        <a href="/" target="_blank" class="footer__link">xxxxxxxxxxxxxx</a>
                    </div>
                    <div class="footer__row">
                        <a href="/" target="_blank" class="footer__link">xxxxxxxxxxxxxx</a>
                    </div>
                    <div class="footer__row">
                        <a href="/" class="footer__link">xxxxxx</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@show
@section('js')
    <script src='{{URL::asset('web/js/app.min.js')}}'></script>
@show

</body>
</html>





