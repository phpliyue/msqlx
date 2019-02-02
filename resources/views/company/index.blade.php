{{--@extends('company.temp')--}}
{{--@section('meta')--}}
        {{--@parent--}}
    {{--@endsection--}}
{{--@section('link')--}}
        {{--@parent--}}
    {{--@endsection--}}
{{--@section('title','码上互联')--}}
{{--@section('header')--}}
    {{--@endsection--}}
{{--@section('content')--}}
        {{--@parent--}}
    {{--@endsection--}}
{{--@section('footer')--}}
    {{--@endsection--}}
{{--@section('js')--}}
        {{--@parent--}}
    {{--@endsection--}}
        <!DOCTYPE html>
<html lang='en'>
<head>
    <meta class="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>沈阳市码上互联网信息服务有限公司</title>
    <!-- Don't forget to add your metadata here -->
    <link rel='stylesheet' href='{{URL::asset('style.min.css')}}' />
</head>
<body>
<!-- Hero(extended) navbar -->
<div class="navbar navbar--extended">
    <nav class="nav__mobile"></nav>
    <div class="container">
        <div class="navbar__inner">
            <a href="/" class="navbar__logo">码上互联</a>
            <nav class="navbar__menu">
                <ul>
                    <li><a href="#">关于</a></li>
                    <li><a href="#">注册</a></li>
                    <li><a href="#">登入</a></li>
                </ul>
            </nav>
            <div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
        </div>
    </div>
</div>
<!-- Hero unit -->
<div class="hero">
    <div class="hero__overlay hero__overlay--gradient"></div>
    <div class="hero__mask"></div>
    <div class="hero__inner">
        <div class="container">
            <div class="hero__content">
                <div class="hero__content__inner" id='navConverter'>
                    <h1 class="hero__title">A production-ready theme for your projects</h1>
                    <p class="hero__text">Evie is an MIT licensed template bundled with a minimal style guide to build websites faster. It is extemely lightweight, customizable and works perfectly on modern browsers.</p>
                    <a href="#" class="button button__accent">Download Evie</a>
                    <a href="#" class="button hero__button">Learn more</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hero__sub">
		<span id="scrollToNext" class="scroll">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class='hero__sub__down' fill="currentColor" width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><path d="M256,298.3L256,298.3L256,298.3l174.2-167.2c4.3-4.2,11.4-4.1,15.8,0.2l30.6,29.9c4.4,4.3,4.5,11.3,0.2,15.5L264.1,380.9c-2.2,2.2-5.2,3.2-8.1,3c-3,0.1-5.9-0.9-8.1-3L35.2,176.7c-4.3-4.2-4.2-11.2,0.2-15.5L66,131.3c4.4-4.3,11.5-4.4,15.8-0.2L256,298.3z"/></svg>
		</span>
</div>
<!-- Steps -->
<div class="steps landing__section">
    <div class="container">
        <h2>我们能提供什么服务与产品?</h2>
        <p>下面是我们能为你提供优质的服务于产品,我们还不会不断提供新的服务.敬请期待!</p>
    </div>
    <div class="container">
        <div class="steps__inner">
            <div class="step">
                <div class="step__media">
                    {{--<img src="{{URL::asset('company/img/undraw_designer.svg')}}" class="step__image">--}}
                    <img src="{{URL::asset('company/img/server1.svg')}}" class="step__image">
                </div>
                <h4>技术服务</h4>
                <p class="step__text">我们提供企业网站建站,小程序制作,技术咨询服务.</p>
            </div>
            <div class="step">
                <div class="step__media">
                    <a href=""><img src="{{URL::asset('company/img/server2.svg')}}" class="step__image"></a>
                </div>
                <h4><a href="#" class="link">雪球社区</a></h4>
                <p class="step__text">雪球社区是一个专注为居民提供便利服务,解决问题的平台.</p>
            </div>
            <div class="step">
                <div class="step__media">
                    <img src="{{URL::asset('company/img/server3.svg')}}" class="step__image">
                </div>
                <h4>商企服务</h4>
                <p class="step__text">我们将提供一站式的商企服务,助力每一位创业者.</p>
            </div>
        </div>
    </div>
