@extends('dorm.dormTemp')
@section('css')
    <link href="{{URL::asset('css/plugins/c3/c3.min.css')}}" rel="stylesheet">
    @parent
@show
@section('title','宿舍管理')
@section('nav1','active')
@section('content')
    <div class="row" style="margin-top:15px;">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{--<span class="label label-success pull-right">Monthly</span>--}}
                    <h5>今日入住(移动端)</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$nowData['inMobile']}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{--<span class="label label-success pull-right">Monthly</span>--}}
                    <h5>今日退房(移动端)</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$nowData['outMobile']}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{--<span class="label label-success pull-right">Monthly</span>--}}
                    <h5>今日入住(PC端)</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$nowData['inPC']}}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{--<span class="label label-success pull-right">Monthly</span>--}}
                    <h5>今日退房(PC端)</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{$nowData['inPC']}}</h1>
                </div>
            </div>
        </div>
        {{--<div class="col-lg-4">--}}
            {{--<div class="ibox float-e-margins">--}}
                {{--<div class="ibox-title">--}}
                    {{--<span class="label label-success pull-right">Monthly</span>--}}
                    {{--<h5>待定</h5>--}}
                {{--</div>--}}
                {{--<div class="ibox-content">--}}
                    {{--<h1 class="no-margins">40 886,200</h1>--}}
                    {{--<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>--}}
                    {{--<small>Total income</small>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>入住男女比例</h5>
                </div>
                <div class="ibox-content">
                    <div class="flot-chart">
                        <div class="flot-chart-pie-content" id="sex"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>入住人数占比</h5>
                </div>
                <div class="ibox-content">
                    <div class="flot-chart">
                        <div class="flot-chart-pie-content" id="num"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Bar Chart Example <small>With custom colors.</small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-bar-chart"></div>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="col-lg-4">--}}
            {{--<div class="ibox float-e-margins">--}}
                {{--<div class="ibox-title">--}}
                    {{--<h5>Pie </h5>--}}

                {{--</div>--}}
                {{--<div class="ibox-content">--}}
                    {{--<div>--}}
                        {{--<div id="stocked"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-lg-4">--}}
            {{--<div class="ibox float-e-margins">--}}
                {{--<div class="ibox-title">--}}
                    {{--<span class="label label-success pull-right">{{$sexData['sexMan']}}　人</span>--}}
                    {{--<span class="label label-warning pull-right">{{$sexData['sexWom']}}　人</span>--}}
                    {{--<h5>入住比例</h5>--}}
                    {{--<div class="ibox-tools　pull-right">--}}
                        {{--<a class="collapse-link">--}}
                            {{--<i class="fa fa-chevron-up"></i>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="ibox-content">--}}
                    {{--<div>--}}
                        {{--<div id="nn"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-lg-4">--}}
            {{--<div class="ibox float-e-margins">--}}
                {{--<div class="ibox-title">--}}
                    {{--<span class="label label-success pull-right">{{$numData['num1']}}　人</span>--}}
                    {{--<span class="label label-warning pull-right">{{$numData['num0']}}　人</span>--}}
                    {{--<h5>入住人数占比</h5>--}}
                    {{--<div class="ibox-tools　pull-right">--}}
                        {{--<a class="collapse-link">--}}
                            {{--<i class="fa fa-chevron-up"></i>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="ibox-content">--}}
                    {{--<div>--}}
                        {{--<div id="numb"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>
@endsection
@section('js')
    @parent
    <script src="{{URL::asset('js/plugins/c3/c3.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/d3/d3.min.js')}}"></script>

    <script src="{{URL::asset('js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{URL::asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{URL::asset('js/plugins/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{URL::asset('js/plugins/flot/jquery.flot.time.js')}}"></script>

    {{--<script src="{{URL::asset('js/demo/flot-demo.js')}}"></script>--}}
    <script>
        $(function () {
            var data = [{
                label: "男-{{$sexData['sexMan']}}人",
                data: "{{$sexData['sexMan']}}",
                color: "#00c1d3",
            }, {
                label: "女-{{$sexData['sexWom']}}人",
                data: "{{$sexData['sexWom']}}",
                color: "#fd5eff",
            }];
            var plotObj = $.plot($("#sex"), data, {
                series: {
                    pie: {
                        show: true
                    }
                },
                grid: {
                    hoverable: true
                },
                tooltip: true,
                tooltipOpts: {
                    content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                    shifts: {
                        x: 20,
                        y: 0
                    },
                    defaultTheme: false
                }
            });
        });
    </script>
    <script>
        $(function () {
            var data = [{
                label: "入住-{{$numData['num1']}}人",
                data: "{{$numData['num1']}}",
                color: "#ffab29",
            }, {
                label: "未入住-{{$numData['num0']}}人",
                data: "{{$numData['num0']}}",
                color: "#c7cdca",
            }];
            var plotObj = $.plot($("#num"), data, {
                series: {
                    pie: {
                        show: true
                    }
                },
                grid: {
                    hoverable: true
                },
                tooltip: true,
                tooltipOpts: {
                    content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                    shifts: {
                        x: 20,
                        y: 0
                    },
                    defaultTheme: false
                }
            });
        });
    </script>
    <script>
        {{--$(document).ready(function(){--}}
            {{--c3.generate({--}}
                {{--bindto: '#stocked',--}}
                {{--data: {--}}
                    {{--columns: [--}}
                        {{--['总床数', 50, 200, 100],--}}
                        {{--['已使用', 30, 20, 34]--}}
                    {{--],--}}
                    {{--colors: {--}}
                        {{--'总床数': '#BABABA',--}}
                        {{--'已使用': '#ff000c'--}}
                    {{--},--}}
                    {{--type: 'bar',--}}
                    {{--groups: [--}}
                        {{--['总床数', '已使用']--}}
                    {{--],--}}

                {{--},--}}

            {{--});--}}

            {{--c3.generate({--}}
                {{--bindto: '#nn',--}}
                {{--data: {--}}
                    {{--columns: [--}}
                        {{--['男', {{$sexData['sexMan']}}],--}}
                        {{--['女', {{$sexData['sexWom']}}]--}}
                    {{--],--}}
                    {{--colors: {--}}
                        {{--'男': '#00c1d3',--}}
                        {{--'女': '#fd5eff'--}}
                    {{--},--}}
                    {{--type: 'pie'--}}
                {{--}--}}
            {{--});--}}
            {{--c3.generate({--}}
                {{--bindto: '#numb',--}}
                {{--data: {--}}
                    {{--columns: [--}}
                        {{--['入住', {{$numData['num1']}}],--}}
                        {{--['未入住', {{$numData['num0']}}]--}}
                    {{--],--}}
                    {{--colors: {--}}
                        {{--'入住': '#ffab29',--}}
                        {{--'未入住': '#c7cdca'--}}
                    {{--},--}}
                    {{--type: 'pie'--}}
                {{--}--}}
            {{--});--}}
        {{--})--}}
        $(function () {
            var data = [{
                label: "今日入住-{{$numData['num1']}}人",
                data: "{{$numData['num1']}}",
                color: "#ff0800",
            }, {
                label: "今日退房-{{$numData['num0']}}人",
                data: "{{$numData['num0']}}",
                color: "#24cd00",
            }];
            var plotObj = $.plot($("#day"), data, {
                series: {
                    pie: {
                        show: true
                    }
                },
                grid: {
                    hoverable: true
                },
                tooltip: true,
                tooltipOpts: {
                    content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
                    shifts: {
                        x: 20,
                        y: 0
                    },
                    defaultTheme: false
                }
            });
        });



        $(function() {
            var barOptions = {
                series: {
                    bars: {
                        show: true,
                        barWidth: 0.6,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.8
                            }, {
                                opacity: 0.8
                            }]
                        }
                    }
                },
                xaxis: {
                    tickDecimals: 0
                },
                colors: ["#24cd00","#ff000c"],
                grid: {
                    color: "#999999",
                    hoverable: true,
                    clickable: true,
                    tickColor: "#D4D4D4",
                    borderWidth:0
                },
                legend: {
                    show: false
                },
                tooltip: true,
                tooltipOpts: {
                    content: "楼层: %x,房间数:%y,入住:%z "
                }
            };
            var barData = {
                label: "bar高科技高科技和空间环境",
                data: [
                    [1, 90, 40],
                    [2, 90, 40],
                    [3, 90, 40],
                    [4, 90, 40],
                    [5, 90, 40],
                    [6, 90, 40]
                ]
            };
            $.plot($("#flot-bar-chart"), [barData], barOptions);

        });
    </script>
@endsection