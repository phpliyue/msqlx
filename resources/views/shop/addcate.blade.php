@extends('shop.shopTemp')
@section('title','商品管理')
@section('css')
    @parent
@show
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>新增类别</h5>
                </div>
                <div class="ibox-content">
                    <div class="form-horizontal">
                        <div class="form-group"><label class="col-lg-2 control-label">类别名称</label>
                            <div class="col-lg-10"><input type="name" placeholder="请输入类别名称" class="form-control J_name">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">排序</label>
                            <div class="col-lg-10"><input type="spec" placeholder="请输入序列号" class="form-control J_sort">
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
    <script>
        var info = <?php echo json_encode($info);?>;
        if(info != null){
            $('.J_name').val(info.name);
            $('.J_sort').val(info.sort);
        }
        //点击提交
        var is_submit = false;
        $('.J_submit').click(function(){
            if(is_submit){
                return false;
            }
            var name = $('.J_name').val();//名称
            var sort = $('.J_sort').val();//规格
            var cid = info != null ? info.cid : '';
            if(name == ''){
                swal('请输入名称！');
                return false;
            }
            if(sort == ''){
                swal('请输入序列号！');
                return false;
            }
            is_submit = true;
            $.ajax({
                type:"POST",
                url:'{{url('shop_addcate')}}',
                dataType:"json",
                data:{
                    "cid":cid,
                    "name":name,
                    "sort":sort
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    if(data.code == 100){
                        if(cid != ''){
                            swal("修改成功！");
                        }else{
                            swal("添加成功!");
                        }
                        window.location.href = '{{url('shop_cate')}}';
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