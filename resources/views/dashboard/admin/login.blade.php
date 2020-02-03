<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang("admin-dashboard/login.title")</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <!-- Custom Style -->
    <link href="{{asset("css/custom.css")}}" rel="stylesheet" type="text/css">
    <!-- Inside Page Styles -->
    <style>
        html, body {
            background-color: #f0f3f9;
            color: #23282c;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <!-- content -->
    <div class="d-flex justify-content-center align-items-center full-height position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-4">
                    <h4 class="text-center font-weight-bold mb-4">@lang("dashboard-admin/login.header")</h4>
                    <div class="card mx-3 shadow-sm">
                        <div class="card-body">
                            @if(session("error"))
                                <div class="alert alert-danger animated fadeIn">
                                    {{ session("error") }}
                                </div>
                            @endif
                            <form role="form" method="POST" action="{{route('dashboard.admin.login')}}">
                                @csrf

                                <div class="form-group">
                                    <label class="control-label" for="username">@lang('dashboard-admin/login.input-username')</label>
                                    <input type="text" class="form-control form-control-sm" name="username" id="username" value="">
                                    @error('username') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="password">@lang('dashboard-admin/login.input-password')</label>
                                    <input type="password" class="form-control form-control-sm" name="password" id="password" value="">
                                    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>

                                <div class="form-group pt-2">
                                    <div>
                                        <button type="submit" class="btn btn-block btn-default">
                                            @lang('dashboard-admin/login.btn-login')
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="links text-center pt-3">
                        <a href="{{route('dashboard.admin')}}?locale=ar">العربية</a>
                        <a href="{{route('dashboard.admin')}}?locale=en">English</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="page-footer unique-color-dark">
        <div class="footer-copyright py-3 text-center" dir="ltr">
            © 2016 Copyright:
            <a href="https://www.turathalanbiaa.com" target="_blank">
                <strong> turathalanbiaa.com</strong>
            </a>
        </div>
    </footer>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>
</body>
</html>
