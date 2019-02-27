@extends('dorm.dormTemp')
@section('css')
    @parent
@show
@section('title','宿舍管理-人员登记')
@section('nav6','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>外来人员登记</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>登记人员</th>
                                    <th>联系电话</th>
                                    <th>性别</th>
                                    <th>备注</th>
                                    <th>时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $outreg)
                                    <tr class="gradeX">
                                        <td>{{$outreg->id}}</td>
                                        <td>{{$outreg->name}}</td>
                                        <td>{{$outreg->phone}}</td>
                                        <td>{{$outreg->sex}}</td>
                                        <td>{{$outreg->remark}}</td>
                                        <td>{{$outreg->created_at}}</td>
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
                pageLength: 12,
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
    </script>
@endsection