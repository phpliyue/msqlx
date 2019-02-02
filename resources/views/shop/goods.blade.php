@extends('shop.shopTemp')
@section('title','商品管理')
@section('css')
    @parent
    <link href="{{URL::asset('css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
@show
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>商品管理</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>名称</th>
                                    <th>类别</th>
                                    <th>规格</th>
                                    <th>现价</th>
                                    <th>原价</th>
                                    <th>封面图</th>
                                    <th>序号</th>
                                    <th>添加时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $goods)
                                    <tr class="gradeX">
                                        <td>{{$goods->gid}}</td>
                                        <td>{{$goods->name}}</td>
                                        <td>{{$goods->cname}}</td>
                                        <td>{{$goods->spec}}</td>
                                        <td>{{$goods->price}}</td>
                                        <td>{{$goods->orgin_price}}</td>
                                        <td><img src="{{$goods->cover_img}}" style="width:80px;height:80px;"></td>
                                        <td>{{$goods->sort}}</td>
                                        <td>{{date("Y-m-d",$goods->add_time)}}</td>
                                        <td><a href="{{url('shop_upgoods/'.$goods->gid)}}"><span>编辑</span></a></td>
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
    <script src="{{URL::asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{URL::asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/dataTables/datatables.min.js')}}"></script>
    <!-- Custom and plugin javascript -->
    <script src="{{URL::asset('js/inspinia.js')}}"></script>
    <script src="{{URL::asset('js/plugins/pace/pace.min.js')}}"></script>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
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
        });
    </script>
@endsection