<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

@stack('metatags')

<!-- CSS Stylesheets
            ============================================= -->
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/main.style.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/smartmenu.css') }}">

    <!-- Modernizr.js Script -->
    <script src="{{ asset('theme/js/modernizr.js') }}"></script>

@stack('styles')
<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body id="top">

<!-- Preloader
            ============================================= -->
<!--<div id="preloader">
    <div id="status">
        {{--<div data-loader="circle-side"></div>--}}
        <img src="{{ asset('images/loading.gif') }}" alt="Carregando">
    </div>
</div>-->
<!-- /end of preloader -->

<main>
    @yield('content')
</main>

@include('partials.site.header')

<!-- Go to top arrow
            ============================================= -->
<a href="#top" class="goto-top ti-arrow-up"></a>
<!-- End Back To Top v1 -->

@include('partials.site.footer')

<!-- Necessary Scripts -->
<script src="{{ asset('theme/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('theme/js/scripts.js') }}"></script>
<script src="{{ asset('theme/js/jquery.smartmenus.js') }}"></script>
<script src="{{ asset('theme/js/smartmenu.script.js') }}"></script>
<script src="{{ asset('theme/js/jquery.matchHeight-min.js') }}"></script>
<script src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
<script src="/js/app.js"></script>
<script src="/js/util.js"></script>

{!! Rapyd::scripts() !!}
@stack('scripts')

<!-- FACEBOOK -->
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- TWITTER -->
<script>
    window.twttr = (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);

        t._e = [];
        t.ready = function (f) {
            t._e.push(f);
        };

        return t;
    }(document, "script", "twitter-wjs"));
</script>

<script>
    $(function() {
        $('.footer-4 .col-md-3').matchHeight();
    });
</script>
</body>
</html>
