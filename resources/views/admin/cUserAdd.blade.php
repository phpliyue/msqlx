@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('nav1','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加导游</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        {!! Form::open(array('route'=>'cDaoYouAdd','files'=>true,'class'=>'form-horizontal')) !!}
                        <div class="form-group has-success">
                            {!! Form::label('name','姓名',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('name','',['class'=>'form-control','required'=>true,'placeholder'=>'请填写正确姓名'],$attributes = []) !!}
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group has-success">
                            {!! Form::label('headImg','头像',['class'=>'col-sm-2 control-label','require'=>'true']) !!}
                            <div class="col-sm-10">
                                {!! Form::file('headImg') !!}
                            </div>
                        </div>
                        <div class="form-group has-success">
                            {!! Form::label('credentials','证书',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::file('credentials','',['required'=>true]) !!}
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group has-success">
                            {!! Form::label('belongTo','旅行社',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('belongTo','',['class'=>'form-control','required'=>true]) !!}
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group text-center">
                            {!! Form::submit('添加','',['class'=>' text-center']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
@endsection