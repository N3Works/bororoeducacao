@extends('layouts.app')

@push('metatags')
<title>Bororó 25 | Coletivo</title>
<meta content="Bororó 25 | Bororó 25 é um espaço de produção de saúde" name="title">
<meta content="Bororó 25 é um espaço de produção de saúde" name="description">
<meta name="author" content="dowhile.com.br">
<meta name="keywords" content="bororo, bororó 25, espaço, produção, saúde, coletivo">

<meta property='og:type' content='website'>
<meta property="og:title" content="Bororó 25 | Coletivo">
<meta property="og:url" content="http://www.bororo25.com.br/quem-somos/coletivo">
<meta property="og:description" content="Bororó 25 é um espaço de produção de saúde">
<meta property="og:site_name" content="Bororó 25 | Bororó 25 é um espaço de produção de saúde ">
<meta property="og:image" content="http://bororo25.com/images/share.jpg">
<meta property="og:locale" content="pt_BR">
@endpush

@section('content')
    @include('site.about_sections.intro_bororo_solidario')

    <div class="col-md-8 col-md-offset-2" style="margin-top: 100px; margin-bottom: 100px;">
        <div class="center-block-3">
            <h6 class="letter-spacing1 text-main-2">
                "É preciso ser solidário consigo, com todas as versões do eu-caleidoscópio. A solidariedade para com o
                outro só acontece na presença da solidariedade para consigo. Nasce do reconhecimento da solidão. É vital
                saber-se só para, de fato, acolher-se. Somente quem se acolhe é capaz de acolher o outro". Libreto 1,
                aforismo 120 da Série A Arte de Se Fazer Feliz.
            </h6>
        </div>
    </div>

@endsection