@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
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
            <div class="col-lg-5" style="background-color:lightskyblue;height:20em">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Knob input <small>http://anthonyterrien.com/knob/</small></h5>
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
                        <h3>
                            Knob - Dial
                        </h3>
                        <p>
                            Easily create knob input style.
                        </p>
                        <div class="text-center">
                            <small>Simple knob example</small><br/><br/>
                            <div class="m-r-md inline">
                                <input type="text" value="75" class="dial m-r-sm" data-fgColor="#1AB394" data-width="85" data-height="85" />
                            </div>
                            <div class="m-r-md inline">
                                <input type="text" value="25" class="dial m-r" data-fgColor="#1AB394" data-width="85" data-height="85"/>
                            </div>
                            <div class="m-r-md inline">
                                <input type="text" value="50" class="dial m-r" data-fgColor="#1AB394" data-width="85" data-height="85"/>
                            </div>
                        </div>
                        <div class="text-center">
                            <small>Dynamic knob example</small><br/><br/>
                            <div class="m-r-md inline">
                                <input type="text" value="75" class="dial m-r-sm" data-fgColor="#ED5565" data-width="85" data-height="85" data-cursor=true data-thickness=.3/>
                            </div>
                            <div class="m-r-md inline">
                                <input type="text" value="25" class="dial m-r" data-fgColor="#ED5565" data-width="85" data-height="85" data-step="1000" data-min="-15000" data-max="15000" data-displayPrevious=true/>
                            </div>
                            <div class="m-r-md inline">
                                <input type="text" value="60" class="dial m-r" data-fgColor="#ED5565" data-width="85" data-height="85" data-angleOffset=-125 data-angleArc=250 />
                            </div>
                        </div>
                        <div class="text-centen">
                            ss
                            s
                            s
                            s
                            s
                            s
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>轮播图</h5>
                    </div>

                    <div class="ibox-content">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            {{Session::all()}}
                            <img src="images/{{ Session::get('image') }}">
                        @endif
                            {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}
                            <div class="form-group">
                                {!! Form::file('image', array('class' => 'form-control')) !!}
                            </div>

                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>
                            {!! Form::close() !!}
                    </div>
                    <i class="fa fa-cloud-upload"></i>

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
    {{--<script type="text/javascript" src="{{URL::asset('js/jquery-form.js')}}"></script>--}}
    <script type="text/javascript" src="{{URL::asset('js/picture.js')}}"></script>
@endsection
