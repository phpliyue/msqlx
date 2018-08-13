@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('root','active')
@section('content')
    {!! Form::open(array('route'=>'videoUpload','files'=>true)) !!}
        {!! Form::file('video') !!}
    {!! Form::submit('tijiao') !!}
    {!! Form::close() !!}
@endsection

@section('js')
    @parent
@endsection