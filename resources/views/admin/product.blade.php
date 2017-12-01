@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('nav2','active')
@section('content')


@endsection
@section('js')
    @parent
@endsection
