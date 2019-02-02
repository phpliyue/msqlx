@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('navzero','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>轮播图效果</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--@foreach($data as $key => $value)--}}
        {{--<div class="summernote" value="123">--}}
            {{--{!! $value->detail !!}--}}
        {{--</div>--}}
    {{--@endforeach--}}
@endsection

@section('js')
    @parent
    <script src="{{URL::asset('js/plugins/summernote/summernote.min.js')}}"></script>
    <script>
        $('.summernote').summernote();
    </script>
@endsection