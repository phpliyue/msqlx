@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('nav1','active')
@section('content')
    {{--<div class="row">--}}
        {{--<div class="col-lg-12">--}}
            {{--<div class="ibox float-e-margins">--}}
                {{--<div class="ibox-title">--}}
                    {{--<h5>All form elements <small>With custom checbox and radion elements.</small></h5>--}}
                    {{--<div class="ibox-tools">--}}
                        {{--<a class="collapse-link">--}}
                            {{--<i class="fa fa-chevron-up"></i>--}}
                        {{--</a>--}}
                        {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                            {{--<i class="fa fa-wrench"></i>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu dropdown-user">--}}
                            {{--<li><a href="#">Config option 1</a>--}}
                            {{--</li>--}}
                            {{--<li><a href="#">Config option 2</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<a class="close-link">--}}
                            {{--<i class="fa fa-times"></i>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="ibox-content">--}}
                    {{--<form method="get" class="form-horizontal">--}}
                        {{--<div class="form-group"><label class="col-sm-2 control-label">排序</label>--}}

                            {{--<div class="col-sm-10"><input type="text" class="form-control"></div>--}}
                        {{--</div>--}}
                        {{--<div class="hr-line-dashed"></div>--}}
                        {{--<div class="form-group"><label class="col-sm-2 control-label">类型</label>--}}
                            {{--<div class="col-sm-10">--}}
                                {{--<label class="checkbox-inline"><input type="checkbox" value="option1" id="inlineCheckbox1"> 轮播图 </label>--}}
                                {{--<label class="checkbox-inline"><input type="checkbox" value="option2" id="inlineCheckbox2"> icon图标 </label>--}}
                                {{--<label class="checkbox-inline"></label>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="hr-line-dashed"></div>--}}
                        {{--<div class="form-group"><label class="col-sm-2 control-label">图片上传</label>--}}
                            {{--<div class="col-sm-10">--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<form method="post" enctype="multipart/form-data" id="form">--}}
                                        {{--{{csrf_field()}}--}}
                                        {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
                                        {{--<div class="btn-group">--}}
                                            {{--<label title="Upload image file" for="inputImage" class="btn btn-primary">--}}
                                                {{--<input type="file" accept="image/*" name="file" id="inputImage" class="hide">--}}
                                                {{--上传--}}
                                            {{--</label>--}}
                                        {{--</div>--}}
                                    {{--</form>--}}
                                    {{--<div class="img-preview img-preview-sm haveimg">--}}
                                        {{--<img src="{{URL::asset('img/p3.jpg')}}" style="min-width: 0px !important; min-height: 0px !important; max-width: none !important; max-height: none !important; width: 250px; height: 167px; margin-left: -25px; margin-top: -22px;">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="hr-line-dashed"></div>--}}
                        {{--<div class="form-group">--}}
                            {{--<div class="col-sm-4 col-sm-offset-2">--}}
                                {{--<button class="btn btn-primary" type="submit">保存</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
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
                        <div id="myCarousel" class="carousel slide">
                            <!-- 轮播（Carousel）指标 -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <!-- 轮播（Carousel）项目 -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img height="20" src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1511352258508&di=4334088e04f6f36a72d9384cc383815b&imgtype=0&src=http%3A%2F%2Fimgsrc.baidu.com%2Fimage%2Fc0%253Dshijue1%252C0%252C0%252C294%252C40%2Fsign%3D2e02d53a9ddda144ce0464f1dadebad7%2Fac345982b2b7d0a22e2175b4c1ef76094b369a2a.jpg" alt="First slide">
                                </div>
                                <div class="item">
                                    <img height="20" src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1511352258515&di=9c28d66b01b1fddab9c43eaf785061bb&imgtype=0&src=http%3A%2F%2Fwww.hbbacts.com%2Ffiles%2F2015-11%2Ff20151109151211114876.jpg" alt="Second slide">
                                </div>
                                <div class="item">
                                    <img height="20" src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1511352259702&di=f3e3c00488eac4c199199383f872ba4f&imgtype=0&src=http%3A%2F%2Ff.hiphotos.baidu.com%2Fimage%2Fpic%2Fitem%2F0823dd54564e925844f7b52f9582d158cdbf4e2b.jpg" alt="Third slide">
                                </div>
                            </div>
                            <!-- 轮播（Carousel）导航 -->
                            <a class="carousel-control left" href="#myCarousel"
                               data-slide="prev">&lsaquo;
                            </a>
                            <a class="carousel-control right" href="#myCarousel"
                               data-slide="next">&rsaquo;
                            </a>
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
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="thumbnail">
                                    <img src="images/profile/default.jpg" alt="" width="100%">
                                    {!! Form::open(array('route' => 'circleImages','files'=>true)) !!}
                                    <div class="form-group">
                                        {!! Form::file('image', array('class' => 'form-control')) !!}
                                    </div>
                                    <input type="hidden" name="imageSort" value="1">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success">Upload</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="thumbnail">
                                    <img src="images/circleImages/1512120501浠讳附濯涜韩浠借瘉姝ｉ潰.jpg" alt="" width="100%">
                                    {!! Form::open(array('route' => 'circleImages','files'=>true)) !!}
                                    <div class="form-group">
                                        {!! Form::file('image', array('class' => 'form-control')) !!}
                                    </div>
                                    <input type="hidden" name="imageSort" value="2">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success">Upload</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="thumbnail">
                                    <img src="images/profile/151204209812.jpg" alt="" width="100%">
                                    {!! Form::open(array('route' => 'circleImages','files'=>true)) !!}
                                    <div class="form-group">
                                        {!! Form::file('image', array('class' => 'form-control')) !!}
                                    </div>
                                    <input type="hidden" name="imageSort" value="3">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success">Upload</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
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
