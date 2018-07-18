    <section class="content-block-2 text-left">
      <div class="container">
        <!-- main heading -->
        <h2 class="letter-spacing0 font-comfortaa text-center foo text-main-1">
          <img class="img-responsive img-center" src="{{url('/images/curacao_para_voce.png')}}" alt=""/>
        </h2>
			<!-- sub-text -->
        <br>
        <div class="center-block-4" style="margin-right: 4em; margin-left: 4em; text-align:justify">
          <br>
            <p class="margin-top15 text-large" style="text-align:justify">
                <p class="text-large">As ferramentas para a alfabetização emocional com base no Método Curação estão disponíveis em nossos
                  <a href="http://bororo25.com.br/loja/livros.html" target="_blank"><b>livros</b></a>, <a href="#container-ead">
                  <b>cursos em EAD</b></a> ou presenciais, workshops, além da vivência do trabalho emocional junto a um profissional
                   com conhecimento do método <a href="#container-noticias"><b>NOTICIA</b></a>.
                   É importante ressaltar que este trabalhado pode ser feito individualmente, em família ou casal ou grupos de análise.
                   Vai de cada um escolher qual o melhor caminho a seguir para o seu autoconhecimento. </p>
				     <br>
					 <p class="text-large" style="color: red">Trabalho individual</p>
					 <img class="img-responsive img-center" src="{{url('/images/trabalho_individual.png')}}" alt=""/>
					 <br>
					 <p class="text-large" style="color: red">Trabalhos com famílias e casais </p>
					 <img class="img-responsive img-center" src="{{url('/images/trabalho_familias.png')}}" alt=""/>
					 <br>
					 <p class="text-large" style="color: red">Grupos de Análise e Autoconhecimento </p>
					 <img class="img-responsive img-center" src="{{url('/images/trabalho-emocional/analise.jpg')}}" alt=""/>
					 
          </p>
        </div>
    </section>

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
