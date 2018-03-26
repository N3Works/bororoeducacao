@extends('layouts.app')

@push('metatags')
<title>Bororó 25 | Trabalho Terapêutico</title>
<meta content="Bororó 25 | Bororó 25 é um espaço de produção de saúde" name="title">
<meta content="Bororó 25 é um espaço de produção de saúde" name="description">
<meta name="author" content="dowhile.com.br">
<meta name="keywords" content="bororo, bororó 25, espaço, produção, saúde, trabalho, terapêutico">

<meta property='og:type' content='website'>
<meta property="og:title" content="Bororó 25 | Trabalho Terapêutico">
<meta property="og:url" content="http://www.bororo25.com.br/o-que-fazemos/trabalho-terapeutico">
<meta property="og:description" content="Bororó 25 é um espaço de produção de saúde">
<meta property="og:site_name" content="Bororó 25 | Bororó 25 é um espaço de produção de saúde ">
<meta property="og:image" content="http://bororo25.com/images/share.jpg">
<meta property="og:locale" content="pt_BR">
@endpush

@section('content')
    <section class="page-title-simple page-title-2 section-top-margin bg-trabalho-terapeutico">
        <div class="container">
            <div class="col-md-12 col-sm-12">
                <h3 class="text-white font-comfortaa">Cursos / Workshops / Cinema</h3>
            </div>
        </div>
    </section>

    <section class="content-block-2 text-left">
        <div class="container">
            <div class="col-md-12">
                <div class="grid-item col-md-6" data-parallax='{"y" : 30}'>
                    <div class="box">
                        <h4 class="font-comfortaa text-main-1 text-center">
                            Cursos
                        </h4>
                        <div class="col-md-12 text-center image-parallax">
                            <img src="{{ asset('images/empresas-trabalho-cursos.jpg') }}" alt="Cursos Bororó25"
                                 class="img-circle">
                        </div>
                        <p class="margin-top30 text-large">
                            Aulas teórico-práticas embasadas no Método Curação. Podem ser realizados temas específicos
                            ou módulos customizados, em acordo com a temática e o formato escolhido.
                        </p>
                    </div>
                </div>
                <div class="grid-item col-md-6" data-parallax='{"y" : -30}'>
                    <div class="box">
                        <h4 class="font-comfortaa text-main-1 text-center">
                            Workshops
                        </h4>
                        <div class="col-md-12 text-center image-parallax">
                            <img src="{{ asset('images/empresas-trabalho-workshop.jpg') }}" alt="Workshops Bororó25"
                                 class="img-circle">
                        </div>
                        <p class="margin-top30 text-large">
                            Atividade de caráter prático e lúdico, promove a interação entre os participantes,
                            desenvolvendo conhecimentos, habilidades e atitudes.
                        </p>
                    </div>
                </div>
                <div class="grid-item col-md-6" data-parallax='{"y" : 30}'>
                    <div class="box">
                        <h4 class="font-comfortaa text-main-1 text-center">
                            Cine Bororó25
                        </h4>
                        <div class="col-md-12 text-center image-parallax">
                            <img src="{{ asset('images/empresas-trabalho-cinema.jpg') }}" alt="Cine Bororó25"
                                 class="img-circle">
                        </div>
                        <p class="margin-top30 text-large">
                            Fragmentos de filmes interpretados e discutidos à luz dos conceitos do Método Curação. Uma
                            reflexão filosófica do cotidiano e das relações pelo olhar da arte do cinema.
                        </p>
                    </div>
                </div>
                <div class="grid-item col-md-6" data-parallax='{"y" : -30}'>
                    <div class="box">
                        <h4 class="font-comfortaa text-main-1 text-center">
                            Grupo de Reflexão
                        </h4>
                        <div class="col-md-12 text-center image-parallax">
                            <img src="{{ asset('images/empresas-trabalho-grupos_reflexao.jpg') }}"
                                 alt="Grupo Reflexão Bororó25"
                                 class="img-circle">
                        </div>
                        <p class="margin-top30 text-large">
                            Grupo de estudos a partir de conceitos e técnicas sobre o Método Curação, visando a
                            construção do autoconhecimento.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="text-center margin-top50 margin-bot50">
        <h5 class="letter-spacing1 margin-top30 margin-bot20 text-main-1">Se interessou pelo nosso projeto?</h5>
        <a href="{{ route('site.contact') }}" class="bttn bttn-main-1 bttn-med bttn-scale bttn75">Entre em contato!</a>
    </div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('theme/css/owl-carousel.css') }}">
