    <section class="content-block-2 text-left">
        <div class="container">
			<!-- main heading -->
			<h2 class="letter-spacing0 font-comfortaa text-center foo text-main-1">Quem somos</h2>
			<!-- sub-text -->
            <br>
            <p class="margin-top30 text-large" style="text-align:center">
                As aulas de educação à distância são disponibilizadas em formato de vídeo e também com conteúdos complementares para o estudo. O primeiro curso possui cinco módulos, que propõem dinâmicas e reflexões sobre o Método Curação.
            </p>
        </div>
    </section>
	
	<section class="contact-1 section-padding bg-circle-color">
        <div class="container">
            <div class="center-block-3" style="padding-top: 25px;" style="text-align: justify">
                <!-- main heading -->
                <h2 class="letter-spacing0 font-comfortaa text-white">
                    <span class="text-white font-w600">Bororó Educação</span>
                </h2>
                <!-- say hello button -->
                <div class="center-block-3 margin-top50" >
                    <p class="font-asap text-black text-large">
                      Bororó é uma palavra indígena que significa “pátio da aldeia”. <br>
                      No Brasil, os índios Bororo escolheram este nome como forma de expressar sua essência e organização social. <br>
                      O pátio é o centro da aldeia, um espaço de mística e de vivências emocionais.
                    </p>
                    <p class="font-asap text-black text-large">
                      A Bororó Educação é uma nova casa para o autoconhecimento. <br>
                      Um meio capaz de fazer circular educação em saúde emocional.

                    </p>
                    <p class="font-asap text text-large" style="color:purple" >
                        Nossa missão é contribuir para que cada pessoa desenvolva suas habilidades emocionais com autonomia para o bem viver!
                    </p>
                    <p class="font-asap text-black text-large">
                        A <strong>Bororó Educação </strong> acredita que o conhecimento e a partilha de saberes são fundamentais para a transformação pessoal e social.
                    </p>


                </div>
            </div>
            <div class="center-block-3" style="padding-top: 50px;" style="text-align: justify">
                <!-- main heading -->
                <h2 class="letter-spacing0 font-comfortaa text-white">
                    <span class="text-white font-w600">Objetivos</span>
                </h2>
                <!-- say hello button -->
                <div class="left-block-3 margin-top50"  style="text-align: justify" >
                    <ul class = "text-black" style="list-style-type:circle; font-size: 16px !important">
                      <li> Auxiliar pessoas na construção da <strong> Felicidade Possível</strong>; </li>
                      <li> Contribuir para o enriquecimento da experiência de autoconhecimento e <strong>Curação</strong>; </li>
                      <li> Possibilitar diferentes meios para a aprendizagem como livros, E-Books, workshops presenciais e cursos EAD; </li>
                      <li> Estabelecer vínculos, ampliando parcerias em novos espaços como empresas, instituições e organizações. </li>
                    </ul>
                </div>
            </div>
            <hr class="hr-small foo"/>
            <div class="row all-details-wrapper">
                <div class="col-md-4 just-center text-center">
                    <!-- social links -->
                    <div class="social">
                        <div class="display-inline foo"><a href="https://www.facebook.com/Bororo25/" target="_blank"
                                                           class="ti-facebook"></a></div>
                        <div class="display-inline foo"><a href="https://www.instagram.com/bororo25oficial/"
                                                           target="_blank" class="ti-instagram"></a></div>
                        <div class="display-inline foo"><a href="https://www.youtube.com/user/canalbororo"
                                                           target="_blank" class="ti-youtube"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="col-sm-4 part part2">
                <!-- Main Heading -->
                <h4 class="margin-top10 text-main-1 font-comfortaa">Christiane Ganzo</h4>
                <!-- Text -->
                <p class="text-grey font-asap margin-top30">
                    Experiência e atuação como psicanalista há mais de 25 anos, é também escritora e fundadora do Espaço Bororó.
                    Christiane Ganzo não se explica. É necessário ser vista, ser ouvida, ser sentida.
                    Seu propósito existencial é compartilhar o viver.
                    Christiane acredita que a associação entre as pessoas é o que dá sentido à vida.
                </p>
                <br>
            </div>
            <div class="col-md-4 text-center hidden-xs">
                <img src="{{ asset('images/autoras.png') }}" alt="Autoras" style="width: 320px;">
                <br><br>
                <p class="text-main-1">
                    Criadoras do Método Curação.
                </p>
            </div>
            <div class="col-sm-4 part part2">
                <!-- Main Heading -->
                <h4 class="margin-top10 text-main-1 font-comfortaa">Denise Aerts</h4>
                <!-- Text -->
                <p class="text-grey font-asap margin-top30">
                    Doutora em Clínica Médica e pesquisadora em saúde coletiva há mais de 30 anos.
                    Atua como médica, realizando psicoterapia e aconselhamento védico.
                    Denise acredita que o autoconhecimento e o autocuidado são os pontos de partida para toda a transformação.
                </p>
            </div>
        </div>
    </section>
	
@push('styles')
<link rel="stylesheet" href="{{ asset('css/circles.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('theme/js/jquery.matchHeight-min.js') }}"></script>
<script>
    $(function () {
        $('.part').matchHeight();
    })
</script>
@endpush