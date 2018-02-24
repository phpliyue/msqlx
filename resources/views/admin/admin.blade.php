@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('root','active')
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


                    <div class="ibox-content">
                        <div class="carousel slide" id="carousel1">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                @foreach($res as $key => $value)
                                    <div class="item {{$value->sort==1?'active':''}}">
                                        <img src="images/circleImages/{{$value->pic_name}}" alt="..." width="100%" class="img-responsive">
                                    </div>
                                @endforeach

                            </div>
                            <a data-slide="prev" href="#carousel1" class="left carousel-control">
                                <span class="icon-prev"></span>
                            </a>
                            <a data-slide="next" href="#carousel1" class="right carousel-control">
                                <span class="icon-next"></span>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-lg-7" >
                <div class="ibox float-e-margins">
                    {{--<div class="ibox-title">--}}
                        {{--<h5>轮播图</h5>--}}
                    {{--</div>--}}

                    {{--<div class="ibox-content">--}}

                        {{--@if ($message = Session::get('success'))--}}
                            {{--<div class="alert alert-success alert-block">--}}
                                {{--<button type="button" class="close" data-dismiss="alert">×</button>--}}
                                {{--<strong>{{ $message }}</strong>--}}
                            {{--</div>--}}
                            {{--{{Session::all()}}--}}
                            {{--<img src="images/{{ Session::get('image') }}">--}}
                        {{--@endif--}}
                        {{--@if($message = Session::get('liyue'))--}}
                            {{--<div class="alert alert-success">--}}
                                {{--<button type="button" class="close" data-dismiss="alert">guan</button>--}}
                                {{--<strong>Success!</strong> {{$message}}.--}}
                            {{--</div>--}}
                            {{--@endif--}}
                            {{--{!! Form::open(array('route' => 'circleImages','files'=>true)) !!}--}}
                            {{--<div class="form-group">--}}
                                {{--{!! Form::file('image', array('class' => 'form-control')) !!}--}}
                            {{--</div>--}}
                            {{--<div class="text-center">--}}
                                {{--<button type="submit" class="btn btn-success">Upload</button>--}}
                            {{--</div>--}}
                            {{--{!! Form::close() !!}--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>轮播图</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            @foreach($res as $key => $value)
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="thumbnail">
                                        <img src="images/circleImages/{{$value->pic_name}}" alt="" width="100%">
                                        {!! Form::open(array('route' => 'circleImages','files'=>true)) !!}
                                            <div class="form-group">
                                                {!! Form::file('image', array('class' => 'form-control')) !!}
                                            </div>
                                            <input type="hidden" name="imageSort" value="{{$value->sort}}">
                                            <input type="hidden" name="oldCirImg" value="{{$value->pic_name}}" >
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success">Upload</button>
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    {{--<div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading"><h2>Laravel 5.5 image upload example</h2></div>
            <div class="panel-body">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    <img src="images/{{ Session::get('image') }}">
                @endif

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::file('image', array('class' => 'form-control')) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::text('email', 'example@gmail.com') !!}
                        {!! Form::checkbox('name', 'value') !!}
                    </div>
                    {!! Form::label('email', 'E-Mail Address') !!}
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>--}}
@endsection

@section('js')
    @parent
@endsection
