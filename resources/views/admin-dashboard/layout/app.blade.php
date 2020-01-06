<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title")</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">
    <!-- Custom Style -->
    <link href="{{asset("css/custom.css")}}" rel="stylesheet" type="text/css">

    <!-- Inside Page Styles -->
    @yield("style")
</head>
<body>
    <!-- Content -->
    @yield("content")

    <!-- Extra Content -->
    @yield("extra-content")

    <!-- Footer -->
    <footer class="page-footer unique-color-dark">
        <div class="footer-copyright py-3 text-center" dir="ltr">
            ©2016 Copyright:
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

    <!-- Inside Page Scripts -->
    @yield("script")
</body>
</html>
