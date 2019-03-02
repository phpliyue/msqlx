@extends('dorm.dormTemp')
@section('css')
    @parent
@show
@section('title','宿舍管理-宿舍详情')
@section('nav2','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>宿舍详情</h5>
                    </div>
                    <div class="ibox-content" style="padding-bottom:15px;">

                        <div class="form-group">
                            <label class="font-noraml">名称</label>
                            <input type="text" placeholder="宿舍楼名称" class="form-control J_dorm_name" value="{{$data->dorm_name}}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="font-noraml">楼层</label>
                            <input type="number" placeholder="楼层" min="1" class="form-control J_floor"
                                   oninput='this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")' value="{{$data->floor}}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="font-noraml">房间区间</label>
                            <div class=" input-group">
                                <input type="number" placeholder="开始房间号" min="1" class="form-control J_start"
                                       name="start" oninput='this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")' value="{{$data->room_start}}" disabled/>
                                <span class="input-group-addon">to</span>
                                <input type="number" placeholder="结束房间号" min="1" class="form-control J_end"
                                       name="end" oninput='this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")' value="{{$data->room_end}}" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-noraml">床数</label>
                            <input type="number" placeholder="床位数" min="1" class="form-control J_bed_num"
                                   oninput='this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")' value="{{$data->bed_num}}" disabled>

                        </div>
                        <div class="form-group">
                            <label class="font-noraml">部门</label>
                            <select class="form-control m-b J_part" name="part" disabled>
                                <option @if($data->part == '生产部') selected @endif>生产部</option>
                                <option @if($data->part == '包装部') selected @endif>包装部</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-noraml">性别</label>
                            <select class="form-control m-b" name="sex" disabled>
                                <option @if($data->sex == '男') selected @endif>男</option>
                                <option @if($data->sex == '女') selected @endif>女</option>
                            </select>
                        </div>
                        <div class="form-group" style="padding-bottom:0px;text-align:center;margin-bottom:0px;">
                            <button class="btn btn-primary" type="submit"><a href="/dorm_roomManage"
                                                                             style="color:white;">返回</a></button>
                            {{--<button class="btn btn-warning J_submit" type="submit">提交</button>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>房间信息</h5>
                    </div>
                    <div class="ibox-content" >
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover huodong">
                                <thead>
                                <tr>
                                    <th>房间号</th>
                                    <th>入住情况</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data->room as $key=>$val)
                                    <tr>
                                        <td>{{$key}}房间</td>
                                        <td><span class="pie">{{$val['people_in']}},{{$val['people_notin']}}</span></td>
                                        <td style="text-align: center;">
                                            <button class="btn btn-primary btn-xs J_user_info" data-toggle="modal" data-target="#myModal" data-id="{{$key}}" style="margin:0px;padding:0px 5px;border-top: 0;">人员信息</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated">
        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <div class="row J_user">
                            {{--<div class="col-lg-4">--}}
                            {{--<div class="contact-box">--}}
                            {{--<img src="/img/bed.gif" style="width:100%;heigth:100px;">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @parent
    <script src="{{URL::asset('js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{URL::asset('js/demo/peity-demo.js')}}"></script>
    <script>
        $(document).ready(function () {
            var room_info = JSON.parse('<?php echo json_encode($data->room);?>');
            // 提交
            $('.J_user_info').click(function () {
                var room_id = $(this).attr('data-id');
                var user_info = room_info[room_id]['user'];
                var str = '';
                for(var i in user_info){
                    if(user_info[i]['wx_head_img'] == null || user_info[i]['wx_head_img'] == ''){
                        var head_img = '/img/bed.gif';
                    }else{
                        var head_img = user_info[i]['wx_head_img'];
                    }
                    str += '<div class="col-lg-6">' +
                        '<div class="file">' +
                        '<span class="corner"></span>' +
                        '<div class="image">' +
                        '<img alt="image" class="img-responsive" src="'+head_img+'" style="width:100%;height:100%">' +
                        '</div>' +
                        '<div class="file-name">';
                    if(user_info[i]['name'] == null || user_info[i]['name'] == ''){
                        str += '暂未入住';
                    }else{
                        str += '姓名: ' +user_info[i]['name']+
                        '<br>' +
                        '电话: ' +user_info[i]['phone']+
                        '<br>' +
                        '入住时间: <small>'+user_info[i]['in_time']+'</small>';
                    }
                        str += '</div>' +
                        '</div>' +
                        '</div>';
                }
                $('.J_user').html(str);
            })
        });
    </script>
@endsection