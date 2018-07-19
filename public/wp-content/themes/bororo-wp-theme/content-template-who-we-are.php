<?php
/**
 * @package Bororó 25
 */
?>

<?php
	global $page_;
?>

<?php
	$tabPessoasItens = get_posts(
		array(
			'post_type' => 'pessoa',
			'posts_per_page' => -1
		)
	);

	$tabEquipeItens = get_posts(
		array(
			'post_type' 			=> 'equipe',
			'posts_per_page' 	=> -1,
      'order'     			=> 'ASC'
		)
	);

	$tabParceiroItens = get_posts(
		array(
			'post_type' 			=> 'parceiro',
			'posts_per_page' 	=> -1,
      'order'     			=> 'ASC'
		)
	);
?>

<?php if ( $GLOBALS['page_'] == 1 ) : ?>

	<?php get_template_part( 'module', 'nav' ) ?>

	<?php get_template_part( 'module', 'top' ) ?>

<?php endif ?>

<section class="section-internal-content">
	<div class="box-tabs">
		
		<div class="box-nav-tabs">
			<ul class="nav-tabs">
				<li class="active"><a href="#autoras">Autoras</a></li>
				<li><a href="#metodo­curacao">Método Curação</a></li>
				<li><a href="#carta­manifesto">Carta Manifesto</a></li>
				<li><a href="#coletivo">Coletivo</a></li>
				<li><a href="#equipe">Equipe</a></li>
			</ul>
		</div>
		<div class="box-tab-content">
			<div class="tab-content">
				<!-- AUTORAS -->
				<div class="tab-pane active" id="autoras">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<h3 class="title">Nós somos a Bororó25</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5">
								<div class="box-photo-detail">
									<div class="box-image"><a href="#"><img src="<?php echo get_template_directory_uri() ?>/images/markers/tab-autoras2.png" alt="" /></a></div>
								</div>
							</div>
							<div class="col-xs-7">
								<h3 class="title title-a">
									A bororó25
								</h3>
								<p class="text text-a">
									A Bororó25 - a arte de SE fazer feliz - é um coletivo de saúde dedicado à constante reflexão filosófica e psicanalítica do cotidiano. 
								</p>
								<p class="text text-a">
									É um coletivo que produz conhecimento voltado para a construção do autoconhecimento. Na Bororó25 trabalhamos com a promoção e a educação em saúde emocional, utilizando uma tecnologia própria: o Método Curação. O propósito da Tecnologia de Gestão das Emoções da Bororó25 é que cada pessoa desenvolva suas habilidades emocionais produzindo um viver saudável. 
								</p>
								<!-- <p class="text text-a">	
									O propósito da tecnologia da Bororó25 - a Tecnologia de Gestão das Emoções - é que cada pessoa desenvolva suas habilidades emocionais produzindo um viver emocionalmente saudável. 
								</p> -->
								<br /><br />
								<h3 class="title">União de profissionais que fazem a diferença</h3>
								<br />
								<div class="extra-item">
									<h4 class="title">Christiane Ganzo</h4>
									<p class="text">Christiane Ganzo é visceral e sensível, revela que ser o que se é, em todas as dimensões, é o que nos faz humanos. E felizes. É coragem e ousadia. Coragem em sua escolha diária de se envolver profissionalmente com o ser humano e sua complexidade. Ousadia na convicção de que é urgente que as pessoas se alfabetizem emocionalmente. Gostar de gente e se envolver com cada um que a procura é uma característica marcante e seu propósito na Bororó25 e na vida. Psicóloga graduada pela UFRGS e pós-graduada em Clínica Psicanalítica, há mais de 25 anos, trabalha como psicanalista. Christiane Ganzo não se explica. É necessário ser vista, ser ouvida, ser sentida. </p>
								</div>
								<div class="extra-item">
									<h4 class="title">Denise Aerts</h4>
									<p class="text">Denise Aerts é a conjunção de potência e obstinação. Potência na capacidade única de compreender a alma humana e na habilidade de criar conhecimento para que o sujeito aprenda a desenvolver o protagonismo em sua vida. Obstinação na força para conduzir seus propósitos com método, disciplina, rigor técnico e trabalho em equipe. Médica e psicoterapeuta, doutora em Clínica Médica pela UFRGS; há mais de 30 anos atua como pesquisadora em saúde coletiva nas temáticas felicidade e saúde do trabalhador. Intelectual atuante e atualizada, Denise Aerts acredita que o conhecimento no campo da saúde emocional é um imprescindível agente de transformação. </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- MÉTODO CURAÇÃO -->
				<div class="tab-pane" id="metodo­curacao">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="box-logo-section">
									<img src="<?php echo get_template_directory_uri() ?>/images/tab-metodo-curacao-logo2.png" alt="" />	
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<p class="text text-a">O Método Curação nasceu da observação do processo vivido por muitas pessoas e da sistematização do material trabalhado em encontros individuais e em grupos. </p>
								<p class="text text-a">Tem como ponto de partida a filosofia e a psicanálise. É uma prática de autoanálise e de ação que traz a instrução de que a cura emocional se dá pela escolha e realização de ações curativas. O Método Curação é uma tecnologia de gestão das emoções composto por uma rede conceitual, uma estrutura e dinâmicas. Curação significa a arte de SE fazer feliz, a arte de bem cuidar-se. Contém duas fortes proposições: cura e ação.</p>
								<p class="text text-a">Cura evoca cuidado, estando intrinsecamente associada à ação. Não existe ação fora do presente. O presente é o único tempo em que vivemos, em que cuidamos de nós. É no presente que agimos. A ação é sempre no agora. Ideias sem ação são potências amputadas, energias em estado latente. </p>
								<p class="text text-a">Somos autores de nosso próprio viver. Porém, muitas vezes, não reconhecemos essa autoria e não nos responsabilizamos por nossas ações, deixando de desfrutar do único lugar que nos cabe: o centro de nossas vidas. </p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<?php get_template_part( 'module', 'circles-2' ) ?>
							</div>
						</div>
						<br /><br />
						<div class="row">
							<div class="col-xs-12">
								<h4 class="title">A Equação da Felicidade Possível: uma das dinâmicas do Método Curação </h4>
								<p class="text">
									A Equação da Felicidade Possível é uma das dinâmicas do Método Curação. É uma ferramenta prática, para uso cotidiano na construção de um viver saudável. A equação inicia com uma constante: O K - desejo consciente de SE fazer feliz. As outras etapas se referem a processos que variam o tempo todo: percepção(P), significação (S) e ação curativa (AC). 
								</p>
								<p class="text">
									A variação corresponde ao fato de que, a cada momento, surgem novas percepções a serem significadas e que resultarão em ações curativas.	
								</p>
								<div class="box-equation">
									<div class="equation equation-fp">
										<div class="equation-body">
											<span>FP</span>
											Felicidade Possível
										</div>
										<div class="tolltip">
											<p>
												<span>FP = Felicidade Possível</span>
												Felicidade Possível é saúde emocional. É Felicidade Possível a cada um de nós, e não a felicidade idealizada, da perfeição.
											</p>
										</div>
									</div>
									<div class="equation equation-symbol">
										<div class="equation-body">
											=
										</div>
									</div>
									<div class="equation equation-k">
										<div class="equation-body">
											<span>K</span>
											Constante
										</div>
										<div class="tolltip">
											<p>
												<span>K = Desejo de SE fazer feliz</span>
												O “K” é a constante da equação: o desejo consciente de SE fazer feliz.
											</p>
										</div>
									</div>
									<div class="equation equation-symbol">
										<div class="equation-body">
											>
										</div>
									</div>
									<div class="equation equation-p">
										<div class="equation-body">
											<span>P</span>
											Perceber
										</div>
										<div class="tolltip">
											<p>
												<span>P = Percepção</span>
												A percepção é a segunda etapa da Equação da Felicidade Possível. A atenção amorosa (AA) é a ferramenta da percepção consciente. Por meio dela, é possível reconhecer quem estamos sendo frente aos fatos de nossas vidas a cada momento.
											</p>
										</div>
									</div>
									<div class="equation equation-symbol">
										<div class="equation-body">
											>
										</div>
									</div>
									<div class="equation equation-s">
										<div class="equation-body">
											<span>S</span>
											Significar
										</div>
										<div class="tolltip">
											<p>
												<span>S = Significação</span>
												A terceira etapa do trabalho emocional de Curação é a significação. A investigação amorosa (IA) é a ferramenta da significação, e se debruça sobre o que percebemos: as emoções e os sentimentos que emergem da inconsciência.
											</p>
										</div>
									</div>
									<div class="equation equation-symbol">
										<div class="equation-body">
											>
										</div>
									</div>
									<div class="equation equation-ac">
										<div class="equation-body">
											<span>AC</span>
											Agir
										</div>
										<div class="tolltip">
											<p>
												<span>AC = Ação Curativa</span>
												As ações curativas constituem a quarta e última etapa da Equação da Felicidade Possível, e têm, como ferramenta, o processo de escolha.
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<br /><br /><br />
						<div class="row">
							<div class="col-xs-12">
								<h4 class="title title-nomargin">REDE CONCEITUAL</h4>
								<h4 class="title title-b">Conceitos de apoio ao aprendizado do Método Curação</h4>
								<br />
							</div>
						</div>
						
						<p class="text">
							<strong>Acolhimento x Submetimento  </strong> <br />
							Acolher é uma atitude de composição com os fatos, proporciona uma ampliação da alma daquele que acolhe. Submissão, ao contrário, é uma atitude de encolhimento, uma posição de contrariedade frente aos fatos. Acolhimento é o princípio básico do Método Curação.
						</p>
						<p class="text">
							<strong>Responsabilidade x Culpa </strong> <br />
							A responsabilidade e a culpa têm sido utilizadas como sinônimos. Entretanto, para nosso rigor conceitual, são, na verdade, excludentes entre si. Vivemos em uma cultura que utiliza a culpa, em vez da responsabilidade, como base de seus princípios de educação e controle. Culpa é a primeira e mais forte criação de uma importância totalmente indevida que o sujeito inventa para si. Responsabilidade é tomar para si as escolhas e as ações para um viver saudável. 
						</p>
						<!-- <p class="text">
							<strong>Responsabilidade </strong> <br />
							O sentimento de responsabilidade pelo próprio cuidado é fruto da consciência de estarmos realizando tudo o que nos cabe dentro de nosso espaço de governabilidade e do acolhimento de nossas reais possibilidades. A responsabilidade é o selo conquistado quando reconhecemos, humildemente, a imensidão do incontrolável e, corajosamente, movimentamo-nos desconstruindo nossas idealizações e acolhendo a finitude.
						</p>
						<p class="text">							
							<strong>Culpa </strong> <br />
							A culpa é um sentimento que brota em situações nas quais estamos em desacordo com os resultados obtidos. Surge de nosso desamparo e frustração. Quando culpamos o outro, nós nos desresponsabilizamos por nossas escolhas e ações. Quando nos culpamos, este sentimento ocorre em dois diferentes cenários. Em um deles, tivemos responsabilidade no ocorrido. No entanto, não acolhemos quem fomos frente ao fato. Ficamos contrariados e sofremos. O sofrimento, associado à percepção de nossa responsabilidade e à idealização sobre nossa infalibilidade, é o que produz o sentimento de culpa.   No outro cenário, não tivemos qualquer ingerência sobre o ocorrido. Porém, gostaríamos que tivesse existido alguma possibilidade de intervirmos. Sentimo-nos desamparados, idealizamos um poder que não possuímos e nos sentimos culpados. 
						</p> -->
						<p class="text">	
							<strong>Fato x Trauma </strong> <br />
							O fato se refere ao reconhecimento da ocorrência de um evento, que poderá ser físico ou psíquico. Ele não traz em si um juízo de valor, não é bom nem ruim. Os fatos estão inscritos em um período de tempo, têm início e fim. O que fazemos a partir do fato são interpretações sobre eles. Essas interpretações adquirem um colorido, de acordo aos valores de quem as significa. Algumas vezes, vivenciamos certos fatos com muita contrariedade e, por não acolhê-los, nós os transformamos em traumas. O trauma é uma construção emocional sobre o fato, significando-o de forma negativa. Nossa energia fica consumida no reviver da situação e na busca de outro desfecho que jamais acontecerá, pois o passado não se modifica. Porém, é possível modificarmos nossas interpretações sobre fatos passados. Exatamente por isso, somente desconstruímos um trauma quando o acolhemos como um exigente e triste fato. 
						</p>
						<p class="text">
							<strong>Dor x Sofrimento </strong> <br />
							A dor é inerente ao viver, enquanto que o sofrimento é opcional, já dizia Drummond. A dor, tanto física quanto emocional, é uma percepção que informa que algo ocorre na direção oposta do que gostaríamos. Tem início e tem fim. Já o sofrimento é uma construção emocional que marca de forma exacerbada essa contrariedade. Sofrimento é tudo o que reverbera e amplia a sensação de contrariedade aos fatos e à realidade como ela se apresenta. Do acolhimento da dor, surge a tristeza, e da contrariedade a ela, o sofrimento.
						</p>
						<p class="text">
							<strong>Desejar x Esperar  </strong> <br />
							O desejo é a expressão de vontades conscientes ou inconscientes que dependem da pessoa. Desejar demanda uma atitude ativa, na direção de agir para realizar seus desejos. Esperar, de “esperança”, remete a uma atitude passiva, uma espera de que algo aconteça, independente de sua ação. Esperar é sinônimo de expectativa. Ao esperarmos, nos desresponsabilizamos de nosso próprio cuidado.
						</p>
						<p class="text">
							<strong>Potência x Poder </strong> <br />
							A potência do sujeito é a sua força de expansão, sua confiança na própria capacidade de bem cuidar-se. Também chamamos de potência criativa. A potência pressupõe colaboração, cooperação, uma “potencialização” de capacidades.  Todos somos potentes e portadores de diferentes potências. Diferente dela, o poder se relaciona a um delírio de controle. É uma força de contração e opressão. O poder é uma ilusão, já que não somos poderosos e, sim, podemos ocupar um lugar de poder. O poder pressupõe submissão e superioridade. A potência expande, o poder adoece.
						</p>
						<p class="text">
							<strong>Sentimento x emoção  </strong> <br />
							A emoção é uma experiência afetiva que tem expressão no corpo, correspondendo a reações motoras e metabólicas involuntárias. Os corpos manifestam, automaticamente, emoções sem a mediação da consciência. Em geral, as emoções se apresentam com padrões de expressão corporal características. Em função disso, podemos perceber quando alguém está alegre, com medo ou com raiva. O sentimento é o modo como a pessoa significa suas emoções; é subjetivo, da ordem do privado. É o resultado do processo consciente ou inconsciente de significação. Em função disso, a construção do sentimento consciente de felicidade requer contato do sujeito com sua alma e constante trabalho emocional. 
						</p>
						<p class="text">
							<strong>Ações curativas X Ações impulsivas </strong> <br />
							As ações curativas são aquelas realizadas dentro do espaço de governabilidade de cada sujeito. São mediadas pelas forças ativas, constituindo-se em ações saudáveis. As ações impulsivas são frutos de descarga, e muitas vezes estão associadas à intenção da pessoa em evadir-se de sua ansiedade. São mediadas pelas forças reativas e representam uma tentativa do sujeito de controlar o incontrolável. 
						</p>
						<p class="text"> 
							<strong>Si próprio x si mesmo </strong> <br />
							O si-próprio vive no presente, sem aprisionar-se a fatos ou sentimentos passados, sem traumas, sem ressentimentos.  Existe um predomínio das forças ativas. Sua pauta é a ética consigo, com os valores próprios e atuais em sua vida e não com a moral, que expressa valores coletivos externos, muitas vezes sem qualquer correspondência com seu presente. O si-próprio acolhe os fatos e se acolhe frente aos fatos, investigando seus afetos e escolhendo ações curativas a cada instante. O si-mesmo vive embebido em críticas e culpas e aprisionado a um código de valores coletivo; do idealizado, carregados de juízos morais, de “certos e errados”, do bem e do mal. Correspondem, muitas vezes, aos valores familiares e sociais, mas não aos valores atuais do sujeito, impedindo sua multiplicidade, seu eu-caleidoscópio. As forças reativas são hegemônicas, tentando controlar o incontrolável. Busca agradar aos outros ou se apresentar como idealiza que deveria ser, mantendo-se em uma única versão, na tentativa de se sentir seguro e aceito, pois acredita que, assim, poderá poupar-se da dor do viver. 
						</p>
					</div>
					<br /><br />
				</div>

				<!-- CARTA MANIFESTO -->
				<div class="tab-pane" id="carta­manifesto" style="background-image: url(<?php echo get_template_directory_uri() ?>/images/tab-manifesto-bg2.jpg); background-size: cover !important;">
					<div class="container">
						<div class="row">
							<div class="col-xs-8">
								<br />			
								<h3 class="title title-c">A Bororó25 acredita que é possível SE fazer feliz.</h3>
								<br />
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<p class="text text-c">
									Acredita que se fazer feliz é uma arte, aprendida em uma prática que exige muita disciplina, coragem e vigor.
								</p>
								<p class="text text-c">	
									A Bororó25 acredita na construção de uma arte-técnica própria a cada Sujeito e defende que o bem viver é construído no tecido coletivo das semelhanças e dessemelhanças de cada um.
								</p>
								<p class="text text-c">
									A Bororó25, depois de somar muitas e muitas horas, ouvindo, observando e conversando com pessoas - participando da composição da ópera da vida de cada um de nós – desenvolveu, descortinou uma estrutura e uma dinâmica para o funcionamento de nossas almas, sistematizando-as em dez grandes movimentos: o Método Curação.
								</p>
								<p class="text text-c">
									A Bororó25 acredita que o Método Curação: essa arte-técnica de bem-viver, é uma prática de guerrilha. Uma guerrilha muito particular: a guerrilha da saúde. Da construção da saúde emocional. 
								</p>
								<p class="text text-c">
									A Bororó25 é um coletivo um tanto singular. Vivemos com a máxima atenção amorosa a fim de produzirmos, cada um de nós, nosso próprio sentido existencial de acordo ao código de valores de cada um.
								</p>
							</div>
							<div class="col-xs-6">
								<p class="text text-c">	
									A Bororó25 recomenda que os bororoenses pratiquem menorinhos curativos em pequenas e triviais ações cotidianas de autocuidado. E quanto menores eles forem, melhor! As partículas leves de consciência cuidadosa e saudável são contrabandeadas para a inconsciência sem maiores alardes.
								</p>
								<p class="text text-c">
									A Bororó25 afirma que somos todos inaugurais e caleidoscópicos. 
								</p>
								<p class="text text-c">
									Somos todos repletos de ideias, de energia e de criatividade. Somos todos capazes de invenções!
								</p>
								<p class="text text-c">
									Temos todos – cada um de nós – habilidade, capacidade e potência de criar. Cabe-nos descobrir quem somos e do que somos capazes: em cada ato. Cabe a nós nos autorizarmos e nos reconhecermos como artistas de nossa própria vida.
								</p>
								<p class="text text-c">
									<span>Viver bem é uma arte. A arte de SE fazer feliz.</span>
								</p>
							</div>
						</div>
					</div>
				</div>

				<!-- COLETIVO -->
				<div class="tab-pane" id="coletivo">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="box-logo-section">
									<img src="<?php echo get_template_directory_uri() ?>/images/tab-coletivo-logo.png" alt="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<p class="text">A Bororó25 é um coletivo de saúde que reconhece que o funcionamento humano é regido por forças do corpo, da mente e da alma, indissociáveis e primordialmente inconscientes. No caleidoscópio Bororó25 reúnem-se pessoas das mais diversas áreas do conhecimento e do fazer: psico-análise, psicoterapia, medicina, psicopedagogia, sociologia, assistência social, fisioterapia, medicina ayurveda, odontologia, arquitetura, enfermagem, engenharia, geografia, música, letras, publicidade, direito, administração, cinema, fotografia, artes plásticas. Pessoas das mais diferentes vivências, e todos acreditando na possibilidade de nos fazermos felizes - e com esse propósito - produzirmos associações. </p>
								<p class="text">Alguns de nós trabalham no organismo concreto e material situado à rua Bororó, nº 25, outros muitos, na rede bororoense imaterial, mas não menos real. Virtualmente ou presencialmente produzimos encontros. Amplia-se cada vez mais nosso coletivo. A palavra escrita da Bororó25 – livros, e-books, blog – avança sorrateira por entre os muros. Contrabandeada de mão em mão, sussurrada entre bocas e ouvidos, leva o que temos de mais sagrado: conceitos-ferramentas esculpidos com um olhar poético sobre o viver.  </p>
								<p class="text">Nos reconhecemos como um organismo rizomático¹, voltado à construção da felicidade possível. O rizoma Bororó25 é o testemunho da força do encontro, onde um mais um somos onze! Ser rizomático é existir em potência de devir e de expansão em todas as direções. Produzir encontros frutíferos amplia a potência de nossas almas. </p>
								<p class="text">Os bororoenses acreditam que é possível SE fazer feliz. E que SE fazer feliz é em ato uma arte, aprendida em uma prática que exige muita dedicação, coragem e vigor. A construção de cada bem viver é tecida no coletivo das semelhanças e dessemelhanças de cada um consigo próprio e com os outros. </p>
								<p class="text">Faça parte deste coletivo! </p>
								<p class="text">¹Rizoma é uma planta com raízes subterrâneas que se espalham em todas as direções.</p>
								<br /><br />
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<?php if ( sizeof( $tabPessoasItens ) ) : ?>
								<?php
									$contPeople = 0;
								?>
								<div class="box-people">
									<?php
									foreach ( $tabPessoasItens as $tabPessoaItem ) :
										$pessoaTitulo = apply_filters( 'the_title', $tabPessoaItem->post_title );
										$pessoaContent = apply_filters( 'the_content', $tabPessoaItem->post_content );
										$pessoaImagem = wp_get_attachment_image_src( get_post_thumbnail_id($tabPessoaItem->ID ), '300x300');
										$contPeople++;
										$classPeople = ($contPeople % 4 == 1 ? "people-col-1" : 
															( $contPeople % 4 == 2 ? "people-col-2" :
																( $contPeople % 4 == 3 ? "people-col-3" : "people-col-4" ) ) );
									?>
									<div class="people <?php echo $classPeople ?>">
										<div class="photo" <?php if ( ! empty( $pessoaImagem ) ) echo 'style="background-image:url('. $pessoaImagem[0] .')"' ?>>
											<?php echo $pessoaTitulo ?>
										</div>
										<div class="content">
											<h5 class="name"><?php echo $pessoaTitulo ?></h5>
											<div class="phrase"><?php echo $pessoaContent ?></div>
										</div>
									</div>
									<?php endforeach ?>
								</div>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>

				<!-- EQUIPE -->
				<div class="tab-pane" id="equipe">
					<div class="container">
						
						<div class="row">
							<div class="col-xs-12">
								<h3 class="title">Equipe</h3>
							</div>
						</div>
						<br />

              <?php if ( sizeof( $tabEquipeItens ) ) : ?>
									<?php
									foreach ( $tabEquipeItens as $tabEquipeItem ) :
										$equipeTitulo = apply_filters( 'the_title', $tabEquipeItem->post_title );
										$equipeContent = apply_filters( 'the_content', $tabEquipeItem->post_content );
										$equipeImagem = wp_get_attachment_image_src( get_post_thumbnail_id($tabEquipeItem->ID ), '300x300');
									?>
              						<div class="row">
                  <div class="col-xs-3">
                      <div class="box-image-author">
                        <img class="img-circle" src="<?php echo $equipeImagem[0]; ?>" alt="" />	
                      </div>
                  </div>
                  <div class="col-xs-9">
                    <div class="extra-item">
                      <br />
                      <h4 class="title"><?php echo $equipeTitulo; ?></h4>
                      <p class="text"><?php echo $equipeContent; ?></p>
                    </div>
                  </div>
              
              </div>
            <br/>
									<?php endforeach ?>
								<?php endif ?>
							
						<br />
						
						<div class="row">
							<div class="col-xs-12">
								<h3 class="title">Parceiros</h3>
							</div>
						</div>
            <?php if ( sizeof( $tabParceiroItens ) ) : ?>
									<?php
									foreach ( $tabParceiroItens as $tabParceiroItem ) :
										$parceiroTitulo = apply_filters( 'the_title', $tabParceiroItem->post_title );
										$parceiroContent = apply_filters( 'the_content', $tabParceiroItem->post_content );
										$parceiroImagem = wp_get_attachment_image_src( get_post_thumbnail_id($tabParceiroItem->ID ), '300x300');
									?>
              						<div class="row">
                  <div class="col-xs-3">
                      <div class="box-image-author">
                        <img class="img-circle" src="<?php echo $parceiroImagem[0]; ?>" alt="" />	
                      </div>
                  </div>
                  <div class="col-xs-9">
                    <div class="extra-item">
                      <br />
                      <h4 class="title"><?php echo $parceiroTitulo; ?></h4>
                      <p class="text"><?php echo $parceiroContent; ?></p>
                    </div>
                  </div>
              
              </div>
            <br/>
									<?php endforeach ?>
								<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

