@extends('dorm.dormTemp')
@section('css')
    @parent
    <link href="{{URL::asset('css/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/plugins/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
@show
@section('title','宿舍管理-公告管理')
@section('nav3','active')
@section('content')
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
                <form action="{{url('dorm_upload')}}"  method="post">
                    <label class="font-noraml">内容</label>
                    <div class="summernote J_content"></div>
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
                var title = $('.J_tilte').val();
                var content = $('.J_content').summernote('code');
                if(title == ''){
                    alert('请输入标题！');
                    return false;
                }
                if(title.length < 5 || title.length > 30){
                    alert('标题长度为请5-30个字！');
                    return false;
                }
                if ($('.summernote').summernote("isEmpty")){
                    alert('请输入内容！');
                    return false;
                }
                $.ajax({
                    type:"post",
                    url:'{{url('dorm_addNotice')}}',
                    dataType:"json",
                    data:{
                        "title":title,
                        "content":content,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data){
                        console.log(2222);
                        if (data.code==100) {
                            window.location.href='{{url('dorm_noticeManage')}}';
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