<nav id="main-nav" class="light-nav" role="navigation">
    <div class="container">
        <!-- logo -->
        <a class="brand-name" href="{{ route('site.index') }}">
            {{-- <img class="initial-logo" src="{{ asset('images/logo_v2.png') }}" width="140" alt="" style="margin-top: -10px"> --}}
            <img class="initial-logo" src="{{ asset('images/logo_escola.png') }}" width="140" alt="" style="margin-top: -10px">
            <img class="scroll-logo" src="{{ asset('images/logo-mini.png') }}" width="25" alt="">
        </a>
        <!-- Menu Button -->
        <a class="toggle-bttn" href="#0">
            <span></span>
        </a>
        <!-- Main Navigation Menu -->
        <ul id="main-menu" class="sm sm-clean">
            {{-- <li>
                <a href="{{ route('site.index') }}">Início</a>
            </li> --}}


            <li>
                <a href="#">Sobre</a>
                <ul>
                    <li>
                        {{-- <a href="{{ route('site.about') }}">Quem Somos</a> --}}
                        <a href="#container_quem_somos">Quem Somos</a>
                    </li>
                    <li>
                        {{-- <a href="{{ route('site.about_metodo_curacao') }}">Método Curação</a> --}}
                        <a href="#container_metodo_curacao">Método Curação</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#container_servicos">Serviços</a>
                <ul>
                    <li>
                        {{-- <a href="{{ route('site.services.produtos') }}">Bororó Empresas</a> --}}
                        <a href="#container_curacao_voce">Curação para Você</a>
                    </li>
                    <li>
                        {{-- <a href="{{ route('site.services.bororo_solidario') }}">Bororó Solidário</a> --}}
                        <a href="#container_curacao_empresas">Curação Empresas</a>
                    </li>
                    <li>
                        <a href="#container_curacao_solidario">Curação Solidário</a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('site.events') }}">Eventos</a>
                    </li> --}}
                </ul>
            </li>

            <li>
                <a href="#container_produtos">Produtos</a>
                <ul>
                  <li>
                    {{-- <a href="{{ route('site.services.ead') }}">EAD</a> --}}
                    <a href="#container-ead">EAD</a>
                  </li>
                  <li>
                      {{-- <a href="{{ route('site.services.livros') }}">Livros</a> --}}
                    <a href="#container-mentoria">Mentoria</a>
                  </li>
                  <li>
                    {{-- <a href="{{ route('site.services.ebooks') }}">E-books</a> --}}
                    <a href="#container-livros">Livros</a>

                  </li>
                </ul>
            </li>
            <li>
                {{-- <a href="http://escoladecuracao.com.br/loja" target="_blank">Loja Virtual</a> --}}
                <a href="http://escoladecuracao.com.br/loja" target="_blank">Loja Virtual</a>
            </li>
            <li>
                <a href="#container-contato">Contato</a>
            </li>
            <li>
                <a href="#container-noticias">Notícias</a>
            </li>
            <li>
                <a href="#container-agenda">Agenda</a>
            </li>
        </ul>
    </div>
</nav>
