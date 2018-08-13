@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('root','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-3">
                <a href="/addLxs">
                    <div class="widget style1 navy-bg" style="background-color:lightcoral">
                        <div class="row vertical-align">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-3x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h3 class="font-bold">添加旅行社</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            {{--@foreach()--}}
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>ID - 旅行社名</h5>
                        </div>
                        <div class="ibox-content">
                            <h4>信息</h4>
                            <div>
                                地址:
                            </div>
                            <div>
                                联系方式:
                            </div>

                            <div class="row  m-t-sm">
                                <div class="col-sm-4">
                                    <div class="font-bold">产品数</div>
                                    12
                                </div>
                                <div class="col-sm-4">
                                    <div class="font-bold">导游</div>
                                    4th
                                </div>
                                <div class="col-sm-4 text-right">
                                    <div class="font-bold">营业额</div>
                                    $200,913 <i class="fa fa-level-up text-navy"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{--@endforeach--}}
            <div class="col-lg-4">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>ID - 旅行社名</h5>
                    </div>
                    <div class="ibox-content">
                        <h4>信息</h4>
                        <div>
                            地址:
                        </div>
                        <div>
                            联系方式:
                        </div>

                        <div class="row  m-t-sm">
                            <div class="col-sm-4">
                                <div class="font-bold">产品数</div>
                                12
                            </div>
                            <div class="col-sm-4">
                                <div class="font-bold">导游</div>
                                4th
                            </div>
                            <div class="col-sm-4 text-right">
                                <div class="font-bold">营业额</div>
                                $200,913 <i class="fa fa-level-up text-navy"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>










        </div>
    </div>
    </div>
@endsection

@section('js')
    @parent
@endsection