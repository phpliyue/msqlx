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
            background: -webkit-gradient(linear, left top, right top, from(#ff745f), to(#90f9fe));
            background: linear-gradient(90deg, #ff745f, #90f9fe)
        }
    </style>
    @endsection
@section('title','码上互联')
@section('header')
    <div class="navbar navbar--extended">
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
            {{--<div class="navbar__inner">--}}
                {{--<a href="#" class="navbar__logo">Logo</a>--}}
                {{--<nav class="navbar__menu">--}}
                    {{--<ul>--}}
                        {{--<li><a href="#">Option</a></li>--}}
                        {{--<li><a href="#">Option 2</a></li>--}}
                    {{--</ul>--}}
                {{--</nav>--}}
                {{--<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>--}}
            {{--</div>--}}
        </div>
    </div>
    <div class="page__header">
        <div class="hero__overlay new__overlay--gradient"></div>
        <div class="hero__mask"></div>
        <div class="page__header__inner">
            <div class="container">
                <div class="page__header__content">
                    <div class="page__header__content__inner" id='navConverter'>
                        <h1 class="page__header__title">Multi-purpose page</h1>
                        <p class="page__header__text">This is mostly a simple layout, rather than a complete page unlike the others. However this is a really useful starting point for anything you want to create.</p>
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
                        <li><a href="#" class="vMenu--active">Active page</a></li>
                        <li><a href="#">Second page</a></li>
                        <li><a href="#">Third page</a></li>
                        <li><a href="#">Fourth page</a></li>
                        <li><a href="#">Fifth page</a></li>
                    </ul>
                </div>
                <div class="page__main">
                    <div class="text-container">
                        <h3 class="page__main__title">This is the main area</h3>
                        <p>Write or do whatever you want here!</p>
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
@endsection




