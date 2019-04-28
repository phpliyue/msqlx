@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
@section('nav1','active')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="background-color:#f0d4ff;">
                        <h5>商品分类</h5>
                        <div class="ibox-tools">
                            <input type="text" class="goodstype" value="" placeholder="请输入商品分类名称">
                            <i class="fa fa-add">
                                <button class="btn btn-primary addGoodType">添加</button>
                            </i>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover huodong">
                                <thead>
                                <tr>
                                    <th>分类编号</th>
                                    <th>分类名称</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($type as $key)
                                    <tr>
                                        <td>{{$key->id}}</td>
                                        <td>{{$key->name}}</td>
                                        <td style="text-align: center;">
                                            <a href="goods/del/{{$key->id}}"><i class="fa fa-trash text-navy"
                                                                                style="color:red;"></i> 删除</a>　
                                            |
                                            　<a href="addGoodsView/{{$key->id}}"><i class="fa fa-plus  text-navy"></i> 添加商品</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
        $('.addGoodType').click(function(){
            var type = $('.goodstype').val();
            $.ajax({
                url:'/addGoodsType',
                data:{type:type},
                success:function(reg){
                    if(reg == 1){
                        swal({
                            text:'sss',
                        })
                    }
                }

            })
        })
    </script>
@endsection
