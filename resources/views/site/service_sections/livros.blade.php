<!-- Price Table Style 4 -->
<section class="books-1 ">
    <div class="container">
        <!-- main heading -->
        {{-- <h2 class="letter-spacing0 font-comfortaa text-center foo text-main-1">Editora Bororó25</h2> --}}
        <!-- sub-text -->
        <div class="row">
            <br><br>
            <div class="col-md-12">
                <p class="margin-top30 text-large">
                    Os livros oferecem ferramentas para que cada pessoa trilhe seu caminho de gestão das emoções. A produção das autoras Christiane Ganzo e Denise Aerts tem o propósito de divulgar a metodologia própria da Bororó Educação: o Método Curação.
                </p>
                <p class="margin-top30 text-large">
                    A editora tem seis títulos publicados
                </p>

                <div class="left-block-3 margin-top20"  style="padding-left: 20px;" >
                    <ul class = "text-large" style="list-style-type:circle; padding-bottom:5px;">
                      <b>
                        <li> A Vida como ela é para cada um de nós; </li>
                        <li> Curação: a arte de bem cuidar-se; </li>
                        <li> A Felicidade Possível; </li>
                        <li> Série pocket com 3 libretos: A arte de SE fazer feliz. </li>
                      </b>
                    </ul>
                </div>
            </div>



        </div>
        <div class="all-details">
            <!-- price table -->
            <div class="col-sm-3 foo">
                <div class="price-table">
                    <!-- Plan Type -->
                    <span class="plan">A Vida como ela é para cada um de nós</span>
                    <!-- Plan Price -->
                    <div class="img-wrapper">
                        <img class="img-responsive img-center"
                             src="{{ asset('images/avidacomoelae.jpg') }}"
                             alt="A Vida como ela é para cada um de nós" width="250">
                    </div>
                    <div class="padding-all10">
                        É um manual de autoanálise sobre a filosofia do cotidiano. Escrito em uma linguagem simples e
                        direta, foi o primeiro livro publicado pelas autoras para oferecer a Tecnologia de Gestão das
                        Emoções. A narrativa discorre de...
                    </div>
                    <!-- Purchase Button -->
                    <div style="position: absolute; width: 100%; bottom: 5px; left: 0;  padding: 5px 15px;">
                        <a href="http://escoladecuracao.com.br/loja/livros" target="_blank" class="purchase bttn-main-1">Visitar
                            loja</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 foo">
                <div class="price-table">
                    <!-- Plan Type -->
                    <span class="plan" style="padding: 10px">Curação: a arte de bem cuidar-se</span>
                    <!-- Plan Price -->
                    <div class="img-wrapper">
                        <img class="img-responsive img-center"
                             src="{{ asset('images/curacao_sem_fundo.jpg') }}"
                             alt="Curação: a arte de bem cuidar-se" width="150">
                    </div>
                    <div class="padding-all10">
                        As autoras compartilham com os leitores seu método de trabalho, apresentando instrumentos
                        potencializadores da saúde emocional, acompanhados de orientações para o processo...
                    </div>
                    <!-- Purchase Button -->
                    <div style="position: absolute; width: 100%; bottom: 5px; left: 0;  padding: 5px 15px;">
                        <a href="http://escoladecuracao.com.br/loja/livros/curacao-a-arte-de-bem-cuidar-se.html"
                           target="_blank" class="purchase bttn-main-1">Visitar loja</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 foo">
                <div class="price-table">
                    <!-- Plan Type -->
                    <span class="plan">A Felicidade Possível</span>
                    <!-- Plan Price -->
                    <div class="img-wrapper">
                        <img class="img-responsive img-center"
                             src="{{ asset('images/capa_livro_afelicidade.jpg') }}"
                             alt="A Felicidade Possível" width="250">
                    </div>
                    <div class="padding-all10">
                        Vivemos em uma cultura regida pela tirania da felicidade idealizada, porém neste livro
                        apresentamos outro cenário: a construção da Felicidade Possível a cada um de nós...
                    </div>
                    <!-- Purchase Button -->
                    <div style="position: absolute; width: 100%; bottom: 5px; left: 0;  padding: 5px 15px;">
                        <a href="http://escoladecuracao.com.br/loja/livros/a-felicidade-possivel.html" target="_blank"
                           class="purchase bttn-main-1">Visitar loja</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 foo">
                <div class="price-table">
                    <!-- Plan Type -->
                    <span class="plan">A arte de SE fazer feliz</span>
                    <!-- Plan Price -->
                    <div class="img-wrapper">
                        <img class="img-responsive img-center"
                             src="{{ asset('images/box.jpg') }}"
                             alt="A arte de SE fazer feliz" width="250">
                    </div>
                    <div class="padding-all10">
                        A série pocket “a arte de SE fazer feliz” é um potente contrabando: contra-os-bandos, pois
                        acreditamos que não há saúde emocional no rebanho, nem no mesmo, nem no igual...
                    </div>
                    <!-- Purchase Button -->
                    <div style="margin-top: 15px; width: 100%; bottom: 5px; left: 0;  padding: 5px 15px;">
                        <a href="http://escoladecuracao.com.br/loja/destaques/a-arte-de-se-fazer-feliz-combo-com-os-3-libretos-box.html"
                           target="_blank" class="purchase bttn-main-1">Visitar loja</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@push('scripts')

<script>
    $('.price-table').matchHeight();
</script>

@endpush
