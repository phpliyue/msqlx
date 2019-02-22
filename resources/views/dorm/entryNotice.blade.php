@extends('dorm.dormTemp')
@section('css')
    @parent
@show
@section('title','宿舍管理-入住须知')
@section('nav8','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>入住须知</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group">
                            <form action="{{url('dorm_upload')}}" method="post">
                                <div class="summernote J_content">{!! $content !!}</div>
                            </form>
                        </div>
                        <div class="form-group" style="padding-bottom:20px;">
                            <div class="col-sm-12" style="text-align:center;">
                                <button class="btn btn-warning J_submit" type="submit">提交</button>
                            </div>
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
            var $summernote = $('.summernote').summernote({
                height: 300,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true,                  // set focus to editable area after initializing summernote
                //调用图片上传
                callbacks: {
                    onImageUpload: function (files) {
                        sendFile($summernote, files[0]);
                    }
                }
            });

            //ajax上传图片
            function sendFile($summernote, file) {
                var formData = new FormData();
                formData.append("file", file);
                $.ajax({
                    url: "{{url('dorm_upload')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $summernote.summernote('insertImage', data, function ($image) {
                            $image.attr('src', data);
                        });
                    }
                });
            }

            // 提交
            var is_submit = false;
            $('.J_submit').click(function () {
                if (is_submit) {
                    return false;
                }
                var content = $('.J_content').summernote('code');
                if ($('.summernote').summernote("isEmpty")) {
                    alert('请输入内容！');
                    return false;
                }
                $.ajax({
                    type: "post",
                    url: '{{url('dorm_entryNotice')}}',
                    dataType: "json",
                    data: {
                        "content": content
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.code == 100) {
                            window.location.href = '{{url('dorm_entryNotice')}}';
                        } else {
                            alert(data.info);
                        }
                    },
                    complete: function () {
                        is_submit = false;
                    }
                })
            })
        });
    </script>
@endsection