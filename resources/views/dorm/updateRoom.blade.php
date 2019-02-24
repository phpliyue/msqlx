@extends('dorm.dormTemp')
@section('css')
    @parent
@show
@section('title','宿舍管理-修改宿舍')
@section('nav2','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>修改宿舍</h5>
                    </div>
                    <div class="ibox-content" style="padding-bottom:15px;">

                        <div class="form-group">
                            <label class="font-noraml">名称</label>
                            <input type="text" placeholder="宿舍楼名称" class="form-control J_dorm_name">
                        </div>
                            <div class="form-group">
                                <label class="font-noraml">楼层</label>
                                <input type="number" placeholder="楼层" min="1" class="form-control J_floor"
                                       oninput='this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")'>
                            </div>
                            <div class="form-group">
                                <label class="font-noraml">房间区间</label>
                                <div class=" input-group">
                                    <input type="number" placeholder="开始房间号" min="1" class="form-control J_start"
                                           name="start" oninput='this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")'/>
                                    <span class="input-group-addon">to</span>
                                    <input type="number" placeholder="结束房间号" min="1" class="form-control J_end"
                                           name="end" oninput='this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")'/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="font-noraml">床数</label>
                                <input type="number" placeholder="床位数" min="1" class="form-control J_bed_num"
                                       oninput='this.value=this.value.replace(/^[0]+[0-9]*$/gi,"")'>

                            </div>
                            <div class="form-group">
                                <label class="font-noraml">部门</label>
                                {{--<input type="text" placeholder="部门" class="form-control J_part">--}}
                                <select class="form-control m-b J_part" name="part">
                                    <option>生产部</option>
                                    <option>包装部</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-noraml">性别</label>
                                <select class="form-control m-b" name="sex">
                                    <option>男</option>
                                    <option>女</option>
                                </select>
                            </div>
                        {{--<div class="form-group">--}}
                            {{--<label class="font-noraml">备注</label>--}}
                            {{--<input type="text" placeholder="备注" class="form-control J_mark">--}}
                        {{--</div>--}}
                        <div class="form-group" style="padding-bottom:0px;text-align:center;margin-bottom:0px;">
                            {{--<div class="col-sm-12" style="text-align:center;">--}}
                                <button class="btn btn-primary" type="submit"><a href="/dorm_roomManage"
                                                                                 style="color:white;">返回</a></button>
                                <button class="btn btn-warning J_submit" type="submit">提交</button>
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>宿舍信息</h5>
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
                                {{--@foreach($data as $key)--}}
                                    <tr>
                                        <td>1</td>
                                        <td><span class="pie">2,6</span></td>
                                        <td style="text-align: center;">
                                            {{--　<a href=""><i class="fa fa-pencil  text-navy "></i> 查看详情</a>--}}
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" style="margin:0px;padding:0px 5px;border-top: 0;">添加宿舍</button>
                                        </td>
                                    </tr>
                                <tr>
                                    <td>1</td>
                                    <td><span class="pie">2,6</span></td>
                                    <td style="text-align: center;">
                                        　<a href="####"><i class="fa fa-pencil  text-navy " data-toggle="modal" data-target="#myModal"></i> 查看详情</a>
                                        {{--<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" style="margin:0px;">添加宿舍</button>--}}
                                    </td>
                                </tr>
                                {{--@endforeach--}}
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
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="contact-box">
                                    <img src="/img/bed.gif" style="width:100%;heigth:100px;">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="contact-box">
                                    <img src="/img/bed.gif" style="width:100%;heigth:100px;">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="contact-box">
                                    <img src="/img/bed.gif" style="width:100%;heigth:100px;">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="contact-box">
                                    <img src="/img/bed.gif" style="width:100%;heigth:100px;">
                                </div>
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

            $('.huodong').DataTable({
                pageLength: 10,
                responsive: true,
                bLengthChange: false,
                info:false,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    // {extend: 'copy'},
                    // {extend: 'csv'},
                    // {extend: 'excel', title: 'ExampleFile'},
                    // {extend: 'pdf', title: 'ExampleFile'},
                    // {extend: 'print',
                    //     customize: function (win){
                    //         $(win.document.body).addClass('white-bg');
                    //         $(win.document.body).css('font-size', '10px');
                    //
                    //         $(win.document.body).find('table')
                    //             .addClass('compact')
                    //             .css('font-size', 'inherit');
                    //     }
                    // }
                ]

            });
            // 提交
            var is_submit = false;
            $('.J_submit').click(function () {
                if (is_submit) {
                    return false;
                }
                var dorm_name = $('.J_dorm_name').val();//宿舍楼名称
                var floor = $('.J_floor').val();//楼层
                var room_start = $('.J_start').val();//房间开始区间
                var room_end = $('.J_end').val();//房间结束区间
                var bed_num = $('.J_bed_num').val();//床位数
                var sex = $(".J_sex:checked").val();//性别
                var part = $('.J_part').val();//部门
                var remark = $('.J_mark').val();//备注
                if (dorm_name == '') {
                    swal('请输入宿舍楼名称！');
                    return false;
                }
                if (floor == '') {
                    swal('请输入楼层！');
                    return false;
                }
                if (room_start == '' || room_end == '' || room_start > room_end) {
                    swal('请正确输入房间区间！');
                    return false;
                }
                if (bed_num == '') {
                    swal('请输入床位数！');
                    return false;
                }
                if (sex == '' || sex == undefined) {
                    swal('请选择性别！');
                    return false;
                }
                if (part == '') {
                    swal('请选择部门！');
                    return false;
                }
                $.ajax({
                    type: "post",
                    url: '{{url('dorm_roomInfos')}}',
                    dataType: "json",
                    data: {
                        "dorm_name": dorm_name,
                        "floor": floor,
                        "room_start": room_start,
                        "room_end": room_end,
                        "dorm_name": dorm_name,
                        "bed_num": bed_num,
                        "sex": sex,
                        "part": part,
                        "remark": remark
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.code == 100) {
                            window.location.href = '{{url('dorm_roomManage')}}';
                        } else {
                            alert(data.info);
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