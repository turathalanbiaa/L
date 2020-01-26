@extends("admin-dashboard.layout.app")

@section("title")
    Side Nav
@endSection

@section("style")
    <style>
        .fixed-skin nav,
        .fixed-skin footer{
            background-color: #114861;
        }
        [lang=ar] .fixed-skin nav.fixed-top,
        [lang=ar] .fixed-skin footer.sticky-bottom,
        [lang=ar] .fixed-skin main {
            margin-right: 15rem;
        }
        [lang=en] .fixed-skin nav.fixed-top,
        [lang=en] .fixed-skin footer.sticky-bottom,
        [lang=en] .fixed-skin main {
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
        footer.sticky-bottom {
            position: sticky;
            top: 100%;
        }
        footer.page-footer .footer-copyright {
            overflow: hidden;
            color: rgba(255, 255, 255, 0.6);
            background-color: rgba(0, 0, 0, 0.2);
        }
        .side-nav {
            position: fixed;
            z-index: 1040;
            width: 15rem;
            top: 0;
            height: 100vh;
            overflow: hidden;
        }
        .side-nav-skin {
            position: sticky;
            top: 0;
            width: 100%;
            height: auto;
            overflow: hidden;
            background-attachment: fixed;
            background-position: right;
            background-repeat: no-repeat no-repeat;
            background-image: url(http://localhost:8000/img/sidenav.jpg);
        }
        .side-nav-content {
            color: #ffffff;
            overflow-x: hidden;
            overflow-y: scroll;
            width: 100%;
            height: 100%;
            background-color: rgba(21,78,96,0.8);
        }
        .side-nav-content::-webkit-scrollbar {
            width: 1px;
        }
        @media screen and (max-width: 992px) {
            .fixed-skin nav.fixed-top,
            .fixed-skin footer.sticky-bottom,
            .fixed-skin main {
                margin-right: 0!important;
            }
            .side-nav {
                display: none;
            }
        }
    </style>
@endSection
@section("content")
    <!-- Navigation -->
    <nav class="mb-1 navbar fixed-top scrolling-navbar navbar-dark rgba-cyan-dark">
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

    <!-- Side Navigation -->
    <div class="side-nav" id="mySidenav">
        <div class="side-nav-skin">
            <div class="side-nav-content">
                <h3 class="text-center bg-transparent">first</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">line</h3>
                <h3 class="text-center bg-transparent">last</h3>
            </div>
        </div>
    </div>

    <!-- Main -->
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12"><h3 class="text-center bg-light">this is first line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is middle line</h3></div>
                <div class="col-12"><h3 class="text-center bg-light">this is last line</h3></div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="page-footer sticky-bottom rgba-cyan-dark">
        <div class="footer-copyright py-3 text-center" dir="ltr">
            © 2016 Copyright:
            <a href="https://www.turathalanbiaa.com" target="_blank">
                <strong> turathalanbiaa.com</strong>
            </a>
        </div>
    </footer>
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
