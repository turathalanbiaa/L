<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{!! csrf_token() !!}">

    @yield("title")

    <!-- Stylesheets -->
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/mdb.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/mdb.lite.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/modules/toastr.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/style.css")}}" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/16c32d26f1.js"></script>
</head>
<body data-spy="scroll" data-target="#navbar-turath" data-offset="0">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" id="navbar-turath">
    <div class="container">
        <a class="navbar-brand mr-0 ml-lg-4 ml-md-0 ml-sm-0" href="javascript:void(0)">
            <img src="{{asset("img/visitor/logo-white.png")}}" height="40" class="d-inline-block align-top" alt="mdb logo">
            <span class="d-lg-none">معهد تراث الانبياء</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <nav class="navbar-nav ml-auto">
                <a class="nav-link" href="#home">الرئيسية</a>
                <a class="nav-link" href="#services">الخدمات</a>
                <a class="nav-link" href="#">الدورات</a>
                <div class="d-flex flex-column d-lg-none">
                    <a class="nav-link" href="/create-student-account">انشاء حساب طالب</a>
                    <a class="nav-link" href="/create-listener-account">انشاء حساب مستمع</a>
                    <a class="nav-link" href="/balance-account">الفرق بين الحسابين</a>
                </div>
                <a class="nav-link" href="#about">نبذة عن الحوزة والمعهد</a>
                <a class="nav-link" href="#contact-us">تواصل معنا</a>
                <div class="d-lg-none">
                    <hr class="hr-light clearfix">
                    <div class="d-flex flex-row justify-content-around">
                        @foreach(\App\Enum\Language::getList() as $key => $language)
                            <a class="btn btn-sm btn-outline-white" href="/?locale={{$key}}">{{$language}}</a>
                        @endforeach
                    </div>
                </div>
            </nav>

            <div class="d-lg-block d-none">
                <nav class="navbar-nav nav-flex-icons">
                    <div class="nav-item dropdown">
                        <a class="nav-link" id="dropdownUserMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-user" style="font-size: 25px"></i>
                        </a>
                        <div class="dropdown-menu dropdown-turath" aria-labelledby="dropdownUserMenuLink">
                            <a class="dropdown-item" href="/create-student-account">
                                <i class="fa fa-graduation-cap"></i>
                                <span>انشاء حساب طالب</span>
                            </a>
                            <a class="dropdown-item" href="/create-listener-account">
                                <i class="fa fa-headphones-alt"></i>
                                <span>انشاء حساب مستمع</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/create-account">
                                <i class="fa fa-balance-scale-left"></i>
                                <span>الفرق بين الحسابين</span>
                            </a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a class="nav-link" id="dropdownLanguageMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-language" style="font-size: 25px"></i>
                        </a>

                        <div class="dropdown-menu dropdown-turath" aria-labelledby="dropdownLanguageMenu">
                            @foreach(\App\Enum\Language::getList() as $key => $language)
                                <a class="dropdown-item" href="/?locale={{$key}}">{{$language}}</a>
                            @endforeach
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</nav>

    @yield("content")

    <footer id="footer" class="page-footer unique-color-dark">
        <div class="footer-copyright py-3 text-center" dir="ltr">
            ©2016 Copyright:
            <a href="https://www.turathalanbiaa.com" target="_blank">
                <strong> turathalanbiaa.com</strong>
            </a>
        </div>
    </footer>

    @yield("extra-content")

    {{-- Scripts --}}
    <script src="{{asset("js/jquery-3.4.1.min.js")}}"></script>
    <script src="{{asset("js/popper.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/mdb.min.js")}}"></script>
    <script src="{{asset("js/modules/toastr.min.js")}}"></script>
    <script>
        new WOW().init();
        $("#navbar-turath a[href^='#']").on('click', function(e) {
            e.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 1000, function(){
                window.location.hash = hash;
            });
        });
    </script>
    @yield("script")
</body>
</html>
