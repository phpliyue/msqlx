<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @section('css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @show
    <title>@yield('title')</title>
</head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="@yield('nav1')">
                    <a href="/dorm_home"><i class="fa fa-home"></i> <span class="nav-label">概况统计</span></a>
                </li>
                <li class="@yield('nav2')">
                    <a href="/dorm_roomManage"><i class="fa fa-money"></i> <span class="nav-label">房间管理</span></a>
                </li>
                <li class="@yield('nav3')">
                    <a href="/dorm_getRooms"><i class="fa fa-diamond"></i> <span class="nav-label">房间信息</span></a>
                </li>
                {{--<li class="@yield('nav4')">--}}
                    {{--<a href="#"><i class="fa fa-diamond"></i> <span class="nav-label">Layouts</span></a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="/dorm_logout">
                            <i class="fa fa-sign-out"></i> 退出登入
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        @section('content')
        @show
    </div>
</div>

</body>
@section('js')
    <script src="{{URL::asset('js/jquery-2.1.1.js')}}"></script>
    <script src="{{URL::asset('js/app.js')}}"></script>
@show
</html>