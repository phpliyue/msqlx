@extends('dorm.dormTemp')
@section('css')
    @parent
    <link href="{{URL::asset('css/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
@show
@section('title','宿舍管理-房间管理')
@section('nav2','active')
@section('content')
    <div class="row wrapper wrapper-content animated fadeInRight">
        <div class="col-lg-2">
            <button class="btn btn-primary  dim btn-large-dim" type="button" data-toggle="modal" data-target="#myModal">+<i class="fa fa-home"></i></button>
            {{--<button type="button" class="btn btn-w-m btn-info" data-toggle="modal" data-target="#myModal">添加宿舍</button>--}}
        </div>
        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <i class="fa fa-home modal-icon"></i>
                        <h4 class="modal-title">添加宿舍</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="get">
                            <div class="form-group col-md-4"><label>楼层</label> <input type="number" placeholder="楼层" class="form-control" name="l"></div>
                            <div class="form-group col-md-4"><label>房间数</label> <input type="number" placeholder="房间数" class="form-control" name="f"></div>
                            <div class="form-group col-md-4"><label>床位数</label> <input type="number" placeholder="床位数" class="form-control" name="c"></div>
                            <hr style="width: 100%;color:red;" class="addline">

                        </form>

                        <div class="form-group col-md-12"><label>Sample Input</label> <input type="email" placeholder="Enter your email" class="form-control"></div>
                        <p style="text-align: center;">xxxxxxxxxxx</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" id="addL">添加楼层</button>
                        <button type="button" class="btn btn-white" data-dismiss="modal">取消</button>
                        <button type="button" class="btn btn-primary">添加</button>
                    </div>
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
    <script>
        $(document).ready(function(){
            $('#addL').click(function(){
//                alert('sss');
                var lou = 1;
                $('.addline:last').after("<div class='form-group col-md-4'><label>楼层</label> <input type='number' placeholder='楼层' class='form-control' name='l'></div> <div class='form-group col-md-4'><label>房间数</label> <input type='number' placeholder='房间数' class='form-control' name='f'></div> <div class='form-group col-md-4'><label>床位数</label> <input type='number' placeholder='床位数' class='form-control' name='c'></div> <hr style='width: 100%;color:red;' class='addline'>");

            })
        })
    </script>
@endsection
