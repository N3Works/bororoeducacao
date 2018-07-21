<!-- Contact Section 2 -->
    <section class="content-block-2 text-left">
      <div class="container">
        <h2 class="letter-spacing0 font-comfortaa text-center foo text-main-1">
          <img class="img-responsive img-center" src="{{url('/images/contato.png')}}" alt=""/>
        </h2>
      <section class="contact-2 section-padding-zero section-top-margin" style="background-color: white; margin-left: 25px; margin-right: 25px;">
        <!-- left image wrapper part -->
        <div class="part part1 bg-cover-simple col-md-3 col-xs-12"
          style="background-color: white;
            background: #222222 url({{url('/images/Contato_fundo.jpg')}});
             display:inline-block;
             max-width: 90%;"
             >

        </div>
        <!-- right contact form part -->
        <div class="part part2 col-md-8 col-xs-12" style="background-color: white;padding-left: 0px;">
            <div class="main-wrapper just-center col-xs-12" style="width:auto; padding-left: 0px; padding-right: 0px">
              {{-- style="width:auto; min-width:450px" --}}
                <!-- main heading and sub-text -->
                <div class="center-block-1  col-xs-12 " style="padding-left: 0px">
                    <h3 class="text-main-2 font-josefin" style="text-align:center">
                      Fale Conosco
                    </h3>
                    <p class="font-hind margin-top20 text-large" style="text-align:-webkit-center">
                        Entre em contato através do e-mail ou telefone
                        <br>
                        <b>falecom@escoladecuracao.com.br | (51) 99994.9917</b>
                        <br>
                        ou pelo formulário abaixo:
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
                <div class="col-xs-12" style="padding-right: 30px">
                    <form id="contact-2" method="POST" action="{{ url('/contato') }}" class="placeholder-light">
                        {{ csrf_field() }}

                        <div class="col-md-6 col-xs-12">
                            <!-- input lable, here first name -->
                            <label for="firstname" style="color:#888888;">Nome</label>
                            <!-- input first name -->
                            <input type="text" id="firstname" name="firstname" maxlength="50" placeholder="Nome"
                                   required style="margin-bottom: 10px">
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <label for="lastname" style="color:#888888;">Sobrenome</label>
                            <input type="text" id="lastname" name="lastname" maxlength="50" placeholder="Sobrenome"
                                   required style="margin-bottom: 10px">
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <label for="email" style="color:#888888;">E-mail</label>
                            <input type="email" id="email" name="email" maxlength="150" placeholder="E-mail" required style="margin-bottom: 10px">
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <label for="phone" style="color:#888888;">Telefone</label>
                            <input type="text" id="phone" name="phone" placeholder="Telefone" required style="margin-bottom: 10px">
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <label for="message" style="color:#888888;">Mensagem </label>
                            <textarea class="no-margin-bottom" id="message" name="message"
                                      placeholder="Sua mensagem aqui" required style="margin-bottom: 10px"></textarea>
                        </div>
                        <div class="col-md-12 col-xs-12" style="display: flex; align-items: center; justify-content: center">
                            <button type="submit"
                                    class="bttn bttn-main-1 bttn75 bttn-med bttn-white bttn-scale margin-top30">Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section>
  </section>
    <!--========== END PROMO BLOCK ==========-->

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
