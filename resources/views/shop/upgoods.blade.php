@extends('shop.shopTemp')
@section('title','商品管理')
@section('css')
    @parent
    <link href="{{URL::asset('css/plugins/dropzone/basic.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/plugins/dropzone/dropzone.css')}}" rel="stylesheet">
@show
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>上架商品</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-horizontal">
                        <div class="form-group"><label class="col-lg-2 control-label">名称</label>
                            <div class="col-lg-10"><input type="name" placeholder="请输入商品名称" class="form-control J_name">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">规格</label>
                            <div class="col-lg-10"><input type="spec" placeholder="请输入商品规格" class="form-control J_spec">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">价格</label>
                            <div class="col-lg-10"><input type="spec" placeholder="请输入商品价格" class="form-control J_price">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">原价</label>
                            <div class="col-lg-10"><input type="spec" placeholder="请输入商品原价" class="form-control J_orgin_price">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">类别</label>
                            <div class="col-lg-10">
                            <select class="select2_demo_3 form-control select2-hidden-accessible J_cate" tabindex="-1" aria-hidden="true">
                                <option value="">请选择</option>
                                @foreach($data['cate'] as $res)
                                    <option value="{{$res->cid}}">{{$res->name}}</option>
                                @endforeach
                            </select>
                            <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 258px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-rlin-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">封面图</label>
                            <div class="col-lg-10">
                                <form method="post" enctype="multipart/form-data" class="J_sendimg">
                                    <div class="J_img" style="float: left;margin-bottom:5px;width: 150px; height: 150px;line-height:150px;text-align:center;border:1px solid #e5e6e7;">
                                        <label title="Upload image file" for="inputImage">
                                            <input type="file" accept="image/*" name="file" id="inputImage" class="hide">
                                            点击上传
                                        </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">图片</label>
                            <div class="col-lg-10">
                                <form action="#" class="dropzone dz-clickable" id="dropzoneForm" style="border:1px solid #e5e6e7;">
                                    <div class="dz-default dz-message">
                                        <span><strong>将文件拖至此处或单击以上传</strong></span>
                                    </div>
                                </form>
                                <div class="J_desc_img" style="display:none"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-sm btn-white J_submit" type="submit">提交</button>
                            </div>
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
    <script src="{{URL::asset('js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="{{URL::asset('js/plugins/dropzone/dropzone.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/jquery-form.js')}}"></script>
    <script>
        var Global_url = 'http://sy.demo.com';
        var info = <?php echo json_encode($data['info']);?>;
        console.log(info);
        if(info != null){
            $('.J_name').val(info.name);
            $('.J_spec').val(info.spec);
            $('.J_price').val(info.price);
            $('.J_orgin_price').val(info.orgin_price);
            $(".J_cate").find("option[value="+info.cid+"]").attr("selected",true);
            if(info.cover_img != ''){
                $('.J_img').after('<div class="J_img" style="float: left;margin-left:10px;width: 150px; height: 150px;border:1px solid #e5e6e7;">'+
                        '<img src="'+Global_url+info.cover_img+'" style="width:100%;height:100%;" class="J_cover_img" data-img='+info.cover_img+'>'+
                        '</div>');
            }
            $('.J_desc_img').text(info.desc_img);
        }
        //封面图
        $('#inputImage').change(function() {
            $('.J_sendimg').ajaxSubmit({
                url: '{{url('shop_upload')}}',
                type: "POST",
                dataType: "text",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (res) {
                    res = JSON.parse(res);
                    $('.J_img').next().remove();
                    $('.J_img').after('<div class="J_img" style="float: left;margin-left:10px;width: 150px; height: 150px;border:1px solid #e5e6e7;">'+
                            '<img src="'+Global_url+res+'" style="width:100%;height:100%;" class="J_cover_img" data-img='+res+'>'+
                            '</div>');
                }
            });
        });
        var desc_img = info == null ? '' : info.desc_img;
        Dropzone.options.dropzoneForm = {
            url: "{{url('shop_upload')}}", //必须填写
            method:"post",  //也可用put
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            dictDefaultMessage: "<strong>将文件拖至此处或单击以上传</strong>",
            allowedFileExtensions : ['jpg','jpeg', 'png','gif'],
            addRemoveLinks:"dictRemoveFile",
            dictRemoveFile: '删除',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init:function(){
                this.emit("initimage", desc_img); //初始化图片
                this.on("addedfile", function(file) {
                    //上传文件时触发的事件
                });
                this.on("queuecomplete",function(file) {
                    //上传完成后触发的方法
                });
                this.on("removedfile",function(file){
                    //删除文件时触发的方法
                    if(typeof file.xhr == 'undefined'){
                        var xhr = file.name;
                    }else{
                        var xhr = JSON.parse(file.xhr.response);
                    }
                    var str = $('.J_desc_img').text().split(",");
                    var true_img = [];
                    for( var i in str ){
                        if(str[i].indexOf(xhr) == -1 ){
                            true_img.push(str[i]);
                        }
                    }
                    $('.J_desc_img').text(true_img.toString());
                });
            },
            success: function (file, response, e) {
                var res = JSON.parse(response);
                if (res.error) {
                    $(file.previewTemplate).children('.dz-error-mark').css('opacity', '1')
                }else{
                    desc_img += ','+res;
                    $('.J_desc_img').text(desc_img);
                }
            }
        };
        //点击提交
        var is_submit = false;
        $('.J_submit').click(function(){
            if(is_submit){
                return false;
            }
            var name = $('.J_name').val();//名称
            var spec = $('.J_spec').val();//规格
            var price = $('.J_price').val();//价格
            var orgin_price = $('.J_orgin_price').val();//原价
            var cid = $('.J_cate').val();//类别
            var cover_img = $('.J_sendimg').find('.J_cover_img').attr('data-img');
            var desc_img = $('.J_desc_img').text();
            var gid = info != null ? info.gid : '';
            if(name == ''){
                swal('请输入名称！');
                return false;
            }
            if(spec == ''){
                swal('请输入规格！');
                return false;
            }
            if(price == ''){
                swal('请输入价格！');
                return false;
            }
            if(cid == ''){
                swal('请选择类别！');
                return false;
            }
            if(cover_img == undefined || cover_img == ''){
                swal('请上传封面图！');
                return false;
            }
            is_submit = true;
            $.ajax({
                type:"POST",
                url:'{{url('shop_upgoods')}}',
                dataType:"json",
                data:{
                    "gid":gid,
                    "name":name,
                    "spec":spec,
                    "price":price,
                    "orgin_price":orgin_price,
                    "cid":cid,
                    "cover_img":cover_img,
                    "desc_img":desc_img
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    if(data.code == 100){
                        if(gid != ''){
                            swal("编辑成功！");
                        }else{
                            swal("添加成功！");
                        }
                        window.location.href = '{{url('shop_goods')}}';
                    }else{
                        swal(data.info);
                    }
                },
                complete:function(){
                    is_submit = false;
                }
            })
        });
    </script>
@endsection