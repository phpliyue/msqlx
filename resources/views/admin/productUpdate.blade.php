@extends('temp')
@section('headImage'){{$user->head_image}}@endsection
@section('username'){{$user->name}}@endsection
{{--@section('nav2','active')--}}
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>product add</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="hr-line-dashed"></div>
                        {!! Form::open(array('route'=>'proUp','files'=>true,'class'=>'form-horizontal')) !!}
                        @foreach($data as $key)
                        <div class="form-group has-success">
                            {!! Form::label('titel','标题',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('title',"$key->title",['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group has-success">
                            {!! Form::label('coverimg','封面',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                <img src={{$key->cover}}></img>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            {!! Form::label('cover','封面',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::file('cover') !!}
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group has-success">
                            {!! Form::label('type','类型',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                周边游 &nbsp {!! Form::radio('type','zb',$key->type == 'zb'?true:false)!!} &nbsp &nbsp
                                国内游 &nbsp {!! Form::radio('type','gn',$key->type == 'gn'?true:false) !!} &nbsp &nbsp
                                国际游 &nbsp {!! Form::radio('type','gj',$key->type == 'gj'?true:false) !!}
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group has-success">
                            {!! Form::label('auth','作者',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('auth',"$key->auth",['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group has-success">
                            {!! Form::label('detail','内容',['class'=>'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                <input type="hidden" name="id" value="{{$key->id}}">
                                <input type="hidden" class="fuCon" value='{{$key->detail}}'>
                                {!! Form::text('detail',"",['class'=>'form-control summernote','id'=>'summernote']) !!}
                                <input type="hidden" value="$key->detail" name="cont" class="cont">
                                <input type="hidden" value="{{$user->shop_id}}" name="shop_id" >
                                <input type="hidden" value="{{$key->cover_name}}" name="cover_name">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group text-center">
                            {!! Form::submit('上传','',['class'=>' text-center']) !!}
                        </div>
                        @endforeach()
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')
    @parent
    <!-- SUMMERNOTE -->
    <script src="{{URL::asset('js/plugins/summernote/summernote.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{URL::asset('js/plugins/dataTables/datatables.min.js')}}"></script>
    {{--<script src="{{URL::asset('js/inspinia.js')}}"></script>--}}
    <script>
            $('.summernote').summernote(
                {
                    height:'25em',
                    focus:true,
                    callbacks: {
                        onImageUpload: function (files) {
                            sendFile(files[0]);
                        },
                        onChange: function(contents) {
                            console.log('onChange:', contents);
                            $('.cont').val(contents);
                        }
                    }
                });
        var content = $('.fuCon').val();
        function sendFile(file) {
            console.log(file);
            var img = file;
            var data = new FormData();
            data.append('file',img);
            console.log(data);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:data,
                type: "POST",
                url: '/productImageUpload',
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    console.log(url);
                    $(".summernote").summernote('insertImage', url);
                },
                error: function(){
                    console.log('error');
                }
            });
        }
        $('.summernote').summernote('code',content);
    </script>
@endsection
