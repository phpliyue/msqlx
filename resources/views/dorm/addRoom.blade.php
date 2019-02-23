@extends('dorm.dormTemp')
@section('css')
    @parent
    {{--<link href="{{URL::asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">--}}
{{--    <link href="{{URL::asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">--}}
@show
@section('title','宿舍管理-添加宿舍')
@section('nav2','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加宿舍</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="form-group">
                            <label class="font-noraml">名称</label>
                            <input type="text" placeholder="宿舍楼名称" class="form-control J_tilte">
                        </div>
                        <div class="form-group">
                            <label class="font-noraml">楼层</label>
                            <input type="number" placeholder="楼层" class="form-control J_floor">
                        </div>
                        <div class="form-group">
                            <label class="font-noraml">房间区间</label>
                            <div class=" input-group" >
                                <input type="number" class="input-sm form-control" name="start" class="J_start"/>
                                <span class="input-group-addon">to</span>
                                <input type="number" class="input-sm form-control" name="end" class="J_end"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-noraml">床数</label>
                            <input type="text" placeholder="床位数" class="form-control J_bed">
                        </div>
                        <div class="form-group">
                            <label class="font-noraml">性别</label>
                            <div class="input-group">
                                <div class="i-checks">
                                    <label> <input type="radio" value="男" name="sex" class="J_sex"> <i></i> 男 </label>　
                                    <label> <input type="radio" checked="" value="女" name="sex" class="J_sex"> <i></i> 女 </label>
                                </div>
                                {{--<div class="i-checks"><label> <input type="radio" checked="" value="option2" name="sex"> <i></i> 女 </label></div>--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-noraml">部门</label>
                            <input type="text" placeholder="部门" class="form-control J_part">
                        </div>
                        <div class="form-group">
                            <label class="font-noraml">备注</label>
                            <input type="text" placeholder="备注" class="form-control J_mark">
                        </div>

                        {{--<div class="form-group">--}}
                            {{--<form action="{{url('dorm_upload')}}" method="post">--}}
                                {{--<label class="font-noraml">内容</label>--}}
                                {{--<div class="summernote J_content"></div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        <div class="form-group" style="padding-bottom:20px;">
                            <div class="col-sm-12" style="text-align:center;">
                                <button class="btn btn-primary" type="submit"><a href="/dorm_roomManage" style="color:white;">返回</a></button>
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
                    url: '{{url('dorm_addRoomInfo')}}',
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