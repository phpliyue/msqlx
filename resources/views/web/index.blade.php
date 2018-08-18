<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MsQLX</title>

    <!-- Bootstrap core CSS -->
{{--<link href="css/bootstrap.min.css" rel="stylesheet">--}}

<!-- Animation CSS -->
    {{--<link href="css/animate.css" rel="stylesheet">--}}
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{asset('js/jquery-2.1.1.js')}}"></script>
    <link href="{{URL::asset('css/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/styleweb.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
</head>
<body id="page-top" class="landing-page">
<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">
                    <i class="fa fa-user"></i> 登入
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="page-scroll" href="#page-top">首页</a></li>
                    <li><a class="page-scroll" href="#features">小区通知</a></li>
                    <li><a class="page-scroll" href="#team">周围物价</a></li>
                    <li><a class="page-scroll" href="#testimonials">居民交流</a></li>
                    <li><a class="page-scroll" href="#pricing">旧物处置</a></li>
                    <li><a class="page-scroll" href="#contact">个人管家</a></li>
                    {{--<li><a class="page-scroll" href="#contact">个人管家</a></li>--}}
                </ul>
            </div>
        </div>
    </nav>
</div>
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox" >
        <div class="item active" style="background-image:url('images/webFirst/friend.jpg') ;background-repeat: no-repeat;background-size:100% 100%;">
            <div class="container">
                <div class="carousel-caption" >
                    <h1>我们有&nbsp;<br/>
                        能力<br/>
                        意愿
                        让自己过得更好……</h1>
                    <p>我们总是低估自己的能力,如果改变不了世界就先从自己的周围开始改变.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button">详情</a>
                        {{--<a class="caption-link" href="#" role="button">Inspinia Theme</a>--}}
                    </p>
                </div>
                {{--<div class="carousel-image wow zoomIn">--}}
                    {{--<img src="img/landing/laptop.png" alt="laptop"/>--}}
                {{--</div>--}}
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>

        </div>
        {{--background-attachment: fixed;--}}
        {{--background-repeat: no-repeat;--}}
        {{--background-size: cover;--}}
        <div class="item" style="background-image:url('images/webFirst/network.jpg');background-repeat: no-repeat;background-size:100% 100%;">
            <div class="container">
                <div class="carousel-caption blank">
                    <h1>全民参与<br/>全民互联<br/></h1>
                    <p>互联网时代线上的沟通发达无比，但我们不能冷落了线下，拿起手机热情洋溢，发下手机无比冷漠，这不是我们想要的.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">详情</a></p>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back two"></div>
        </div>
    </div>
    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<section id="features" class="container services">
    <div class="row">
        <div class="col-sm-6">
            <h2>各种通知单，满门贴！</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies
                vehicula ut id elit. Morbi leo risus.</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        <div class="col-sm-6">
            <h2>现在通知方式由你选！</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies
                vehicula ut id elit. Morbi leo risus.</p>
            <p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>
        </div>
        {{--<div class="col-sm-3">--}}
        {{--<h2>6 Charts Library</h2>--}}
        {{--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>--}}
        {{--<p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>--}}
        {{--</div>--}}
        {{--<div class="col-sm-3">--}}
        {{--<h2>Advanced Forms</h2>--}}
        {{--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>--}}
        {{--<p><a class="navy-link" href="#" role="button">Details &raquo;</a></p>--}}
        {{--</div>--}}
    </div>
</section>

