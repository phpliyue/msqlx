@extends('dorm.dormTemp')
@section('css')
    @parent
@show
@section('title','宿舍管理-房间管理')
@section('nav2','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>我的宿舍</h5>
                        <div class="ibox-tools">
                            <a href="{{url('dorm_addRoom')}}" class="btn btn-primary ">添加宿舍</a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    {{--<th>ID</th>--}}
                                    <th>名称</th>
                                    {{--<th>楼层</th>--}}
                                    <th>楼层</th>
                                    {{--<th>床号</th>--}}
                                    <th>房间</th>
                                    <th>床数</th>
                                    <th>部门</th>
                                    {{--<th>身份证</th>--}}
                                    <th>性别</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@foreach ($rooms as $room)--}}
                                    {{--<tr class="gradeX">--}}
                                        {{--<td>{{$room->id}}</td>--}}
                                        {{--<td>{{$room->dorm_name}}</td>--}}
                                        {{--<td>{{$room->floor}}</td>--}}
                                        {{--<td >{{$room->room}}</td>--}}
                                        {{--<td>{{$room->floor}}楼{{$room->room}}房{{$room->bed}}床</td>--}}
                                        {{--<td>@if($room->status == 1){{$room->user_info->name}}@endif</td>--}}
                                        {{--<td>{{$room->sex}}</td>--}}
                                        {{--<td>@if($room->status == 1){{$room->user_info->phone}}@endif</td>--}}
                                        {{--<td>@if($room->status == 1){{$room->user_info->card}}@endif</td>--}}
                                        {{--<td>@if($room->status == 1){{$room->user_info->in_time}}@endif</td>--}}
                                        {{--<td>@if($room->status == 1){{$room->user_info->out_time}}@endif</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="row wrapper wrapper-content animated fadeInRight">--}}
        {{--<div class="col-lg-12">--}}
            {{--<button class="btn btn-primary  dim btn-large-dim" type="button" data-toggle="modal" data-target="#myModal">+<i class="fa fa-home"></i></button>--}}
            {{--<button type="button" class="btn btn-w-m btn-info" data-toggle="modal" data-target="#myModal">添加宿舍</button>--}}
        {{--</div>--}}
        {{--<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">--}}
            {{--<div class="modal-dialog">--}}
                {{--<div class="modal-content animated bounceInRight">--}}
                    {{--<div class="modal-header">--}}
                        {{--<i class="fa fa-home modal-icon"></i>--}}
                        {{--<h4 class="modal-title">添加宿舍</h4>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body J_room">--}}
                        {{--<div class="form-group col-md-12"><label>宿舍楼</label> <input type="name" placeholder="请输入宿舍名" class="form-control J_dorm_name"></div>--}}
                        {{--<div class="J_floor_line">--}}
                            {{--<div class="form-group col-md-4"><label>楼层</label> <input type="number" placeholder="楼层" class="form-control J_floor_num"></div>--}}
                            {{--<div class="form-group col-md-4"><label>房间数</label> <input type="number" placeholder="房间数" class="form-control J_room_num"></div>--}}
                            {{--<div class="form-group col-md-4"><label>床位数</label> <input type="number" placeholder="床位数" class="form-control J_bed_num"></div>--}}
                            {{--<hr style="width: 100%;color:red;">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-info J_add">添加楼层</button>--}}
                        {{--<button type="button" class="btn btn-info J_del">删除楼层</button>--}}
                        {{--<button type="button" class="btn btn-white J_cancel" data-dismiss="modal">取消</button>--}}
                        {{--<button type="button" class="btn btn-primary J_submit">提交</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
@section('js')
    @parent
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 15,
                responsive: true,
                bLengthChange: false,
                info: false,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    // { extend: 'copy'},
                    // {extend: 'csv'},
                    // {extend: 'excel', title: 'ExampleFile'},
                    // {extend: 'pdf', title: 'ExampleFile'},
                    // {extend: 'print',
                    //     customize: function (win){
                    //         $(win.document.body).addClass('white-bg');
                    //         $(win.document.body).css('font-size', '10px');
                    //         $(win.document.body).find('table')
                    //                 .addClass('compact')
                    //                 .css('font-size', 'inherit');
                    //     }
                    // }
                ]
            });
            //添加楼层
            $('.J_add').click(function(){
                $('.J_floor_line:last').after('<div class="J_floor_line">'+
                        '<div class="form-group col-md-4"><label>楼层</label> <input type="number" placeholder="楼层" class="form-control J_floor_num"></div>'+
                        '<div class="form-group col-md-4"><label>房间数</label> <input type="number" placeholder="房间数" class="form-control J_room_num" ></div>'+
                        '<div class="form-group col-md-4"><label>床位数</label> <input type="number" placeholder="床位数" class="form-control J_bed_num"></div>'+
                        '<hr style="width: 100%;color:red;">'+
                        '</div>');
            });
            //点击添加宿舍按钮
            $('.col-lg-2').click(function(){
                $('.J_room').find('input').val('');
                $('.J_room .J_floor_line').nextAll().remove();
            });
            //删除楼层
            $('.J_del').click(function(){
                if($('.J_room .J_floor_line').length > 1){
                    $('.J_room .J_floor_line:last').remove();
                }
            });
            $("body").on("input  propertychange", ".J_room_num", function() {
                //如果输入非数字，则替换为''
                this.value = this.value.replace(/[^\d]/g, '');

            });
            $("body").on("input  propertychange", ".J_bed_num", function() {
                //如果输入非数字，则替换为''
                this.value = this.value.replace(/[^\d]/g, '');
            });
            //点击提交
            var is_submit = false;
            $('.J_submit').click(function(){
                if(is_submit){
                    return false;
                }
                var dorm_name = $('.J_dorm_name').val();
                var len = $('.J_room .J_floor_line').length;
                var dorm_info = [];
                var floor_num = '';var room_num = ''; var bed_num = '';
                for (var i=0;i<len;i++){
                    floor_num = $('.J_floor_line').eq(i).find('.J_floor_num').val();
                    room_num = $('.J_floor_line').eq(i).find('.J_room_num').val();
                    bed_num = $('.J_floor_line').eq(i).find('.J_bed_num').val();
                    if(floor_num == "" || room_num == "" || bed_num == ""){
                        alert('请输入宿舍信息！');
                        return false;
                    }
                    dorm_info.push({'floor_num':floor_num,'room_num':room_num,'bed_num':bed_num});
                }
                if(dorm_name == ''){
                    alert('请输入宿舍楼！');
                    return false;
                }
                if(dorm_name == ''){
                    alert('请输入宿舍信息！');
                    return false;
                }
                is_submit = true;
                $.ajax({
                    type:"post",
                    url:'{{url('dorm_getRoomInfo')}}',
                    dataType:"json",
                    data:{
                        "dorm_name":dorm_name,
                        "dorm_info":dorm_info
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data){
                        if(data.code == 100){
                            alert('添加成功！');
                        }else{
                            alert(data.info);
                        }
                    },
                    complete:function(){
                        is_submit = false;
                    }
                })
            });
        })
    </script>
@endsection
