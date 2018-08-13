@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('navzero','active')
@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">Monthly</span>
                    <h5>Income</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">40 886,200</h1>
                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                    <small>Total income</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{--<span class="label label-success pull-right">Monthly</span>--}}
                    <h5>人员管理</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">40 886,200</h1>
                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                    <small>Total income</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{--<span class="label label-success pull-right"></span>--}}
                    <h5>商户管理</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">进入</h1>
                    <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                    <small>Total income</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    {{--<span class="label label-success pull-right">Monthly</span>--}}
                    <h5>产品管理</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">查看</h1>
                    {{--<div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>--}}
                    {{--<small></small>--}}
                </div>
            </div>
        </div>
    </div>
    @foreach($data as $key => $value)
        <div class="summernote" value="123">
            {!! $value->detail !!}
        </div>
    @endforeach
@endsection

@section('js')
    @parent
    <script src="{{URL::asset('js/plugins/summernote/summernote.min.js')}}"></script>
    <script>
        $('.summernote').summernote();
    </script>
@endsection