@extends('layouts.app')

@push('metatags')
<title>Bororó 25 | Agenda de Eventos</title>
<meta content="Bororó 25 | Agenda de Eventos" name="title">
<meta content="Bororó 25 é um espaço de produção de saúde" name="description">
<meta name="author" content="dowhile.com.br">
<meta name="keywords" content="bororo, bororó 25, espaço, produção, saúde">

<meta property='og:type' content='website'>
<meta property="og:title" content="Bororó 25 | Agenda de Eventos">
<meta property="og:url" content="http://www.bororo25.com.br/agenda-de-eventos">
<meta property="og:description" content="Bororó 25 é um espaço de produção de saúde">
<meta property="og:site_name" content="Bororó 25 | Bororó 25 é um espaço de produção de saúde ">
<meta property="og:image" content="http://bororo25.com/images/share.jpg">
<meta property="og:locale" content="pt_BR">
@endpush

@section('content')

    <section class="page-title-2 section-top-margin bg-agenda">
        <div class="container">
            <div class="col-md-6 col-sm-6">
                <h3 class="text-white font-comfortaa">Eventos @Bororó25</h3>
                {{-- <p class="text-white">Consulte aqui todos os nossos eventos.</p> --}}
            </div>
        </div>
    </section>

    <section class="content-block-2 section-top-  margin text-left">
      <div class="container">
         <div class="col-md-12">
                  <!-- main heading -->
            <h3 class="font-comfortaa text-main-2 text-center"> <b> Acompanhe a agenda de encontros! </b>
              {{-- page-title text-main-1 --}}
            </h3>
            <p class="margin-top30 text-large">
              Os workshops são momentos de troca, de busca coletiva, e de partilhas. Ocorrem uma vez por mês, sempre com novos temas e propostas de trabalho.
              <br>
              <br>
              <b>Datas</b>:
              <br>
            </p>
            <div class="left-block-3 margin-top20"  style="padding-left: 20px;" >
                <ul class = "text-large" style="list-style-type:circle; padding-bottom:5px;">
                  <li> 15 março </li>
                  <li> 12 abril </li>
                  <li> 17 maio </li>
                  <li> 21 junho </li>
                  <li> 19 julho </li>
                  <li> 16 agosto </li>
                  <li> 13 agosto </li>
                  <li> 18 outubro </li>
                  <li> 8 novembro </li>
                  <li> 6 dezembro </li>
                </ul>
            </div>
            <p class="margin-top30" style="text-align:center; ">
                <i>Inscrições ou dúvidas? Vamos conversar! </i>
                  <br>
                  <a href="mailto:editora@bororo25.com.br?Subject=Contato%20Bororó%20Empresas" target="_top" style="color:blue">editora@bororo25.com.br</a>
                  <br> 51 3346 6171
                  <br> 51 99692 8185
            </p>

    {{-- @include('site.events_sections.eventos_proximos', [
        'events' => $next
    ])

    @include('site.events_sections.eventos_passados', [
        'events' => $last
    ]) --}}

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css') }}"/>
<link rel="stylesheet" href="{{ asset('theme/css/blog.css') }}">
<link rel="stylesheet" href="{{ asset('theme/css/owl-carousel.css') }}">
<style>
    .grid-item {
        /*width: 100%;*/
        margin: 35px
    }

    .article-by {
        position: absolute;
        bottom: 50px;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('theme/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('theme/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('theme/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('theme/js/owl.carousel.js') }}"></script>

<script>
    $(function () {
        // slider/carousel
        $('.grid-item').matchHeight();
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 3,
            autoPlay: false,
            navigation: false,
            slideSpeed: 300,
            paginationSpeed: 500,
            rewindSpeed: 400,
            autoHeight: true,
            addClassActive: true,
            afterInit: function () {
                $('.blog-post').matchHeight();
            },
            afterUpdate: function () {
                $('.blog-post').matchHeight();
            },
            afterMove: function () {
                $('.owl-item.active h1').addClass('animated fadeInUpSmall');
                $('.owl-item.active p').addClass('animated-md fadeInUpSmall');
                $('.owl-item.active .bttn-div').addClass('animated-lt fadeInUpSmall');
            },
            beforeMove: function () {
                $('.owl-item h1').removeClass('animated fadeInUpSmall');
                $('.owl-item p').removeClass('animated-md fadeInUpSmall');
                $('.owl-item .bttn-div').removeClass('animated-lt fadeInUpSmall');
            }
        });

        $('.owl-item.active h1').addClass('animated fadeInUpSmall');
        $('.owl-item.active p').addClass('animated-md fadeInUpSmall');
        $('.owl-item.active .bttn-div').addClass('animated-lt fadeInUpSmall');

        // next slide
        $('.next-feature').on('click', function (event) {
            owl.trigger('owl.next');
        });

        // prev slide
        $('.prev-feature').on('click', function (event) {
            owl.trigger('owl.prev');
        });

        // handle cursor keys
        var owlbttn = $('.owl-carousel').data('owlCarousel');
        $(document.documentElement).keyup(function (event) {
            if (event.keyCode == 37) {
                owlbttn.prev();
            } else if (event.keyCode == 39) {
                owlbttn.next();
            }
        });
        // masonry grid
//        var $grid = $('.blog-card-small .blog-wrapper').masonry({
//            itemSelector: '.grid-item'
//        });
//        $grid.imagesLoaded().progress(function () {
//            $grid.masonry('layout');
//        });
    })
</script>
@endpush
