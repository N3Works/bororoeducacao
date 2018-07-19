<!-- Portfolio Style 2 -->
<section class="section-padding-small portfolio-1 bg-circle" id="portfolio-2">
    <!-- main heading -->
    <h2 class="letter-spacing0 font-comfortaa text-center foo text-main-1">E-books</h2>
    <!-- sub-text -->
    <div class="center-block-1">
        {{-- <p class="subtext font-asap foo">Nossos e-books.</p> --}}
    </div>
    <div class="container">
        <!-- grid wrapper -->
        <p class="margin-top30 text-large">
            Os livros digitais, E-Books, surgiram para ampliar o alcance dos livros impressos, facilitando a integração do conteúdo com as novas tecnologias. A produção das autoras Christiane Ganzo e Denise Aerts tem o propósito de divulgar a metodologia própria da Bororó Educação: o Método Curação
        </p>

        <div class="left-block-3 margin-top20"  style="padding-left: 20px;" >
            <ul class = "text-large" style="list-style-type:circle; ">
              <b>
                <li> A Vida como ela é para cada um de nós; </li>
                <li> Curação: a arte de bem cuidar-se; </li>
                <li> A Felicidade Possível; </li>
                <li> Série pocket com 3 libretos: A arte de SE fazer feliz. </li>
              </b>
            </ul>
        </div>


        {{-- <ul class="grid gutter grid-type-1 grid-3">
            <!-- element -->
            @forelse($ebooks as $eb)
                <li class="grid-item">
                    <div>
                        <!-- Image Wrapper -->
                        <figure>
                            <div class="grid-img">
                                <img class="img-responsive" src="{{ asset('uploads/resources/' . $eb->thumbnail_img) }}" alt="{{ $eb->name }}">
                            </div>
                            <!-- Image Caption -->
                            <figcaption>
                                <br>
                                <span class="project">{{ $eb->name }}</span>
                                <br>
                                <span class="company">
                                     {{ $eb->description }}
                                </span>
                                <br>
                                <a href="#resource-form" data-slug="{{ $eb->slug }}" class="btn bttn-main-1 btn-block bttn75 popup-with-form">Baixar</a>
                            </figcaption>
                        </figure>
                    </div>
                </li>
            @empty
                <h4 class="letter-spacing0 font-josefin text-center text-main-1">Ops, não temos nenhum e-book ainda.</h4>
            @endforelse
        </ul> --}}
    </div>
</section>

<form id="resource-form" method="POST" action="{{ route('site.services.books.download') }}" class="mfp-hide white-popup-block">
  {{ csrf_field() }}
  <div class="container">
    <h3>Download</h3>
    <fieldset style="border:0;">
      <p>Para fazer o download, por favor coloque seu nome e e-mail.</p>

      <div class="form-group">
        <div class="col-md-3">
          <label for="name">Nome</label>
          <input class="form-control" maxlength="80" id="name" name="name" type="text" placeholder="Nome" required>
        </div>

        <div class="col-md-5">
          <label for="email">Email</label>
          <input class="form-control" maxlength="150" id="email" name="email" type="email" placeholder="exemplo@dominio.com" required>
        </div>
      </div>

      <input type="hidden" name="slug" id="slug" value="">
    </fieldset>

    <button type="submit" class="btn bttn-main-1 bttn75 pull-right">
      Fazer download
    </button>
  </div>
</form>

@push('scripts')
<script>
    $(function () {
      $('.popup-with-form').click(function(){
        $("#slug").val($(this).data("slug"));
      });

      $('.popup-with-form').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#name',

        // When elemened is focused, some mobile browsers in some cases zoom in
        // It looks not nice, so we disable it:
        callbacks: {
          beforeOpen: function() {
            if($(window).width() < 700) {
              this.st.focus = false;
            } else {
              this.st.focus = '#name';
            }
          },
          close: function () {
            console.log('fechou');
            $("#slug").val("");
          }
        }
      });
  });
</script>
@endpush
