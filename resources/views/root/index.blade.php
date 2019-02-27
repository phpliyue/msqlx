@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('root','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4">
                <div class="col-lg-12">
                    <a href="folders">
                        <div class="widget style1 navy-bg" style="background-color:#30487b">
                            <div class="row vertical-align">
                                <div class="col-xs-3">
                                    <i class="fa fa-file fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h3 class="font-bold">素材管理</h3>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="col-lg-12">
                    <a href="">

                    </a>
                    <a href="snowball">
                        <div class="widget style1 red-bg">
                            <div class="row vertical-align">
                                <div class="col-xs-3">
                                    <i class="fa fa-university fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h3 class="font-bold">雪球社区设置</h3>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="col-lg-12">
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
                <div class="col-lg-12">
                    <a href="">
                    </a>
                    <a href="dorm">
                        <div class="widget style1 red-bg">
                            <div class="row vertical-align">
                                <div class="col-xs-3">
                                    <i class="fa fa-university fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h3 class="font-bold">小宿舍设置</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-12">
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
                <div class="col-lg-12">
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
                <div class="col-lg-12">
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
                <div class="col-lg-12">
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
                <div class="col-lg-12">
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

                <div class="col-lg-12">
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
            <div class="col-lg-8" style="background-color:white;">

            </div>
        </div>
        {{--<hr>--}}
    </div>
@endsection

@section('js')
    @parent
@endsection
