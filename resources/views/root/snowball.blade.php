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
    {{--活动管理--}}
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="background-color:#dcfff5;">
                        <h5>活动管理</h5>
                        <div class="ibox-tools">
                            <i class="fa fa-add">
                                <a href="/snowballActivityAddView" style="color:white;"><button class="btn btn-primary">添加</button></a>
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
                                    <th>主办单位</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($activityData as $key)
                                    <tr>
                                        <td>{{$key->id}}</td>
                                        <td>{{$key->title}}</td>
                                        <td>{{$key->sponsor}}</td>
                                        <td style="text-align: center;">
                                            <a href="activity/delete/{{$key->id}}"><i class="fa fa-trash text-navy"
                                                                                style="color:red;"></i> 删除</a>　
                                            |
                                            　<a href="snowballActivityUpdateView/{{$key->id}}"><i class="fa fa-pencil  text-navy"></i> 修改</a>
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
    {{--优惠管理--}}
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="background-color:#fff7cb;">
                        <h5>优惠管理</h5>
                        <div class="ibox-tools">
                            <i class="fa fa-add">
                                <a href="/snowballSaleAddView" style="color:white;"><button class="btn btn-primary">添加</button></a>
                            </i>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover huodong">
                                <thead>
                                <tr>
                                    <th>优惠编号</th>
                                    <th>优惠名称</th>
                                    {{--<th>主办单位</th>--}}
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($saleData as $key)
                                    <tr>
                                        <td>{{$key->id}}</td>
                                        <td>{{$key->title}}</td>
                                        {{--<td>{{$key->sponsor}}</td>--}}
                                        <td style="text-align: center;">
                                            <a href="activity/delete/{{$key->id}}"><i class="fa fa-trash text-navy"
                                                                                      style="color:red;"></i> 删除</a>　
                                            |
                                            　<a href="snowballActivityUpdateView/{{$key->id}}"><i class="fa fa-pencil  text-navy"></i> 修改</a>
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
@section('folder')
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover shuchai">
                <thead>
                <tr>
                    <th>素材</th>
                </tr>
                </thead>
                <tbody>
                @foreach($folder as $key)
                    <tr>
                        <td>
                            文件名:{{$key->filesname}}<br>
                            备注:{{$key->remark}}
                            @switch($key->type)
                                @case('image')
                                <a href="http://www.msqlx.com{{$key->path}}">
                                    <span class="corner"></span>
                                    <div class="image">
                                        <img alt="image" class="img-responsive"
                                             src="http://www.msqlx.com{{$key->path}}">
                                    </div>
                                </a>
                                @break
                                @case('video')
                                <a href="http://www.msqlx.com{{$key->path}}">
                                    <span class="corner"></span>
                                    <div class="icon">
                                        <i class="fa fa-film"></i>
                                    </div>
                                </a>
                                @break
                                @case('document')
                                <a href="http://www.msqlx.com{{$key->path}}">
                                    <span class="corner"></span>
                                    <div class="icon">
                                        <i class="fa fa-file"></i>
                                    </div>
                                </a>
                                @break
                                @case('music')
                                <a href="http://www.msqlx.com{{$key->path}}">
                                    <span class="corner"></span>
                                    <div class="icon">
                                        <i class="fa fa-music"></i>
                                    </div>
                                </a>
                                @break
                                @case('icon')
                                <a href="http://www.msqlx.com{{$key->path}}">
                                    <span class="corner"></span>
                                    <div class="icon">
                                        <img alt="image" class="img-responsive"
                                             src="http://www.msqlx.com{{$key->path}}">
                                    </div>
                                </a>
                                @break
                            @endswitch
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
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

            $('.shuchai').DataTable({
                pageLength: 5,
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