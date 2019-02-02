@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('root','active')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            @foreach ($errors->all() as $error)
                {{--<li>{{ $error }}</li>--}}
                <strong>Warning!</strong> {{ $error }}
            @endforeach
            {{--<strong>Warning!</strong> Better check yourself, you're not looking too good.--}}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            {{--<li>{{ $error }}</li>--}}
            <strong>{{session('success')}}!</strong>
            {{--<strong>Warning!</strong> Better check yourself, you're not looking too good.--}}
        </div>
    @endif
    <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    文件上传
                </div>
                <div class="modal-body">
                    {!! Form::open(array('route'=>'folders_create','files'=>true,'class'=>'form-horizontal')) !!}
                    <div class="form-group has-success">
                        {!! Form::label('type','类型',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {{--{!! Form::text('name','',['class'=>'form-control','required'=>true,'placeholder'=>'请填写正确姓名'],$attributes = []) !!}--}}
                            图片&nbsp{!! Form::radio('type', 'image',true) !!}　　
                            图标&nbsp{!! Form::radio('type', 'icon') !!}　　
                            视频&nbsp{!! Form::radio('type', 'video') !!}　　
                            文档&nbsp{!! Form::radio('type', 'document') !!}　
                            音乐&nbsp{!! Form::radio('type', 'music') !!}　　　
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group has-success">
                        {!! Form::label('platform','平台',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {{--{!! Form::text('name','',['class'=>'form-control','required'=>true,'placeholder'=>'请填写正确姓名'],$attributes = []) !!}--}}
                            pc端&nbsp{!! Form::radio('platform', 'pc',true) !!}　　
                            移动端&nbsp{!! Form::radio('platform', 'mobile') !!}　　
                            公众号&nbsp{!! Form::radio('platform', 'wxp') !!}　　
                            小程序&nbsp{!! Form::radio('platform', 'wxa') !!}　　
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group has-success">
                        {!! Form::label('filesData','文件',['class'=>'col-sm-2 control-label','require'=>'true']) !!}
                        <div class="col-sm-10">
                            {!! Form::file('filesData') !!}
                        </div>
                    </div>
                    {{--<div class="form-group has-success">--}}
                    {{--{!! Form::label('credentials','证书',['class'=>'col-sm-2 control-label']) !!}--}}
                    {{--<div class="col-sm-10">--}}
                    {{--{!! Form::file('credentials','',['required'=>true]) !!}--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <div class="hr-line-dashed"></div>

                    <div class="form-group has-success">
                        {!! Form::label('remark','备注',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('remark','',['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group text-center">
                        {!! Form::submit('上传','',['class'=>' text-center']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>素材管理</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/root">管理员</a>
                </li>
                <li class="active">
                    <strong>素材管理</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="file-manager">
                            <h5>Show:</h5>
                            <a href="#" class="file-control active">所有</a>
                            <a href="#" class="file-control">文档</a>
                            <a href="#" class="file-control">视频</a>
                            <a href="#" class="file-control">图片</a>
                            <div class="hr-line-dashed"></div>
                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal2">上传文件
                            </button>

                            <div class="hr-line-dashed"></div>
                            <h5>文件夹</h5>
                            <ul class="folder-list" style="padding: 0">
                                <li><a href=""><i class="fa fa-folder"></i> 文件</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> 图片</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> 网页</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> 插图</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> 音乐</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> 图书</a></li>
                            </ul>
                            <h5 class="tag-title">标签</h5>
                            <ul class="tag-list" style="padding: 0">
                                <li><a href="">Family</a></li>
                                <li><a href="">Work</a></li>
                                <li><a href="">Home</a></li>
                                <li><a href="">Children</a></li>
                                <li><a href="">Holidays</a></li>
                                <li><a href="">Music</a></li>
                                <li><a href="">Photography</a></li>
                                <li><a href="">Film</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach($data as $key => $value)
                            <div class="file-box">
                                <div class="file">
                                    @switch($value->type)
                                        @case('image')
                                        <a href="{{$value->path}}">
                                            <span class="corner"></span>
                                            <div class="image">
                                                <img alt="image" class="img-responsive" src="{{$value->path}}">
                                            </div>
                                            <div class="file-name">
                                                文件名: {{$value->filesname}}
                                                <br/>
                                                备注: {{$value->remark}}
                                                <br/>
                                                上传时间: <small>{{$value->datetime}}</small>
                                            </div>
                                        </a>
                                        @break
                                        @case('video')
                                        <a href="{{$value->path}}">
                                            <span class="corner"></span>

                                            <div class="icon">
                                                <i class="fa fa-film"></i>
                                            </div>
                                            <div class="file-name">
                                                文件名: {{$value->filesname}}
                                                <br/>
                                                备注: {{$value->remark}}
                                                <br/>
                                                上传时间: <small>{{$value->datetime}}</small>
                                            </div>
                                        </a>
                                        @break
                                        @case('document')
                                        <a href="{{$value->path}}">
                                            <span class="corner"></span>

                                            <div class="icon">
                                                <i class="fa fa-file"></i>
                                            </div>
                                            <div class="file-name">
                                                文件名: {{$value->filesname}}
                                                <br/>
                                                备注: {{$value->remark}}
                                                <br/>
                                                上传时间: <small>{{$value->datetime}}</small>
                                            </div>
                                        </a>
                                        @break
                                        @case('music')
                                        <a href="{{$value->path}}">
                                            <span class="corner"></span>

                                            <div class="icon">
                                                <i class="fa fa-music"></i>
                                            </div>
                                            <div class="file-name">
                                                文件名: {{$value->filesname}}
                                                <br/>
                                                备注: {{$value->remark}}
                                                <br/>
                                                上传时间: <small>{{$value->datetime}}</small>
                                            </div>
                                        </a>
                                        @break
                                        @case('icon')
                                        <a href="{{$value->path}}">
                                            <span class="corner"></span>

                                            <div class="icon">
                                                <img alt="image" class="img-responsive" src="{{$value->path}}">
                                            </div>
                                            <div class="file-name">
                                                文件名: {{$value->filesname}}
                                                <br/>
                                                备注: {{$value->remark}}
                                                <br/>
                                                上传时间: <small>{{$value->datetime}}</small>
                                            </div>
                                        </a>
                                        @break
                                    @endswitch
                                </div>
                            </div>
                        @endforeach
                        {{--<div class="file-box">--}}
                            {{--<div class="file">--}}
                                {{--<a href="#">--}}
                                    {{--<span class="corner"></span>--}}

                                    {{--<div class="icon">--}}
                                        {{--<i class="fa fa-file"></i>--}}
                                    {{--</div>--}}
                                    {{--<div class="file-name">--}}
                                        {{--Document_2014.doc--}}
                                        {{--<br/>--}}
                                        {{--<small>Added: Jan 11, 2014</small>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="file-box">--}}
                            {{--<div class="file">--}}
                                {{--<a href="#">--}}
                                    {{--<span class="corner"></span>--}}
                                    {{--<div class="image">--}}
                                        {{--<img alt="image" class="img-responsive" src="img/p1.jpg">--}}
                                    {{--</div>--}}
                                    {{--<div class="file-name">--}}
                                        {{--Italy street.jpg--}}
                                        {{--<br/>--}}
                                        {{--<small>Added: Jan 6, 2014</small>--}}
                                    {{--</div>--}}
                                {{--</a>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="file-box">--}}
                            {{--<div class="file">--}}
                                {{--<a href="#">--}}
                                    {{--<span class="corner"></span>--}}
                                    {{--<div class="image">--}}
                                        {{--<img alt="image" class="img-responsive" src="img/p1.jpg">--}}
                                    {{--</div>--}}
                                    {{--<div class="file-name">--}}
                                        {{--Italy street.jpg--}}
                                        {{--<br/>--}}
                                        {{--<small>Added: Jan 6, 2014</small>--}}
                                    {{--</div>--}}
                                {{--</a>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="file-box">--}}
                            {{--<div class="file">--}}
                                {{--<a href="#">--}}
                                    {{--<span class="corner"></span>--}}
                                    {{--<div class="image">--}}
                                        {{--<img alt="image" class="img-responsive" src="img/p1.jpg">--}}
                                    {{--</div>--}}
                                    {{--<div class="file-name">--}}
                                        {{--Italy street.jpg--}}
                                        {{--<br/>--}}
                                        {{--<small>Added: Jan 6, 2014</small>--}}
                                    {{--</div>--}}
                                {{--</a>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="file-box">--}}
                            {{--<div class="file">--}}
                                {{--<a href="#">--}}
                                    {{--<span class="corner"></span>--}}
                                    {{--<div class="image">--}}
                                        {{--<img alt="image" class="img-responsive" src="img/p1.jpg">--}}
                                    {{--</div>--}}
                                    {{--<div class="file-name">--}}
                                        {{--Italy street.jpg--}}
                                        {{--<br/>--}}
                                        {{--<small>Added: Jan 6, 2014</small>--}}
                                    {{--</div>--}}
                                {{--</a>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @parent
@endsection
