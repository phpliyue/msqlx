@extends('dorm.dormTemp')
@section('css')
    @parent
@show
@section('title','宿舍管理-公告管理')
@section('nav7','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加公告</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group">
                            <label class="font-noraml">标题</label>
                            <input type="text" placeholder="标题" class="form-control J_tilte">
                        </div>
                        <div class="form-group">
                            <form action="{{url('dorm_upload')}}" method="post">
                                <label class="font-noraml">内容</label>
                                <div class="summernote J_content"></div>
                            </form>
                        </div>
                        <div class="form-group" style="padding-bottom:20px;">
                            <div class="col-sm-12" style="text-align:center;">
                                <button class="btn btn-primary" type="submit"><a href="/dorm_noticeManage" style="color:white;">返回</a></button>
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
                height: 200,                 // set editor height
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
                var title = $('.J_tilte').val();
                var content = $('.J_content').summernote('code');
                if (title == '') {
                    alert('请输入标题！');
                    return false;
                }
                if (title.length < 5 || title.length > 30) {
                    alert('标题长度为请5-30个字！');
                    return false;
                }
                if ($('.summernote').summernote("isEmpty")) {
                    alert('请输入内容！');
                    return false;
                }
                $.ajax({
                    type: "post",
                    url: '{{url('dorm_addNotice')}}',
                    dataType: "json",
                    data: {
                        "title": title,
                        "content": content,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        console.log(2222);
                        if (data.code == 100) {
                            window.location.href = '{{url('dorm_noticeManage')}}';
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