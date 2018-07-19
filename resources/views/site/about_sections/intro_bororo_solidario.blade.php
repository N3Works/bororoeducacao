<!-- Hero Header Style 2 -->
<!-- Hero Header Style 2 -->
<section id="test" class="section-padding hero-header-2 bg-cover-simple" style="background-image: url('{{ asset('images/bg-metodo-curacao-2.jpg') }}'); background-attachment: fixed;">
    <div class="container">
        <div class="center-block-3">
            <!-- play button -->
            <a href="https://www.youtube.com/watch?v=pgzuxMJTuTI" class="popup-video">
                <span class="play-button bttn-scale"><i class="fa fa-play"></i></span>
            </a>
            <!-- Main Heading -->
            <h2 class="margin-top20 font-comfortaa text-white">
                Bororó Solidário
            </h2>
            <!-- subtext -->
            <p class="subtext font-asap padding-top20 text-white">
                Este é um pequeno recorte do trabalho que realizamos há 3 anos na Aldeia da Fraternidade. Nos sentimos
                muito gratos com o caminho percorrido e convidamos você a nos apoiar e ampliar projetos como este.
            </p>
        </div>
    </div>
</section>



@push('styles')
<link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('theme/js/jquery.magnific-popup.min.js') }}"></script>
<script>
    $(function () {
        $('.popup-video').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade my-video',
            preloader: false
        });
    })
</script>
@endpush