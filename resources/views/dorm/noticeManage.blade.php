@extends('dorm.dormTemp')
@section('css')
    @parent
@show
@section('title','宿舍管理-公告管理')
@section('nav7','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>公告管理</h5>
                        <div class="ibox-tools">
                            <a href="{{url('dorm_addNotice')}}" class="btn btn-primary ">添加公告</a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>标题</th>
                                    <th>内容</th>
                                    <th>时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $notice)
                                    <tr class="gradeX">
                                        <td>{{$notice->id}}</td>
                                        <td>{{$notice->title}}</td>
                                        <td>{!! $notice->content !!}</td>
                                        <td>{{$notice->created_at}}</td>
                                        <td style="text-align: center;">
                                            {{--<a href="{{url('dorm_editNotice/'.$notice->id)}}"><span>编辑</span></a>&nbsp;&nbsp;<a--}}
                                                    {{--href="{{url('dorm_delNotice/'.$notice->id)}}"><span>删除</span></a>--}}
                                            <a href="{{url('dorm_delNotice/'.$notice->id)}}"><i class="fa fa-trash text-navy"
                                                                                style="color:red;"></i> 删除</a>　
                                            |
                                            　<a href="{{url('dorm_editNotice/'.$notice->id)}}"><i class="fa fa-pencil  text-navy"></i> 修改</a>
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
        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                pageLength: 25,
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
        });
        $(document).ready(function () {
            //添加楼层
            $('.J_add').click(function () {
                $('.J_floor_line:last').after('<div class="J_floor_line">' +
                    '<div class="form-group col-md-4"><label>楼层</label> <input type="number" placeholder="楼层" class="form-control J_floor_num"></div>' +
                    '<div class="form-group col-md-4"><label>房间数</label> <input type="number" placeholder="房间数" class="form-control J_room_num" ></div>' +
                    '<div class="form-group col-md-4"><label>床位数</label> <input type="number" placeholder="床位数" class="form-control J_bed_num"></div>' +
                    '<hr style="width: 100%;color:red;">' +
                    '</div>');
            });
            //点击添加宿舍按钮
            $('.col-lg-2').click(function () {
                $('.J_room').find('input').val('');
                $('.J_room .J_floor_line').nextAll().remove();
            });
            //删除楼层
            $('.J_del').click(function () {
                if ($('.J_room .J_floor_line').length > 1) {
                    $('.J_room .J_floor_line:last').remove();
                }
            });
            $("body").on("input  propertychange", ".J_room_num", function () {
                //如果输入非数字，则替换为''
                this.value = this.value.replace(/[^\d]/g, '');
            });
            $("body").on("input  propertychange", ".J_bed_num", function () {
                //如果输入非数字，则替换为''
                this.value = this.value.replace(/[^\d]/g, '');
            });
            //点击提交
            var is_submit = false;
            $('.J_submit').click(function () {
                if (is_submit) {
                    return false;
                }
                var dorm_name = $('.J_dorm_name').val();
                var len = $('.J_room .J_floor_line').length;
                var dorm_info = [];
                var floor_num = '';
                var room_num = '';
                var bed_num = '';
                for (var i = 0; i < len; i++) {
                    floor_num = $('.J_floor_line').eq(i).find('.J_floor_num').val();
                    room_num = $('.J_floor_line').eq(i).find('.J_room_num').val();
                    bed_num = $('.J_floor_line').eq(i).find('.J_bed_num').val();
                    if (floor_num == "" || room_num == "" || bed_num == "") {
                        alert('请输入宿舍信息！');
                        return false;
                    }
                    dorm_info.push({'floor_num': floor_num, 'room_num': room_num, 'bed_num': bed_num});
                }
                if (dorm_name == '') {
                    alert('请输入宿舍楼！');
                    return false;
                }
                if (dorm_name == '') {
                    alert('请输入宿舍信息！');
                    return false;
                }
                is_submit = true;
                $.ajax({
                    type: "post",
                    url: '{{url('dorm_getRoomInfo')}}',
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
                            alert('添加成功！');
                        } else {
                            alert(data.info);
                        }
                    },
                    complete: function () {
                        is_submit = false;
                    }
                })
            });
        })
    </script>
@endsection