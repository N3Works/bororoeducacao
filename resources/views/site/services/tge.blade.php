@extends('layouts.app')


@push('metatags')

<title>Bororó 25 | TGE</title>

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
                <h3 class="text-white font-comfortaa text-center"> Bororó Empresas </h3>
            </div>
        </div>
    </section>

    <section class="content-block-2 text-left">

        <div class="container">
            <!-- main heading -->
            <h3 class="font-comfortaa text-main-1 text-center">Impacto do TGE</h3>
            <br>
            {{-- <h5 class="font-asap text-main-2">Tecnologia de Gestão das Emoções: autoconhecimento como ferramenta de
                gestão de pessoas</h5> --}}

            <p class="font-asap margin-top10">
                Por meio deste serviço atendemos empresas que buscam investir em seus colaboradores.
                Trabalhamos customizando palestras ou cursos de capacitação, de acordo às necessidades do grupo.
                Aplicando a Tecnologia de Gestão das Emoções (TGE), temos como propósito construir relações entre a
                gestão das emoções, o autoconhecimento, a produtividade e a felicidade no trabalho.
            </p>
            <p class="font-asap">
                A TGE é um conjunto inovador de técnicas e conceitos que oferece aos gestores e as suas
                equipes ferramentas para a construção de sentido existencial para o trabalho, e para a construção da Felicidade Possível nos ambientes corporativos.
            </p>

            <h3 class="text-white font-comfortaa">Motivação e criatividade</h3>
            <p class="font-asap">
                Na vida pessoal - e no ambiente de trabalho - motivação e criatividade são decorrentes de um intenso caminho de autoconhecimento. A responsabilidade de se habilitar para produzir com comprometimento parte de cada um, e de seu desejo de se fazer feliz nos espaços profissionais.
            </p>
        </div>
    </section>

    <section class="content-block-2 text-left bg-circle font-18">
        <div class="col-md-12 text-center">
            <div class="box-circles">
                <div class="circle circle-comprometimento">
                    <span class="aux">Produtividade</span>
                    <span class="aux aux-2">Pró-<br>atividade</span>
                    <div class="hidden-content">
                        <p>
                            O comprometimento acontece quando encontramos sentido. Somos comprometidos com o que sabemos
                            fazer e com o que os realiza. Não há compromisso na ausência de significado.
                        </p>
                    </div>
                </div>
                <div class="circle circle-criatividade">
                    <span class="aux">Inovação</span>
                    <div class="hidden-content">
                        <p>
                            Criatividade é agir de forma criativa e em sintonia com minha potência. Somos todos capazes
                            de criação, somos todos potentes e artistas. Somos criativos quando conhecemos nossa
                            potência de criar e desenvolvemos a habilidade para a ação.
                        </p>
                    </div>
                </div>
                <div class="circle circle-motivacao">
                    <div class="hidden-content hidden-content-b">
                        <p>
                            A motivação para trabalhar e para conduzir nossas vidas no cotidiano é intrínseca. Tem
                            origem na nossa habilidade emocional em construirmos a cada dia motivos e propósitos para
                            seguir avançando, mesmo nas adversidades.
                        </p>
                    </div>
                </div>
                <div class="circle circle-gestao-emocoes"></div>
            </div>
        </div>
    </section>

    <section class="content-block-2 text-left">
        <div class="container">
            <p class="font-asap font-18">
              O atendimento realizado pela Bororó Empresas oferece às equipes o conhecimento de que a felicidade no ambiente de trabalho está profundamente ligada a quem somos e a nossa capacidade de sermos gestores de nossas emoções.

            </p>
            <p class="font-asap font-18">
              A Bororó Educação oferece capacitação para que as pessoas que compõem as empresas possam criar ferramentas para se tornarem mais conscientes e para que se tornem agentes de mudança.
            </p>
            <p class="margin-top30" style="text-align:center; ">
              <i>Deseja agendar uma palestra ou saber mais sobre o Bororó Empresas?
              <br>Entre em contato pelo email
              <a href="mailto:editora@bororo25.com.br?Subject=Contato%20Bororó%20Empresas" target="_top" style="color:blue">editora@bororo25.com.br</a>  </i>

            </p>
        </div>
    </section>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/circles.css') }}">
@endpush
