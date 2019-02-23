<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('css')
        {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="{{URL::asset('css/font-awesome-4.7.0/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{URL::asset('css/plugins/summernote/summernote.css')}}" rel="stylesheet">
        {{--<link href="{{URL::asset('css/app.css')}}" rel="stylesheet">--}}
        <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
        <link href="{{URL::asset('css/animate.css')}}" rel="stylesheet">
        {{--<link href="{{URL::asset('css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">--}}
        <link href="{{URL::asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
        <style>
            th,tr{
                text-align:center;
            }
        </style>
    @show
    <title>@yield('title')</title>
</head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="@yield('nav1')">
                    <a href="/dorm_home"><i class="fa fa-pie-chart"></i> <span class="nav-label">概况统计</span></a>
                </li>
                <li class="@yield('nav2')">
                    <a href="/dorm_roomManage"><i class="fa fa-home"></i> <span class="nav-label">房间管理</span></a>
                </li>
                <li class="@yield('nav3')">
                    <a href="/dorm_getRoom"><i class="fa fa-hotel"></i> <span class="nav-label">入住管理</span></a>
                </li>
                <li class="@yield('nav4')">
                    <a href="/dorm_adjustRoom"><i class="fa fa-random"></i> <span class="nav-label">房间调整</span></a>
                </li>
                <li class="@yield('nav5')">
                    <a href="/dorm_roomRepair"><i class="fa fa-wrench"></i> <span class="nav-label">宿舍报修</span></a>
                </li>
                <li class="@yield('nav6')">
                    <a href="/dorm_outReg"><i class="fa fa-user-secret"></i> <span class="nav-label">外来人员登记</span></a>
                </li>
                <li class="@yield('nav7')">
                    <a href="/dorm_noticeManage"><i class="fa fa-volume-down "></i> <span class="nav-label">公告管理</span></a>
                </li>
                <li class="@yield('nav8')">
                    <a href="/dorm_entryNotice"><i class="fa fa-bell"></i> <span class="nav-label">入住须知</span></a>
                </li>
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
                        <span class="m-r-sm text-muted welcome-message">{{session()->get('dorm_account')}}</span>
                    </li>



                    <li>
                        <a href="/dorm_logout">
                            <i class="fa fa-sign-out"></i> 退出
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
    <script src="{{URL::asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{URL::asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{URL::asset('js/inspinia.js')}}"></script>
    <script src="{{URL::asset('js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/summernote/summernote.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/footable/footable.all.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@show
</html>