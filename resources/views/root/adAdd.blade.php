@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('root','active')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>雪球社区</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/root">管理员</a>
                </li>
                <li>
                    <a href="/snowball">雪球社区</a>
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