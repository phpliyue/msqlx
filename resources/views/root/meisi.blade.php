@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('root','active')
@section('content')
    meisi

@endsection

@section('js')
    @parent
@endsection