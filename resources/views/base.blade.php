<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @section('css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @show
    <title>@yield('title')</title>
</head>
<body>
@section('navbar')

    @show
@section('content')
    @show
</body>
@section('js')
    <script src="{{URL::asset('js/jquery-2.1.1.js')}}"></script>
    <script src="{{URL::asset('js/app.js')}}"></script>
    @show
</html>