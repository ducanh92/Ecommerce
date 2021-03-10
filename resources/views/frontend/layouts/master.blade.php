<html>
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        @yield('title')

        @yield('css')

        <link href="{{ asset('eshopper/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('eshopper/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('eshopper/css/prettyPhoto.css') }}" rel="stylesheet">
        <link href="{{ asset('eshopper/css/price-range.css') }}" rel="stylesheet">
        <link href="{{ asset('eshopper/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('eshopper/css/main.css') }}" rel="stylesheet">
        
        {{-- Alertify library --}}
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    </head>

    <body>
        @include('frontend.components.header')

        @yield('content')

        @include('frontend.components.footer')

        <script src="{{ asset('eshopper/js/jquery.js') }}"></script>
        <script src="{{ asset('eshopper/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('eshopper/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('eshopper/js/price-range.js') }}"></script>
        <script src="{{ asset('eshopper/js/jquery.prettyPhoto.js') }}"></script>
        <script src="{{ asset('eshopper/js/main.js') }}"></script>
        {{-- Alertify library --}}
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        
        @yield('js')
    </body>

</html>