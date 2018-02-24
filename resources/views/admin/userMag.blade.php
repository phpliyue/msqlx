@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('nav1','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-2">
            <a href="/cUserAdd">
                <div class="widget style1 navy-bg" style="background-color:#30487b">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-user-plus fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">导游添加</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
            <div class="col-lg-2">
                <a href="/cUserMag">
                    <div class="widget style1 navy-bg" style="background-color:lightcoral">
                        <div class="row vertical-align">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-3x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h3 class="font-bold">导游管理</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
    </div>

        <hr style="height:2px;background-color: red">
        <div class="row">
            @foreach($data as $key => $value)
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="ibox-content text-center" style="background-color:lightblue;margin-top:10px;">
                    <h1>{{$value->name}}</h1>
                    <div class="m-b-sm">
                        <img alt="导游头像" class="img" src="{{$value->headImg}}" width="60" height="90">
                    </div>
                    <p class="font-bold">{{$value->belong_to}}</p>
                    <input type="hidden" value="{{$value->id}}" class="did">
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$value->id}}">
                            证书
                        </button>
                    </div>

                    <div class="modal inmodal" id="myModal{{$value->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated fadeIn">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">证书</h4>
                                </div>
                                <div class="modal-body">
                                    <img alt="导游头像" class="img" src="{{$value->credentials}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach

        </div>
    </div>
@endsection

@section('js')
    @parent
    <script>
        $(document).ready(function(){

        })
    </script>
@endsection