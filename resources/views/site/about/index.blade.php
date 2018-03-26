@extends('layouts.app')

@push('metatags')
<title>Bororó 25 | Quem Somos</title>
<meta content="Bororó 25 | Bororó 25 é um espaço de produção de saúde" name="title">
<meta content="Bororó 25 é um espaço de produção de saúde" name="description">
<meta name="author" content="dowhile.com.br">
<meta name="keywords" content="bororo, bororó 25, espaço, produção, saúde">

<meta property='og:type' content='website'>
<meta property="og:title" content="Bororó 25 | Quem Somos">
<meta property="og:url" content="http://www.bororo25.com.br/quem-somos">
<meta property="og:description" content="Bororó 25 é um espaço de produção de saúde">
<meta property="og:site_name" content="Bororó 25 | Bororó 25 é um espaço de produção de saúde ">
<meta property="og:image" content="http://bororo25.com/images/share.jpg">
<meta property="og:locale" content="pt_BR">
@endpush

@section('content')

    <section class="contact-1 section-padding bg-circle-color">
        <div class="container">
            <div class="center-block-3" style="padding-top: 50px;">
                <!-- main heading -->
                <h2 class="letter-spacing0 font-comfortaa text-white">
                    A <span class="text-white font-w600">Bororó25</span>
                </h2>
                <!-- say hello button -->
                <div class="center-block-4 margin-top50">
                    <p class="font-asap text-white">
                        A Bororó25 é um espaço formado pela Editora Bororó25 e o Coworking B25.
                    </p>
                    <p class="font-asap text-white">
                        A Editora Bororó25 dedica-se à produção de conhecimento embasado no Método Curação.
                    </p>
                    <p class="font-asap text-white">
                        Os profissionais que transitam pelo Coworking B25, trabalham com promoção e educação em saúde
                        emocional, visando a construção do autoconhecimento, do cuidado com o corpo, a mente e a alma.
                    </p>
                    <p class="font-asap text-white">
                        Nosso propósito é que cada pessoa desenvolva suas habilidades emocionais com autonomia para
                        produzir um viver saudável.
                    </p>
                </div>
            </div>
            <hr class="hr-small foo"/>
            <div class="row all-details-wrapper">
                <div class="col-md-4 just-center text-center">
                    <!-- social links -->
                    <div class="social">
                        <div class="display-inline foo"><a href="https://www.facebook.com/Bororo25/" target="_blank"
                                                           class="ti-facebook"></a></div>
                        <div class="display-inline foo"><a href="https://www.instagram.com/bororo25oficial/"
                                                           target="_blank" class="ti-instagram"></a></div>
                        <div class="display-inline foo"><a href="https://www.youtube.com/user/canalbororo"
                                                           target="_blank" class="ti-youtube"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="col-sm-4 part part2">
                <!-- Main Heading -->
                <h4 class="margin-top10 text-main-1 font-comfortaa">Christiane Ganzo</h4>
                <!-- Text -->
                <p class="text-grey font-asap margin-top30">
                    Há mais de 25 anos, trabalha como psicanalista. Christiane Ganzo não se explica. É
                    necessário ser vista, ser ouvida, ser sentida.
                </p>
                <br>
            </div>
            <div class="col-md-4 text-center hidden-xs">
                <img src="{{ asset('images/autoras.png') }}" alt="Autoras" style="width: 320px;">
                <br><br>
                <p class="text-main-1">
                    Criadoras do Método Curação.
                </p>
            </div>
            <div class="col-sm-4 part part2">
                <!-- Main Heading -->
                <h4 class="margin-top10 text-main-1 font-comfortaa">Denise Aerts</h4>
                <!-- Text -->
                <p class="text-grey font-asap margin-top30">
                    Doutora em Clínica Médica pela UFRGS, há mais de 30 anos é pesquisadora em
                    saúde coletiva nas temáticas felicidade e saúde do trabalhador. Atuando como
                    médica e psicoterapeuta Ayurveda (Medicina Indiana), acredita que o
                    autoconhecimento e o autocuidado são o ponto de partida para toda a
                    transformação.
                </p>
            </div>
        </div>
    </section>

    @include('site.about_sections.coletivo', [
        'persons' => $persons
    ]);


@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/circles.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('theme/js/jquery.matchHeight-min.js') }}"></script>
<script>
    $(function () {
        $('.part').matchHeight();
    })
</script>
@endpush