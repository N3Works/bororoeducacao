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

    @include('site.about_sections.intro_trabalho')


    <section class="content-block-2 text-left" style="padding-bottom: 30px;">
        <div class="container">
            <div class="row">
                <div class="grid-item col-md-6">
                    <div class="box" data-parallax='{"y" : -50}'>
                        <h4 class="font-comfortaa text-main-1 text-center">
                            Grupos de análise e autoconhecimento
                        </h4>
                        <div class="col-md-12 text-center image-parallax">
                            <img src="{{ asset('images/trabalho-emocional/analise.jpg') }}" alt="Coaching Bororó25"
                                 class="img-circle">
                        </div>
                        <p class="margin-top30 text-large">
                            O desejo de trabalhar em grupos nasceu do reconhecimento de que tudo no humano se dá a
                            partir do encontro. Nascemos, adoecemos e nos curamos nos encontros. Impossível para o
                            humano viver em isolamento. No encontro com o outro nos revelamos e nos reconhecemos. O
                            outro funciona como um espelho, revelando versões do nosso eu- caleidoscópio. A sutileza do
                            que em nós se revela em grupo, nossas emoções, sentimentos, pensamentos e comportamentos, é
                            uma oportunidade para o autoconhecimento. Nos grupos se reproduzem muitas das experiências
                            cotidianas com familiares, amigos e relações de trabalho. O Grupo de Análise tem uma energia
                            singular, terapêutica e confessional. Cria um espaço de intimidade e acolhimento na presença
                            de companhias seguras. É a partir do relato singular de cada um que, muitas vezes,
                            encontramos uma possibilidade, um convite a dar voz à nossa história.
                        </p>
                    </div>
                </div>
                <div class="grid-item col-md-6">
                    <div class="box" data-parallax='{"y" : 50}'>
                        <h4 class="font-comfortaa text-main-1 text-center">
                            Trabalho Individual
                        </h4>
                        <div class="col-md-12 text-center image-parallax">
                            <img src="{{ asset('images/trabalho-emocional/individual.jpg') }}" alt="Coaching Bororó25"
                                 class="img-circle">
                        </div>
                        <p class="margin-top30 text-large">
                            O cenário do trabalho emocional individual é o desenho mais conhecido e praticado pelas
                            diferentes abordagens terapêuticas. Representa um universo bastante seguro, pois as
                            variáveis são muito mais controladas do que no trabalho em grupo. Utilizamos esta modalidade
                            quando a pessoa deseja aprofundar questões mais particulares.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="grid-item col-md-6">
                    <div class="box" data-parallax='{"y" : -50}'>
                        <h4 class="font-comfortaa text-main-1 text-center">
                            Trabalho com famílias e casais
                        </h4>
                        <div class="col-md-12 text-center image-parallax">
                            <img src="{{ asset('images/trabalho-emocional/familias-e-casais.jpg') }}"
                                 alt="Coaching Bororó25"
                                 class="img-circle">
                        </div>
                        <p class="margin-top30 text-large">
                            É, talvez, o trabalho mais exigente para todas as pessoas envolvidas, incluindo o terapeuta.
                            Este trabalho emocional é muito eficaz quando os problemas identificados ocorrem nas
                            relações familiares ou de casal, em especial, na comunicação entre as pessoas. A
                            intervenção torna-se extremamente potente, pois é realizada dentro do próprio cenário de
                            conflito. Isto torna o processo muito intenso, expandindo a ação terapêutica e a potência
                            curativa de todos.
                        </p>
                    </div>
                </div>

                <div class="grid-item col-md-6">
                    <div class="box" data-parallax='{"y" : 50}'>
                        <h4 class="font-comfortaa text-main-1 text-center">
                            Medicina e Psicoterapia Ayurveda
                        </h4>
                        <div class="col-md-12 text-center image-parallax">
                            <img src="{{ asset('images/trabalho-emocional/ayurveda.jpg') }}" alt="Coaching Bororó25"
                                 class="img-circle">
                        </div>
                        <p class="margin-top30 text-large">
                            O Ayurveda é um dos mais antigos e completos sistemas de saúde da humanidade. Em
                            sânscrito, Ayurveda significa ciência (veda) da vida (ayur), e é voltado para a produção de
                            uma vida saudável e longeva. Praticado na Índia e ensinado nas Universidades, vem sendo
                            difundido pelo mundo como uma prática eficaz de saúde integral.
                        </p>
                        <p class="margin-top30 text-large">
                            Para o Ayurveda, saúde é entendida como o equilíbrio entre bem estar físico, mental,
                            emocional e espiritual, como a relação harmônica entre a pessoa e a natureza. A
                            psicoterapia do Ayurveda utiliza os princípios da psicologia do Yoga, centrando sua atenção
                            no efeito transformador das terapias sutis (aromaterapia, mantra, pranayama e meditação)
                            na mente, uma vez que essa tem papel central na produção do adoecimento. E, quando
                            necessário, oferece de forma complementar o uso de fitoterápicos de comprovada
                            efetividade.
                        <p class="margin-top30 text-large">
                            A medicina Ayurveda oferece conhecimentos sobre como cuidar bem do corpo, da mente e
                            das emoções. A base de tudo é uma alimentação de qualidade. Se adequadamente nutrido,
                            o corpo não adoece, a mente produz pensamentos saudáveis e a alma, emoções positivas.
                            Por outro lado, o Método Curação oferece ferramentas que permitem o conhecimento de
                            nossa dinâmica emocional, ampliando nosso autoconhecimento. A associação dessas duas
                            abordagens, quer seja com foco na saúde física ou na mental-emocional, é extremamente
                            oportuna e amplia nossa capacidade de cuidarmos bem de nós e de produzirmos saúde.
                            Ou, como dizemos na Bororó25, “de nos fazermos felizes”.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="grid-item col-md-6">
                    <div class="box" data-parallax='{"y" : -50}'>
                        <h4 class="font-comfortaa text-main-1 text-center">
                            Terapia Floral
                        </h4>
                        <div class="col-md-12 text-center image-parallax">
                            <img src="{{ asset('images/trabalho-emocional/floral-aforismo.jpg') }}"
                                 alt="Floral Aforismo"
                                 class="img-circle">
                        </div>
                        <p class="margin-top30 text-large">
                            Os florais são utilizados como terapia complementar no auxilio do equilíbrio das
                            emoções e dos comportamentos mentais, integrando-se perfeitamente em todo tipo de
                            tratamento nutricional, terapêutico, alopático, homeopático. Não possuem contra-
                            indicações nem efeitos colaterais. Estimulam sentimentos
                            como amor, fé, esperança, alegria, coragem e paz. Despertam o potencial de autocura que
                            toda pessoa possui. Também auxiliam o fluxo de energia física, mental e emocional.
                        </p>
                    </div>
                </div>

                <div class="grid-item col-md-6">
                    <div class="box" data-parallax='{"y" : 50}'>
                        <h4 class="font-comfortaa text-main-1 text-center">
                            Terapias corporais
                        </h4>
                        <div class="col-md-12 text-center image-parallax">
                            <img src="{{ asset('images/trabalho-emocional/terapias-corporais.jpg') }}"
                                 alt="Coaching Bororó25"
                                 class="img-circle">
                        </div>
                        <p class="margin-top30 text-large">
                            Estudos científicos apontam que a massagem contribui para um sono mais profundo e
                            tranquilo. Alivia a ansiedade, stress, tensão, melhora a digestão e as crises alérgicas. São
                            aconselhadas para dores musculares, costas, cabeça, entre outras, proporcionando mais
                            vigor, vitalidade, relaxamento e restauração dos níveis de energia, propiciando sensação de
                            bem estar e equilíbrio energético.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="grid-item col-md-6">
                    <div class="box" data-parallax='{"y" : -50}'>
                        <h4 class="font-comfortaa text-main-1 text-center">
                            Yoga
                        </h4>
                        <div class="col-md-12 text-center image-parallax">
                            <img src="{{ asset('images/trabalho-emocional/yoga.jpg') }}" alt="Coaching Bororó25"
                                 class="img-circle">
                        </div>
                        <p class="margin-top30 text-large">
                            A palavra em sânscrito Yoga, tem diversos significados. Deriva da raiz (yuj) e um
                            deles significa “união com a própria essência”. Yoga é um conjunto de conhecimentos
                            de mais de 5 mil anos e sua prática envolve harmonizar o corpo e mente,  através de
                            técnicas de respiração (pranayamas) e posturas (ásanas).  As aulas de  Yoga auxiliam
                            no alívio do estresse e são uma alternativa terapêutica para quem busca um estilo de vida
                            mais saudável.
                        </p>
                    </div>
                </div>
                <div class="grid-item col-md-6">
                    <div class="box" data-parallax='{"y" : 50}'>
                        <h4 class="font-comfortaa text-main-1 text-center">
                            Meditação
                        </h4>
                        <div class="col-md-12 text-center image-parallax">
                            <img src="{{ asset('images/trabalho-emocional/meditacao.jpg') }}" alt="Coaching Bororó25"
                                 class="img-circle">
                        </div>
                        <p class="margin-top30 text-large">
                            A meditação pode auxiliar nosso bem viver. Existem muitos benefícios com a meditação. É uma
                            prática essencial para higiene mental. Uma mente calma, melhora nossa comunicação e
                            concentração. Traz uma sensação profunda de saúde e bem-estar se praticada frequentemente. O
                            descanso profundo que ela oferece nos torna mais dinâmicos nas atividades do nosso
                            dia-a-dia.
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
//        $('.box').matchHeight();

    })
</script>
@endpush