@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('navzero','active')
@section('content')
    @foreach($data as $key => $value)


        <div class="summernote" value="123">
            {!! $value->detail !!}
        </div>
    @endforeach
@endsection

@section('js')
    @parent
    <script src="{{URL::asset('js/plugins/summernote/summernote.min.js')}}"></script>
    <script>
        $('.summernote').summernote();
    </script>
@endsection