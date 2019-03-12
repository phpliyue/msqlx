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
            {{--<p>下面是我们能为你提供优质的服务于产品,我们还不会不断提供新的服务.敬请期待!</p>--}}
        </div>
        <div class="container">
            <div class="steps__inner">
                <div class="step">
                    <div class="step__media">
                        {{--<img src="{{URL::asset('web/img/undraw_designer.svg')}}" class="step__image">--}}
                        <img src="{{URL::asset('web/img/server1.svg')}}" class="step__image">
                    </div>
                    <h4>产品与服务平台化</h4>
                    {{--<p class="step__text">功能与应用聚合化，各种资源、各种信息的交换与互动。</p>--}}
                </div>
                <div class="step">
                    <div class="step__media">
                        <a href=""><img src="{{URL::asset('web/img/server2.svg')}}" class="step__image"></a>
                    </div>
                    <h4><a href="#">数据可视化，智能化。</a></h4>
                    <p class="step__text"></p>
                </div>
                <div class="step">
                    <div class="step__media">
                        <img src="{{URL::asset('web/img/server3.svg')}}" class="step__image">
                    </div>
                    <h4>需求定制化，操作人性化。</h4>
                    <p class="step__text"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Expanded sections -->
    <div class="expanded landing__section" id="iserver">
        <div class="container">
            <div class="expanded__inner">
                <div class="expanded__media">
                    <img src="{{URL::asset('web/img/internet.svg')}}" class="expanded__image">
                </div>
                <div class="expanded__content">
                    <h2 class="expanded__title"><a href="/web_iserver" alt="点击查看详情">技术服务</a></h2>
                    <p class="expanded__text">我们专注于微信、阿里、百度小程序开发，钉钉应用定制开发，为企业工作流程优化提供解决方案。整体提升企业综合竞争能力。</p>
                </div>
            </div>
        </div>
    </div>
    <div class="expanded landing__section" id="xserver">
        <div class="container">
            <div class="expanded__inner">
                <div class="expanded__media">
                    <img src="{{URL::asset('web/img/snowball.svg')}}" class="expanded__image">
                </div>
                <div class="expanded__content">
                    <h2 class="expanded__title"><a href="/web_xserver" alt="点击查看详情">雪球社区</a></h2>
                    <p class="expanded__text">专注社区服务,为百姓提供优质产品与服务，详情请关注微信公众号“雪球社区”或搜索小程序“雪球社区”</p>
                </div>
            </div>
        </div>
    </div>
    <div class="expanded landing__section" id="qserver">
        <div class="container">
            <div class="expanded__inner">
                <div class="expanded__media">
                    <img src="{{URL::asset('web/img/business.svg')}}" class="expanded__image">
                </div>
                <div class="expanded__content">
                    <h2 class="expanded__title"><a href="/web_qserver" alt="点击查看详情">商企服务</a></h2>
                    <p class="expanded__text">企业注册税务一站式服务</p>
                </div>
            </div>
        </div>
    </div>
    <div class="expanded landing__section" id="xss">
        <div class="container">
            <div class="expanded__inner">
                <div class="expanded__media">
                    <img src="{{URL::asset('web/img/xss.svg')}}" class="expanded__image">
                </div>
                <div class="expanded__content">
                    <h2 class="expanded__title"><a href="/web_xss" alt="点击查看详情">小宿舍</a></h2>
                    <p class="expanded__text">一款用微信小程序管理宿舍的小工具</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Call To Action -->
    {{--<div class="cta cta--reverse">--}}
        {{--<div class="container">--}}
            {{--<div class="cta__inner">--}}
                {{--<h2 class="cta__title">获取更多服务与内容</h2>--}}
                {{--<p class="cta__sub cta__sub--center">xxxxxxxxxx</p>--}}
                {{--<a href="#" class="button button__accent">加入</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
        {{--@parent--}}
    @endsection
@section('footer')
    @parent
    @endsection
@section('js')
        @parent
    @endsection