<style type="text/css">
    .owl-theme .owl-controls {
        display: none !important;
    }

    .image-parallax {
        margin-bottom: 40px;
        margin-top: 32px;
    }

    .grid-item > .box {
        margin: 20px;
        border: 1px solid #eee;
        padding: 20px;
        box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.1);
        display: block;
        width: 100%;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('theme/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('theme/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('theme/js/owl.carousel.js') }}"></script>
<script src="{{ asset('js/jquery.parallax-scroll.js') }}"></script>
<script src="{{ asset('theme/js/jquery.matchHeight-min.js') }}"></script>

<script>
    $(function () {
        // slider/carousel
        $('.box').matchHeight();

        var owl = $('.owl-carousel-1');
        owl.owlCarousel({
            items: 1,
            autoPlay: false,
            navigation: false,
            slideSpeed: 300,
            paginationSpeed: 500,
            rewindSpeed: 400,
            autoHeight: false,
            addClassActive: true,
            afterMove: function () {
                $('.owl-carousel-1 > .owl-item.active h1').addClass('animated fadeInUpSmall');
                $('.owl-carousel-1 > .owl-item.active p').addClass('animated-md fadeInUpSmall');
                $('.owl-carousel-1 > .owl-item.active .bttn-div').addClass('animated-lt fadeInUpSmall');
            },
            beforeMove: function () {
                $('.owl-carousel-1 > .owl-item h1').removeClass('animated fadeInUpSmall');
                $('.owl-carousel-1 > .owl-item p').removeClass('animated-md fadeInUpSmall');
                $('.owl-carousel-1 > .owl-item .bttn-div').removeClass('animated-lt fadeInUpSmall');
            }
        });

        $('.owl-carousel-1 > .owl-item.active h1').addClass('animated fadeInUpSmall');
        $('.owl-carousel-1 > .owl-item.active p').addClass('animated-md fadeInUpSmall');
        $('.owl-carousel-1 > .owl-item.active .bttn-div').addClass('animated-lt fadeInUpSmall');

        // next slide
        $('.next-feature-1').on('click', function (event) {
            owl.trigger('owl.next');
        });

        // prev slide
        $('.prev-feature-1').on('click', function (event) {
            owl.trigger('owl.prev');
        });

        // handle cursor keys
        var owlbttn = owl.data('owlCarousel');
        $(document.documentElement).keyup(function (event) {
            if (event.keyCode == 37) {
                owlbttn.prev();
            } else if (event.keyCode == 39) {
                owlbttn.next();
            }
        });

        var owl2 = $('.owl-carousel-2');
        owl2.owlCarousel({
            items: 1,
            autoPlay: false,
            navigation: false,
            slideSpeed: 300,
            paginationSpeed: 500,
            rewindSpeed: 400,
            autoHeight: false,
            addClassActive: true,
            afterMove: function () {
                $('.owl-carousel-2 > .owl-item.active h1').addClass('animated fadeInUpSmall');
                $('.owl-carousel-2 > .owl-item.active p').addClass('animated-md fadeInUpSmall');
                $('.owl-carousel-2 > .owl-item.active .bttn-div').addClass('animated-lt fadeInUpSmall');
            },
            beforeMove: function () {
                $('.owl-carousel-2 > .owl-item h1').removeClass('animated fadeInUpSmall');
                $('.owl-carousel-2 > .owl-item p').removeClass('animated-md fadeInUpSmall');
                $('.owl-carousel-2 > .owl-item .bttn-div').removeClass('animated-lt fadeInUpSmall');
            }
        });

        $('.owl-carousel-2 > .owl-item.active h1').addClass('animated fadeInUpSmall');
        $('.owl-carousel-2 > .owl-item.active p').addClass('animated-md fadeInUpSmall');
        $('.owl-carousel-2 > .owl-item.active .bttn-div').addClass('animated-lt fadeInUpSmall');

        // next slide
        $('.next-feature-2').on('click', function (event) {
            owl2.trigger('owl.next');
        });

        // prev slide
        $('.prev-feature-2').on('click', function (event) {
            owl2.trigger('owl.prev');
        });

        // handle cursor keys
        var owlbttn2 = owl2.data('owlCarousel');
        $(document.documentElement).keyup(function (event) {
            if (event.keyCode == 37) {
                owlbttn.prev();
            } else if (event.keyCode == 39) {
                owlbttn.next();
            }
        });
    })
</script>
@endpush