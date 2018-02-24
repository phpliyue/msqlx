@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('root','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-2" data-toggle="modal" data-target="#myModal4">
                    <div class="widget style1 navy-bg">
                        <div class="row vertical-align">
                            <div class="col-xs-3">
                                <i class="fa fa-sitemap fa-3x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <h3 class="font-bold">添加商户</h3>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal inmodal" id="myModal4" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated fadeIn">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">商户添加</h4>
                        </div>
                        <div class="modal-body">
                            <div class="ibox-content">
                                {!! Form::open(array('route'=>'shopAdd','files'=>true,'class'=>'form-horizontal')) !!}
                                <div class="form-group has-success">
                                    {!! Form::label('shopName','商户',['class'=>'col-sm-2 control-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('shopName','',['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group has-success">
                                    {!! Form::label('shopId','商户ID',['class'=>'col-sm-2 control-label']) !!}
                                    <div class="col-sm-10">
                                        {!! Form::text('shopId','',['class'=>'form-control']) !!}
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group text-center">
                                    {!! Form::submit('添加','',['class'=>' text-center']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>所有商户</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>序号</th>
                                    <th>商户</th>
                                    <th>商户ID</th>
                                    <th>创建时间</th>
                                    <th>删除</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>
                                        {{$value->shopName}}
                                    </td>
                                    <td>{{$value->shopId}}</td>
                                    <td class="center">{{$value->created_at}}</td>
                                    <td class="center">delete</td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>序号</th>
                                    <th>商户</th>
                                    <th>商户ID</th>
                                    <th>创建时间</th>
                                    <th>删除</th>
                                </tr>
                                </tfoot>
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
    <script src="{{URL::asset('js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/pace/pace.min.js')}}"></script>
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