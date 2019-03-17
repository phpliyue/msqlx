@extends('dorm.dormTemp')
@section('css')
    @parent
    <link href="{{URL::asset('css/plugins/switchery/switchery.css')}}" rel="stylesheet">
@show
@section('title','宿舍管理-添加管理员')
@section('nav9','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>添加管理员</h5>
                    </div>
                    <div class="ibox-content">


                        <div class="form-group">
                            <label class="font-noraml">账户名</label>
                            <input type="text" placeholder="建议使用管理员姓名 必填" class="form-control J_acount" required>
                        </div>
                        <div class="form-group">
                            <label class="font-noraml">密码</label>
                            <input type="password" placeholder="至少6位密码" class="form-control J_password" minlength="6">
                        </div>
                        <div class="form-group">
                            <label class="font-noraml">姓名</label>
                            <input type="text" placeholder="" min="1" class="form-control J_name">
                        </div>
                        <div class="form-group">
                            <label class="font-noraml">电话</label>
                            <input type="phone" placeholder="" class="form-control J_phone">
                        </div>


                        <div class="form-group">
                            <label class="font-noraml">备注</label>
                            <input type="text" placeholder="" class="form-control J_remark">
                        </div>
                        <div class="form-group" style="padding-bottom:20px;">
                            <div class="col-sm-12" style="text-align:center;">
                                <button class="btn btn-warning J_submit" type="submit">@if($data==null)添加@else编辑@endif</button>
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
            var data = <?php echo json_encode($data)?>;
            if(data !== null || data == ''){
                $('.J_acount').val(data.account);
                $('.J_password').val(data.password);
                $('.J_name').val(data.name);
                $('.J_phone').val(data.phone);
                $('.J_remark').val(data.remark);
            }
            // 提交
            var is_submit = false;
            $('.J_submit').click(function () {
                if (is_submit) {
                    return false;
                }
                var account = $('.J_acount').val();
                if (account == '') {
                    swal('请输入账号！');
                    return false;
                }
                var password = $('.J_password').val();
                if (password == '' || password.length < 6) {
                    swal('请输入至少6位密码！');
                    return false;
                }
                var name = $('.J_name').val();
                var phone = $('.J_phone').val();
                var remark = $('.J_remark').val();
                $.ajax({
                    type: "post",
                    url: '{{url('dorm_addManagerInfo')}}',
                    dataType: "json",
                    data: {
                        "id":(data== null || data == '') ? '' : data.id,
                        "account": account,
                        "password": password,
                        "name": name,
                        "phone": phone,
                        "remark": remark
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.code == 100) {
                            swal(data.info);
                            window.location.href = '{{url('dorm_company')}}';
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
