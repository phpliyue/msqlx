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
                        <h5>人员管理</h5>
                        <div class="ibox-tools">
                            <a href="{{url('dorm_addManager')}}" class="btn btn-primary ">添加管理员</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>管理员</th>
                                    <th>时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@foreach ($data as $notice)--}}
                                    {{--<tr class="gradeX">--}}
                                        {{--<td>{{$notice->id}}</td>--}}
                                        {{--<td>{{$notice->title}}</td>--}}
                                        {{--<td>{!! $notice->content !!}</td>--}}
                                        {{--<td>{{$notice->created_at}}</td>--}}
                                        {{--<td style="text-align: center;">--}}
                                            {{--<a href="{{url('dorm_editNotice/'.$notice->id)}}"><span>编辑</span></a>&nbsp;&nbsp;<a--}}
                                            {{--href="{{url('dorm_delNotice/'.$notice->id)}}"><span>删除</span></a>--}}
                                            {{--<a href="{{url('dorm_delNotice/'.$notice->id)}}"><i class="fa fa-trash text-navy"--}}
                                                                                                {{--style="color:red;"></i> 删除</a>　--}}
                                            {{--|--}}
                                            {{--　<a href="{{url('dorm_editNotice/'.$notice->id)}}"><i class="fa fa-pencil  text-navy"></i> 修改</a>--}}
                                        {{--</td>--}}
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
        });
        $(document).ready(function () {

        })
    </script>
@endsection