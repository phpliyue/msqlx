@extends('base')
@section('css')
    @parent
    <style>
        body{
            background-color: #d9dd1e;
        }
    </style>
@show
@section('title','码上去签到')
@section('content')
    <div class="container-fluid">
        <div style="text-align: center;margin-top:100px;">
            <h2>宿舍管理</h2>
        </div>
        <div class="row" style="margin-top:5%;">
            <form class="form-horizontal" action="/dorm_index" method="get">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="account" class="col-md-4 control-label">账号</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="account" name="account" placeholder="请输入正确账号">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">密码</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" id="password" name="password" placeholder="请输入正确密码">
                    </div>
                </div>

                <div class="form-group" style="text-align: center;">
                    <div class="col-md-offset-4 col-md-4">
                        <button type="submit" class="btn btn-default">登入</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection
@section('js')
    @parent
@endsection