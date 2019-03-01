@extends('dorm.dormTemp')
@section('css')
    @parent
@show
@section('title','宿舍管理-床位信息')
@section('nav2','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>床位信息</h5>
                        <div class="ibox-tools">
                            <button class="btn btn-primary" type="submit"><a href="{{url('dorm_getRoom')}}"
                                                                         style="color:white;">返回</a></button>
                            @if($data->status == 0)
                            <button class="btn btn-primary J_inroom" type="submit">入住</button>
                            @else
                            <button class="btn btn-primary J_outroom" type="submit">退房</button>
                            <button class="btn btn-primary J_adjustroom" type="submit">调整房间</button>
                            @endif
                        </div>
                    </div>
                    <div class="ibox-content form-horizontal" style="padding-bottom:15px;">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">宿舍楼</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="宿舍楼名称" class="form-control J_dorm_name" value="{{$data->dorm_name}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">楼层</label>
                            <div class="col-lg-10">
                                <input type="number" placeholder="楼层" min="1" class="form-control J_floor" value="{{$data->floor}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">房间号</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="房间" min="1" class="form-control J_room"
                                   name="start" value="{{$data->floor}}楼{{$data->room}}房{{$data->bed}}床" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">部门</label>
                            <div class="col-lg-10">
                                <select class="form-control m-b J_part" name="part" disabled>
                                    <option @if($data->part == '生产部') selected @endif>生产部</option>
                                    <option @if($data->part == '包装部') selected @endif>包装部</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">性别</label>
                            <div class="col-lg-10">
                                <select class="form-control m-b J_sex" name="sex" disabled>
                                    <option @if($data->sex == '男') selected @endif value="男">男</option>
                                    <option @if($data->sex == '女') selected @endif value="女">女</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">姓名</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="姓名" class="form-control J_name" value="{{$data->name}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">身份证</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="身份证" class="form-control J_card" value="{{$data->card}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">电话号</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="电话号" class="form-control J_phone" value="{{$data->phone}}"/>
                            </div>
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
            });
            //入住
            var is_submit = false;
            $('.J_inroom').click(function() {
                if (is_submit) {
                    return false;
                }
                var name = $('.J_name').val();
                var card = $('.J_card').val();
                var phone = $('.J_phone').val();
                var sex = $('.J_sex option:selected').val();
                if (name == '') {
                    swal('请输入姓名！');
                    return false;
                }
                if (card == '') {
                    swal('请输入身份证号！');
                    return false;
                }
                if (phone == '') {
                    swal('请输入电话号码！');
                    return false;
                }
                $.ajax({
                    type: "post",
                    url: '{{url('dorm_roomIn')}}',
                    dataType: "json",
                    data: {
                        "id":{{$data->id}},
                        "name": name,
                        "card": card,
                        "phone":phone,
                        "sex":sex
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.code == 100) {
                            swal(data.info);
                            window.location.href = '{{url('dorm_getRoom')}}';
                        } else {
                            swal(data.info);
                        }
                    },
                    complete: function () {
                        is_submit = false;
                    }
                })
            });
            //退房
            $('.J_outroom').click(function(){
                swal("确定退房", {
                    buttons: {
                        cancel: "取消",
                        ok: "确定",
                    },
                })
                .then((value) => {
                    if(value == 'ok'){
                        if (is_submit) {
                            return false;
                        }
                        $.ajax({
                            type: "post",
                            url: '{{url('dorm_roomOut')}}',
                            dataType: "json",
                            data: {
                                "id":{{$data->id}}
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (data) {
                                if (data.code == 100) {
                                    swal(data.info);
                                    window.location.href = '{{url('dorm_getRoom')}}';
                                } else {
                                    swal(data.info);
                                }
                            },
                            complete: function () {
                                is_submit = false;
                            }
                        })
                    }
                })
            });
            //调整房间
            $('.J_adjustroom').click(function(){

            });
        });
    </script>
@endsection