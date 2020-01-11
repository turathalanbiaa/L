@extends("admin-dashboard.layout.app")

@section("title")
    Side Nav
@endSection

@section("style")
    <style>
        .light-blue-skin .navbar {
            color: #fff;
            background-color: #3f5c80;
        }
        [lang=ar] .light-blue-skin .fixed-top {
             margin-right: 15rem;
         }
        [lang=en] .light-blue-skin .fixed-top {
            margin-left: 15rem;
        }
        .dropdown-default {
            text-align: inherit;
        }

        [lang=ar] .dropdown-default {
            right: auto;
            left: 0;
        }
        [lang=en] .dropdown-default {
            right: 0;
            left: auto;
        }



        .side-nav {
            position: fixed;
            top: 0;
            z-index: 1040;
            width: 15rem;
            height: 100%;
            padding: 0 0 3.75rem 0;
            margin: 0;
            overflow:scroll;
            list-style-type: none;
            background-color: #2c2f34;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
            box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
            border-bottom: 2px solid red;
        }
        .skin {
            background-image: url({{asset("img/sidenav.jpg")}});
        }
        .side-nav .sidenav-bg {
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: -1;
            width: 15rem;
            background-attachment: fixed;
        }
        .rgba-blue-strong {
            background-color: rgba(33,150,243,0.7);
        }
        .light-blue-skin .side-nav .sidenav-bg:after {
            background: rgba(87,134,180,0.8);
        }
        .side-nav .sidenav-bg:after {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: -1;
            display: block;
            width: 100%;
            height: 100%;
            padding-bottom: 200px;
            margin-bottom: -200px;
            content: "";
        }

        [lang=ar] .main {
            margin-right: 15rem;
        }

        [lang=en] .main{
            margin-left: 15rem;
        }



        @media screen and (max-width: 992px) {
            .light-blue-skin .fixed-top {
                margin: 0!important;
            }

            .side-nav {
                display: none;
            }
            .main {
                margin: 0!important;
            }
        }
    </style>
@endSection

@section("content")

    <nav class="mb-1 navbar fixed-top scrolling-navbar navbar-dark">
        <a class="navbar-brand" href="javascript:void(0)">Turath Al-Anbiaa</a>
        <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

            <li class="nav-item mt-1 d-lg-none d-block">
                <a class="nav-link d-block" id="showSidenav">
                    <i class="fas fa-bars"></i>
                </a>

                <a class="nav-link d-none" id="hideSidenav">
                    <i class="fas fa-times"></i>
                </a>
            </li>
        </ul>
    </nav>

    <div class="side-nav skin" id="mySidenav">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center"><h3>line 1</h3></div>
                <div class="col-md-12 text-center"><h3>line 1</h3></div>
                <div class="col-md-12 text-center"><h3>line 1</h3></div>
                <div class="col-md-12 text-center"><h3>line 1</h3></div>
                <div class="col-md-12 text-center"><h3>line 1</h3></div>
                <div class="col-md-12 text-center"><h3>line 1</h3></div>
                <div class="col-md-12 text-center"><h3>line 1</h3></div>
                <div class="col-md-12 text-center"><h3>line 1</h3></div>
                <div class="col-md-12 text-center"><h3>line 1</h3></div>
                <div class="col-md-12 text-center"><h3>line 1</h3></div>
                <div class="col-md-12 text-center"><h3>line 1</h3></div>
                <div class="col-md-12 text-center"><h3>line 10</h3></div>
                <div class="col-md-12 text-center"><h3>line 10</h3></div>
                <div class="col-md-12 text-center"><h3>line 10</h3></div>
                <div class="col-md-12 text-center"><h3>line 10</h3></div>
                <div class="col-md-12 text-center"><h3>line 10</h3></div>
                <div class="col-md-12 text-center"><h3>line 10</h3></div>
                <div class="col-md-12 text-center"><h3>line 10</h3></div>
                <div class="col-md-12 text-center"><h3>line 10</h3></div>
                <div class="col-md-12 text-center"><h3>line 10</h3></div>
                <div class="col-md-12 text-center"><h3>line 10</h3></div>
                <div class="col-md-12 text-center"><h3>line 10</h3></div>
                <div class="col-md-12 text-center"><h3>line 20</h3></div>
                <div class="col-md-12 text-center"><h3>line 20</h3></div>
                <div class="col-md-12 text-center"><h3>line 20</h3></div>
                <div class="col-md-12 text-center"><h3>line 20</h3></div>
                <div class="col-md-12 text-center"><h3>line 20</h3></div>
                <div class="col-md-12 text-center"><h3>line 30</h3></div>
            </div>
        </div>
        <div class="sidenav-bg rgba-blue-strong"></div>
    </div>
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
                <div class="col-md-12 text-center"><h2>this is my content of main page </h2></div>
            </div>
        </div>

        <footer class="page-footer unique-color-dark">
            <div class="footer-copyright py-3 text-center" dir="ltr">
                © 2016 Copyright:
                <a href="https://www.turathalanbiaa.com" target="_blank">
                    <strong> turathalanbiaa.com</strong>
                </a>
            </div>
        </footer>
    </div>
@endsection

@section("script")
    <script>
        $("#showSidenav").click(function () {
            $("#mySidenav").removeClass("fadeOutRight")
                .addClass("d-block animated fadeInRight");
            // document.body.style.backgroundColor = "rgba(33,150,243,0.24)";
            $(this).addClass("d-none").removeClass("d-block");
            $("#hideSidenav").addClass("d-block").removeClass("d-none");
        });

        $("#hideSidenav").click(function () {
            $("#mySidenav").removeClass("fadeInRight")
                .addClass("d-none animated fadeOutRight");
            // document.body.style.backgroundColor = "rgb(255, 255, 255)";
            $(this).addClass("d-none").removeClass("d-block");
            $("#showSidenav").addClass("d-block").removeClass("d-none");
        });
    </script>
@endsection
