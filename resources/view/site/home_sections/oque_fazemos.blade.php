<section class="section-padding content-block-6 bg-circle">
    <!-- image wrapper -->
    <div class="img-container foo" data-parallax='{"y" : 50}'>
        <img class="img-responsive" src="{{ asset('images/bg3.png') }}" alt="O que fazemos - Bororó25">
    </div>
    <!-- main content -->
    <div class="container text-left">
        <div class="row">
            <div class="content-wrap" style="margin-left: 25px;">
                <!-- main heading -->
                <h3 class="text-main-1">Descubra a <span class="text-main-2">@Bororó25</span></h3>
                <!-- sub-text -->
                <p class="subtext margin-top20 font-comfortaa">
                    Autoconhecimento para a construção da felicidade possível
                </p>
                <!-- all features wrapper -->
                <div class="all-features row margin-top30">
                    <!-- feature box -->
                    <div class="feature col-xs-6 margin-bot30" style="height: 139px;">
                        <a href="{{ route('site.events') }}">
                            <span class="ti-calendar icon text-main-2"></span>
                            <span class="subh-basic-dark">Eventos</span>
                            <p>Eventos preparados para o nosso público.</p>
                        </a>
                    </div>
                    <div class="feature col-xs-6 margin-bot30" style="height: 139px;">
                        <a href="{{ route('site.services.livros') }}">
                            <span class="ti-book icon text-main-2"></span>
                            <span class="subh-basic-dark">Livros</span>
                            <p>Veja os livros que desenvolvemos para ajudar você</p>
                        </a>
                    </div>
                    <div class="feature col-xs-6 margin-bot30" style="height: 139px;">
                        <a href="{{ route('site.services.trabalho_terapeutico') }}">
                            <span class="ti-face-smile icon text-main-2"></span>
                            <span class="subh-basic-dark">Trabalho Terapeutico</span>
                            <p>O trabalho emocional da Bororó25 tem ênfase na prática de que a saúde emocional...</p>
                        </a>
                    </div>
                    <div class="feature col-xs-6 margin-bot30" style="height: 139px;">
                        <a href="{{ route('site.blog') }}">
                            <span class="ti-gift icon text-main-2"></span>
                            <span class="subh-basic-dark">Blog</span>
                            <p>Acompanhe nossas atualizações com nosso conteúdo!.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>