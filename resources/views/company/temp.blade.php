<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    @section('meta')
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Author Meta -->
        <meta name="author" content="codepixer">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
    @show
    @section('link')
        {{--<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">--}}
        <!-- Favicon-->
        <link rel="shortcut icon" href="ico.png">
        <link rel="stylesheet" href="{{URL::asset('company/css/linearicons.css')}}">
        <link rel="stylesheet" href="{{URL::asset('company/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('company/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL::asset('company/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{URL::asset('company/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{URL::asset('company/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('company/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{URL::asset('company/css/main.css')}}">
    @show
    <!-- Site Title -->
    <title>@yield('title')</title>
</head>
<body>
@yield('header')
    <header id="header" id="home">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.html"><img src="{{URL::asset('company/img/logo2.png')}}" alt="" title="" /></a><span style="font-size: 18px;margin-left:10px;"></span>

                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="#home">首页</a></li>
                        <li><a href="#service_product">服务与产品</a></li>
                        <li><a href="#case">新闻</a></li>
                        <li><a href="#about">关于</a></li>
                        <li class="menu-has-children"><a href="#">加入</a>
                            <ul>
                                <li><a href="generic.html">注册</a></li>
                                <li><a href="/login">登入</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
@show

@section('content')
    <section class="banner-area" id="home">
        <div class="container">
            <div class="row fullscreen d-flex align-items-center justify-content-center" >
                <div class="banner-content col-lg-7">
                    <h2 style="margin-top:150px;">
                        沈阳码上互联网信息服务有限公司
                    </h2>
                    <p class="pt-20 pb-20">
                        用技术连接世界------
                    </p>

                </div>
            </div>
        </div>
    </section>
    <!-- Start we-offer Area -->
    <section class="we-offer-area" id="service_product" style="padding-top:50px;">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h1 class="mb-10">服务与产品</h1>
                        <p>我们立志于为用户提供优质的服务与产品。</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-offer d-flex flex-row pb-30">
                        <div class="icon">
                            <img src="{{URL::asset('company/img/p1.png')}}" alt="商企服务">
                        </div>
                        <div class="desc">
                            <a href="http://owl.msqlx.com"><h4>商企服务</h4></a>
                            <p>
                                为企业提供一站式服务，不管你是初创者还是企业家我们都为你提供专业的服务，为您节省宝贵的时间与金钱，让您更专注于核心产品与服务中，提升企业的核心价值，让企业立于不败之地。
                            </p>
                        </div>
                    </div>
                    <div class="single-offer d-flex flex-row pb-30">
                        <div class="icon">
                            <img src="{{URL::asset('company/img/web.jpg')}}" alt="互联网服务">
                        </div>
                        <div class="desc">
                            <a href="#"><h4>互联网服务</h4></a>
                            <p>
                                提供互联网技术支持与建议，帮助小微企业快速接入互联网，我们不光做技术外包，还要以合伙人的角度去帮助小微企业代运营，只有把客户的事业当作自己的事业才能服务好客户。
                            </p>
                        </div>
                    </div>
                    <div class="single-offer d-flex flex-row">
                        <div class="icon">
                            <img src="{{URL::asset('company/img/hotal.jpg')}}" alt="宿舍管理">
                        </div>
                        <div class="desc">
                            <a href="/dorm_index"><h4>宿舍管理</h4></a>
                            <p>
                                一款帮助工人宿舍,学生宿舍,旅店房间管理的小工具,全程扫码完成,智能分配合理房间,方便管理人员做好统计管理工作,免费使用,全程技术服务.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-offer d-flex flex-row pb-30">
                        <div class="icon">
                            <img src="{{URL::asset('company/img/p2.png')}}" alt="码上去签到">
                        </div>
                        <div class="desc">
                            <a href="/signIn_index"><h4>码上去签到</h4></a>
                            <p>
                                一款简单好用的签到小程序,主要功能在线生成请柬,一人一码,扫码入场,安全快捷.后台管理人员方便查看参加人数和时间.无需设备准备与技术要求.
                            </p>
                        </div>
                    </div>
                    <div class="single-offer d-flex flex-row pb-30">
                        <div class="icon">
                            <img src="{{URL::asset('company/img/p4.png')}}" alt="雪球社区">
                        </div>
                        <div class="desc">
                            <a href="#"><h4>雪球社区</h4></a>
                            <p>
                                一款社区服务产品,为居民解决问题是我们的初衷.要做好社区服务首先是信息公开,办事公平公正.试问你知道自己小区的业主委员会成员吗?怎么能保证业主的权益?还在加业主群?满是广告!
                            </p>
                        </div>
                    </div>
                    <div class="single-offer d-flex flex-row">
                        <div class="icon">
                            <img src="{{URL::asset('company/img/msqlx.jpg')}}" alt="码上去旅行">
                        </div>
                        <div class="desc">
                            <a href="#"><h4>码上去旅行</h4></a>
                            <p>
                                提供优质旅行相关服务,谁都向往说走就走的旅行,不管工作有多忙,预算有多紧张,都要留给自己一个小空间,我们一定会满足你的小小愿望.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 行业案例 -->
    <section class="latest-blog-area" id="case" style="padding-top:50px;">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">新闻</h1>
                        <p>聚焦前沿资讯,掌握行业未来.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 single-blog">
                    <img class="img-fluid" src="{{URL::asset('company/img/adone.jpg')}}" alt="">
                    <ul class="tags">
                        <li><a href="#">小程序</a></li>
                        <li><a href="#">移动应用</a></li>
                    </ul>
                    <a href="#"><h4>微信小程序</h4></a>
                    <p>
                        英文名Mini Program，是一种不需要下载安装即可使用的应用，它实现了应用“触手可及”的梦想，用户扫一扫或搜一下即可打开应用
                    </p>
                    <p class="post-date">31st January, 2018</p>
                </div>
                <div class="col-lg-6 single-blog">
                    <img class="img-fluid" src="{{URL::asset('company/img/adtwo.jpg')}}" alt="">
                    <ul class="tags">
                        <li><a href="#">企业</a></li>
                        <li><a href="#">商企服务</a></li>
                    </ul>
                    <a href="#"><h4>财务代帐</h4></a>
                    <p>
                        财务代理，通常指财务方面的专业人士以代理的名义，完成他人或公司委托的财务相关事项。财务代理运用专门方法对企业，机关，事业单位和其他组织的经济活动进行全面。综合，连续，系统地核算和监督，提供财务信息，并随着社会经济的日益发展，逐步开著预测、决策、控制和分析的一种经济管理活动，是经济管理活动的重要组成部分。
                    </p>
                    <p class="post-date">31st January, 2018</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Start testomial Area -->
    <section class="testomial-area section-gap" id="about">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">关于</h1>
                        <p>公司发展理念与意识决定成败,无论企业规模大小,结局只有两个.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-tstimonial-carusel">
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="{{URL::asset('company/img/b.png')}}" alt="">
                        <p class="desc">
                            沈阳市码上互联网信息服务有限公司是一家成立于2018年的互联网公司,本公司主要提供软件开发与产品运营,我们致力于探索新的互联网模式,打破传统.
                        </p>
                        <h4>公司简介</h4>
                        {{--<p>--}}
                            {{--E-mail:ms_internet@126.com--}}
                        {{--</p>--}}
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="{{URL::asset('company/img/h.png')}}" alt="">
                        <p class="desc">
                            开放,合作,共赢.为提高服务质量与水平我们愿意与志同道合的企业或个人合作,如果你也有合作意识和互联网意识,欢迎洽谈.唯有合作才是发展的未来.
                        <h4>合作共赢</h4>
                        {{--<p>--}}
                           {{--2--}}
                        {{--</p>--}}
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="{{URL::asset('company/img/s.png')}}" alt="">
                        <p class="desc">
                            不管你是哪个领域的商家,只要你有优质的产品,我们都欢迎您的加入,如果您的产品或服务够优秀我们会提供免费的网路营销与运营.快来加入分享!
                        </p>
                        <h4>商家</h4>
                        {{--<p>--}}
                            {{--3--}}
                        {{--</p>--}}
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="{{URL::asset('company/img/c.png')}}" alt="">
                        <p class="desc">
                           无论你是企业还是个人,都希望您关注我们,我们一定会在某个时间某个地点相遇.好的服务是在不断反馈中进步的,如果您想得到优质的服务希望您提供宝贵的意见.
                        </p>
                        <h4>客户</h4>
                        {{--<p>--}}
                            {{--4--}}
                        {{--</p>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@show
@yield('footer')
    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-12">
                    <div class="single-footer-widget">
                        <h6>产品与服务</h6>
                        <ul class="footer-nav">
                            <li><a href="#">商企服务</a></li>
                            <li><a href="#">码上去旅行</a></li>
                            <li><a href="#">码上去回收</a></li>
                            <li><a href="#">雪球社区</a></li>
                            <li><a href="#">宿舍管理</a></li>
                            <li><a href="#">网站建设</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6  col-md-12">
                    <div class="single-footer-widget newsletter">
                        <h6>联系我们</h6>
                        <p>发送您的邮件，我们第一时间联系您。</p>
                        <div id="mc_embed_signup">
                            <form target="_blank" novalidate="true" action="" method="get" class="form-inline">

                                <div class="form-group row" style="width: 100%">
                                    <div class="col-lg-8 col-md-12">
                                        <input name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = '发送您的邮箱'" required="" type="email">
                                        <div style="position: absolute; left: -5000px;">
                                            <input name="" tabindex="-1" value="" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12">
                                        <button class="nw-btn primary-btn">发送<span class="lnr lnr-arrow-right"></span></button>
                                    </div>
                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-12">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">常用网站</h6>
                        <ul class="instafeed d-flex flex-wrap">
                            <li><a href="http://www.baidu.com"><img src="{{URL::asset('company/img/i1.jpg')}}" alt=""></a></li>
                            <li><img src="{{URL::asset('company/img/i2.jpg')}}" alt=""></li>
                            <li><img src="{{URL::asset('company/img/i3.jpg')}}" alt=""></li>
                            <li><img src="{{URL::asset('company/img/i4.jpg')}}" alt=""></li>
                            <li><img src="{{URL::asset('company/img/i5.jpg')}}" alt=""></li>
                            <li><img src="{{URL::asset('company/img/i6.jpg')}}" alt=""></li>
                            <li><img src="{{URL::asset('company/img/i7.jpg')}}" alt=""></li>
                            <li><img src="{{URL::asset('company/img/i8.jpg')}}" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row footer-bottom d-flex justify-content-between">
                <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> 沈阳市码上互联网信息服务有限公司<i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="/" target="_blank">liyue</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-qq qq-bc"></i></a>
                    <a href="#"><i class="fa fa-weibo"></i></a>
                    {{--<a href="#"><i class="fa fa-dribbble"></i></a>--}}
                    <a href="#"><i class="fa fa-weixin"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->
@show
@section('js')
<script src="{{URL::asset('company/js/vendor/jquery-2.2.4.min.js')}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
<script src="{{URL::asset('company/js/vendor/bootstrap.min.js')}}"></script>
{{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>--}}
<script src="{{URL::asset('company/js/easing.min.js')}}"></script>
<script src="{{URL::asset('company/js/hoverIntent.js')}}"></script>
<script src="{{URL::asset('company/js/superfish.min.js')}}"></script>
<script src="{{URL::asset('company/js/jquery.ajaxchimp.min.js')}}"></script>
{{--浏览图片--}}
<script src="{{URL::asset('company/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{URL::asset('company/js/owl.carousel.min.js')}}"></script>
<script src="{{URL::asset('company/js/jquery.sticky.js')}}"></script>
<script src="{{URL::asset('company/js/jquery.nice-select.min.js')}}"></script>
{{--实现滚动效果--}}
<script src="{{URL::asset('company/js/parallax.min.js')}}"></script>
<script src="{{URL::asset('company/js/mail-script.js')}}"></script>
<script src="{{URL::asset('company/js/main.js')}}"></script>
@show

</body>
</html>



