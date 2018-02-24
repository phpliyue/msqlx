@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('root','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

        </div>
    </div>

@endsection

@section('js')
    @parent
@endsection
