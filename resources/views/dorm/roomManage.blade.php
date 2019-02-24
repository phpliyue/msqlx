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
                                    <th>ID</th>
                                    <th>名称</th>
                                    <th>楼层</th>
                                    <th>房间</th>
                                    <th>床数</th>
                                    <th>部门</th>
                                    <th>性别</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $room)
                                    <tr class="gradeX">
                                        <td>{{$room->id}}</td>
                                        <td>{{$room->dorm_name}}</td>
                                        <td>{{$room->floor}}</td>
                                        <td>@if($room->room_start == $room->room_end) {{$room->room_start}} @else {{$room->room_start}}-{{$room->room_end}} @endif</td>
                                        <td>{{$room->bed_num}}</td>
                                        <td>{{$room->part}}</td>
                                        <td>{{$room->sex}}</td>
                                        <td style="text-align: center;">
                                            @if($room->is_create == 0)
                                                <a href="#" class="J_create" data-id="{{$room->id}}"><i class="fa fa-trash text-navy" style="color:red;"></i> 生成　</a>
                                                |
                                            @endif
                                            <a href="#" class="J_del" data-id="{{$room->id}}"><i class="fa fa-trash text-navy"
                                                                                                style="color:red;"></i> 删除</a>　
                                            |
                                            　<a href="{{url('dorm_editRoom/'.$room->id)}}"><i class="fa fa-pencil  text-navy"></i> 修改</a>
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
<<<<<<< HEAD
=======

    <div class="row wrapper wrapper-content animated fadeInRight">
        <div class="col-lg-12">
            <button class="btn btn-primary  dim btn-large-dim" type="button" data-toggle="modal" data-target="#myModal">+<i class="fa fa-home"></i></button>
            <button type="button" class="btn btn-w-m btn-info" data-toggle="modal" data-target="#myModal">添加宿舍</button>
        </div>
        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <i class="fa fa-home modal-icon"></i>
                        <h4 class="modal-title">添加宿舍</h4>
                    </div>
                    <div class="modal-body J_room">
                        <div class="form-group col-md-12"><label>宿舍楼</label> <input type="name" placeholder="请输入宿舍名" class="form-control J_dorm_name"></div>
                        <div class="J_floor_line">
                            <div class="form-group col-md-4"><label>楼层</label> <input type="number" placeholder="楼层" class="form-control J_floor_num"></div>
                            <div class="form-group col-md-4"><label>房间数</label> <input type="number" placeholder="房间数" class="form-control J_room_num"></div>
                            <div class="form-group col-md-4"><label>床位数</label> <input type="number" placeholder="床位数" class="form-control J_bed_num"></div>
                            <hr style="width: 100%;color:red;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info J_add">添加楼层</button>
                        <button type="button" class="btn btn-info J_del">删除楼层</button>
                        <button type="button" class="btn btn-white J_cancel" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary J_submit">提交</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
>>>>>>> 8ff1f92f0f5bcda0545d38223ae8e60e8bbf1974
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
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},
                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');
                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                        }
                    }
                ]
            });
            // 生成宿舍信息
            var is_submit = false;
            $('.J_create').click(function () {
                if (is_submit) {
                    return false;
                }
                var id = $(this).attr("data-id");
                $.ajax({
                    type: "post",
                    url: '{{url('dorm_getRoomInfo')}}',
                    dataType: "json",
                    data: {
                        "id": id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.code == 100) {
                            swal('住宿信息生成成功！');
                            window.location.href = '{{url('dorm_roomManage')}}';
                        } else {
                            swal(data.info);
                        }
                    },
                    complete: function () {
                        is_submit = false;
                    }
                })
            });
            // 删除宿舍信息
            var is_submit = false;
            $('.J_del').click(function () {
                swal("确定删除?", {
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
                    var id = $(this).attr("data-id");
                    $.ajax({
                        type: "post",
                        url: '{{url('dorm_delRoomInfo')}}',
                        dataType: "json",
                        data: {
                            "id": id
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            if (data.code == 100) {
                                swal('删除成功！');
                                window.location.href = '{{url('dorm_roomManage')}}';
                            } else {
                                swal(data.info);
                            }
                        },
                        complete: function () {
                            is_submit = false;
                        }
                    })
                    }
                });
            })
        })
    </script>
@endsection
