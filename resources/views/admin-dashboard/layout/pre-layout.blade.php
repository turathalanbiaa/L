<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield("title")
    </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lateef|Nunito&display=swap&subset=arabic" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 84px;
            color: #467fd0;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .footer > a {
            text-decoration: none;
        }
        .mb {
            margin-bottom: 30px;
        }
        .mt {
            margin-top: 60px;
        }
        a:hover {
            color: #467fd0;
        }
    </style>
    <style>
        @if(app()->getLocale() == "en")
            body {
            direction: rtl;
            text-align: right;
            font-family: 'Nunito', sans-serif;
        }
        @else
              body {
            direction: rtl;
            text-align: right;
            font-family: 'Lateef', cursive;
        }
        @endif
    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        @yield("content")
    </div>
</body>
</html>
