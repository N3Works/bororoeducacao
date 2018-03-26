@extends('layouts.app')

@push('metatags')
<title>Bororó 25 | Coworking B25</title>
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
	@include('site.about_sections.coletivo_video')
	@include('site.about_sections.galeria')

    <div class="text-center margin-top50 margin-bot50">
        <h5 class="letter-spacing1 margin-top30 margin-bot20 text-main-1">Se interessou pelo nosso projeto?</h5>
        <a href="{{ route('site.contact') }}" class="bttn bttn-main-1 bttn-med bttn-scale bttn75">Entre em contato!</a>
    </div>

@endsection