</div>
<!-- Expanded sections -->
<div class="expanded landing__section">
    <div class="container">
        <div class="expanded__inner">
            <div class="expanded__media">
                <img src="{{URL::asset('company/img/undraw_browser.svg')}}" class="expanded__image">
            </div>
            <div class="expanded__content">
                <h2 class="expanded__title">Natural styling with almost nothing to learn</h2>
                <p class="expanded__text">Evie brings you the pages you'll need and the structure to create your own, without a learning curve. It is minimal and mostly styles plain elements. There are only a few classes you'll need to know but nothing to disrupt your preferred coding style.</p>
            </div>
        </div>
    </div>
</div>
<div class="expanded landing__section">
    <div class="container">
        <div class="expanded__inner">
            <div class="expanded__media">
                <img src="{{URL::asset('company/img/undraw_frameworks.svg')}}" class="expanded__image">
            </div>
            <div class="expanded__content">
                <h2 class="expanded__title">Framework agnostic. Your front-end setup, your choice.</h2>
                <p class="expanded__text">Evie has zero dependencies and uses vanilla JavaScript for a few functions with minimal footprint. You can use React, Vue, Angular, jQuery or whatever you prefer.</p>
            </div>
        </div>
    </div>
</div>
<div class="expanded landing__section">
    <div class="container">
        <div class="expanded__inner">
            <div class="expanded__media">
                <img src="{{URL::asset('company/img/together.svg')}}" class="expanded__image">
            </div>
            <div class="expanded__content">
                <h2 class="expanded__title">Ready for production or rapid prototyping</h2>
                <p class="expanded__text">Landing, authentication and a few other pages to select from, despite the small size. Tested on production at unDraw with amazing speeds and unopinionated on how to structure your project. We really hope you'll find it awesome and useful!</p>
            </div>
        </div>
    </div>
</div>
<!-- Call To Action -->
<div class="cta cta--reverse">
    <div class="container">
        <div class="cta__inner">
            <h2 class="cta__title">Get started now</h2>
            <p class="cta__sub cta__sub--center">Grab the production version and begin your project instantly.</p>
            <a href="#" class="button button__accent">Download Evie</a>
        </div>
    </div>
</div>
<!-- Footer -->
<div class="footer footer--dark">
    <div class="container">
        <div class="footer__inner">
            <a href="index.html" class="footer__textLogo">Evie theme</a>
            <div class="footer__data">
                <div class="footer__data__item">
                    <div class="footer__row">
                        Created by <a href="https://twitter.com/ninalimpi" target="_blank" class="footer__link">Katerina Limpitsouni</a>
                    </div>
                    <div class="footer__row">
                        Code/design by <a href="https://twitter.com/anges244" target="_blank" class="footer__link">Aggelos Gesoulis</a>
                    </div>
                </div>
                <div class="footer__data__item">
                    <div class="footer__row">Created for <a href="https://undraw.co" target="_blank" class="footer__link">unDraw</a>
                    </div>
                    <div class="footer__row">Special thx to <a href="https://shareboost.co" target="_blank" class="footer__link">ShareBoost</a> for the support
                    </div>
                </div>
                <div class="footer__data__item">
                    <div class="footer__row">
                        <a href="/dorm_index" target="_blank" class="footer__link">宿舍管理</a>
                    </div>
                    <div class="footer__row">
                        <a href="https://twitter.com/undraw_co" target="_blank" class="footer__link">Twitter</a>
                    </div>
                    <div class="footer__row">
                        <a href="https://www.facebook.com/undraw.co/" target="_blank" class="footer__link">Facebook</a>
                    </div>
                    <div class="footer__row">
                        <a href="./additional.html" class="footer__link">MIT license</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src='{{URL::asset('company/js/app.min.js')}}'></script>
</body>
</html>