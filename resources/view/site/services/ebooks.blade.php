@extends('layouts.app')

@push('metatags')
<title>Bororó 25 | Editora</title>
<meta content="Bororó 25 | Bororó 25 é um espaço de produção de saúde" name="title">
<meta content="Bororó 25 é um espaço de produção de saúde" name="description">
<meta name="author" content="dowhile.com.br">
<meta name="keywords" content="bororo, bororó 25, espaço, produção, saúde">

<meta property='og:type' content='website'>
<meta property="og:title" content="Bororó 25 | Editora">
<meta property="og:url" content="http://www.bororo25.com.br/o-que-fazemos/editora-bororo25">
<meta property="og:description" content="Bororó 25 é um espaço de produção de saúde">
<meta property="og:site_name" content="Bororó 25 | Bororó 25 é um espaço de produção de saúde ">
<meta property="og:image" content="http://bororo25.com/images/share.jpg">
<meta property="og:locale" content="pt_BR">
@endpush

@section('content')
    <section class="page-title-simple page-title-2 section-top-margin bg-trabalho-terapeutico">
        <div class="container">
            <div class="col-md-6 col-sm-7">
                <h3 class="text-white font-comfortaa">E-books</h3>
            </div>
        </div>
    </section>
    <!-- Hero Header Style 7 -->
{{--    @include('site.service_sections.inicio')--}}

    @include('site.service_sections.ebooks',  [
        'ebooks' => $ebooks
    ])

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('theme/js/jquery.magnific-popup.min.js') }}"></script>
<script>
    // video popup
    $('.popup-video').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade my-video',
        preloader: false
    });
</script>

@endpush