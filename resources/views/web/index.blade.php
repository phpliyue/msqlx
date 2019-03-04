@extends('web.temp')
@section('meta')
        @parent
    @endsection
@section('link')
        @parent
    @endsection
@section('title','码上互联')
@section('header')
    @parent
    @endsection
@section('content')
    <div class="hero__sub">
		<span id="scrollToNext" class="scroll">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class='hero__sub__down' fill="currentColor" width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><path d="M256,298.3L256,298.3L256,298.3l174.2-167.2c4.3-4.2,11.4-4.1,15.8,0.2l30.6,29.9c4.4,4.3,4.5,11.3,0.2,15.5L264.1,380.9c-2.2,2.2-5.2,3.2-8.1,3c-3,0.1-5.9-0.9-8.1-3L35.2,176.7c-4.3-4.2-4.2-11.2,0.2-15.5L66,131.3c4.4-4.3,11.5-4.4,15.8-0.2L256,298.3z"/></svg>
		</span>
    </div>
    <!-- Steps -->
    <div class="steps landing__section">
        <div class="container">
            <h2>我们能提供什么服务与产品?</h2>
            <p>下面是我们能为你提供优质的服务于产品,我们还不会不断提供新的服务.敬请期待!</p>
        </div>
        <div class="container">
            <div class="steps__inner">
                <div class="step">
                    <div class="step__media">
                        {{--<img src="{{URL::asset('web/img/undraw_designer.svg')}}" class="step__image">--}}
                        <img src="{{URL::asset('web/img/server1.svg')}}" class="step__image">
                    </div>
                    <h4>技术服务</h4>
                    <p class="step__text">我们提供企业网站建站,小程序制作,技术咨询服务.</p>
                </div>
                <div class="step">
                    <div class="step__media">
                        <a href=""><img src="{{URL::asset('web/img/server2.svg')}}" class="step__image"></a>
                    </div>
                    <h4><a href="#" class="link">雪球社区</a></h4>
                    <p class="step__text">雪球社区是一个专注为居民提供便利服务,解决问题的平台.</p>
                </div>
                <div class="step">
                    <div class="step__media">
                        <img src="{{URL::asset('web/img/server3.svg')}}" class="step__image">
                    </div>
                    <h4>商企服务</h4>
                    <p class="step__text">我们将提供一站式的商企服务,助力每一位创业者.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Expanded sections -->
    <div class="expanded landing__section">
        <div class="container">
            <div class="expanded__inner">
                <div class="expanded__media">
                    <img src="{{URL::asset('web/img/internet.svg')}}" class="expanded__image">
                </div>
                <div class="expanded__content">
                    <h2 class="expanded__title">互联网服务</h2>
                    <p class="expanded__text">xxxxxxxxxxxxxx</p>
                </div>
            </div>
        </div>
    </div>
    <div class="expanded landing__section">
        <div class="container">
            <div class="expanded__inner">
                <div class="expanded__media">
                    <img src="{{URL::asset('web/img/snowball.svg')}}" class="expanded__image">
                </div>
                <div class="expanded__content">
                    <h2 class="expanded__title">雪球社区</h2>
                    <p class="expanded__text">xxxxxxxxxxxxxx</p>
                </div>
            </div>
        </div>
    </div>
    <div class="expanded landing__section">
        <div class="container">
            <div class="expanded__inner">
                <div class="expanded__media">
                    <img src="{{URL::asset('web/img/business.svg')}}" class="expanded__image">
                </div>
                <div class="expanded__content">
                    <h2 class="expanded__title">商企服务</h2>
                    <p class="expanded__text">xxxxxxxxxxxxxx</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Call To Action -->
    <div class="cta cta--reverse">
        <div class="container">
            <div class="cta__inner">
                <h2 class="cta__title">获取更多服务与内容</h2>
                <p class="cta__sub cta__sub--center">xxxxxxxxxx</p>
                <a href="#" class="button button__accent">加入</a>
            </div>
        </div>
    </div>
        {{--@parent--}}
    @endsection
@section('footer')
    @parent
    @endsection
@section('js')
        @parent
    @endsection



