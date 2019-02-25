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
                                                <a href="#" class="J_create" data-id="{{$room->id}}"><i class="fa fa-file text-navy"></i> 生成　</a>
                                                |　
                                            @endif
                                            <a href="#" class="J_del" data-id="{{$room->id}}"><i class="fa fa-trash text-navy"
                                                                                                style="color:red;"></i> 删除</a>　
                                            |
                                            　<a href="{{url('dorm_updateRoom/'.$room->id)}}"><i class="fa fa-pencil  text-navy"></i> 修改</a>
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
