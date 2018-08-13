@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('root','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加旅行社</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        {!! Form::open(array('route'=>'addLxsM','files'=>true,'class'=>'form-horizontal')) !!}
                        <div>
                            <input type="hidden" value="{{$shopId}}" name="shopId">
                        </div>
                        <div class="form-group has-success">
                            {!! Form::label('company','公司名',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('company','',['class'=>'form-control','required'=>true,'placeholder'=>'请填写旅行社'],$attributes = []) !!}
                            </div>
                        </div>
                        <div class="form-group has-success">
                            {!! Form::label('detail','简介',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('detail','',['class'=>'form-control','required'=>true,'placeholder'=>'请填写旅行社简介'],$attributes = []) !!}
                            </div>
                        </div>
                        <div class="form-group has-success">
                            {!! Form::label('address','地址',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('address','',['class'=>'form-control','required'=>true,'placeholder'=>'请填写旅行社地址'],$attributes = []) !!}
                            </div>
                        </div>
                        <div class="form-group has-success">
                            {!! Form::label('link','联系方式',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('link','',['class'=>'form-control','required'=>true,'placeholder'=>'请填写正确联系方式'],$attributes = []) !!}
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group has-success">
                            {!! Form::label('cover','封面',['class'=>'col-sm-2 control-label','require'=>'true']) !!}
                            <div class="col-sm-10">
                                {!! Form::file('cover') !!}
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

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