<?php
/**
 * @package Bororó 25
 */
?>

<?php
	global $page_;
?>

<?php
	$tabCursoItens = get_posts(
		array(
			'post_type' => 'curso',
			'posts_per_page' => -1,
			'meta_key' => 'wpcf-data-programacao',
      'orderby'   => 'meta_value_num', //or 'meta_value_num'
      'order' => 'DESC',
			'meta_query'  => array(
				array(
						'key' => 'wpcf-data-programacao',
						'value' => date('U'),  // <- change
						'compare' => '>=',
						'type' => 'NUMERIC'
					)
				)
			)
		);
	
	$tabCursoExiste = sizeof( $tabCursoItens );

	$tabCursoItensRealizados = get_posts(
		array(
			'post_type' => 'curso',
			'posts_per_page' => -1,
			'meta_key' => 'wpcf-data-programacao',
      'orderby'   => 'meta_value_num', //or 'meta_value_num'
      'order' => 'DESC',
			'meta_query'  => array(
				array(
					'key' => 'wpcf-data-programacao',
					'value' => date('U'),  // <- change
					'compare' => '<',
					'type' => 'NUMERIC'
				)
			)
		)
	);
	$tabCursoExisteRealizados = sizeof( $tabCursoItens );

	$tabCinemaItens = get_posts(
		array(
			'post_type' => 'cinema',
			'posts_per_page' => -1,
			'meta_key' => 'wpcf-data-programacao',
      'orderby'   => 'meta_value_num', //or 'meta_value_num'
      'order' => 'DESC',
			'meta_query'  => array(
				array(
					'key' => 'wpcf-data-programacao',
					'value' => date('U'),  // <- change
					'compare' => '>=',
					'type' => 'NUMERIC'
				)
			)
		)
	);

	$tabOficinaItens = get_posts(
		array(
			'post_type' => 'oficina',
			'posts_per_page' => -1
		)
	);

	$tabCinemaItensRealizados = get_posts(
		array(
			'post_type' => 'cinema',
			'posts_per_page' => -1,
			'meta_key' => 'wpcf-data-programacao',
      'orderby'   => 'meta_value_num', //or 'meta_value_num'
      'order' => 'DESC',
			'meta_query'  => array(
				array(
					'key' => 'wpcf-data-programacao',
					'value' => date('U'),  // <- change
					'compare' => '<',
					'type' => 'NUMERIC'
				)
			)
		)
	);

	$tabOficinaItensRealizados = get_posts(
		array(
			'post_type' => 'oficina',
			'posts_per_page' => -1
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
				<li class="active"><a href="#o­que­fazemos">O que fazemos</a></li>
				<li><a id="cursos-tab" href="#cursos">Cursos</a></li>
				<li><a href="#livros">Livros</a></li>
				<li><a id="cinema-tab" href="#cinema">Cinema</a></li>
				<li><a href="#grupos­de­estudos">Grupo de estudos</a></li>
				<li><a href="#parceiros">Parceiros</a></li>
				<li><a href="#trabalho­terapeutico">Trabalho Terapêutico</a></li>
			</ul>
		</div>
		<div class="box-tab-content">
			<div class="tab-content">
				<!-- O QUE FAZEMOS -->
				<div class="tab-pane active" id="o­que­fazemos">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<?php get_template_part( 'module', 'circles-1' ) ?>
							</div>
						</div>
					</div>
				</div>

				
				<!-- CURSOS -->
				<div class="tab-pane" id="cursos">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<h3 class="title title-b">Programação de Eventos</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<?php if ( sizeof( $tabCursoItens ) ) : ?>
								<div class="box-cards slick-cursos">
									<?php
										foreach ( $tabCursoItens as $tabCursoItem ) :
											$cursoTitulo = apply_filters( 'the_title', $tabCursoItem->post_title );
											$cursoResumo = frontend_get_the_excerpt_by_id( $tabCursoItem->ID, 20);
											$cursoInicio = get_post_meta( $tabCursoItem->ID, 'wpcf-curso-inicio', TRUE );
											$cursoImagem = wp_get_attachment_image_src( get_post_thumbnail_id($tabCursoItem->ID ), '270x390');;
											$cursoLink   = get_the_permalink( $tabCursoItem->ID);
										?>
                  <div class="card card-cinema">
                    <a href="<?php echo $cursoLink ?>" title="<?php echo $cursoTitulo ?>">
                    <div class="box-image" <?php if ( ! empty( $cursoImagem ) ) echo 'style="background-image:url('. $cursoImagem[0] .')"' ?>>

                    </div>
                      <?php if ( ! empty( $cursoInicio ) ) : ?>
                      <div class="box-content">
                        <p class="text">
                          <?php echo $cursoInicio ?>
                        </p>
                      </div>
                      <?php endif ?>
                    </a>
                  </div>
									<?php endforeach ?>
								</div>
								<?php else: ?>
									<h4 style="color: #636363">Nenhuma programação de evento.</h4>
								<?php endif ?>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<h3 class="title title-b">Eventos realizados</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<?php if ( sizeof( $tabCursoItensRealizados ) ) : ?>
								<div class="box-cards slick-cursos-realizados">
									<?php
										foreach ( $tabCursoItensRealizados as $tabCursoItem ) :
											$cursoTitulo = apply_filters( 'the_title', $tabCursoItem->post_title );
											$cursoResumo = frontend_get_the_excerpt_by_id( $tabCursoItem->ID, 20);
											$cursoInicio = get_post_meta( $tabCursoItem->ID, 'wpcf-curso-inicio', TRUE );
											$cursoImagem = wp_get_attachment_image_src( get_post_thumbnail_id($tabCursoItem->ID ), '270x390');;
											$cursoLink   = get_the_permalink( $tabCursoItem->ID);
										?>
                  <div class="card card-cinema">
                    <a href="<?php echo $cursoLink ?>" title="<?php echo $cursoTitulo ?>" style="width: 267px;">
                    <div class="box-image" <?php if ( ! empty( $cursoImagem ) ) echo 'style="background-image:url('. $cursoImagem[0] .')"' ?>>

                    </div>
                      <?php if ( ! empty( $cursoInicio ) ) : ?>
                      <div class="box-content">
                        <p class="text">
                          <?php echo $cursoInicio ?>
                        </p>
                      </div>
                      <?php endif ?>
                    </a>
                  </div>
									<?php endforeach ?>
								</div>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
				

				<!-- LIVROS -->
				<div class="tab-pane" id="livros">
					<div class="container">
						<?php get_template_part( 'module', 'tab-books' ) ?>
					</div>
				</div>

				<!-- CINEMA -->
				<div class="tab-pane" id="cinema">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="box-logo-section">
									<img src="<?php echo get_template_directory_uri() ?>/images/tab-cinema-logo.png" alt="" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5">
								<div class="box-photo-detail">
									<div class="box-image">
										<img src="<?php echo get_template_directory_uri() ?>/images/markers/tab-cinema.jpg" alt="" />
									</div>
								</div>
							</div>
							<div class="col-xs-7">
								<p class="text text-a">
									A arte imita a vida: o cinema é a arte que mais se aproxima da vida como a percebemos. O cinema contemporâneo tem retratado com muita competência os dramas humanos.  No CINE Bororó25, além de desfrutar da beleza do filme, da trilha e da fotografia de cada cena, dedicamos especial atenção para a linguagem verbal e para o gestual de cada personagem l da história, para a maneira como o drama de cada um é contado e o que podemos aprender com eles. Utilizamos a apresentação de filmes como laboratórios de vida, ensaios, recortes, onde podemos nos projetar e identificar nos personagens, cenas e passagens de nossas próprias vidas.
								</p>
								<p class="text text-a">
									Observamos nas sessões do Cine Bororó25 como os personagens vão encaminhando suas vidas, seus relacionamentos, seu caminho, seus enfrentamentos e suas dores. Cada cena, nos mais diferentes cenários, nos ajuda a ilustrar a vida como ela é e aprender sobre nossas próprias vivências. Contemplamos os diferentes desfechos, estudamos atentamente os discursos, a forma e o conteúdo dos diálogos e legendamos cada cena com os conceitos do Método Curação. 
								</p>
								<br />
								<h3 class="title title-a">O CineBororó25 e o Método Curação   </h3>
								<p class="text text-a">
									O Cine Bororó25 é uma das portas de entrada para o aprendizado do Método Curação. É a possibilidade de ver ao vivo e a cores, de forma quase caricatural, a aplicação da Tecnologia de Gestão das Emoções, a ferramenta de autoconhecimento da Bororó25. 
								</p>
								<p class="text text-a">
									Nas reflexões sobre o filme, discutimos os personagens sempre iluminados pela rede conceitual do método , de uma forma séria, porém lúdica. Investigamos a pauta dos desejos de cada personagem: alguns são regidos pelo desejo de se fazerem felizes enquanto outros se movem reféns de suas idealizações. A forma como os personagens percebem suas vidas, emoções, pensamentos, relacionamentos e transformam suas emoções em sentimentos úteis ou não para ações curativas ou adoecidas torna-se muito evidente. O modo como alguns deles significam suas percepções de forma a criarem um sentido existencial ou não para seu viver, também é facilmente observado. 
								</p>
								<p class="text text-a">
									Os quatro verbos que regem a Tecnologia de Gestão das Emoções: DESEJAR, PERCEBER, SIGNIFICAR e AGIR são identificados em diversas cenas das histórias que selecionamos para as sessões do CINEBororó25. 
								</p>

								<p class="text text-a">
									CINE Bororó25: cinema, filosofia, chá quentinho, pipoca e muita, muita reflexão!
								</p>
							</div>
						</div>
						<br /><br />
						<div class="row">
							<div class="col-xs-12">
								<h3 class="title title-b">Em cartaz</h3>
							</div>
						</div>
						<div class="row">
							<div class="box-cards slick-cinema">
							<?php if ( sizeof( $tabCinemaItens ) ) : ?>
									<?php
										foreach ( $tabCinemaItens as $tabCinemaItem ) :
											$cinemaTitulo = apply_filters( 'the_title', $tabCinemaItem->post_title );
											$cinemaData = get_post_meta( $tabCinemaItem->ID, 'wpcf-cinema-data', TRUE );
											$cinemaHorario = get_post_meta( $tabCinemaItem->ID, 'wpcf-cinema-horario', TRUE );
											$cinemaTrailer = get_post_meta( $tabCinemaItem->ID, 'wpcf-youtube-id', TRUE );
											$cinemaImagem = wp_get_attachment_image_src( get_post_thumbnail_id($tabCinemaItem->ID ), '270x390');
											$cinemaLink   = get_the_permalink( $tabCinemaItem->ID);
										?>
										<div>
										<div class="col-xs-3">
											<div class="card card-cinema" style="width: 274px;">
												<a href="<?php echo $cinemaLink ?>" title="<?php echo $cinemaTitulo ?>">
													<div class="box-image" <?php if ( ! empty( $cinemaImagem ) ) echo 'style="background-image:url('. $cinemaImagem[0] .')"' ?>>
													</div>
													<?php if ( ! empty( $cinemaData ) || ! empty( $cinemaHorario )  ) : ?>
													<div class="box-content">
														<p class="text">
															<?php echo $cinemaData ?> <br />
															<?php echo $cinemaHorario ?>
														</p>
													</div>
													<?php endif ?>
												</a>
											</div>
										</div>
										<div class="col-xs-9">
											<iframe width="100%" height="480" src="https://www.youtube.com/embed/<?php echo $cinemaTrailer; ?>" frameborder="0" allowfullscreen></iframe>
										</div>
										</div>
									<?php endforeach ?>
								
								<?php else: ?>
									<div class="col-xs-12">
										<h4 style="color: #636363">Nenhum filme em cartaz.</h4>
									</div>
								<?php endif ?>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<h3 class="title title-b">Cinemas anteriores</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<?php if ( sizeof( $tabCinemaItensRealizados ) ) : ?>
								<div class="box-cards slick-cinema-realizados">
									<?php
										foreach ( $tabCinemaItensRealizados as $tabCinemaItem ) :
											$cinemaTitulo = apply_filters( 'the_title', $tabCinemaItem->post_title );
											$cinemaData = get_post_meta( $tabCinemaItem->ID, 'wpcf-cinema-data', TRUE );
											$cinemaHorario = get_post_meta( $tabCinemaItem->ID, 'wpcf-cinema-horario', TRUE );
											$cinemaImagem = wp_get_attachment_image_src( get_post_thumbnail_id($tabCinemaItem->ID ), '270x390');
											$cinemaLink   = get_the_permalink( $tabCinemaItem->ID);
										?>
									<div class="card card-cinema">
										<a href="<?php echo $cinemaLink ?>" title="<?php echo $cinemaTitulo ?>" style="width: 268px;">
											<div class="box-image" <?php if ( ! empty( $cinemaImagem ) ) echo 'style="background-image:url('. $cinemaImagem[0] .')"' ?>>
												<?php echo $cinemaTitulo ?>
											</div>
											<?php if ( ! empty( $cinemaData ) || ! empty( $cinemaHorario )  ) : ?>
											<div class="box-content">
												<p class="text">
													<?php echo $cinemaData ?> <br />
													<?php echo $cinemaHorario ?>
												</p>
											</div>
											<?php endif ?>
										</a>
									</div>
									<?php endforeach ?>
								</div>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>

				<!-- GRUPO DE ESTUDOS -->
				<div class="tab-pane" id="grupos­de­estudos">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="box-logo-section">
									<img src="<?php echo get_template_directory_uri() ?>/images/bororo-grupo-reflexao.png" alt="">	
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5">
								<div class="box-photo-detail">
									<div class="box-image">
										<img src="<?php echo get_template_directory_uri() ?>/images/tab-grupoestudos.jpg" alt="" />
									</div>
								</div>
							</div>
							<div class="col-xs-7">
								<h3 class="title title-a">GRUPO DE REFLEXÃO</h3>
								<p class="text text-a">
									Chamamos o Grupo de Reflexão, carinhosamente, de grupo de autoanálise, por ser um espaço em que a própria pessoa constrói sua prática de Curação sem a mediação do terapeuta. Cada um  vai produzindo, em seu tempo, o autoconhecimento necessário ao seu próprio bem viver e construindo sua teia de significados, sua rede de amparo emocional. Reunidos semanalmente, estudamos os livros e discutimos os conceitos do Método Curação, aplicando o aprendizado ao cotidiano. 
								</p>
								<p class="text text-a">
									Diferente dos grupos de análise, no Grupo de Reflexão, a narrativa das vivências pessoais não é essencial, pois o propósito do encontro é o autoconhecimento a partir do estudo dos conceitos.  No entanto, quando a pessoa deseja aplicar os conceitos estudados e relatar suas experiências, a fim de exercitar sua aprendizagem, é sempre muito bem vinda.  
								</p>
								
								<br />
								<h3 class="title title-a">A história dos Grupos de Reflexão</h3>
								<p class="text text-a">A história dos Grupos de Reflexão é a própria história da Bororó25. Em 2007, iniciamos com os grupos de reflexão. Originárias do saber médico e psicológico, nossos estudos haviam passado pela medicina coletiva, medicina de família, psicoterapia, psico-análise e filosofia. Depois de quase 25 anos de carreira,  cada uma de nós já havia trilhado um longo percurso profissional e reconhecido o desejo de juntas, irmos mais longe. Percebemos o desejo de ampliarmos nossa bela e intensa experiência como irmãs e trabalharmos juntas, em um projeto  congregando mais pessoas, para que construíssemos um caminho voltado para a alfabetização em saúde emocional. Desejávamos juntar os amigos, os parceiros de outras jornadas de trabalho, as pessoas com as quais trabalhávamos em atendimentos individuais, em grupo e família. </p>
								<p class="text text-a">Promoção da saúde emocional era nosso projeto. Sabíamos que trabalhar nesse enfoque seria andar na contramão. Sabíamos que trabalhar com educação emocional era uma proposta audaciosa, pois vivemos em uma sociedade na qual os recursos são alocados a serviço de reestabelecer a saúde, mas jamais investir nela, a menos que se adoeça. </p>
								<p class="text text-a">Sabíamos que precisaríamos de todos. Todos os braços ao convés! Juntamos muita gente. As reuniões eram uma festa. A percepção que tínhamos era a de que estávamos criando algo novo. Havia um burburinho em nossos corações. </p>
								<p class="text text-a">No início, trazíamos textos de autores consagrados dentro da filosofia e da psico-análise para estudar nos grupos. Mas, rapidamente percebemos que aquele modelo não funcionava, pois as pessoas desejavam nossas interpretações sobre os textos. Modificamos a sistemática e passamos a trazer diretamente o que, de pessoal, havíamos produzido a partir de nossa experiência clínica e da leitura dos diferentes autores. O contato com as pessoas, acompanhando suas narrativas e suas vidas,, haviam precipitado sobre nossas almas uma observação e compreensão  inusitada sobre o humano. Começamos a fazer registros do que produzíamos durante as reuniões com os grupos. Produzimos muito material, em muito pouco tempo. E começamos a publicar estas reflexões em livros. A quantidade de conceitos que se precipitavam em nós, nos surpreendia. Criamos  uma vasta rede conceitual, uma verdadeira rede de apoio. De tal sorte, que nos sentíamos amparados nela. Era lançar um tema à reflexão e os conceitos pulavam em nossas almas como lanternas a iluminar o caminho. Os fios da teia conceitual se criavam de modo ininterrupto, como  os fios da teia da aranha. E por entre nossas pisadas, passo a passo, sentíamos uma segurança em prosseguir caminhando e criando. No terceiro ano, em 2010, percebemos que o que havíamos produzido até ali, merecia uma maior sistematização, pois era já uma metodologia para pensar a vida. Era um método, firme e flexível o suficiente para avançar. Descobrimos também que este processo de autoanálise só se faz inventando um olhar poético sobre cada momentinho do nosso viver! </p>

								<br />
								<a href="/agenda" class="btn btn-default">Confira as datas na agenda</a>
								<br />
							</div>
						</div>
					</div>
				</div>

				<!-- PARCEIROS -->
				<div class="tab-pane" id="parceiros">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="box-logo-section">
									<img src="<?php echo get_template_directory_uri() ?>/images/tab-parceiros-logo.png" alt="" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5">
								<div class="box-photo-detail">
									<div class="box-image">
										<img src="<?php echo get_template_directory_uri() ?>/images/tab-trabalho-ter.jpg" alt="" />
									</div>
								</div>
							</div>
							<div class="col-xs-7">
								<!-- <h3 class="title title-a">
									Oferecer ferramentas, conceitos e técnicas para o enfrentamento de crises e para a ação responsável em direção às mudanças
								</h3> -->
								<p class="text text-a" style="text-align: left; font-style: italic;"> “Dize-me com quem andas e direi quem és!”</p>
								<p class="text text-a">Verdade. Quem ama cuida! Outra grande verdade. Adoecemos no encontro e nos curamos no encontro. Juntando estas três profundas verdades, concluímos que amigo é tudo na vida. E os amigos que trabalham juntos são parceiros. Assim, a Bororó25 é um coletivo com muitas parcerias. Parcerias seguras para a grande travessia da vida. Pois, quem é responsável pelo próprio cuidado – pela sua saúde emocional e física – faz ações curativas no sentido de  tornar-se um terreno fértil para o bem viver.</p>
								<p class="text text-a">O caminho do autoconhecimento é uma escolha que produz autocuidado e cria sobre si um circulo virtuoso. Quem se conhece sabe como se cuidar, e quem se cuida cada vez mais descobre sobre si próprio. É exigente e desafiador cuidar bem de si próprio, equacionando tempo, qualidade de vida, compromissos pessoais e profissionais. Tendemos a buscar desculpas para justificar o não cuidado conosco, idealizando que o não cuidado não cobrará seu preço.</p>
								<p class="text text-a">Assim, o coletivo de saúde Bororó25 é um rizoma, uma rede composta de muitos profissionais amigos da saúde que tem como propósito de vida o reconhecimento de que para se fazer feliz, precisamos todos, de todos os braços ao convés. A vida é uma prova de revezamento e cada um de nós fazendo o que gosta e sabe fazer bem, vai alcançando ao outro uma força na travessia. </p>
								<p class="text text-a">Cuidar-se é oferecer amor a quem somos e a quem se revela em nós frente a vida,  e frente ao adoecimento. O autocuidado é imprescindível para quem deseja uma vida saudável e neste cenário a equação corpo-mente é retroalimentar.  Nosso corpo saudável nos auxilia na gestão de nossas emoções. Nossa emoções investigadas, e significadas, são sustentação para as ações curativas de cuidado com nosso  corpo. </p>
								<p class="text text-a">Alimentação, exercícios físicos, massagens, terapias com óleos essências. Yoga, Meditação, Medicina Ayurvédica, Jin Shin Jyutsu, Jogos de Improviso, e Roda de Conversa +60 para a Terceira Idade.</p>
								<p class="text text-a">Parceiros da Bororó25 na Construção da Felicidade Possível.</p>
							</div>
						</div>
						<br /><br />
						<div class="row">
							<div class="col-xs-12">
								<?php if ( sizeof( $tabOficinaItens ) ) : ?>
									<?php
										foreach ( $tabOficinaItens as $tabOficinaItem ) :
											$oficinaTitulo = apply_filters( 'the_title', $tabOficinaItem->post_title );
											$oficinaImagem = wp_get_attachment_image_src( get_post_thumbnail_id($tabOficinaItem->ID ), '300x300');;
											$oficinaContent = apply_filters( 'the_content', $tabOficinaItem->post_content );
											$oficinaLinkTexto = get_post_meta( $tabOficinaItem->ID, 'wpcf-oficina-link-texto', TRUE );
											$oficinaLinkLink = get_post_meta( $tabOficinaItem->ID, 'wpcf-oficina-link-link', TRUE );
										?>
									<article class="article article-b">
										<div class="row">
											<div class="col-xs-3">
												<div class="box-photo-detail">
													<img src="<?php echo $oficinaImagem[0] ?>" alt="<?php echo $oficinaTitulo ?>" />
												</div>
											</div>
											<div class="col-xs-9">
												<h3 class="title title-b"><?php echo $oficinaTitulo ?></h3>
												<div class="content">
													<?php echo $oficinaContent ?>
												</div>
												<?php if ( ! empty( $oficinaLinkTexto ) || ! empty( $oficinaLinkLink )  ) : ?>
												<a href="<?php echo $oficinaLinkLink ?>" class="link"><?php echo $oficinaLinkTexto ?></a>
												<?php endif ?>
											</div>
										</div>
									</article>
									<?php endforeach ?>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>

				<!-- TRABALHO TERAPÊUTICO -->
				<div class="tab-pane" id="trabalho­terapeutico">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="box-logo-section">
									<img src="<?php echo get_template_directory_uri() ?>/images/bororo-grupo-analise.png" alt="">	
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5">
								<div class="box-photo-detail">
									<div class="box-image">
										<img src="<?php echo get_template_directory_uri() ?>/images/tab-trabalho-ter2.jpg" alt="" />
									</div>
								</div>
							</div>
							<div class="col-xs-7">
								<div class="extra-item">
									<h4 class="title">Trabalho emocional</h4>
									<p class="text">O trabalho emocional da Bororó25 tem ênfase na prática de que a saúde emocional só é de fato construída mediante ao dedicado trabalho sobre nossas emoções. Apreciamos a definição do conceito de trabalho, como a física propõe: W(trabalho)= F(força, intenção, propósito) X T(tempo, dedicação, prática).  Não acreditamos em milagres terapêuticos, ou curas mágicas. O caminho que conhecemos é o da constante dedicação, atenção e esforço continuado para habilitar-se a cuidar bem das emoções, transformando-as em sentimentos úteis para a escolha das ações saudáveis, a cada momento. É evidente que  neste processo de aprendizagem constante, nesta produção de autoconhecimento, é vital o estudo das ferramentas necessárias à construção da autonomia pessoal. Todos os trabalhos emocionais empreendidos na Bororó25 são para a produção de autonomia emocional. O propósito de nossa intervenção terapêutica é oferecer ferramentas para que a pessoa apreenda a ser o gestor das suas emoções. </p>
								</div>
								<div class="extra-item">
									<h4 class="title">Grupo de análise</h4>
									<p class="text">O desejo de trabalhar em grupos nasceu do reconhecimento de que tudo no humano se dá a partir do encontro. Nascemos do encontro.  Adoecemos e nos curamos no encontro. Impossível para o humano viver em isolamento. No encontro com o outro nos revelamos e neste revelar-se nos conhecemos. O outro é sempre o terreno do incontrolável e é neste efeito - do incontrolável - que surge em nós, o incontrolável, o incognoscível, o inapreensível. A sutileza do que em nós se revela em grupo, nossas emoções, nossos sentimentos, pensamentos e comportamentos, é uma oportunidade  para o autoconhecimento.  Nos grupos se reproduzem muitas das experiências cotidianas com familiares, amigos e relações de trabalho. O Grupo de Análise tem uma energia singular,  terapêutica e confessional. O outro funciona como um espelho e neste descobrimento do encontro coletivo, é possível nos construímos, reconstruímos e nos resignificamos, criando um espaço de intimidade e acolhimento na presença de companhias seguras. É a partir do relato singular de cada um, que, muitas vezes encontramos uma possibilidade, um convite a dar voz à nossa história. </p>
								</div>
								<div class="extra-item">
									<h4 class="title">Trabalho individual</h4>
									<p class="text">O cenário do trabalho emocional individual é o desenho mais conhecido e praticado pelas pessoas. Representa um universo bastante seguro, pois as variáveis são muito mais controladas do que o trabalho em grupo. Utilizamos esta modalidade quando a pessoa deseja aprofundar determinadas questões mais particulares. É uma combinação extremamente potente associar ao trabalho individual um grupo de análise, pois todo o material que surge a partir de quem em nós se revela na presença do outro, durante o grupo, pode ser mais detalhadamente aprofundado no trabalho individual.</p>
								</div>
								<div class="extra-item">
									<h4 class="title">Trabalho com famílias e casais</h4>
									<p class="text">É, talvez, o trabalho mais exigente para todas as pessoas envolvidas, incluindo o terapeuta. Este trabalho emocional é muito eficaz quando os problemas que identificamos se dá nas relações familiares ou de casal. A intervenção torna-se extremamente potente, pois é realizada dentro do próprio cenário de conflito. Isto torna o processo muito intenso, expandindo a ação terapêutica e a potência curativa de todos.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</section>

<style>
	.slick-prev {
		left: -40px;
	}

	.slick-next {
		right: -30px;
	}
	
  .slick-prev i, .slick-next i{
    color: #30A3A1;
    font-size: 56px;    
  }

  .slick-disabled i {
     color: rgba(48, 163, 161, 0.29) !important;
   }
 
  .slick-prev:before, .slick-next:before {
    color: #30A3A1;
    content: ''
  }

	.slick-slide > a {
		width: 267px !important;
	}
</style>
<script>
  $(function () {

		$('.slick-cinema').slick({
      infinite: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      rows: 1,
      arrows: true,
      prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>'
    });
		
    $('.slick-cinema-realizados').slick({
      infinite: false,
      slidesToShow: 4,
      slidesToScroll: 4,
      slidesPerRow: 1,
      rows: 1,
      arrows: true,
      prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>'
    });
		
		$('.slick-cursos').slick({
      infinite: false,
			slidesToShow: 4,
      slidesToScroll: 4,
      slidesPerRow: 1,
      rows: 1,
      arrows: true,
			centerPadding: '2px',
      prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>'
    });
		
    $('.slick-cursos-realizados').slick({
      infinite: false,
			slidesToShow: 4,
      slidesToScroll: 4,
      slidesPerRow: 1,
      rows: 1,
      arrows: true,
			centerPadding: '2px',
      prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
      nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>'
    });

    $(window).on('hashchange', function() {
      $('.slick-cursos').slick('setPosition');
      $('.slick-cinema').slick('setPosition');
			$('.slick-cursos-realizados').slick('setPosition');
      $('.slick-cinema-realizados').slick('setPosition');
    })
  });
</script>