<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="viewport"
              content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no, minimal-ui" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- fonts -->
        <link href="/https://fonts.googleapis.com/css?family=Questrial|Raleway:700,900" rel="stylesheet">

        <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/css/bootstrap.extension.css" rel="stylesheet" type="text/css" />
        <link href="/css/style.css" rel="stylesheet" type="text/css" />
        <link href="/css/swiper.css" rel="stylesheet" type="text/css" />
        <link href="/css/sumoselect.css" rel="stylesheet" type="text/css" />
        <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="/img/favicon.ico" />
        <title>Ceflix Images</title>
    </head>
    <body>
        <div id="app">
            
        </div>


        <script src="{{ asset('js/app.js') }}"></script>
        <script src="/js/jquery-2.2.4.min.js"></script>
        <script src="/js/swiper.jquery.min.js"></script>
        <script src="/js/global.js"></script>

        <!-- styled select -->
        <script src="/js/jquery.sumoselect.min.js"></script>

        <!-- counter -->
        <script src="/js/jquery.classycountdown.js"></script>
        <script src="/js/jquery.knob.js"></script>
        <script src="/js/jquery.throttle.js"></script>





        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </body>
</html>
