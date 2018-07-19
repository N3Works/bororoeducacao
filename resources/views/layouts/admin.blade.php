<html>
    <head>
        <title>ADM - Bororó25 - @yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="author" content="DoWhile - Agência Digital Fora do Padrão">

        <meta name="csrf-token" content="{{ csrf_token() }}" />
        
        <link type='text/css' href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600' rel='stylesheet'>
        <link type="text/css" href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/fonts/themify-icons/themify-icons.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/fonts/glyphicons/css/glyphicons.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/plugins/codeprettifier/prettify.css') }}" rel="stylesheet">
        <!--[if lt IE 10]>
        <script type="text/javascript" src="{{ asset('assets/js/media.match.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/respond.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/placeholder.min.js') }}"></script>
        <![endif]-->
        <!-- The following CSS are included as plugins and can be removed if unused-->
        
        <link type="text/css" href="{{ asset('assets/plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/plugins/switchery/switchery.css') }}" rel="stylesheet">

        {!! Rapyd::styles(true) !!}

        @stack('styles')

    </head>
    <body class="animated-content">
        <header id="topnav" class="navbar navbar-default navbar-fixed-top" role="banner">
            @include('partials.admin.header')
        </header>
        <div id="wrapper">
            <div id="layout-static">
                <div class="static-sidebar-wrapper sidebar-default">
                    <div class="static-sidebar">
                        <div class="sidebar">
                            @include('partials.admin.sidebar')
                        </div>
                    </div>
                </div>
                <div class="static-content-wrapper">
                    <div class="static-content">
                        <div class="page-content">
                            @section('breadcrumbs')
                            <ol class="breadcrumb">
                                <li><a href="/admin">Home</a></li>
                            </ol>
                            @show
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        @include('partials.shared.messages')        
                                    </div>
                                </div>

                                @yield('content')
                            </div>
                        </div>
                    </div>
                    <footer>
                        @include('partials.admin.footer')
                    </footer>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('assets/js/jquery-1.10.2.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/jqueryui-1.10.3.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/enquire.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/velocityjs/velocity.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/velocityjs/velocity.ui.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/wijets/wijets.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/codeprettifier/prettify.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-switch/bootstrap-switch.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/application.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/charts-flot/jquery.flot.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/charts-flot/jquery.flot.pie.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/charts-flot/jquery.flot.stack.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/charts-flot/jquery.flot.orderBars.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/charts-flot/jquery.flot.resize.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/charts-flot/jquery.flot.tooltip.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/charts-flot/jquery.flot.spline.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/sparklines/jquery.sparklines.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/switchery/switchery.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/easypiechart/jquery.easypiechart.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/fullcalendar/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
        <script src="{{ asset('/js/util.js') }}"></script>
        
        <script type="text/javascript">
            // TODO: Passar para um arquivo separado
            $(function() {
                $('.tooltips').tooltip(); //bootstrap's tooltip

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            });
        </script>
        {!! Rapyd::scripts() !!}
        @stack('scripts')
    </body>
</html>