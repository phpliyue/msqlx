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
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
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
                    <a href="index.html"><img src="{{URL::asset('company/img/logo2.png')}}" alt="" title="" /></a><span style="font-size: 18px;margin-left:10px;">码上互联网信息服务有限公司</span>

                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="#home">首页</a></li>
                        <li><a href="#service_product">服务与产品</a></li>
                        <li><a href="#case">案例</a></li>
                        <li><a href="#about">关于</a></li>
                        <li class="menu-has-children"><a href="">加入</a>
                            <ul>
                                <li><a href="generic.html">注册</a></li>
                                <li><a href="elements.html">登入</a></li>
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
            <div class="row fullscreen d-flex align-items-center justify-content-center">
                <div class="banner-content col-lg-7">
                    <h1 style="margin-top:-120px;">
                        XXXXXXX
                    </h1>
                    <p class="pt-20 pb-20">

                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Start we-offer Area -->
    <section class="we-offer-area section-gap" id="service_product">
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
                            <img src="{{URL::asset('company/img/p1.png')}}" alt="">
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
                            <img src="{{URL::asset('company/img/p3.png')}}" alt="">
                        </div>
                        <div class="desc">
                            <a href="#"><h4>互联网服务</h4></a>
                            <p>
                                提供互联网技术支持与建议，帮助小微企业快速接入互联网，我们不光做技术外包，还要以合伙人的角度去帮助小微企业代运营，只有把客户的事业当作自己的事业才能服务好客户。
                            </p>
                        </div>
                    </div>
                    <div class="single-offer d-flex flex-row pb-30">
                        <div class="icon">
                            <img src="{{URL::asset('company/img/p3.png')}}" alt="">
                        </div>
                        <div class="desc">
                            <a href="/dorm_index"><h4>宿舍管理</h4></a>
                            <p>
                                铺位信息：设置所管理的铺位，每个铺位一个自有编码，不可重复。考虑到铺位信息较多，系统设置有人性化的批量增加铺位编码功能，以减轻工作人员初始数据的工作量。
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-offer d-flex flex-row pb-30">
                        <div class="icon">
                            <img src="{{URL::asset('company/img/p2.png')}}" alt="">
                        </div>
                        <div class="desc">
                            <a href="/signIn_index"><h4>码上去签到</h4></a>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation.
                            </p>
                        </div>
                    </div>
                    <div class="single-offer d-flex flex-row pb-30">
                        <div class="icon">
                            <img src="{{URL::asset('company/img/p4.png')}}" alt="">
                        </div>
                        <div class="desc">
                            <a href="#"><h4>雪球社区</h4></a>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation.
                            </p>
                        </div>
                    </div>
                    <div class="single-offer d-flex flex-row pb-30">
                        <div class="icon">
                            <img src="/" alt="">
                        </div>
                        <div class="desc">
                            <a href="#"><h4>预留</h4></a>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis nostrud exercitation.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 行业案例 -->
    <section class="protfolio-area section-gap" id="case">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h1 class="mb-10">行业案例</h1>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 single-portfolio">
                    <img class="image img-fluid" src="{{URL::asset('company/img/p1.jpg')}}" alt="">
                    <a href="{{URL::asset('company/img/p1.jpg')}}" class="img-pop-up">
                        <div class="middle">
                            <div class="text"><span class="lnr lnr-frame-expand"></span></div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 single-portfolio">
                    <img class="image img-fluid" src="{{URL::asset('company/img/p2.jpg')}}" alt="">
                    <a href="{{URL::asset('company/img/p2.jpg')}}" class="img-pop-up">
                        <div class="middle">
                            <div class="text"><span class="lnr lnr-frame-expand"></span></div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 single-portfolio">
                    <img class="image img-fluid" src="{{URL::asset('company/img/p3.jpg')}}" alt="">
                    <a href="{{URL::asset('company/img/p3.jpg')}}" class="img-pop-up">
                        <div class="middle">
                            <div class="text"><span class="lnr lnr-frame-expand"></span></div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-8 single-portfolio">
                    <img class="image img-fluid" src="{{URL::asset('company/img/p4.jpg')}}" alt="">
                    <a href="{{URL::asset('company/img/p4.jpg')}}" class="img-pop-up">
                        <div class="middle">
                            <div class="text"><span class="lnr lnr-frame-expand"></span></div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 single-portfolio">
                    <img class="image img-fluid" src="{{URL::asset('company/img/p5.jpg')}}" alt="">
                    <a href="{{URL::asset('company/img/p5.jpg')}}" class="img-pop-up">
                        <div class="middle">
                            <div class="text"><span class="lnr lnr-frame-expand"></span></div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 single-portfolio">
                    <img class="image img-fluid" src="{{URL::asset('company/img/p6.jpg')}}" alt="">
                    <a href="{{URL::asset('company/img/p6.jpg')}}" class="img-pop-up">
                        <div class="middle">
                            <div class="text"><span class="lnr lnr-frame-expand"></span></div>
                        </div>
                    </a>
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
                        <h1 class="mb-10">Testimonial from our Clients</h1>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-tstimonial-carusel">
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="{{URL::asset('company/img/t1.png')}}" alt="">
                        <p class="desc">
                            Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
                        </p>
                        <h4>Mark Alviro Wiens</h4>
                        <p>
                            CEO at Google
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="{{URL::asset('company/img/t2.png')}}" alt="">
                        <p class="desc">
                            Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
                        </p>
                        <h4>Mark Alviro Wiens</h4>
                        <p>
                            CEO at Google
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="{{URL::asset('company/img/t3.png')}}" alt="">
                        <p class="desc">
                            Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
                        </p>
                        <h4>Mark Alviro Wiens</h4>
                        <p>
                            CEO at Google
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="{{URL::asset('company/img/t1.png')}}" alt="">
                        <p class="desc">
                            Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
                        </p>
                        <h4>Mark Alviro Wiens</h4>
                        <p>
                            CEO at Google
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="{{URL::asset('company/img/t2.png')}}" alt="">
                        <p class="desc">
                            Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
                        </p>
                        <h4>Mark Alviro Wiens</h4>
                        <p>
                            CEO at Google
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="{{URL::asset('company/img/t3.png')}}" alt="">
                        <p class="desc">
                            Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
                        </p>
                        <h4>Mark Alviro Wiens</h4>
                        <p>
                            CEO at Google
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="{{URL::asset('company/img/t1.png')}}" alt="">
                        <p class="desc">
                            Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
                        </p>
                        <h4>Mark Alviro Wiens</h4>
                        <p>
                            CEO at Google
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="{{URL::asset('company/img/t2.png')}}" alt="">
                        <p class="desc">
                            Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
                        </p>
                        <h4>Mark Alviro Wiens</h4>
                        <p>
                            CEO at Google
                        </p>
                    </div>
                    <div class="single-testimonial item">
                        <img class="mx-auto" src="{{URL::asset('company/img/t3.png')}}" alt="">
                        <p class="desc">
                            Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
                        </p>
                        <h4>Mark Alviro Wiens</h4>
                        <p>
                            CEO at Google
                        </p>
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
                            <li><a href="#">msqlx</a></li>
                            <li><a href="#">msqhs</a></li>
                            <li><a href="#">雪球社区</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6  col-md-12">
                    <div class="single-footer-widget newsletter">
                        <h6>联系我们</h6>
                        <p>发送您的邮件，我们第一时间联系您。</p>
                        <div id="mc_embed_signup">
                            <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

                                <div class="form-group row" style="width: 100%">
                                    <div class="col-lg-8 col-md-12">
                                        <input name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                                        <div style="position: absolute; left: -5000px;">
                                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
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
                        <h6 class="mb-20">冰箱贴</h6>
                        <ul class="instafeed d-flex flex-wrap">
                            <li><img src="{{URL::asset('company/img/i1.jpg')}}" alt=""></li>
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
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->
@show
@section('js')
<script src="{{URL::asset('company/js/vendor/jquery-2.2.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{URL::asset('company/js/vendor/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="{{URL::asset('company/js/easing.min.js')}}"></script>
<script src="{{URL::asset('company/js/hoverIntent.js')}}"></script>
<script src="{{URL::asset('company/js/superfish.min.js')}}"></script>
<script src="{{URL::asset('company/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{URL::asset('company/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{URL::asset('company/js/owl.carousel.min.js')}}"></script>
<script src="{{URL::asset('company/js/jquery.sticky.js')}}"></script>
<script src="{{URL::asset('company/js/jquery.nice-select.min.js')}}"></script>
<script src="{{URL::asset('company/js/parallax.min.js')}}"></script>
<script src="{{URL::asset('company/js/mail-script.js')}}"></script>
<script src="{{URL::asset('company/js/main.js')}}"></script>
@show

</body>
</html>



