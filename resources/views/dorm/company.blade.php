@extends('dorm.dormTemp')
@section('css')
    @parent
@show
@section('title','宿舍管理-公司管理')
@section('nav9','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>部门管理</h5>
                        {{--<div class="ibox-tools">--}}
                            {{--<a href="{{url('dorm_addDepartment')}}" class="btn btn-primary ">添加部门</a>--}}
                        {{--</div>--}}
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover department">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>部门</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($depart as $key)
                                    <tr class="gradeX">
                                        <td>{{$key->id}}</td>
                                        <td>{{$key->department}}</td>
                                        <td style="text-align: center;">
                                            <a href="#" class="depart_del" data-id="{{$key->id}}"><span>删除</span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加部门</h5>
                    </div>
                    <div class="ibox-content">
                        <form role="form" class="form-inline" action="/dorm_addDepartment" method="get">
                            <div class="form-group">
                                <label for="exampleInputEmail2" class="sr-only">部门名称</label>
                                <input type="text" placeholder="部门名称" id="department"
                                       class="form-control" name="department">
                            </div>
                            <button class="btn btn-primary" type="submit" style="margin:0px;">添加</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>人员管理</h5>
                        <div class="ibox-tools">
                            <a href="{{url('dorm_addManager')}}" class="btn btn-primary addDepart">添加管理员</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>账号</th>
                                    <th>姓名</th>
                                    <th>电话</th>
                                    <th>时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $user)
                                    <tr class="gradeX">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->account}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td style="text-align: center;">
                                            <a href="{{url('dorm_addManager/'.$user->id)}}"><span>修改</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                                    href="#" class="J_del" data-id="{{$user->id}}"><span>删除</span></a>
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
                pageLength: 5,
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

            $('.department').DataTable({
                pageLength: 5,
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
            // 提交
            var is_submit = false;
            $('.J_del').click(function () {
                if (is_submit) {
                    return false;
                }
                var id = $('.J_del').attr('data-id');
                $.ajax({
                    type: "post",
                    url: '{{url('dorm_delManager')}}',
                    dataType: "json",
                    data: {
                        "id": id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.code == 100) {
                            swal(data.info);
                            window.location.href = '{{url('dorm_company')}}';
                        } else {
                            swal(data.info);
                        }
                    },
                    complete: function () {
                        is_submit = false;
                    }
                })
            })

            $('.depart_del').click(function () {
                var id = $('.depart_del').attr('data-id');
                $.ajax({
                    type: "get",
                    url: '{{url('dorm_delDepartment')}}',
                    dataType: "json",
                    data: {
                        "id": id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.code == 100) {
                            swal(data.info);
                            window.location.href = '{{url('dorm_company')}}';
                        } else {
                            swal(data.info);
                        }
                    }
                })
            })
        })
    </script>
@endsection