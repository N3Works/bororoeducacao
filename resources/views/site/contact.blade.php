@extends('layouts.app')

@push('metatags')
<title>Bororó 25 | Contato</title>
<meta content="Bororó 25 | Contato" name="title">
<meta content="Bororó 25 é um espaço de produção de saúde" name="description">
<meta name="author" content="dowhile.com.br">
<meta name="keywords" content="bororo, bororó 25, espaço, produção, saúde">

<meta property='og:type' content='website'>
<meta property="og:title" content="Bororó 25 | Contato">
<meta property="og:url" content="http://www.bororo25.com.br/contato">
<meta property="og:description" content="Bororó 25 é um espaço de produção de saúde">
<meta property="og:site_name" content="Bororó 25 | Bororó 25 é um espaço de produção de saúde ">
<meta property="og:image" content="http://bororo25.com/images/share.jpg">
<meta property="og:locale" content="pt_BR">
@endpush

@section('content')
    <!-- Contact Section 2 -->
    <section class="contact-2 section-padding-zero section-top-margin" style="background-color: white;">
        <!-- left image wrapper part -->
        <div class="part part1 bg-cover-simple"></div>
        <!-- right contact form part -->
        <div class="part part2" style="background-color: white;">
            <div class="main-wrapper just-center">
                <!-- main heading and sub-text -->
                <div class="center-block-1">
                    <h3 class="text-main-2 font-josefin">Fale Conosco</h3>
                    <p class="subtext font-hind margin-top20">
                        Se precisar de maiores informações sobre a Bororó25, nos envie uma mensagem!
                    </p>
                    @if (session('message'))
                        <div style="display: block; border-radius: 20px; background-color: rgba(0, 109, 0, 0.4);">
                          <span>
                            <p class="subtext font-hind" style="color: #FFF;">{{ session('title') }}</p>
                            <p class="subtext font-hind" style="color: #FFF;">{{ session('message') }}</p>
                          </span>
                        </div>
                    @endif
                </div>
                <!-- form goes here -->
                <div class="clearfix">
                    <form id="contact-2" method="POST" action="/contato" class="placeholder-light margin-top50">
                        {{ csrf_field() }}

                        <div class="col-md-6">
                            <!-- input lable, here first name -->
                            <label for="firstname">Nome</label>
                            <!-- input first name -->
                            <input type="text" id="firstname" name="firstname" maxlength="50" placeholder="Nome"
                                   required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname">Sobrenome</label>
                            <input type="text" id="lastname" name="lastname" maxlength="50" placeholder="Sobrenome"
                                   required>
                        </div>
                        <div class="col-md-6">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" maxlength="150" placeholder="E-mail" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Telefone</label>
                            <input type="text" id="phone" name="phone" placeholder="Telefone" required>
                        </div>
                        <div class="col-md-12">
                            <label for="message">Mensagem</label>
                            <textarea class="no-margin-bottom" id="message" name="message"
                                      placeholder="Sua mensagem aqui" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <button type="submit"
                                    class="bttn bttn-main-1 bttn75 bttn-med bttn-white bttn-scale margin-top30">Enviar
                            </button>
                        </div>
                    </form>
                </div>
                <div class="center-block-1 margin-top50">
                    <h3 class="text-main-2 font-josefin">Vamos conversar?</h3>
                    <p class="subtext font-hind margin-top20">
                        Agende uma visita: <br>
                        51 3346 6171 <br>
                        51 99692 8185 <br>
                        contato@bororo25.com.br
                    </p>
                </div>
                <div class="center-block-1 ">
                    <h3 class="text-main-2 font-josefin">Nosso endereço</h3>
                    <p class="subtext font-hind margin-top20">
                        Rua Bororó 25, Porto Alegre <br>
                        Rio Grande do Sul, Brasil
                    </p>
                    <a href="https://www.google.com.br/maps/place/R.+Boror%C3%B3,+25+-+Vila+Assun%C3%A7%C3%A3o,+Porto+Alegre+-+RS,+91900-540/@-30.0972548,-51.2528578,17z/data=!3m1!4b1!4m2!3m1!1s0x951982055fcc3f63:0x4033935c0afa3a78"
                       class="bttn bttn-main-1 bttn75 bttn-med bttn-white bttn-scale margin-top30" target="_blank">
                        Ver no mapa
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--========== END PROMO BLOCK ==========-->
@endsection

@push('scripts')
<script type="text/javascript" src="{{ asset('assets/plugins/jquery-mask-plugin/jquery.mask.js') }}"></script>
<script>
    $(function () {
        $('.contact-2 .part,#contact-2 .col-md-6').matchHeight();
        $('#phone').mask('(99) 99999-9999');
        contaCaracterInit("#message", 300);
    });
</script>
@endpush