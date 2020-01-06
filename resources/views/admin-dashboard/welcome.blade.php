@extends("admin-dashboard.layout.pre-layout")

@section("title")
    @lang("welcome.title")
@endsection

@section("content")
    <div class="content">
        <div class="title mb">
            @lang("welcome.header")
        </div>

        <div class="links">
            <a href="{{route('adminLogin')}}">@lang("welcome.login")</a>
            <a href="{{route('adminChangeLanguage')}}?locale=ar">العربية</a>
            <a href="{{route('adminChangeLanguage')}}?locale=en">English</a>
        </div>

        <div class="footer mt">
            <a target="_blank" href="https://turathalanbiaa.com">&copy; @lang("welcome.footer")</a>
        </div>
    </div>
@endsection
