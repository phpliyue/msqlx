@extends('dorm.dormTemp')
@section('css')
    @parent
@show
@section('title','宿舍管理-床位信息')
@section('nav2','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>床位信息</h5>
                    </div>
                    <div class="ibox-content" style="padding-bottom:15px;">

                        <div class="form-group">
                            <label class="font-noraml">名称</label>
                            <input type="text" placeholder="宿舍楼名称" class="form-control J_dorm_name" value="{{$data->dorm_name}}" disabled>
                        </div>
                            <div class="form-group">
                                <label class="font-noraml">楼层</label>
                                <input type="number" placeholder="楼层" min="1" class="form-control J_floor" value="{{$data->floor}}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="font-noraml">房间</label>
                                <div class=" input-group">
                                    <input type="text" placeholder="房间" min="1" class="form-control J_room"
                                           name="start" value="{{$data->floor}}楼{{$data->room}}房{{$data->bed}}床" disabled/>
                                </div>
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
                   str += '<div class="col-lg-4">' +
                       '<div class="contact-box">' +
                       '<img src="'+head_img+'" style="width:100%;heigth:100px;">' +
                       '</div>' +
                       '</div>';
               }
               $('.J_user').html(str);
            })
        });
    </script>
@endsection