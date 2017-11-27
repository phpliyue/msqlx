/**
 * Created by Administrator on 2017/11/26.
 */
alert(22222222222);
var isload = false;
//上传图片
$("#inputImage").on("change",function(){
    if (isload) {
        return false;
    }
    isload = true;
    // $("#form").ajaxSubmit({
    //     url: "/img_update",
    //     type: "post",
    //     // headers: {
    //     //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     // },
    // //     // dataType: "text",
    // //     // data:{name:"pic"},
    //     success: function (data) {
    //         alert(111);
    //         // data = JSON.parse(data);
    //         /*if (data.status ==100) {
    //             var turl = imgurl+data.info;
    //             var upimg = new Image;
    //             upimg.src = turl;
    //             var imgstyle;
    //             upimg.onload = function(){
    //                 if(upimg.width>upimg.height){
    //                     imgstyle = "width:100%";
    //                 }else{
    //                     imgstyle = "height:100%";
    //                 }
    //                 $(".haveimg").html('<img imgurl="'+data.info+'" style="'+imgstyle+'min-width: 0px !important; min-height: 0px !important; max-width: none !important; max-height: none !important; width: 250px; height: 167px; margin-left: -25px; margin-top: -22px;" src="'+turl+'"/>');
    //             }
    //         }*/
    //     },
    //     error:function(){
    //         alert('error');
    //     },
    //     complete:function(){
    //         isload = false;
    //     }
    // });
    $.ajax({
        type: "post",
        url: '/img_update',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        // dataType: "json",
        async: true,
        success: function () {
           alert(1111);
        },
        error: function(){
            alert('ss');
        }
    });
});