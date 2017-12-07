@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <img src="images/profile/{{ $user->head_image }}" class="img-circle" alt="Cinque Terre" height="150" width="150">
                <div class="inline">{{$user->name}}'s <h4>profile</h4></div>
                {!! Form::open(array('url'=>'profile_upload','files'=>true)) !!}
                    <div class="fomr-group">
                        <label>upload head_image</label>
                        {!! Form::file('headImage',$attributes = ['id'=>'liyue']) !!}
                    </div>
                    <input type="hidden" name="oldHeadImage" value="{{$user->head_image}}">
                <input type="submit" class="btn btn-success">
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
@endsection
