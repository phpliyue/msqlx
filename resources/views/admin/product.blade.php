@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('nav2','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>product add</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                {!! Form::open(array('route'=>'Insert','files'=>true,'class'=>'form-horizontal')) !!}
                <div class="form-group has-success">
                    {!! Form::label('titel','标题',['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('title','',['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group has-success">
                    {!! Form::label('cover','封面',['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::file('cover') !!}
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group has-success">
                    {!! Form::label('type','类型',['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        周边游 &nbsp {!! Form::radio('type','zb',true) !!} &nbsp &nbsp
                        国内游 &nbsp {!! Form::radio('type','gn') !!} &nbsp &nbsp
                        国际游 &nbsp {!! Form::radio('type','gj') !!}
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group has-success">
                    {!! Form::label('auth','作者',['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('auth','',['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group has-success">
                    {!! Form::label('detail','内容',['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('detail','',['class'=>'form-control summernote','id'=>'summernote']) !!}
                        <input type="hidden" value="" name="cont" class="cont">
                        <input type="hidden" value="{{$user->shop_id}}" name="shop_id" >
                    </div>
                </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group text-center">
                        {!! Form::submit('上传','',['class'=>' text-center']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Basic Data Tables example with responsive plugin</h5>
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
                                    <th>编号</th>
                                    <th>标题</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key => $value)
                                    <tr class="gradeA">
                                        <td class="text-center">{{$value->id}}</td>
                                        <td>{{$value->title}}</td>
                                        <td>{{$value->created_at}}</td>
                                        <td class="center">{{$value->updated_at}}</td>
                                        <td class="text-center">
                                            <a href="/productUpdate/{{$value->id}}">修改</a>

                                            |<a href="/productDelete/{{$value->id}}">删除</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>编号</th>
                                    <th>标题</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
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
    <!-- SUMMERNOTE -->
    <script src="{{URL::asset('js/plugins/summernote/summernote.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/dataTables/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
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

            $('.summernote').summernote(
                {
                height:'25em',
                focus:true,
                callbacks: {
                    onImageUpload: function (files) {
                        sendFile(files[0]);
                    },
                    onChange: function(contents) {
                        console.log('onChange:', contents);
                        $('.cont').val(contents);
                    }
                }
                });
       });
        function sendFile(file) {
            console.log(file);
            var img = file;
            var data = new FormData();
            data.append('file',img);
            console.log(data);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:data,
                type: "POST",
                url: '/productImageUpload',
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    $(".summernote").summernote('insertImage', url);
                },
                error: function(){
                    console.log('error');
                }
            });
        }
    </script>
@endsection
