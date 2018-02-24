@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('root','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-2">
                <a href="/daoyou">
                    <div class="widget style1 navy-bg" style="background-color:#30487b">
                        <div class="row vertical-align">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-3x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h2 class="font-bold">导游</h2>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-2">
                <a href="">

                </a>
                <a href="/lxs">
                    <div class="widget style1 red-bg">
                        <div class="row vertical-align">
                            <div class="col-xs-3">
                                <i class="fa fa-university fa-3x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h3 class="font-bold">旅行社</h3>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-2">
                <a href="/meisi">
                    <div class="widget style1 navy-bg" style="background-color:yellow">
                        <div class="row vertical-align">
                            <div class="col-xs-3">
                                <i class="fa fa-cutlery fa-3x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h2 class="font-bold">美食</h2>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-2">
                <a href="/bibei">
                    <div class="widget style1 navy-bg">
                        <div class="row vertical-align">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-3x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h2 class="font-bold">必备</h2>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-2">
                <a href="/seying">
                    <div class="widget style1 navy-bg">
                        <div class="row vertical-align">
                            <div class="col-xs-3">
                                <i class="fa fa-camera fa-3x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h2 class="font-bold">摄影</h2>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-2">
                <a href="/gonglve">
                    <div class="widget style1 navy-bg">
                        <div class="row vertical-align">
                            <div class="col-xs-3">
                                <i class="fa fa-book fa-3x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h2 class="font-bold">攻略</h2>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-2">
                <a href="/more">
                    <div class="widget style1 navy-bg">
                        <div class="row vertical-align">
                            <div class="col-xs-3">
                                <i class="fa fa-sitemap fa-3x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h2 class="font-bold">更多</h2>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col-lg-2">
                <a href="/administrator">
                    <div class="widget style1 navy-bg">
                        <div class="row vertical-align">
                            <div class="col-xs-3">
                                <i class="fa fa-picture-o fa-3x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h3 class="font-bold">轮播图</h3>
                            </div>
                        </div>
                    </div>
                </a>

            </div>

            <div class="col-lg-2">
                <a href="/shopId">
                    <div class="widget style1 navy-bg">
                        <div class="row vertical-align">
                            <div class="col-xs-3">
                                <i class="fa fa-sitemap fa-3x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h3 class="font-bold">商户ID</h3>
                            </div>
                        </div>
                    </div>
                </a>

            </div>

        </div>
        <hr>
        <div class="row">
            <div class="col-lg-4">
                <div class="widget lazur-bg p-xl">

                    <h2>
                        Janet Smith
                    </h2>
                    <ul class="list-unstyled m-t-md">
                        <li>
                            <span class="fa fa-envelope m-r-xs"></span>
                            <label>Email:</label>
                            mike@mail.com
                        </li>
                        <li>
                            <span class="fa fa-home m-r-xs"></span>
                            <label>Address:</label>
                            Street 200, Avenue 10
                        </li>
                        <li>
                            <span class="fa fa-phone m-r-xs"></span>
                            <label>Contact:</label>
                            (+121) 678 3462
                        </li>
                    </ul>

                </div>
                <div class="widget red-bg p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-bell fa-4x"></i>
                        <h1 class="m-xs">47</h1>
                        <h3 class="font-bold no-margins">
                            Notification
                        </h3>
                        <small>We detect the error.</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget lazur-bg p-xl">

                    <h2>
                        Janet Smith
                    </h2>
                    <ul class="list-unstyled m-t-md">
                        <li>
                            <span class="fa fa-envelope m-r-xs"></span>
                            <label>Email:</label>
                            mike@mail.com
                        </li>
                        <li>
                            <span class="fa fa-home m-r-xs"></span>
                            <label>Address:</label>
                            Street 200, Avenue 10
                        </li>
                        <li>
                            <span class="fa fa-phone m-r-xs"></span>
                            <label>Contact:</label>
                            (+121) 678 3462
                        </li>
                    </ul>

                </div>
                <div class="widget red-bg p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-bell fa-4x"></i>
                        <h1 class="m-xs">47</h1>
                        <h3 class="font-bold no-margins">
                            Notification
                        </h3>
                        <small>We detect the error.</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget lazur-bg p-xl">

                    <h2>
                        Janet Smith
                    </h2>
                    <ul class="list-unstyled m-t-md">
                        <li>
                            <span class="fa fa-envelope m-r-xs"></span>
                            <label>Email:</label>
                            mike@mail.com
                        </li>
                        <li>
                            <span class="fa fa-home m-r-xs"></span>
                            <label>Address:</label>
                            Street 200, Avenue 10
                        </li>
                        <li>
                            <span class="fa fa-phone m-r-xs"></span>
                            <label>Contact:</label>
                            (+121) 678 3462
                        </li>
                    </ul>

                </div>
                <div class="widget red-bg p-lg text-center">
                    <div class="m-b-md">
                        <i class="fa fa-bell fa-4x"></i>
                        <h1 class="m-xs">47</h1>
                        <h3 class="font-bold no-margins">
                            Notification
                        </h3>
                        <small>We detect the error.</small>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js')
    @parent
@endsection
