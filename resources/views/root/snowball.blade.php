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

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="background-color:#f0d4ff;">
                        <h5>首页轮播图管理</h5>
                        <div class="ibox-tools">
                            <i class="fa fa-add">
                                <a href="/snowballAdAddView" style="color:white;"><button class="btn btn-primary">添加</button></a>
                            </i>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover huodong">
                                <thead>
                                <tr>
                                    <th>活动编号</th>
                                    <th>活动名称</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $key)
                                    <tr>
                                        <td>{{$key->id}}</td>
                                        <td>{{$key->title}}</td>
                                        <td style="text-align: center;">
                                            <a href="ad/delete/{{$key->id}}"><i class="fa fa-trash text-navy"
                                                                                style="color:red;"></i> 删除</a>　
                                            |
                                            　<a href="snowballAdUpdateView/{{$key->id}}"><i class="fa fa-pencil  text-navy"></i> 修改</a>
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
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="background-color:#dcfff5;">
                        <h5>活动管理</h5>
                        <div class="ibox-tools">
                            <i class="fa fa-add">
                                <button class="btn btn-primary btn-block" data-toggle="modal"
                                        data-target="#activityModel">添加
                                </button>
                            </i>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover huodong">
                                <thead>
                                <tr>
                                    <th>活动编号</th>
                                    <th>活动名称</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeX">
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 4.0
                                    </td>
                                    <td>Win 95+</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
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
                                    <button class="btn btn-primary btn-block" data-toggle="modal"
                                            data-target="#saleModel">添加
                                    </button>
                                    <a href="#">添加</a>
                                </li>
                                <li>
                                    <button class="btn btn-primary btn-block" data-toggle="modal"
                                            data-target="#myModal2">添加
                                    </button>
                                    <a href="#">修改</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
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
                                    <td>
                                        <image src="{{$key->imagepath}}"></image>
                                    </td>
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
@section('folder')
    <div class="col-lg-12">
        @foreach($folder as $key => $value)
            <div class="file-box">
                <div class="file">
                    @switch($value->type)
                        @case('image')
                        <a href="{{$value->path}}">
                            <span class="corner"></span>
                            <div class="image">
                                <img alt="image" class="img-responsive" src="{{$value->path}}">
                            </div>
                            <div class="file-name">
                                文件名: {{$value->filesname}}
                                <br/>
                                备注: {{$value->remark}}
                                <br/>
                                上传时间: <small>{{$value->datetime}}</small>
                            </div>
                        </a>
                        @break
                        @case('video')
                        <a href="{{$value->path}}">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="fa fa-film"></i>
                            </div>
                            <div class="file-name">
                                文件名: {{$value->filesname}}
                                <br/>
                                备注: {{$value->remark}}
                                <br/>
                                上传时间: <small>{{$value->datetime}}</small>
                            </div>
                        </a>
                        @break
                        @case('document')
                        <a href="{{$value->path}}">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="fa fa-file"></i>
                            </div>
                            <div class="file-name">
                                文件名: {{$value->filesname}}
                                <br/>
                                备注: {{$value->remark}}
                                <br/>
                                上传时间: <small>{{$value->datetime}}</small>
                            </div>
                        </a>
                        @break
                        @case('music')
                        <a href="{{$value->path}}">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="fa fa-music"></i>
                            </div>
                            <div class="file-name">
                                文件名: {{$value->filesname}}
                                <br/>
                                备注: {{$value->remark}}
                                <br/>
                                上传时间: <small>{{$value->datetime}}</small>
                            </div>
                        </a>
                        @break
                        @case('icon')
                        <a href="{{$value->path}}">
                            <span class="corner"></span>

                            <div class="icon">
                                <img alt="image" class="img-responsive" src="{{$value->path}}">
                            </div>
                            <div class="file-name">
                                文件名: {{$value->filesname}}
                                <br/>
                                备注: {{$value->remark}}
                                <br/>
                                上传时间: <small>{{$value->datetime}}</small>
                            </div>
                        </a>
                        @break
                    @endswitch
                </div>
            </div>
        @endforeach
        {{--<div class="file-box">--}}
        {{--<div class="file">--}}
        {{--<a href="#">--}}
        {{--<span class="corner"></span>--}}

        {{--<div class="icon">--}}
        {{--<i class="fa fa-file"></i>--}}
        {{--</div>--}}
        {{--<div class="file-name">--}}
        {{--Document_2014.doc--}}
        {{--<br/>--}}
        {{--<small>Added: Jan 11, 2014</small>--}}
        {{--</div>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="file-box">--}}
        {{--<div class="file">--}}
        {{--<a href="#">--}}
        {{--<span class="corner"></span>--}}
        {{--<div class="image">--}}
        {{--<img alt="image" class="img-responsive" src="img/p1.jpg">--}}
        {{--</div>--}}
        {{--<div class="file-name">--}}
        {{--Italy street.jpg--}}
        {{--<br/>--}}
        {{--<small>Added: Jan 6, 2014</small>--}}
        {{--</div>--}}
        {{--</a>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="file-box">--}}
        {{--<div class="file">--}}
        {{--<a href="#">--}}
        {{--<span class="corner"></span>--}}
        {{--<div class="image">--}}
        {{--<img alt="image" class="img-responsive" src="img/p1.jpg">--}}
        {{--</div>--}}
        {{--<div class="file-name">--}}
        {{--Italy street.jpg--}}
        {{--<br/>--}}
        {{--<small>Added: Jan 6, 2014</small>--}}
        {{--</div>--}}
        {{--</a>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="file-box">--}}
        {{--<div class="file">--}}
        {{--<a href="#">--}}
        {{--<span class="corner"></span>--}}
        {{--<div class="image">--}}
        {{--<img alt="image" class="img-responsive" src="img/p1.jpg">--}}
        {{--</div>--}}
        {{--<div class="file-name">--}}
        {{--Italy street.jpg--}}
        {{--<br/>--}}
        {{--<small>Added: Jan 6, 2014</small>--}}
        {{--</div>--}}
        {{--</a>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="file-box">--}}
        {{--<div class="file">--}}
        {{--<a href="#">--}}
        {{--<span class="corner"></span>--}}
        {{--<div class="image">--}}
        {{--<img alt="image" class="img-responsive" src="img/p1.jpg">--}}
        {{--</div>--}}
        {{--<div class="file-name">--}}
        {{--Italy street.jpg--}}
        {{--<br/>--}}
        {{--<small>Added: Jan 6, 2014</small>--}}
        {{--</div>--}}
        {{--</a>--}}

        {{--</div>--}}
        {{--</div>--}}
    </div>

@endsection
@section('js')
    @parent
    {{--<script src="js/plugins/footable/footable.all.min.js"></script>--}}
    <script src="{{URL::asset('js/plugins/footable/footable.all.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/summernote/summernote.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/dataTables/datatables.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.huodong').DataTable({
                pageLength: 5,
                responsive: true,
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

            $('.summernote').summernote(
                {
                    height: '25em',
                    focus: true,
                    callbacks: {
                        onImageUpload: function (files) {
                            sendFile(files[0]);
                        },
                        onChange: function (contents) {
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
        // var content = $('.setValue').val();
        // $('.contentValue').append(
        //     content
        // );
    </script>
@endsection