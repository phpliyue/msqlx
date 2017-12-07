@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('nav1','active')
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
                        {{--<h3>--}}
                            {{--轮播图--}}
                        {{--</h3>--}}
                        {{--<p>--}}
                            {{--Easily create knob input style.--}}
                        {{--</p>--}}

                        {{--<div class="text-center">--}}
                            {{--<small>Dynamic knob example</small><br/><br/>--}}
                            {{--<div class="m-r-md inline">--}}
                                {{--<input type="text" value="75" class="dial m-r-sm" data-fgColor="#ED5565" data-width="85" data-height="85" data-cursor=true data-thickness=.3/>--}}
                            {{--</div>--}}
                            {{--<div class="m-r-md inline">--}}
                                {{--<input type="text" value="25" class="dial m-r" data-fgColor="#ED5565" data-width="85" data-height="85" data-step="1000" data-min="-15000" data-max="15000" data-displayPrevious=true/>--}}
                            {{--</div>--}}
                            {{--<div class="m-r-md inline">--}}
                                {{--<input type="text" value="60" class="dial m-r" data-fgColor="#ED5565" data-width="85" data-height="85" data-angleOffset=-125 data-angleArc=250 />--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="text-center">
                        {{--<div id="myCarousel" class="carousel slide" >--}}
                            {{--<!-- 轮播（Carousel）指标 -->--}}
                            {{--<ol class="carousel-indicators">--}}
                                {{--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
                                {{--<li data-target="#myCarousel" data-slide-to="1"></li>--}}
                                {{--<li data-target="#myCarousel" data-slide-to="2"></li>--}}
                            {{--</ol>--}}
                            {{--<!-- 轮播（Carousel）项目 -->--}}
                            {{--<div class="carousel-inner">--}}
                                {{--<div class="item active">--}}
                                    {{--<img width="100%" height="" src="images/circleImages/{{$picName[0]->pic_name}}" alt="First slide">--}}
                                {{--</div>--}}
                                {{--<div class="item">--}}
                                    {{--<img width="100%" src="images/circleImages/{{$picName[1]->pic_name}}" alt="Second slide">--}}
                                {{--</div>--}}
                                {{--<div class="item">--}}
                                    {{--<img width="100%" src="images/circleImages/{{$picName[2]->pic_name}}" alt="Third slide">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- 轮播（Carousel）导航 -->--}}
                            {{--<a class="carousel-control left" href="#myCarousel"--}}
                               {{--data-slide="prev">&lsaquo;--}}
                            {{--</a>--}}
                            {{--<a class="carousel-control right" href="#myCarousel"--}}
                               {{--data-slide="next">&rsaquo;--}}
                            {{--</a>--}}
                        {{--</div>--}}
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ol>

                                <!-- Wrapper for slides -->

                                <div class="carousel-inner" role="listbox">
                                    {{--<div class="item active">--}}
                                        {{--<img src="images/circleImages/default.jpg" alt="..." width="100%">--}}
                                    {{--</div>--}}
                                    @foreach($res as $key => $value)
                                        <div class="item {{$value->sort==1?'active':''}}">
                                            <img src="images/circleImages/{{$value->pic_name}}" alt="..." width="100%">
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Controls -->
                                {{--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">--}}
                                    {{--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>--}}
                                    {{--<span class="sr-only">Previous</span>--}}
                                {{--</a>--}}
                                {{--<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">--}}
                                    {{--<span class="fa fa-chevron-right" aria-hidden="true"></span>--}}
                                    {{--<i class="fa fa-3x fa-caret-right"></i>--}}
                                    {{--<span class="sr-only">Next</span>--}}
                                {{--</a>--}}
                            </div>
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
