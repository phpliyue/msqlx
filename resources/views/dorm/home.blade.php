@extends('dorm.dormTemp')
@section('css')
    @parent
    {{--<link href="{{URL::asset('css/font-awesome/css/font-awesome.css')}}" rel="stylesheet">--}}
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@show
@section('title','宿舍管理')
@section('nav1','active')
@section('content')

    <div class="row" style="margin-top:15px;">
        <div class="col-lg-6">
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
        <div class="col-lg-6">
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
    </div>
@endsection
@section('js')
    @parent
    <script src="{{URL::asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{URL::asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{URL::asset('js/inspinia.js')}}"></script>
    {{--{{URL::asset('')}}--}}
    <script src="{{URL::asset('js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{URL::asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{URL::asset('js/plugins/flot/jquery.flot.pie.js')}}"></script>
    {{--<script src="{{URL::asset('js/plugins/flot/jquery.flot.time.js')}}"></script>--}}

    {{--<script src="{{URL::asset('js/demo/flot-demo.js')}}"></script>--}}
    <script>
        $(function() {
            var data = [{
                label: "男-{{$sexData['sexMan']}}人",
                data:"{{$sexData['sexMan']}}",
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
        $(function() {
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
@endsection