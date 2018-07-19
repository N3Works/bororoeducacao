<section class="blog-card-small content-block-9">
    <div class="container">
        <h3 class="page-title text-main-1">Próximos eventos</h3>
        <div class="all-details-wrapper col-md-12 just-center">
            <div class="row my-owl-carousel">
                @if(count($events) > 0)
                    <div class="owl-carousel">
                        @foreach($events as $event)
                            <div class="grid-item">
                                <a href="{{ route('site.events.detail', $event->slug) }}">
                                    <!-- blog card wrapper -->
                                    <div class="blog-post">
                                        <!-- post image -->
                                        <div class="blog-img">
                                            <img class="img-responsive"
                                                 src="{{ asset('uploads/courses/' . $event->thumbnail_img) }}"
                                                 alt="{{ $event->title }}">
                                        </div>
                                        <!-- post content -->
                                        <div class="blog-content">
                                            <span class="subh-basic-dark">Evento em {{ $event->start_at->format('d/m/Y') }}</span>
                                            <h6>{{ $event->title }}</h6>
                                            <span class="article-by">Duração: <span
                                                        class="author">{{ $event->duration }}h</span></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- Carousel Arrows - Prev/Next -->
                    <div class="carousel-arrows">
                        <a href="#0" class="prev-feature left bttn-scale"><i class="ti-angle-left"></i></a>
                        <a href="#0" class="next-feature right bttn-scale"><i class="ti-angle-right"></i></a>
                    </div>
            </div>
            @else
                <p>
                    Desculpe, mas não temos nenhum evento próximo. Mas se inscreva nas nossas news clicando <a
                            href="#">aqui</a> e receba em primeira mão nossos eventos!
                </p>
            @endif
        </div>
    </div>
</section>
@push('styles')
<link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css') }}"/>
<link rel="stylesheet" href="{{ asset('theme/css/blog.css') }}">
<link rel="stylesheet" href="{{ asset('theme/css/owl-carousel.css') }}">
<style>
    .grid-item {
        /*width: 100%;*/
        margin: 35px
    }

    .article-by {
        position: absolute;
        bottom: 50px;
    }

    .owl-theme .owl-controls {
        display: none !important;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('theme/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('theme/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('theme/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('theme/js/owl.carousel.js') }}"></script>

<script>
    $(function () {

        @if(count($events) > 0)
        // slider/carousel
        $('.grid-item').matchHeight();
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 3,
            autoPlay: false,
            navigation: false,
            slideSpeed: 300,
            paginationSpeed: 500,
            rewindSpeed: 400,
            autoHeight: true,
            addClassActive: true,
            afterInit: function () {
                $('.blog-post').matchHeight();
            },
            afterUpdate: function () {
                $('.blog-post').matchHeight();
            },
            afterMove: function () {
                $('.owl-item.active h1').addClass('animated fadeInUpSmall');
                $('.owl-item.active p').addClass('animated-md fadeInUpSmall');
                $('.owl-item.active .bttn-div').addClass('animated-lt fadeInUpSmall');
            },
            beforeMove: function () {
                $('.owl-item h1').removeClass('animated fadeInUpSmall');
                $('.owl-item p').removeClass('animated-md fadeInUpSmall');
                $('.owl-item .bttn-div').removeClass('animated-lt fadeInUpSmall');
            }
        });

        $('.owl-item.active h1').addClass('animated fadeInUpSmall');
        $('.owl-item.active p').addClass('animated-md fadeInUpSmall');
        $('.owl-item.active .bttn-div').addClass('animated-lt fadeInUpSmall');

        // next slide
        $('.next-feature').on('click', function (event) {
            owl.trigger('owl.next');
        });

        // prev slide
        $('.prev-feature').on('click', function (event) {
            owl.trigger('owl.prev');
        });

        // handle cursor keys
        var owlbttn = $('.owl-carousel').data('owlCarousel');
        $(document.documentElement).keyup(function (event) {
            if (event.keyCode == 37) {
                owlbttn.prev();
            } else if (event.keyCode == 39) {
                owlbttn.next();
            }
        });
        @endif
        // masonry grid
//        var $grid = $('.blog-card-small .blog-wrapper').masonry({
//            itemSelector: '.grid-item'
//        });
//        $grid.imagesLoaded().progress(function () {
//            $grid.masonry('layout');
//        });
    })
</script>
@endpush