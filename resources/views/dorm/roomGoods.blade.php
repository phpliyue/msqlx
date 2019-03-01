@extends('dorm.dormTemp')
@section('css')
    @parent
@show
@section('title','宿舍管理-物料管理')
@section('nav4','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>物料</h5>
                        <div class="ibox-tools">
                            <a href="{{url('dorm_addGoods')}}" class="btn btn-primary ">添加物料</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover fjtz">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>名称</th>
                                    <th>数量</th>
                                    <th>备注</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $goods)
                                    <tr class="gradeX">
                                        <td>{{$goods->id}}</td>
                                        <td>{{$goods->name}}</td>
                                        <td>{{$goods->num}}</td>
                                        <td>{{$goods->remark}}</td>
                                        <td>
                                            <a href="#" class="J_del" data-id="{{$goods->id}}"><i class="fa fa-trash text-navy"
                                                                                                style="color:red;"></i> 删除</a>　
                                            |
                                            　<a href=""><i class="fa fa-eye  text-navy"></i> 查看</a>
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
            $('.fjtz').DataTable({
                pageLength: 10,
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
            //删除楼层
            $('.J_del').click(function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    type: "get",
                    url: '{{url('dorm_delGoodsInfo')}}',
                    dataType: "json",
                    data: {
                        "id":id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.code == 100) {
                            // swal(data.info);
                            window.location.href = '{{url('dorm_roomGoods')}}';
                        } else {
                            swal(data.info);
                        }
                    }
                })
            });
        })
    </script>
@endsection
