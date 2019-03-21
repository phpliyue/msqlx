@extends('dorm.dormTemp')
@section('css')
    @parent
    <link href="{{URL::asset('css/plugins/switchery/switchery.css')}}" rel="stylesheet">
    <style>
        .onoffswitch-inner::before {
            content: '男';
        }

        .onoffswitch-inner::after {
            content: '女';
            background-color: red;
            color: white;
        }
    </style>
@show
@section('title','宿舍管理-添加宿舍')
@section('nav2','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加宿舍</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group">
                            <label class="font-noraml">名称</label>
                            <input type="text" placeholder="宿舍楼名称" class="form-control J_dorm_name">
                        </div>
                        <hr style="width: 100%;">
                        <div class="J_room ">
                        <div class="J_floor_line">
                            <div class="form-group col-lg-1" style="padding-left:0;padding-right:0;">
                                <label class="font-noraml">楼层</label>
                                <div class="input-group">
                                    <input type="number" placeholder="楼层" min="1" class="form-control J_floor" oninput='this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")'>
                                </div>
                            </div>
                            <div class="form-group col-lg-4" style="padding-right:0;">
                                <label class="font-noraml">房间区间</label>
                                <div class=" input-group">
                                    <input type="number" placeholder="开始房间号" min="1" class="form-control J_start" name="start" oninput='this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")'/>
                                    <span class="input-group-addon">to</span>
                                    <input type="number" placeholder="结束房间号" min="1" class="form-control J_end" name="end" oninput='this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")'/>
                                </div>
                            </div>
                            <div class="form-group col-lg-2" style="padding-right:0;">
                                <label class="font-noraml">床数</label>
                                <input type="number" placeholder="床位数" min="1" class="form-control J_bed_num" oninput='this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")'>

                            </div>
                            <div class="form-group col-lg-3" style="padding-right:0;">
                                <label class="font-noraml">部门</label>
                                <select class="form-control m-b J_part" name="part">
                                    <option value="">请选择</option>
                                    @foreach ($depart as $key)
                                        <option value="{{$key->department}}">{{$key->department}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-2" style="padding-right:0;">
                                <label class="font-noraml">性别</label>
                                <select class="form-control m-b J_sex" name="sex">
                                    <option value="">请选择</option>
                                    <option value="男">男</option>
                                    <option value="女">女</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label class="font-noraml">备注</label>--}}
                            {{--<input type="text" placeholder="备注" class="form-control J_mark">--}}
                        {{--</div>--}}
                        <hr style="width: 100%;color:green;border:1px dashed #e7eaec;">
                        <div class="form-group" style="padding-bottom:20px;">
                            <div class="col-sm-12" style="text-align:center;">
                                <button type="button" class="btn btn-info J_add">添加楼层</button>
                                <button type="button" class="btn btn-info J_del">删除楼层</button>
                                <button class="btn btn-primary" type="submit"><a href="/dorm_roomManage"
                                                                                 style="color:white;">返回</a></button>
                                <button class="btn btn-warning J_submit" type="submit">提交</button>
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
    <script src="{{URL::asset('js/plugins/switchery/switchery.js')}}"></script>
    <script>
        $(document).ready(function () {
            //添加楼层
            $('.J_add').click(function(){
                $('.J_floor_line:last').after(
                    '<div class="J_room J_floor_line">'+
                    '<div class="form-group col-lg-1" style="padding-left:0;padding-right:0;">'+
                    '<label class="font-noraml">楼层</label>'+
                    '<div class="input-group">'+
                    '<input type="number" placeholder="楼层" min="1" class="form-control J_floor" oninput=\'this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")\'>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-group col-lg-4" style="padding-right:0;">'+
                    '<label class="font-noraml">房间区间</label>'+
                    '<div class=" input-group">'+
                    '<input type="number" placeholder="开始房间号" min="1" class="form-control J_start" name="start" oninput=\'this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")\'/>'+
                    '<span class="input-group-addon">to</span>'+
                    '<input type="number" placeholder="结束房间号" min="1" class="form-control J_end" name="end" oninput=\'this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")\'/>'+
                    '</div>'+
                    '</div>'+
                    '<div class="form-group col-lg-2" style="padding-right:0;">'+
                    '<label class="font-noraml">床数</label>'+
                    '<input type="number" placeholder="床位数" min="1" class="form-control J_bed_num" oninput=\'this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")\'>'+
                    '</div>'+
                    '<div class="form-group col-lg-3" style="padding-right:0;">'+
                    '<label class="font-noraml">部门</label>'+
                    '<select class="form-control m-b J_part" name="part">'+
                    '<option value="">请选择</option>'+
                    '<option value="生产部">生产部</option>'+
                    '<option value="包装部">包装部</option>'+
                    '</select>'+
                    '</div>'+
                    '<div class="form-group col-lg-2" style="padding-right:0;">'+
                    '<label class="font-noraml">性别</label>'+
                    '<select class="form-control m-b J_sex" name="sex">'+
                    '<option value="">请选择</option>'+
                    '<option value="男">男</option>'+
                    '<option value="女">女</option>'+
                    '</select>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</div>'
                    );
            });
            //删除楼层
            $('.J_del').click(function(){
                if($('.J_room .J_floor_line').length > 1){
                    $('.J_room .J_floor_line:last').remove();
                }
            });
            // 提交
            var is_submit = false;
            $('.J_submit').click(function () {
                if (is_submit) {
                    return false;
                }
                var dorm_name = $('.J_dorm_name').val();//宿舍楼名称
                if (dorm_name == '') {
                    swal('请输入宿舍楼名称！');
                    return false;
                }
                var len = $('.J_room .J_floor_line').length;
                var dorm_info = [];
                var floor = '';var room_start = '';var room_end = '';var bed_num = '';var sex='';var part='';
                for (var i=0;i<len;i++){
                    floor = $('.J_floor_line').eq(i).find('.J_floor').val();//楼层
                    room_start = $('.J_floor_line').eq(i).find('.J_start').val();//房间开始区间
                    room_end = $('.J_floor_line').eq(i).find('.J_end').val();//房间结束区间
                    bed_num = $('.J_floor_line').eq(i).find('.J_bed_num').val();//床位数
                    sex = $('.J_floor_line').eq(i).find(".J_sex option:selected").val();//性别
                    part = $('.J_floor_line').eq(i).find('.J_part option:selected').val();//部门
                    if(floor == "" || room_start == "" || room_end == "" || bed_num == "" || sex == ""){
                        swal('请输入宿舍信息！');
                        return false;
                    }
                    dorm_info.push({'floor':floor,'room_start':room_start,'room_end':room_end,'bed_num':bed_num,'sex':sex,'part':part});
                }
                $.ajax({
                    type: "post",
                    url: '{{url('dorm_roomInfos')}}',
                    dataType: "json",
                    data: {
                        "dorm_name": dorm_name,
                        "dorm_info": dorm_info
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.code == 100) {
                            window.location.href = '{{url('dorm_roomManage')}}';
                        } else {
                            swal(data.info);
                        }
                    },
                    complete: function () {
                        is_submit = false;
                    }
                })
            })

        });
    </script>
@endsection
