@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('root','active')
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            {{--<li>{{ $error }}</li>--}}
            <strong>{{session('success')}}!</strong>
            {{--<strong>Warning!</strong> Better check yourself, you're not looking too good.--}}
        </div>
    @endif
    <div class="modal inmodal" id="adModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    添加轮播内容
                </div>
                <div class="modal-body">
                    {!! Form::open(array('route'=>'ad_create','files'=>true,'class'=>'form-horizontal')) !!}
                    <div class="form-group has-success">
                        {!! Form::label('titel','标题',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('title','',['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group has-success">
                        {!! Form::label('path','图片url',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('path','',['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group has-success">
                        {!! Form::label('detail','内容',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('detail','',['class'=>'form-control summernote','id'=>'summernote']) !!}
                            <input type="hidden" value="" name="cont" class="cont">
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
    {{--活动管理--}}
    <div class="modal inmodal" id="activityModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    活动管理
                </div>
                <div class="modal-body">
                    {!! Form::open(array('route'=>'ad_create','files'=>true,'class'=>'form-horizontal')) !!}
                    <div class="form-group has-success">
                        {!! Form::label('titel','标题',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('title','',['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group has-success">
                        {!! Form::label('path','图片url',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('path','',['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group has-success">
                        {!! Form::label('detail','内容',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('detail','',['class'=>'form-control summernote','id'=>'summernote']) !!}
                            <input type="hidden" value="" name="cont" class="cont">
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
    {{--优惠管理--}}
    <div class="modal inmodal" id="saleModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    优惠管理
                </div>
                <div class="modal-body">
                    {!! Form::open(array('route'=>'ad_create','files'=>true,'class'=>'form-horizontal')) !!}
                    <div class="form-group has-success">
                        {!! Form::label('titel','标题',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('title','',['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    <div class="form-group has-success">
                        {!! Form::label('path','图片url',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('path','',['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group has-success">
                        {!! Form::label('detail','内容',['class'=>'col-sm-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('detail','',['class'=>'form-control summernote','id'=>'summernote']) !!}
                            <input type="hidden" value="" name="cont" class="cont">
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
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>雪球社区</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/root">管理员</a>
                </li>
                <li class="active">
                    <strong>雪球社区</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="background-color:#f0d4ff;">
                        <h5>首页轮播图管理</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#adModel">添加</button>
                                    {{--<a href="#">添加</a>--}}
                                </li>
                                {{--<li>--}}
                                    {{--<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal2">添加</button>--}}
                                    {{--<a href="#">修改</a>--}}
                                {{--</li>--}}
                            </ul>
                            {{--<a class="close-link">--}}
                                {{--<i class="fa fa-times"></i>--}}
                            {{--</a>--}}
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="footable table table-stripped toggle-arrow-tiny">
                            <thead>
                            <tr>
                                <th data-toggle="true">标题</th>
                                <th>时间</th>
                                <th data-hide="all">图片</th>
                                <th>删除</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key)
                            <tr>
                                <td>{{$key->title}}</td>
                                <td>{{$key->datetime}}</td>
                                <td><image src="{{$key->imagepath}}"></image></td>
                                <td><a href="ad/delete/{{$key->id}}"><i class="fa fa-trash text-navy"></i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="background-color:#dcfff5;">
                        <h5>活动管理</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#activityModel">添加</button>
                                    {{--<a href="#">添加</a>--}}
                                </li>
                                <li>
                                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal2">添加</button>
                                    {{--<a href="#">修改</a>--}}
                                </li>
                            </ul>
                            {{--<a class="close-link">--}}
                            {{--<i class="fa fa-times"></i>--}}
                            {{--</a>--}}
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="footable table table-stripped toggle-arrow-tiny">
                            <thead>
                            <tr>
                                <th data-toggle="true">标题</th>
                                <th>时间</th>
                                <th data-hide="all">图片</th>
                                <th>删除</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key)
                                <tr>
                                    <td>{{$key->title}}</td>
                                    <td>{{$key->datetime}}</td>
                                    <td><image src="{{$key->imagepath}}"></image></td>
                                    <td><a href="ad/delete/{{$key->id}}"><i class="fa fa-trash text-navy"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="background-color:#fff7cb;">
                        <h5>优惠管理</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#saleModel">添加</button>
                                    {{--<a href="#">添加</a>--}}
                                </li>
                                {{--<li>--}}
                                    {{--<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal2">添加</button>--}}
                                    {{--<a href="#">修改</a>--}}
                                {{--</li>--}}
                            </ul>
                            {{--<a class="close-link">--}}
                            {{--<i class="fa fa-times"></i>--}}
                            {{--</a>--}}
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="footable table table-stripped toggle-arrow-tiny">
                            <thead>
                            <tr>
                                <th data-toggle="true">标题</th>
                                <th>时间</th>
                                <th data-hide="all">图片</th>
                                <th>删除</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key)
                                <tr>
                                    <td>{{$key->title}}</td>
                                    <td>{{$key->datetime}}</td>
                                    <td><image src="{{$key->imagepath}}"></image></td>
                                    <td><a href="ad/delete/{{$key->id}}"><i class="fa fa-trash text-navy"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    {{--<script src="js/plugins/footable/footable.all.min.js"></script>--}}
    <script src="{{URL::asset('js/plugins/footable/footable.all.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/summernote/summernote.min.js')}}"></script>
    <script>
        $(document).ready(function() {


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
        $('.footable').footable();
        // function sendFile(file) {
        //     console.log(file);
        //     var img = file;
        //     var data = new FormData();
        //     data.append('file',img);
        //     console.log(data);
        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         data:data,
        //         type: "POST",
        //         url: '/productImageUpload',
        //         cache: false,
        //         contentType: false,
        //         processData: false,
        //         success: function(url) {
        //             $(".summernote").summernote('insertImage', url);
        //         },
        //         error: function(){
        //             console.log('error');
        //         }
        //     });
        // }
    </script>
@endsection