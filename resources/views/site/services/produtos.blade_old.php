@extends('layouts.app')


@push('metatags')
<title>Bororó 25 | Produtos para Empresas</title>
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
                <div class="col-md-6">
                    <h3 class="text-white font-comfortaa">Para Empresas</h3>
                </div>
                <div class="col-md-6">
                    <h6 class="text-white font-asap">
                        A ação curativa é sempre no aqui e agora!
                    </h6>
                </div>
            </div>
        </div>
    </section>

    <section class="content-block-2 text-left">
        <div class="container">
            <h3 class="font-comfortaa text-main-2 text-center">
                <b> Bororó Empresas </b>
            </h3>
            <br>
            <p class="margin-top30 text-large" style="text-align:center">
                Por meio deste serviço atendemos empresas que buscam investir em seus colaboradores.
                Trabalhamos customizando palestras ou cursos de capacitação, de acordo às necessidades do grupo.
                Aplicando a Tecnologia de Gestão das Emoções (TGE), temos como propósito construir relações entre a
                gestão das emoções, o autoconhecimento, a produtividade e a felicidade no trabalho.
            </p>
            <br>
            <div class="grid-item col-md-6">
                <div class="box" data-parallax='{"y" : -50}'>
                    <h4 class="font-comfortaa text-main-1 text-center">
                        Palestras
                    </h4>
                    <div class="col-md-12 text-center image-parallax">
                        <img src="{{ asset('images/empresas-trabalho-palestras.jpg') }}" alt="Palestras Bororó25"
                             class="img-circle">
                    </div>
                    <p class="margin-top30 text-large">
                        Promover a consciência da necessidade do autoconhecimento para a construção da saúde emocional.
                        Apresentada em diferentes temáticas, adaptadas aos interesses e objetivos da empresa.
                    </p>
                </div>
            </div>
            <div class="grid-item col-md-6">
                <div class="box" data-parallax='{"y" : 50}'>
                    <h4 class="font-comfortaa text-main-1 text-center">
                        Cursos
                    </h4>
                    <div class="col-md-12 text-center image-parallax">
                        <img src="{{ asset('images/empresas-trabalho-cursos.jpg') }}" alt="Cursos Bororó25"
                             class="img-circle">
                    </div>
                    <p class="margin-top30 text-large">
                        Aulas teórico-práticas voltadas para a aplicação da TGE - Tecnologia de Gestão Emocional
                        ao universo corporativo. Realizados em módulos customizados, de acordo com a temática e
                        o formado escolhido.
                    </p>
                </div>
            </div>
            <div class="grid-item col-md-6">
                <div class="box" data-parallax='{"y" : -50}'>
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
            <div class="grid-item col-md-6">
                <div class="box" data-parallax='{"y" : 50}'>
                    <h4 class="font-comfortaa text-main-1 text-center">
                        Coaching
                    </h4>
                    <div class="col-md-12 text-center image-parallax">
                        <img src="{{ asset('images/empresas-trabalho-coaching.jpg') }}" alt="Coaching Bororó25"
                             class="img-circle">
                    </div>
                    <p class="margin-top30 text-large">
                        Encontro personalizado, utiliza os conceitos da TGE para desenvolver a potência criativa do
                        profissional, habilitando-o para a responsabilização pelo próprio cuidado e por seu desempenho.
                    </p>
                </div>
            </div>
            <div class="grid-item col-md-6">
                <div class="box" data-parallax='{"y" : -50}'>
                    <h4 class="font-comfortaa text-main-1 text-center">
                        Grupo de Reflexão
                    </h4>
                    <div class="col-md-12 text-center image-parallax">
                        <img src="{{ asset('images/empresas-trabalho-grupos_reflexao.jpg') }}"
                             alt="Grupo Reflexão Bororó25"
                             class="img-circle">
                    </div>
                    <p class="margin-top30 text-large">
                        Grupo de estudos sobre a <a href="{{ route('site.services.tge') }}">TGE</a> e sua relação com o
                        trabalho. A partir do estudo de conceitos e técnicas, é desenvolvida a reflexão sobre o auto-
                        conhecimento e sua aplicabilidade no ambiente empresarial.
                    </p>
                </div>
            </div>
            <div class="grid-item col-md-6">
                <div class="box" data-parallax='{"y" : 50}'>
                    <h4 class="font-comfortaa text-main-1 text-center">
                        Cine Bororó25
                    </h4>
                    <div class="col-md-12 text-center image-parallax">
                        <img src="{{ asset('images/empresas-trabalho-cinema.jpg') }}" alt="Cine Bororó25"
                             class="img-circle">
                    </div>
                    <p class="margin-top30 text-large">
                        Fragmentos de filmes interpretados e discutidos à luz dos conceitos da TGE. Uma reflexão
                        filosófica do cotidiano, das relações e do universo empresarial pelo olhar da arte do
                        cinema.
                    </p>
                </div>
            </div>
        </div>
    </section>
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

    .grid-item.col-md-6 {
        /*padding: 45px;*/
    }

</style>
@endpush

@push('scripts')
<script src="{{ asset('theme/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('theme/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('theme/js/owl.carousel.js') }}"></script>
<script src="{{ asset('js/jquery.parallax-scroll.js') }}"></script>

<script>
    $(function () {
        // slider/carousel
        $('.grid-item').matchHeight();

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
    });
</script>
@endpush
