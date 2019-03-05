@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('root','active')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>小宿舍</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('root')}}">管理员</a>
                </li>
                <li>
                    <a href="{{url('dorm')}}">小宿舍</a>
                </li>
                <li class="active">
                    <strong>添加广告</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
            {!! Form::open(array('route'=>'addRollpic','files'=>true,'class'=>'form-horizontal')) !!}
            <div class="form-group has-success">
                {!! Form::label('type','广告类型',['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::select('type', ['0' => '大广告', '1' => '小广告'], '0', ['class'=>'form-control m-b J_type']) !!}
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group has-success">
                {!! Form::label('path','图片url',['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    {!! Form::text('path','',['class'=>'urlChange form-control']) !!}
                </div>
                <div class="J_img" style="display:none;">
                    <div class="hr-line-dashed"></div>
                    {!! Form::label('path','图片预览',['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-6">
                        <img alt="image" src="" style="width:100%;" class="urlView">
                    </div>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group has-success">
                {!! Form::label('detail','内容',['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    <input type="hidden" class="fuCon" value=''>
                    <input type="hidden" class="J_adid" name="id" value=''>
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
            var data = <?php echo json_encode($data);?>;
            if(data != null){
                var imgurl = data.cover_img;
                $('.urlChange').val(imgurl);
                $('.fuCon').val(data.content);
                $('.J_adid').val(data.id);
                var type = data.type;
                $(".J_type").find("option[value="+type+"]").attr("selected",true);
                if(imgurl != ''){
                    $('.J_img').show();
                    $('.urlView').attr("src", imgurl);
                }
            }
            $('.urlChange').change(function () {
                var urlValue = $(this).val();
                $('.J_img').show();
                $('.urlView').attr("src", urlValue)
            });
            $('.summernote').summernote('fontName', 'Arial');
            // $('.summernote').summernote({
            //     height: '25em',
            //     focus: true,
            //     callbacks: {
            //         onImageUpload: function (files) {
            //             sendFile(files[0]);
            //         },
            //         onChange: function (contents) {
            //             $('.cont').val(contents);
            //         }
            //     }
            // });
            var content = $('.fuCon').val();
            $('.summernote').summernote('code', content);
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
        $('.shuchai').DataTable({
            pageLength: 5,
            responsive: true,
            bLengthChange: false,
            info:false,
            dom: '<"html5buttons"B>lTfgitp',
        });
        $('.footable').footable();
    </script>
@endsection