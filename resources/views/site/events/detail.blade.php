@extends('layouts.app')

@push('metatags')
<title>{{ isset($model->title) ? $model->title : 'Sem titulo' }}</title>
<meta content="{{ $model->title }}" name="title">
<meta content="{{ $model->description_seo }}" name="description">
<meta name="author" content="dowhile.com.br">
<meta name="keywords" content="{{ $model->keywords_seo }}">

<meta property='og:type' content='website'>
<meta property="og:title" content="{{ $model->title }}">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:description" content="{{ $model->description_seo }}">
<meta property="og:site_name" content="Bororó 25 | Bororó 25 é um espaço de produção de saúde ">
@if ($model->thumbnail_img)
    <meta property="og:image" content="http://bororo.com/uploads/courses/{{ $model->thumbnail_img }}">
@else
    <meta property="og:image" content="http://bororo.com/images/share.jpg">
@endif
<meta property="og:locale" content="pt_BR">
@endpush

@section('content')

    <!-- Content Block style 14 -->
    <section class="section-padding content-block-14">
        <div class="container text-center">
            <!-- main image -->
            <img class="img-center img-responsive foo" src="/uploads/courses/{{ $model->cover_img }}"
                 alt="{{ $model->title }}">
            <!-- main heading -->
            <h3 class="margin-top50 font-playfair">{{ isset($model->title) ? $model->title : 'Sem titulo' }}</h3>
            <!-- main info -->
            <div class="margin-top30 font-hind center-block-1 text-large">
                {!! $model->content !!}
            </div>
            <!-- button -->
            <div class="margin-top30">
                <a href="#signIn" class="bttn bttn-small text-normal bttn-main-1 bttn75 bttn-scale">Inscrição</a>
            </div>
        </div>
    </section>

    <section id="signIn" class="bg-white section-padding-small border-bottom-light contact-4">
        <div class="container">
            <div class="col-md-10 just-center all-details-wrapper">
                <div class="col-md-6">
                    <div class="wrapper transition">
                        <h3 class="margin-top50 font-playfair">Informações</h3>
                        @if($model->is_price_visible)
                            @if($model->price > 0)
                                <h4 class="subhead text-main-2 margin-top20">Valor de R$ {{ $model->price }}</h4>
                            @else
                                <h4 class="subhead text-main-2 margin-top10">Evento Gratuito</h4>
                            @endif
                        @endif


                        <div class="details">
                            <span class="det-head">Data do Evento</span>
                            <span class="my-detail">{{ $model->start_at->format('d/m/Y') }}
                                - {{ $model->end_at->format('d/m/Y') }}</span>
                        </div>
                        <div class="details">
                            <span class="det-head">Duração</span>
                            <span class="my-detail">{{ $model->duration }}h</span>
                        </div>
                        <div class="details">
                            <span class="det-head">Horário</span>
                            <span class="my-detail">{{ $model->start_time }} - {{ $model->end_time }}</span>
                        </div>
                        <div class="details">
                            <span class="det-head">Local</span>
                            <span class="my-detail">
                                <a href="http://maps.google.com/maps?daddr={{$model->latitude}},{{$model->longitude}}"
                                   target="_blank">
                                    {{ $model-> address }}

                                    @if ($model->location)
                                        - {{ $model->location }}
                                    @endif
                                </a>
                            </span>
                        </div>
                        <div class="details">
                            <span class="det-head">Contato</span>
                            <span class="my-detail">contato@bororo25.com.br</span>
                        </div>
                        <div class="details">
                            <span class="det-head">Telefones</span>
                            <span class="my-detail">(51) 3346-6171 ou (51) 99692-8185</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="wrapper transition">
                        <h3 class="margin-top50 font-playfair">Inscrição</h3>

                        @if (session('registered'))
                            <h5 class="subhead text-main-2 margin-top20">
                                Parabéns!
                            </h5>
                            <br>
                            <p>
                                Você completou o primeiro da sua inscrição!
                            </p>
                            <p>
                                Agora é só clicar no botão abaixo e prosseguir com o pagamento.
                            </p>

                            <div id="payment">
                                {!! $model->pagseguro_button !!}
                            </div>
                        @else
                            <form id="contact-4" action="{{ route('site.events.save', $model->slug) }}" method="POST"
                                  class="margin-top50">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Nome</label>
                                    <input type="text" maxlength="100" name="name" required @if($model->end_at < \Carbon\Carbon::now()) disabled @endif>
                                </div>
                                <div class="form-group">
                                    <label>Telefone</label>
                                    <input type="text" id="phone" name="phone" required @if($model->end_at < \Carbon\Carbon::now()) disabled @endif>
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input type="email" maxlength="150" name="email" required @if($model->end_at < \Carbon\Carbon::now()) disabled @endif>
                                </div>
                                <div class="form-group">
                                    <label>CPF</label>
                                    <input type="text" id="cpf" name="cpf" required @if($model->end_at < \Carbon\Carbon::now()) disabled @endif>
                                </div>

                                @if($model->end_at > \Carbon\Carbon::now())
                                    <button type="submit" class="bttn bttn-med bttn-scale bttn-main-1">Inscrever</button>
                                @else
                                    <p>
                                        Este evento já foi encerrado
                                    </p>
                                @endif

                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css') }}"/>
<link rel="stylesheet" href="{{ asset('theme/css/blog.css') }}">
<link rel="stylesheet" href="{{ asset('theme/css/owl-carousel.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('theme/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('theme/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('theme/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('theme/js/owl.carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jquery-mask-plugin/jquery.mask.js') }}"></script>

<script>
    $(function () {
        $('.contact-4 .wrapper').matchHeight();
        $('#phone').mask('(99) 99999-9999');
        $('#cpf').mask('999.999.999-99');

        if ("{{ session('registered') }}") {
            $('html, body').animate({
                scrollTop: $("#payment").offset().top - 400
            }, 1000);
        }
    })
</script>
@endpush