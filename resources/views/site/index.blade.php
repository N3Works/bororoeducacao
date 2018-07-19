@extends('layouts.app')

@push('metatags')
<title>Escola de CurAção</title>
<meta content="Escola de CurAção" name="title">
<meta content="Escola de CurAção é um espaço de produção de saúde" name="description">
<meta name="author" content="n3works.com.br">
<meta name="keywords" content="curação, curacao, escola, saúde">
<meta name="google-site-verification" content="t7N6zD5SISz6lCCIrFj6Cq7hqVI6A7Rymt6LgFZ_s0Q" />

<meta property='og:type' content='website'>
<meta property="og:title" content="Escola de CurAção">
<meta property="og:url" content="http://www.escoladecuracao.com.br">
<meta property="og:description" content="Escola de CurAção é um espaço de produção de saúde">
<meta property="og:site_name" content="Escola de CurAção">
<meta property="og:image" content="http://escoladecuracao.com/images/share.jpg">
<meta property="og:locale" content="pt_BR">
@endpush

@section('content')
    
	<div id="container_inicio">
		@include('site.home_sections.inicio')
	</div>
	<div id="container_quem_somos" style="padding-top: 50px; ">
		@include('site.home_sections.quem_somos')
	</div>
	<div id="container_metodo_curacao" style="padding-top: 50px; ">
		@include('site.home_sections.metodo_curacao')
	</div>

	<div id="container_servicos" class="container" style="padding-top: 50px; ">
    <h2 class="letter-spacing0 font-comfortaa text-center foo text-main-1">
      <img class="img-responsive img-center" src="{{url('/images/servicos.png')}}" alt=""/>
    </h2>
	</div>
  <div id="container_curacao_voce" style="padding-top: 50px; ">
		@include('site.home_sections.curacao_voce')
	</div>
	<div id="container_curacao_empresas" style="padding-top: 50px; ">
		@include('site.home_sections.curacao_empresas')
	</div>
	<div id="container_curacao_solidario" style="padding-top: 50px; ">
		@include('site.home_sections.curacao_solidario')
	</div>


	<div id="container_produtos" class="container" style="padding-top: 50px; ">
    <h2 class="letter-spacing0 font-comfortaa text-center foo text-main-1">
      <img class="img-responsive img-center" src="{{url('/images/produtos.png')}}" alt=""/>
    </h2>
	</div>
	<div id="container-ead" style="padding-top: 50px; ">
		@include('site.home_sections.ead')
	</div>
	<div id="container-mentoria" style="padding-top: 50px; ">
		@include('site.home_sections.mentoria')
	</div>
	<div id="container-livros" style="padding-top: 50px; ">
		@include('site.home_sections.livros')
	</div>


	<div id="container-contato" style="padding-top: 50px; ">
	@include('site.home_sections.contato')
	</div>
	<div id="container-noticias" style="padding-top: 50px; ">
    @include('site.home_sections.call_blog', [
        'posts' => $posts
    ])
	</div>
	<div id="container-agenda" style="padding-top: 50px; ">
    @include('site.home_sections.call_events', [
        'events' => $events
    ])
	</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css') }}"/>
<link rel="stylesheet" href="{{ asset('theme/css/blog.css') }}">
<link rel="stylesheet" href="{{ asset('css/circles.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('theme/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('theme/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('theme/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/jquery.parallax-scroll.js') }}"></script>
<script>
    $(function() {
        $(window).stellar();
        // video popup
        $('.popup-video').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade my-video',
            preloader: false
        });

        $('.blog-post').matchHeight();

        // masonry grid
        var $grid = $('.blog-card-small .blog-wrapper').masonry({
            itemSelector: '.grid-item'
        });
        $grid.imagesLoaded().progress(function () {
            $grid.masonry('layout');
        });

        setTimeout(function () {
            $("#registered-message").remove();
        }, 4000);
    })
</script>
@endpush
