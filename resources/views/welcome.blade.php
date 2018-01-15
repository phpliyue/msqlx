<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>msqlx</title>
        <script src="{{URL::asset('js/jquery-2.1.1.js')}}"></script>
    </head>
    <body>
        <h1>msqlx</h1>
        <p>first page</p>
        <button class="liyue">ssssss</button>
        <script>
            $(document).ready(function(){
                $('.liyue').click(function(){
                    $.ajax({
                        url:'https://api.weixin.qq.com/sns/jscode2session?appid=wx5eb8e41173cf7ac2&secret=e3bf7d92c1d041344eabf1dededfec3d&js_code=071X3j1f0D0teB1KTqYe023B1f0X3j1F&grant_type=authorization_code',
                        type: "GET",
                        dataType:"json",
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(url) {
                            console.log(url);
                        }
                    })
                })
            })
        </script>
    </body>
</html>
