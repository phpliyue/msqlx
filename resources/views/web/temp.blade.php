<!DOCTYPE html>
<html lang='en'>
<head>
    @section('meta')
        <meta class="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @show
    @section('link')

            <link href="{{URL::asset('css/font-awesome-4.7.0/css/font-awesome.css')}}" rel="stylesheet">
        <link rel='stylesheet' href='{{URL::asset('web/css/style.min1.css')}}'/>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
                            <li><a href="{{url('')}}">首页</a></li>
                            <li><a href="#iserver">技术服务</a></li>
                            <li><a href="#xserver">雪球社区</a></li>
                            <li><a href="#qserver">商企服务</a></li>
                            <li><a href="#xss">小宿舍</a></li>
                            {{--<li><a href="/web_new">关于</a></li>--}}
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
        <div class="hero__overlay hero__overlay--gradient"></div>
        <div class="hero__mask"></div>
        <div class="hero__inner">
            <div class="container">
                <div class="hero__content">
                    <div class="hero__content__inner" id='navConverter'>
                        <h1 class="hero__title">创新改变世界，齐心改变未来。</h1>
                        <p class="hero__text">深化企业互联网思想，加强企业互联网建设。依靠信息技术手段，推进信息资源整合共享、互联互通。</p>
                        {{--<a href="#" class="button button__accent">合作</a>--}}
                        {{--<a href="#" class="button hero__button">更多</a>--}}
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
            <a href="index.html" class="footer__textLogo" style="min-width: 10%;">产品</a>
            <div class="footer__data">
                <div class="footer__data__item">
                    <div class="footer__row">
                        小程序系列
                    </div>
                    <div class="footer__row">
                        <a href="https://mp.weixin.qq.com/cgi-bin/wx" target="_blank" class="footer__link">微信小程序</a>
                    </div>
                    <div class="footer__row">
                        <a href="https://open.alipay.com/channel/miniIndex.htm" target="_blank" class="footer__link">支付宝小程序</a>
                    </div>
                    <div class="footer__row">
                        <a href="https://smartprogram.baidu.com/developer/index.html" target="_blank" class="footer__link">百度小程序</a>
                    </div>
                </div>
                <div class="footer__data__item">
                    <div class="footer__row">
                        企业办公
                    </div>
                    <div class="footer__row">
                        <a href="/" target="_blank" class="footer__link">企业网站</a>
                    </div>
                    <div class="footer__row">
                        <a href="https://open-doc.dingtalk.com/microapp/bgb96b/rgoiql" target="_blank" class="footer__link">钉钉E应用</a>
                    </div>
                    <div class="footer__row">
                        <a href="https://open-doc.dingtalk.com/docs/doc.htm?spm=a219a.7629140.0.0.hUdcOY&docType=1&articleId=107758" target="_blank" class="footer__link">钉钉微应用</a>
                    </div>
                </div>
                <div class="footer__data__item">
                    <div class="footer__row">
                        商企服务
                    </div>
                    <div class="footer__row">
                        <a href="/" target="_blank" class="footer__link">公司注册登记</a>
                    </div>
                    <div class="footer__row">
                        <a href="/" target="_blank" class="footer__link">财务代账</a>
                    </div>
                    <div class="footer__row">
                        <a href="/" target="_blank" class="footer__link">业务代办</a>
                    </div>
                </div>
                <div class="footer__data__item">
                    <div class="footer__row">
                        服务便民
                    </div>
                    <div class="footer__row">
                        <a href="/" target="_blank" class="footer__link">雪球社区</a>
                    </div>
                    <div class="footer__row">
                        <a href="/web_xss" target="_blank" class="footer__link">小宿舍</a>
                    </div>
                    <div class="footer__row">
                        {{--<a href="/" target="_blank" class="footer__link">码上趣回收</a>--}}
                    </div>
                    <div class="footer__row">
                        {{--<a href="/" target="_blank" class="footer__link">码上去旅行</a>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__inner">
            <a href="index.html" class="footer__textLogo" style="min-width: 10%;">联系方式</a>
            <div class="footer__data">
                <div class="footer__data__item">
                    <div class="footer__row">
                        电话　17341034610（任女士)
                    </div>
                </div>
                <div class="footer__data__item">
                    <div class="footer__row">
                        邮箱　msqlx_services@163.com
                    </div>
                </div>
                <div class="footer__data__item">
                    <div class="footer__row">
                        微信　msrenly2018
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center;"><a rel="nofollow" href="http://www.beian.miit.gov.cn/" target="_blank">辽ICP备17019287号-1</a>  &nbsp;&nbsp;&nbsp;©2020 www.msqlx.com </div>
    </div>
</div>
@show
@section('js')
    <script src='{{URL::asset('web/js/app.min.js')}}'></script>
    <script src="{{URL::asset('js/plugins/switchery/switchery.js')}}"></script>
    <script src="{{URL::asset('js/jquery-2.1.1.js')}}"></script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?cce6451dfa3cbde087633b85cdd3539c";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
@show
</body>
</html>





