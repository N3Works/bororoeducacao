<nav id="main-nav" class="light-nav" role="navigation">
    <div class="container">
        <!-- logo -->
        <a class="brand-name" href="{{ route('site.index') }}">
            {{-- <img class="initial-logo" src="{{ asset('images/logo_v2.png') }}" width="140" alt="" style="margin-top: -10px"> --}}
            <img class="initial-logo" src="{{ asset('images/logo_v3.png') }}" width="140" alt="" style="margin-top: -10px">
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
                        <a href="{{ route('site.about') }}">Quem Somos</a>
                    </li>
                    <li>
                        <a href="{{ route('site.about_metodo_curacao') }}">Método Curação</a>
                    </li>
                    <li>
                        <a href="{{ route('site.blog') }}">Notícias</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">Serviços</a>
                <ul>
                    <li>
                        <a href="{{ route('site.services.produtos') }}">Bororó Empresas</a>
                    </li>
                    <li>
                        <a href="{{ route('site.services.bororo_solidario') }}">Bororó Solidário</a>
                    </li>
<!--                            <li>
                        <a href="{{ route('site.services.tge') }}">Solidário    </a>
                    </li>-->
                    <li>
                        <a href="{{ route('site.events') }}">Eventos</a>
                    </li>
                </ul>
            </li>


<!--            <li>
                <a href="#">Quem somos</a>
                <ul>
                    <li>
                        <a href="{{ route('site.about') }}">A Bororó25</a>
                    </li>
                    <li>
                        <a href="{{ route('site.about_metodo_curacao') }}">Método Curação</a>
                    </li>
                    <li>
                        <a href="{{ route('site.about_carta_manifesto') }}">Carta Manifesto</a>
                    </li>
                    <li>
                        <a href="{{ route('site.coworking_b25') }}">Coworking B25</a>
                    </li>
                </ul>
            </li>-->
            <li>
                <a href="#">Produtos</a>
                <ul>
                    <li>
                        <a href="https://hotmart.com.br" target="_blank">EAD</a>
                    </li>
<!--                    <li>
                        <a href="{{ route('site.services.trabalho_terapeutico') }}">Trabalho Emocional</a>
                    </li>-->
                    <li><a href="{{ route('site.services.livros') }}">Livros</a></li>
                    <li><a href="{{ route('site.services.ebooks') }}">E-books</a></li>
                    <li>
                        <a href="{{ route('site.services.cursos') }}">Cursos</a>
                    </li>
<!--                    <li>
                        <a href="javascript:;">Aprendizado</a>
                        <ul>
                            <li><a href="{{ route('site.services.ebooks') }}">Livros / E-books</a></li>
                            <li>
                                <a href="https://hotmart.com.br" target="_blank">EAD</a>
                            </li>
                        </ul>
                    </li>-->
<!--                    <li>
                        <a href="{{ route('site.services.bororo_solidario') }}">Bororó Solidário</a>
                    </li>-->
                </ul>
            </li>
            <li>
                <a href="http://bororo25.com.br/loja" target="_blank">Loja Virtual</a>
            </li>
            <li>
                <a href="{{ route('site.contact') }}">Contato</a>
            </li>
        </ul>
    </div>
</nav>
