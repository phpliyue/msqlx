@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('navzero','active')
@section('content')
    first page
@endsection

@section('js')
    @parent
@endsection