<section class="container features">
    {{--<div class="row">--}}
    {{--<div class="col-lg-12 text-center">--}}
    {{--<div class="navy-line"></div>--}}
    {{--<h1>Discover great feautres</h1>--}}
    {{--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="row features-block">
        <div class="col-lg-12 features-text wow fadeInLeft">
            <small>INSPINIA</small>
            <h2>Perfectly designed </h2>
            <p>INSPINIA Admin Theme is a premium admin dashboard template with flat design concept. It is fully
                responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It
                has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>
            <a href="" class="btn btn-primary">Learn more</a>
        </div>
        {{--<div class="col-lg-6 text-right wow fadeInRight">--}}
        {{--<img src="img/landing/dashboard.png" alt="dashboard" class="img-responsive pull-right">--}}
        {{--</div>--}}
    </div>
</section>

<section id="team" class="gray-section team">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>周围物价</h1>
                <p>足不出户让你了解周围物价</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 wow fadeInLeft">
                <div class="team-member">
                    <img src="img/landing/avatar3.jpg" class="img-responsive img-circle img-small" alt=""
                         style="height:200px;width:200px">
                    <h4><span class="navy">水果</span></h4>
                    <p>Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam an
                        soluta sensibus. </p>
                    {{--<ul class="list-inline social-icon">--}}
                    {{--<li><a href="#"><i class="fa fa-twitter"></i></a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-facebook"></i></a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-linkedin"></i></a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member wow zoomIn">
                    <img src="img/landing/avatar3.jpg" class="img-responsive img-circle img-small" alt="">
                    <h4><span class="navy">蔬菜</span></h4>
                    <p>Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam an
                        soluta sensibus.</p>
                    {{--<ul class="list-inline social-icon">--}}
                    {{--<li><a href="#"><i class="fa fa-twitter"></i></a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-facebook"></i></a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-linkedin"></i></a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                </div>
            </div>
            <div class="col-sm-4 wow fadeInRight">
                <div class="team-member">
                    <img src="img/landing/avatar2.jpg" class="img-responsive img-circle img-small" alt="">
                    <h4><span class="navy">米面油</span></h4>
                    <p>Lorem ipsum dolor sit amet, illum fastidii dissentias quo ne. Sea ne sint animal iisque, nam an
                        soluta sensibus.</p>
                    {{--<ul class="list-inline social-icon">--}}
                    {{--<li><a href="#"><i class="fa fa-twitter"></i></a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-facebook"></i></a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-linkedin"></i></a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non
                    quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div>
    </div>
</section>

{{--<section class="features">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-lg-12 text-center">--}}
{{--<div class="navy-line"></div>--}}
{{--<h1>Even more great feautres</h1>--}}
{{--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row features-block">--}}
{{--<div class="col-lg-3 features-text wow fadeInLeft">--}}
{{--<small>INSPINIA</small>--}}
{{--<h2>Perfectly designed </h2>--}}
{{--<p>INSPINIA Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>--}}
{{--<a href="" class="btn btn-primary">Learn more</a>--}}
{{--</div>--}}
{{--<div class="col-lg-6 text-right m-t-n-lg wow zoomIn">--}}
{{--<img src="img/landing/iphone.jpg" class="img-responsive" alt="dashboard">--}}
{{--</div>--}}
{{--<div class="col-lg-3 features-text text-right wow fadeInRight">--}}
{{--<small>INSPINIA</small>--}}
{{--<h2>Perfectly designed </h2>--}}
{{--<p>INSPINIA Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with latest jQuery plugins.</p>--}}
{{--<a href="" class="btn btn-primary">Learn more</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--</section>--}}

{{--<section class="timeline gray-section">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-lg-12 text-center">--}}
{{--<div class="navy-line"></div>--}}
{{--<h1>Our workflow</h1>--}}
{{--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row features-block">--}}

{{--<div class="col-lg-12">--}}
{{--<div id="vertical-timeline" class="vertical-container light-timeline center-orientation">--}}
{{--<div class="vertical-timeline-block">--}}
{{--<div class="vertical-timeline-icon navy-bg">--}}
{{--<i class="fa fa-briefcase"></i>--}}
{{--</div>--}}

{{--<div class="vertical-timeline-content">--}}
{{--<h2>Meeting</h2>--}}
{{--<p>Conference on the sales results for the previous year. Monica please examine sales trends in marketing and products. Below please find the current status of the sale.--}}
{{--</p>--}}
{{--<a href="#" class="btn btn-xs btn-primary"> More info</a>--}}
{{--<span class="vertical-date"> Today <br/> <small>Dec 24</small> </span>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="vertical-timeline-block">--}}
{{--<div class="vertical-timeline-icon navy-bg">--}}
{{--<i class="fa fa-file-text"></i>--}}
{{--</div>--}}

{{--<div class="vertical-timeline-content">--}}
{{--<h2>Decision</h2>--}}
{{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>--}}
{{--<a href="#" class="btn btn-xs btn-primary"> More info</a>--}}
{{--<span class="vertical-date"> Tomorrow <br/> <small>Dec 26</small> </span>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="vertical-timeline-block">--}}
{{--<div class="vertical-timeline-icon navy-bg">--}}
{{--<i class="fa fa-cogs"></i>--}}
{{--</div>--}}

{{--<div class="vertical-timeline-content">--}}
{{--<h2>Implementation</h2>--}}
{{--<p>Go to shop and find some products. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's. </p>--}}
{{--<a href="#" class="btn btn-xs btn-primary"> More info</a>--}}
{{--<span class="vertical-date"> Monday <br/> <small>Jan 02</small> </span>--}}
{{--</div>--}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}

{{--</section>--}}

<section id="testimonials" class="navy-section testimonials" style="margin-top: 0">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center wow zoomIn">
                <i class="fa fa-comment big-icon"></i>
                <h1>
                    打造新邻里关系
                </h1>
                <div class="testimonials-text">
                    <i>"Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                        text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
                        versions have evolved over the years, sometimes by accident, sometimes on purpose (injected
                        humour and the like)."</i>
                </div>
                <small>
                    <strong>12.02.2014 - Andy Smith</strong>
                </small>
            </div>
        </div>
    </div>

</section>

<section class="comments gray-section" style="margin-top: 0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>我们能做什么？</h1>
                <p>我们要提供一个看似普通但很有内涵很有意义的一个邻里沟通平台，等着瞧吧！</p>
            </div>
        </div>
        <div class="row features-block">
            <div class="col-lg-4">
                <div class="bubble">
                    "Uncover many web sites still in their infancy. Various versions have evolved over the years,
                    sometimes by accident, sometimes on purpose (injected humour and the like)."
                </div>
                <div class="comments-avatar">
                    <a href="" class="pull-left">
                        <img alt="image" src="img/landing/avatar3.jpg">
                    </a>
                    <div class="media-body">
                        <div class="commens-name">
                            Andrew Williams
                        </div>
                        <small class="text-muted">Company X from California</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bubble">
                    "Uncover many web sites still in their infancy. Various versions have evolved over the years,
                    sometimes by accident, sometimes on purpose (injected humour and the like)."
                </div>
                <div class="comments-avatar">
                    <a href="" class="pull-left">
                        <img alt="image" src="img/landing/avatar1.jpg">
                    </a>
                    <div class="media-body">
                        <div class="commens-name">
                            Andrew Williams
                        </div>
                        <small class="text-muted">Company X from California</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bubble">
                    "Uncover many web sites still in their infancy. Various versions have evolved over the years,
                    sometimes by accident, sometimes on purpose (injected humour and the like)."
                </div>
                <div class="comments-avatar">
                    <a href="" class="pull-left">
                        <img alt="image" src="img/landing/avatar2.jpg">
                    </a>
                    <div class="media-body">
                        <div class="commens-name">
                            Andrew Williams
                        </div>
                        <small class="text-muted">Company X from California</small>
                    </div>
                </div>
            </div>


        </div>
    </div>

</section>

{{--<section class="features">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-lg-12 text-center">--}}
{{--<div class="navy-line"></div>--}}
{{--<h1>More and more extra great feautres</h1>--}}
{{--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. </p>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<div class="col-lg-5 col-lg-offset-1 features-text">--}}
{{--<small>INSPINIA</small>--}}
{{--<h2>Perfectly designed </h2>--}}
{{--<i class="fa fa-bar-chart big-icon pull-right"></i>--}}
{{--<p>INSPINIA Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with.</p>--}}
{{--</div>--}}
{{--<div class="col-lg-5 features-text">--}}
{{--<small>INSPINIA</small>--}}
{{--<h2>Perfectly designed </h2>--}}
{{--<i class="fa fa-bolt big-icon pull-right"></i>--}}
{{--<p>INSPINIA Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with.</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<div class="col-lg-5 col-lg-offset-1 features-text">--}}
{{--<small>INSPINIA</small>--}}
{{--<h2>Perfectly designed </h2>--}}
{{--<i class="fa fa-clock-o big-icon pull-right"></i>--}}
{{--<p>INSPINIA Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with.</p>--}}
{{--</div>--}}
{{--<div class="col-lg-5 features-text">--}}
{{--<small>INSPINIA</small>--}}
{{--<h2>Perfectly designed </h2>--}}
{{--<i class="fa fa-users big-icon pull-right"></i>--}}
{{--<p>INSPINIA Admin Theme is a premium admin dashboard template with flat design concept. It is fully responsive admin dashboard template built with Bootstrap 3+ Framework, HTML5 and CSS3, Media query. It has a huge collection of reusable UI components and integrated with.</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--</section>--}}
<section id="pricing" class="pricing">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>旧物处置</h1>
                <p>告别倒骑驴打欻的年代！安静，方便，价格透明是我们的宗旨</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 wow zoomIn">
                <ul class="pricing-plan list-unstyled">
                    <li class="pricing-title">
                        废品回收
                    </li>
                    <li class="pricing-desc">
                        变废为宝
                    </li>
                    <li class="pricing-price">
                        <span>$16</span> / month
                    </li>
                    <li>
                        Dashboards
                    </li>
                    <li>
                        Projects view
                    </li>
                    <li>
                        Contacts
                    </li>
                    <li>
                        Calendar
                    </li>
                    <li>
                        AngularJs
                    </li>
                    <li>
                        <a class="btn btn-primary btn-xs" href="#">Signup</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6 wow zoomIn">
                <ul class="pricing-plan list-unstyled">
                    <li class="pricing-title">
                        旧物置换
                    </li>
                    <li class="pricing-desc">
                        卖了可惜，留着没地方，不如找个新主人。
                    </li>
                    <li class="pricing-price">
                        <span>$160</span> / month
                    </li>
                    <li>
                        Dashboards
                    </li>
                    <li>
                        Projects view
                    </li>
                    <li>
                        Contacts
                    </li>
                    <li>
                        Calendar
                    </li>
                    <li>
                        AngularJs
                    </li>
                    <li>
                        <a class="btn btn-primary btn-xs" href="#">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row m-t-lg">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg">
                <p>*Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model
                    text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. <span
                            class="navy">Various versions</span> have evolved over the years, sometimes by accident,
                    sometimes on purpose (injected humour and the like).</p>
            </div>
        </div>
    </div>

</section>

<section id="contact" class="gray-section contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>个人管家</h1>
                <p>你知道的管家只出现在影视作品里，现在我们要把他请进千家万户。</p>
            </div>
        </div>
        <div class="row m-b-lg">
            <div class="col-lg-3 col-lg-offset-3">
                <address>
                    <strong><span class="navy">Company name, Inc.</span></strong><br/>
                    795 Folsom Ave, Suite 600<br/>
                    San Francisco, CA 94107<br/>
                    <abbr title="Phone">P:</abbr> (123) 456-7890
                </address>
            </div>
            <div class="col-lg-4">
                <p class="text-color">
                    Consectetur adipisicing elit. Aut eaque, totam corporis laboriosam veritatis quis ad perspiciatis,
                    totam corporis laboriosam veritatis, consectetur adipisicing elit quos non quis ad perspiciatis,
                    totam corporis ea,
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:test@email.com" class="btn btn-primary">Send us mail</a>
                <p class="m-t-sm">
                    Or follow us on social platform
                </p>
                <ul class="list-inline social-icon">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                <p><strong>&copy; 2018 沈阳市码上互联网信息服务有限公司</strong><br/> consectetur adipisicing elit. Aut eaque, laboriosam
                    veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
            </div>
        </div>
    </div>
</section>

<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script src="js/plugins/wow/wow.min.js"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function (event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function () {
        var docElem = document.documentElement,
            header = document.querySelector('.navbar-default'),
            didScroll = false,
            changeHeaderOn = 200;

        function init() {
            window.addEventListener('scroll', function (event) {
                if (!didScroll) {
                    didScroll = true;
                    setTimeout(scrollPage, 250);
                }
            }, false);
        }

        function scrollPage() {
            var sy = scrollY();
            if (sy >= changeHeaderOn) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }

        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }

        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

</body>
</html>
