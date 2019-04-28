@extends('temp')
@section('css')
    <link href="{{URL::asset('css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/dropzone.min.css')}}" rel="stylesheet">
@show
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('nav1','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加商品</h5>
                        <div class="ibox-tools">
                            <i class="fa fa-add">
                                <button class="btn btn-primary J_submit" type="submit">上传</button>
                            </i>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1"> 商品信息</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2"> 产品图片</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-3"> 产品内容</a></li>
                                {{--<li class=""><a data-toggle="tab" href="#tab-4"> 123</a></li>--}}
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <form method="get" class="form-horizontal">
                                            <div class="form-group"><label class="col-sm-2 control-label">商品名称</label>
                                                <div class="col-sm-10"><input type="text" class="form-control J_name"></div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group"><label class="col-sm-2 control-label">商品规格</label>
                                                <div class="col-sm-10">
                                                    <div class="row">
                                                        <div class="col-md-4"><input type="number" placeholder="价格"
                                                                                     class="form-control J_price">
                                                        </div>
                                                        <div class="col-md-4"><input type="text" placeholder="规格"
                                                                                     class="form-control J_spec">
                                                        </div>
                                                        <div class="col-md-4"><input type="number" placeholder="库存"
                                                                                     class="form-control J_stock">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group"><label class="col-sm-2 control-label">商品描述</label>
                                                <div class="col-sm-10"><input type="text" class="form-control J_description">
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed"></div>
                                            <div class="form-group"><label class="col-sm-2 control-label">商品标签</label>
                                                <div class="col-sm-10">
                                                    <input class="tagsinput form-control J_lable" type="text" value="雪球专属"/>
                                                </div>
                                            </div>
                                            {{--商品图片存储--}}
                                            <input class="J_picture" type="hidden" value=""/>
                                            {{--<div class="hr-line-dashed"></div>--}}
                                            {{--<div class="form-group"><label class="col-sm-2 control-label">商品分类</label>--}}
                                                {{--<div class="col-sm-10">--}}
                                                    {{--<select class="form-control m-b" name="account">--}}
                                                        {{--<option>option 1</option>--}}
                                                        {{--<option>option 2</option>--}}
                                                        {{--<option>option 3</option>--}}
                                                        {{--<option>option 4</option>--}}
                                                    {{--</select>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}

                                            {{--<div class="hr-line-dashed"></div>--}}

                                            {{--<div class="hr-line-dashed"></div>--}}

                                        </form>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="panel-body">

                                        <form action="/"
                                              class="dropzone"
                                              id="one"></form>

                                    </div>
                                </div>
                                <div id="tab-3" class="tab-pane">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">商品内容</label>
                                            <div class="col-sm-12"><input type="text" class="form-control summernote"
                                                                          id="summernote"
                                                                          name="detail">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                {{--<div class="ibox float-e-margins">--}}
                {{--<div class="ibox-title">--}}
                {{--<h5>添加商品</h5>--}}
                {{--</div>--}}
                {{--<div class="ibox-content">--}}
                {{--<form method="get" class="form-horizontal">--}}
                {{--<div class="form-group"><label class="col-sm-2 control-label">商品名称</label>--}}
                {{--<div class="col-sm-10"><input type="text" class="form-control"></div>--}}
                {{--</div>--}}
                {{--<div class="hr-line-dashed"></div>--}}
                {{--<div class="form-group"><label class="col-sm-2 control-label">商品规格</label>--}}
                {{--<div class="col-sm-10">--}}
                {{--<div class="row">--}}
                {{--<div class="col-md-4"><input type="number" placeholder="价格" class="form-control">--}}
                {{--</div>--}}
                {{--<div class="col-md-4"><input type="number" placeholder="库存" class="form-control">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="hr-line-dashed"></div>--}}
                {{--<div class="form-group"><label class="col-sm-2 control-label">商品描述</label>--}}
                {{--<div class="col-sm-10"><input type="text" class="form-control">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="hr-line-dashed"></div>--}}
                {{--<div class="form-group"><label class="col-sm-2 control-label">商品标签</label>--}}
                {{--<div class="col-sm-10">--}}
                {{--<input class="tagsinput form-control" type="text" value="雪球专属"/>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="hr-line-dashed"></div>--}}
                {{--<div class="form-group"><label class="col-sm-2 control-label">商品分类</label>--}}
                {{--<div class="col-sm-10">--}}
                {{--<select class="form-control m-b" name="account">--}}
                {{--<option>option 1</option>--}}
                {{--<option>option 2</option>--}}
                {{--<option>option 3</option>--}}
                {{--<option>option 4</option>--}}
                {{--</select>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="hr-line-dashed"></div>--}}
                {{--<div class="form-group"><label class="col-sm-2 control-label">商品内容</label>--}}
                {{--<div class="col-sm-10"><input type="text" class="form-control summernote" id="summernote"--}}
                {{--name="detail">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="hr-line-dashed"></div>--}}
                {{--<div class="form-group">--}}
                {{--<div class="col-sm-4 col-sm-offset-2">--}}
                {{--<button class="btn btn-white" type="submit">取消</button>--}}
                {{--<button class="btn btn-primary" type="submit">上传</button>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</form>--}}


                {{--</div>--}}
                {{--</div>--}}
                {{--{!! Form::open(array('route'=>'ad_create','files'=>true,'class'=>'form-horizontal')) !!}--}}
                {{--<div class="form-group has-success">--}}
                {{--{!! Form::label('titel','标题',['class'=>'col-sm-2 control-label']) !!}--}}
                {{--<div class="col-sm-10">--}}
                {{--{!! Form::text('title','',['class'=>'form-control']) !!}--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--<div class="hr-line-dashed"></div>--}}
                {{--<div class="form-group has-success">--}}
                {{--{!! Form::label('path','图片url',['class'=>'col-sm-2 control-label']) !!}--}}
                {{--<div class="col-sm-10">--}}
                {{--{!! Form::text('path','',['class'=>'urlChange form-control']) !!}--}}
                {{--</div>--}}
                {{--<div class="hr-line-dashed"></div>--}}
                {{--{!! Form::label('path','图片预览',['class'=>'col-sm-2 control-label']) !!}--}}
                {{--<div class="col-sm-6">--}}
                {{--<img alt="image" src="" style="width:100%;" class="urlView">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="hr-line-dashed"></div>--}}
                {{--<div class="form-group has-success">--}}
                {{--{!! Form::label('detail','内容',['class'=>'col-sm-2 control-label']) !!}--}}
                {{--<div class="col-sm-10">--}}
                {{--{!! Form::text('detail','',['class'=>'form-control summernote','id'=>'summernote']) !!}--}}
                {{--<input type="hidden" value="" name="cont" class="cont">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="hr-line-dashed"></div>--}}
                {{--<div class="form-group text-center">--}}
                {{--{!! Form::submit('上传','',['class'=>' text-center']) !!}--}}
                {{--</div>--}}
                {{--{!! Form::close() !!}--}}
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    <script src="{{URL::asset('js/plugins/footable/footable.all.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/summernote/summernote.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="{{URL::asset('js/dropzone.min.js')}}"></script>
    <script>
        //图片上传
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#one", {
            url: "/addGoodsImage",
            maxFiles: 10,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            maxFilesize: 20,
            uploadMultiple:true,
            addRemoveLinks:true,
            dictDefaultMessage:'添加商品图片，第一张为封面！',
            init: function () {
                this.on("addedfile", function (file) {

                    // console.log(file);
                    // alert('上传文件时触发的事件');
                });
                this.on("queuecomplete", function (file) {

                });
                this.on("removedfile", function (file) {
                    // console.log(myDropzone);
                    alert('删除文件时触发的方法');
                });
                this.on("success", function(file,imageInfo) {
                    $('.J_picture').val(imageInfo);
                })
            }
        });

        $(document).ready(function () {
            $('.tagsinput').tagsinput({
                tagClass: 'label label-primary'
            });

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

            var $summernote = $('.summernote').summernote(
                {
                    height: '20em',
                    focus: true,
                    callbacks: {
                        // onImageUpload: function (files) {
                        //     console.log(files);return false;
                        //     sendFile(files[0]);
                        // },
                        onImageUpload: function(files) {
                            for (var i = files.length - 1; i >= 0; i--) {
                                sendFile($summernote,files[i]);
                            }
                        },
                        onChange: function (contents) {
                            console.log('onChange:', contents);
                            $('.cont').val(contents);
                        }
                    }
                });
        });
        function sendFile($summernote,file) {
            var data = new FormData();
            data.append("file", file); // 表单名称
            {{--$.ajax({--}}
                {{--type: "POST",--}}
                {{--url: "{{url('addDescImage')}}",--}}
                {{--processData: false,--}}
                {{--contentType: false,--}}
                {{--data: data,--}}
                {{--dataType: 'json',--}}
                {{--headers: {--}}
                    {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                {{--},--}}
                {{--success: function(response) {--}}
                    {{--// 这里可能要根据你的服务端返回的上传结果做一些修改哦--}}
                    {{--$summernote.summernote('insertImage', response, function ($image) {--}}
                        {{--$image.attr('src', response);--}}
                    {{--});--}}
                {{--},--}}
                {{--error : function(error) {--}}
                    {{--alert('图片上传失败');--}}
                {{--},--}}
                {{--complete : function(response) {--}}
                {{--}--}}
            {{--});--}}
            $.ajax({
                type: "post",
                url: "{{url('addDescImage')}}",
                // dataType: "text",
                data: {"aa":111},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log(data);
                },
                error:function(){
                    alert('失败');
                },
                complete: function () {
                    is_submit = false;
                }
            })
        }

        $('.footable').footable();
        var cate_id = '<?php echo $type?>';
        //商品上传
        var is_submit = false;
        $('.J_submit').click(function () {
            if (is_submit) {
                return false;
            }
            var name = $('.J_name').val();//商品名称
            if (name == '') {
                swal('请输入商品名称！');
                return false;
            }
            var price = $('.J_price').val();//商品价格
            if (price == '') {
                swal('请输入商品价格！');
                return false;
            }
            var spec = $('.J_spec').val();//商品规格
            if (spec == '') {
                swal('请输入商品规格！');
                return false;
            }
            var stock = $('.J_stock').val();//商品库存
            if (stock == '') {
                swal('请输入商品库存！');
                return false;
            }
            var description = $('.J_description').val();//商品描述
            if (description == '') {
                swal('请输入商品描述！');
                return false;
            }
            var lable = $('.J_lable').val();//商品标签
            if (lable == '') {
                swal('请输入商品标签！');
                return false;
            }
            var picture = $('.J_picture').val();//商品图片
            if(picture == ''){
                swal('请上传商品图片！');
                return false;
            }
            picture = JSON.parse(picture);
            var summary = $('.summernote').summernote('code');//商品简介
            if ($('.summernote').summernote("isEmpty")){
                swal('请输入商品简介！');
                return false;
            }
            console.log(summary);
            $.ajax({
                type: "post",
                url: '{{url('addGoods')}}',
                dataType: "json",
                data: {
                    "cate_id":cate_id,
                    "name": name,
                    "price": price,
                    "spec": spec,
                    "stock": stock,
                    "description": description,
                    "lable": lable,
                    "img":picture[0],
                    "imgMore":JSON.stringify(picture),
                    "content":summary
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log('success');
                    if (data.code == 100) {
                        window.location.href = '{{url('dorm_roomManage')}}'
                    } else {
                        swal(data.info);
                    }
                },
                complete: function () {
                    is_submit = false;
                }
            })
        })
    </script>
@endsection
