@extends('dorm.dormTemp')
@section('css')
    @parent
    <link href="{{URL::asset('css/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/plugins/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
@show
@section('title','宿舍管理-入住须知')
@section('nav7','active')
@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>入住须知</h5>
        </div>
        <div class="ibox-content">
            <div class="form-group">
                <form action="{{url('dorm_upload')}}"  method="post">
                    <div class="summernote J_content">{!! $content !!}</div>
                </form>
            </div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-white" type="submit">取消</button>
                    <button class="btn btn-primary J_submit" type="submit">提交</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @parent
    <script src="{{URL::asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{URL::asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{URL::asset('js/inspinia.js')}}"></script>
    <script src="{{URL::asset('js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/summernote/summernote.min.js')}}"></script>
    <script>
        $(document).ready(function(){
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
            $('.J_submit').click(function(){
                if(is_submit){
                    return false;
                }
                var content = $('.J_content').summernote('code');
                if ($('.summernote').summernote("isEmpty")){
                    alert('请输入内容！');
                    return false;
                }
                $.ajax({
                    type:"post",
                    url:'{{url('dorm_entryNotice')}}',
                    dataType:"json",
                    data:{
                        "content":content
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data){
                        if (data.code==100) {
                            window.location.href='{{url('dorm_entryNotice')}}';
                        }else{
                            alert(data.info);
                        }
                    },
                    complete:function(){
                        is_submit = false;
                    }
                })
            })
        });
    </script>
@endsection