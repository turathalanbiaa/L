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

    @yield("content")

    @yield("extra-content")

    {{-- Scripts --}}
    <script src="{{asset("js/jquery-3.4.1.min.js")}}"></script>
    <script src="{{asset("js/popper.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/mdb.min.js")}}"></script>
    <script src="{{asset("js/modules/toastr.min.js")}}"></script>

    @yield("script")
</body>
</html>
