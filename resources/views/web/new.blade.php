@extends('web.temp')
@section('meta')
    @parent
@endsection
@section('link')
    @parent
@endsection
@section('title','码上互联')
@section('header')
@endsection
@section('content')
    <div class="page">
        <div class="container">
            <div class="page__inner">
                <div class="page__menu">
                    <ul class="vMenu">
                        <li><a href="#" class="vMenu--active">Active page</a></li>
                        <li><a href="#">Second page</a></li>
                        <li><a href="#">Third page</a></li>
                        <li><a href="#">Fourth page</a></li>
                        <li><a href="#">Fifth page</a></li>
                    </ul>
                </div>
                <div class="page__main">
                    <div class="text-container">
                        <h3 class="page__main__title">This is the main area</h3>
                        <p>Write or do whatever you want here!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--@parent--}}
@endsection
@section('footer')
@endsection
@section('js')
    @parent
@endsection




