@extends('dorm.dormTemp')
@section('css')
    @parent
    <link href="{{URL::asset('css/plugins/switchery/switchery.css')}}" rel="stylesheet">
    <style>
        .onoffswitch-inner::before {
            content: '男';
        }

        .onoffswitch-inner::after {
            content: '女';
            background-color: red;
            color: white;
        }
    </style>
@show
@section('title','宿舍管理-添加物料')
@section('nav4','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加物料</h5>
                    </div>
                    <div class="ibox-content">


                            <div class="form-group">
                                <label class="font-noraml">名称</label>
                                <input type="text" placeholder="物料名称 必填" class="form-control J_name" required>
                            </div>
                            <div class="form-group">
                                <label class="font-noraml">规格</label>
                                    <input type="text" placeholder="物料规格 选填" class="form-control J_spec">
                            </div>
                            <div class="form-group">
                                <label class="font-noraml">数量</label>
                                <input type="number" placeholder="数量 必填" min="1" class="form-control J_num">
                            </div>
                            <div class="form-group">
                                <label class="font-noraml">单价</label>
                                <input type="text" placeholder="单价 选填" class="form-control J_price">
                            </div>


                        <div class="form-group">
                            <label class="font-noraml">备注</label>
                            <input type="text" placeholder="备注 选填" class="form-control J_remark">
                        </div>
                        <div class="form-group" style="padding-bottom:20px;">
                            <div class="col-sm-12" style="text-align:center;">
                                <button class="btn btn-warning J_submit" type="submit">添加</button>
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
    <script src="{{URL::asset('js/plugins/switchery/switchery.js')}}"></script>
    <script>
        $(document).ready(function () {
            // 提交
            var is_submit = false;
            $('.J_submit').click(function () {
                if (is_submit) {
                    return false;
                }
                var goods_name = $('.J_name').val();//物料名称
                if (goods_name == '') {
                    swal('请输入物料名称！');
                    return false;
                }
                var goods_spec = $('.J_spec').val();
                var goods_num = $('.J_num').val();
                if (goods_num == '') {
                    swal('请输入物料数量！');
                    return false;
                }
                var goods_price = $('.J_price').val();
                var goods_remark = $('.J_remark').val();
                $.ajax({
                    type: "post",
                    url: '{{url('dorm_addGoodsInfo')}}',
                    dataType: "json",
                    data: {
                        "goods_name": goods_name,
                        "goods_spec": goods_spec,
                        "goods_num": goods_num,
                        "goods_price": goods_price,
                        "goods_remark": goods_remark
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.code == 100) {
                            window.location.href = '{{url('dorm_roomGoods')}}';
                        } else {
                            swal(data.info);
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
