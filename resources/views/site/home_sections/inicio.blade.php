<!-- Hero Header Style 9 -->
{{-- <section class="section-padding hero-header-9 bg-cover-simple" style="background-image: url(/images/lanterna_pagina_inicial_credito.jpg);"> --}}
{{-- <section class="section-padding hero-header-9 bg-cover-simple" style="background-image: url({{url('/images/lanterna_pagina_inicial_credito.jpg')}})"> ; --}}
<section class="content-block-3 text-left">
    <div id="hero-header-9">
        <div class="slide slide-1">
            <div class="container">
                <div class="row all-details-wrapper">
                    <div class="col-md-8 col-sm-8 col-xs-10">
                        <div class="row">
                            <div class="col-md-10 just-center">
                                <!-- image with play button at middle -->
                                {{-- <figure>
                                    <img class="img-responsive img-center main-img"
                                         src="https://i.ytimg.com/vi/78oDPDkBHco/maxresdefault.jpg" alt=""/>
                                    <a href="https://www.youtube.com/watch?v=78oDPDkBHco" class="popup-video play-button">
                                        <span class="fa fa-play-circle bttn-scale"></span>
                                    </a>
                                </figure> --}}
                                <figure>
                                    <img class="img-responsive img-center main-img"
                                         src="{{url('/images/banner_carta_manifesto.png')}}" alt=""/>

                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-8 col-xs-10">
                        <!-- main heading -->
                        <h3 class="letter-spacing0 font-comfortaa">
                            Autoconhecimento para a construção da <span class="font-w600">felicidade possível</span>
                        </h3>
                        <!-- subtext -->
                        <p class="font-asap">
                            Coragem, disciplina e vigor na arte de SE fazer feliz
                        </p>
                        <!-- button -->

                    </div>
                </div>
            </div>
        </div>
        <div class="slide slide-2">
            <div class="container">
                <div class="row all-details-wrapper">
                    <div class="col-md-8 col-sm-8 col-xs-10">
                        <div class="row">
                            <div class="col-md-10 just-center">
                                <!-- image with play button at middle -->
                                <figure>
                                    <!-- <img class="img-responsive img-center main-img"
                                         src="https://i.ytimg.com/vi/U3bwL8lILoY/maxresdefault.jpg" alt=""/>  -->

                                        <img class="img-responsive img-center main-img"
                                             src="{{url('/images/banner_comprar_ead_loja.png')}}" alt=""/>



                                    <!-- <a href="https://www.youtube.com/watch?v=U3bwL8lILoY" class="popup-video play-button">
                                        <span class="fa fa-play-circle bttn-scale"></span> -->
                                    </a>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-8 col-xs-10">
                        <!-- main heading -->
                        <h3 class="letter-spacing0 font-comfortaa ">
                            Equação da <span class=" font-w600">felicidade possível</span>
                        </h3>
                        <!-- subtext -->
                        <p class="font-asap ">
                            Conheça o método desenvolvido pela Escola de curação
                        </p>
                        {{-- <!-- button
						"{{ route('site.about_metodo_curacao') }}" --> --}}
                        <a href=  "http://escoladecuracao.com.br/loja"
                           class="bttn bttn-main-1 bttn-scale bttn-small margin-top30 bttn75 bttn-shadow letter-spacing2">Saiba mais</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide slide-3">
            <div class="container">
                <div class="row all-details-wrapper">
                    <div class="col-md-8 col-sm-8 col-xs-10">
                        <div class="row">
                            <div class="col-md-10 just-center">
                                <!-- image with play button at middle -->
                                <figure>
                                    {{-- <img class="img-responsive img-center main-img"
                                         src="https://i.ytimg.com/vi/04QcvRJJoGM/maxresdefault.jpg" alt=""/>
                                    <a href="https://www.youtube.com/watch?v=04QcvRJJoGM" class="popup-video play-button">
                                        <span class="fa fa-play-circle bttn-scale"></span> --}}

                                        <a href="https://www.youtube.com/watch?v=U3bwL8lILoY" class="popup-video play-button">
                                          <img class="img-responsive img-center main-img"
                                               src="https://i.ytimg.com/vi/U3bwL8lILoY/maxresdefault.jpg" alt=""/>
                                                 <span class="fa fa-play-circle bttn-scale"></span>

                                    </a>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-8 col-xs-10">
                        <!-- main heading -->
                        {{-- <h3 class="letter-spacing0 font-comfortaa ">
                            Uma agenda para construir <span class=" font-w600">sua felicidade</span>
                        </h3>
                        <!-- subtext -->
                        <p class="font-asap ">
                            Conheça a agenda de eventos para os próximos meses
                        </p> --}}
                        <!-- button -->
                        <!-- main heading -->
                        <h3 class="letter-spacing0 font-comfortaa ">
                            Equação da <span class=" font-w600">felicidade possível</span>
                        </h3>
                        <!-- subtext -->
                        <p class="font-asap ">
                            Conheça o método desenvolvido pela Escola de curação
                        </p>
                        <a href="#container_metodo_curacao"
                           class="bttn bttn-main-1 bttn-scale bttn-small margin-top30 bttn75 bttn-shadow letter-spacing2">Saiba mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel Arrows - Prev/Next -->
    <div class="carousel-arrows">
        <a href="#0" class="prev-feature left bttn-scale" style="font-size: 50px;"><i class="ti-angle-left"></i></a>
        <a href="#0" class="next-feature right bttn-scale" style="font-size: 50px;"><i class="ti-angle-right"></i></a>
    </div>
</section>

@push ('styles')
<link rel="stylesheet" href="{{ asset('theme/css/owl-carousel.css') }}">
@endpush

@push ('scripts')
<script src="{{ asset('theme/js/owl.carousel.js') }}"></script>
<script>
    $(function () {
        // slider/carousel
        var owl = $('#hero-header-9');
        owl.owlCarousel({
            singleItem: true,
            autoPlay: true,
            navigation: false,
            slideSpeed: 300,
            paginationSpeed: 500,
            rewindSpeed: 400,
            autoHeight: true,
            addClassActive: true,
            afterMove: function() {
                $('.owl-item.active h1').addClass('animated fadeInUpSmall');
                $('.owl-item.active p').addClass('animated-md fadeInUpSmall');
                $('.owl-item.active .bttn-div').addClass('animated-lt fadeInUpSmall');
            },
            beforeMove: function() {
                $('.owl-item h1').removeClass('animated fadeInUpSmall');
                $('.owl-item p').removeClass('animated-md fadeInUpSmall');
                $('.owl-item .bttn-div').removeClass('animated-lt fadeInUpSmall');
            },
        });

        $('.owl-item.active h1').addClass('animated fadeInUpSmall');
        $('.owl-item.active p').addClass('animated-md fadeInUpSmall');
        $('.owl-item.active .bttn-div').addClass('animated-lt fadeInUpSmall');

        // next slide
        $('.next-feature').on('click', function(event) {
            owl.trigger('owl.next');
        });

        // prev slide
        $('.prev-feature').on('click', function(event) {
            owl.trigger('owl.prev');
        });

        // handle cursor keys
        var owlbttn = $('#hero-header-9').data('owlCarousel');
        $(document.documentElement).keyup(function(event) {
            if (event.keyCode == 37) {
                owlbttn.prev();
            } else if (event.keyCode == 39) {
                owlbttn.next();
            }
        });
    });
</script>
@endpush
