@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('nav1','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>所有导游</h5>

                    </div>
                    <div class="ibox-content">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>姓名</th>
                                <th>旅行社</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->belong_to}}</td>
                                <td><a href="/cUserDel/{{$value->id}}">删除</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
@endsection