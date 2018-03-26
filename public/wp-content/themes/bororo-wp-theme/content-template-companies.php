<?php
/**
 * @package Bororó 25
 */
?>

<?php
	global $page_;
?>

<?php
	$numItens = 6;
	$numItensFrom = ( $numItens * $GLOBALS['page_'] ) - $numItens;

	$params = array(
		'post_type' => 'tematica',
		'posts_per_page' => $numItens,
		'offset' => $numItensFrom
	);

	$tabTematicasItens = get_posts( $params );
	$size = sizeof( $tabTematicasItens );
?>

<?php if ( $GLOBALS['page_'] == 1 ) : ?>

	<?php get_template_part( 'module', 'nav' ) ?>

	<?php get_template_part( 'module', 'top' ) ?>

<?php endif ?>

<section class="section-internal-content">
	<div class="box-tabs">
		
		<?php if ( $GLOBALS['page_'] == 1 ) : ?>

			<div class="box-nav-tabs">
				<ul class="nav-tabs">
					<li class="active"><a href="#tge">TGE</a></li>
					<li><a href="#tematicas">Temáticas</a></li>
					<li><a href="#produtos">Produtos</a></li>
					<li><a href="#profissionais">Profissionais</a></li>
				</ul>
			</div>
		
		<?php endif ?>

		<div class="box-tab-content">
			<div class="tab-content">
				
				<?php if ( $GLOBALS['page_'] == 1 ) : ?>
				<!-- TGE -->
				<div class="tab-pane active" id="tge">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<h3 class="title">Impactos da TGE</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<h3 class="title title-b">Tecnologia de Gestão das Emoções: autoconhecimento como ferramenta de gestão de pessoas</h3>
								<p class="text">O conhecimento é o ponto de partida de toda a transformação. É o conhecimento em gestão das emoções que possibilita o autoconhecimento: uma potente ferramenta de mudança nos ambientes profissionais por meio das atitudes e do comportamento das pessoas.  O autoconhecimento é um diferencial competitivo no mercado de trabalho: conhecendo suas capacidades e limitações, as pessoas tornam-se mais habilitadas a encontrar soluções criativas e eficazes para o enfrentamento dos desafios no ambiente empresarial. O autoconhecimento amplia a potência de cada profissional, e é um instrumento de construção de significado ao ato de trabalhar. </p>
								<p class="text">Pessoas capazes de construir um significado existencial para o seu trabalho realizam atividades de forma comprometida consigo, com sua equipe de trabalho e com a empresa onde atuam. Quanto mais próximo do trabalho for o propósito de vida do sujeito, mais feliz ele será e consequentemente, melhor profissional. O autoconhecimento é uma ferramenta fundamental para a investigação de propósitos, metas e objetivos profissionais.</p>
								<p class="text">A aplicação da Tecnologia de Gestão das Emoções|TGE  nas empresas tem como propósito construir relações entre a gestão das emoções, o autoconhecimento , a produtividade e a felicidade no trabalho.</p>
								<p class="text">A TGE é um conjunto inovador de técnicas e conceitos que oferece aos gestores e as suas equipes ferramentas de autoconhecimento para a construção de sentido existencial para o trabalho e para a construção da Felicidade Possível nos ambientes corporativos. </p>
								<p class="text">Um profissional feliz é aquele que desempenha suas funções significando cada atividade.</p>
								<p class="text">“Motivação, criatividade e comprometimento no trabalho são decorrentes da motivação, da criatividade e do comprometimento que tenho comigo, com minha vida pessoal, em cada ação”.   </p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<?php get_template_part( 'module', 'circles-3' ) ?>
							</div>
						</div>
						<br /><br />
						<p class="text">
							<strong>Motivação, comprometimento e criatividade</strong> na vida pessoal - e no ambiente de trabalho - são decorrentes de um intenso trabalho de autoconhecimento. A responsabilidade de se habilitar para produzir com comprometimento, motivação e criatividade parte de cada um e de seu desejo de se fazer feliz nos espaços profissionais. 
						</p>
						<p class="text"><strong>Capacitar pessoas</strong> é, neste cenário, oferecer ferramentas de transformação pessoal, de gestão das emoções. É entregar ao profissional conhecimento para que ele se habilite ao autoconhecimento e tenha desejo - um profundo desejo- de se fazer feliz nos espaços de trabalho. </p>
						<p class="text"><strong>Capacitar pessoas</strong> é também oferecer às equipes o conhecimento de que a transformação necessária a cada um é intrínseca – de dentro para fora – e que inicia com o desejo de mudança. É oferecer o conhecimento de que a vida pessoal e o trabalho não são | estão dissociados: somos um. A felicidade no trabalho está intrinsecamente ligada a quem somos e a nossa capacidade de sermos gestores de nossas emoções a cada dia de trabalho e de vida.</p>
						<p class="text"><strong>Capacitar pessoas</strong> é oferecer ferramentas para que cada membro de um time seja seu próprio agente de mudança, o gestor de sua potencialidade, e tenha o propósito de sua transformação pessoal. </p>
						<p class="text"><strong>Capacitar pessoas</strong> é ofertar conhecimento para que cada um possa aprender sobre si próprio; para que saiba quem é, o que almeja na vida e qual o significado existencial de sua atividade profissional.</p>
						<p class="text">A <strong>TGE – Tecnologia de Gestão das Emoções </strong>- é uma ferramenta para produzir mudanças de comportamento, atitudes e ações frente a vida. É uma ferramenta de mudança contínua. No ambiente corporativo é um importante instrumento de engajamento - de construção de currículo emocional – de produção de profissionais como terrenos férteis para práticas <strong>inovadora, pró-ativas e produtivas.</strong></p>
					</div>
				</div>
				<?php endif ?>

				<!-- TEMÁTICAS -->
				<div class="tab-pane" id="tematicas">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<h3 class="title">Temáticas</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<?php if ( sizeof( $tabTematicasItens ) ) : ?>
								<div class="box-people ajax-container">
									<?php
										foreach ( $tabTematicasItens as $tabTematicaItem ) :
											$tematicaTitulo = apply_filters( 'the_title', $tabTematicaItem->post_title );
											$tematicaContent = apply_filters( 'the_content', $tabTematicaItem->post_content );
											$tematicaLink = get_post_meta( $tabTematicaItem->ID, 'wpcf-pdf-download', TRUE );
											$tematicaImagem = wp_get_attachment_image_src( get_post_thumbnail_id($tabTematicaItem->ID ), '300x300');;
										?>
									
									<article class="article article-b ajax-item">
										<div class="row">
											<div class="col-xs-3">
												<div class="box-photo-detail">
													<div class="box-image" <?php if ( ! empty( $tematicaImagem ) ) echo 'style="background-image:url('. $tematicaImagem[0] .')"' ?>><?php echo $tematicaTitulo ?></div>
												</div>
											</div>
											<div class="col-xs-9">
												<h3 class="title title-b"><?php echo $tematicaTitulo ?></h3>
												<p class="text text-a"><?php echo $tematicaContent ?></p>
												<?php if ( ! empty( $tematicaLink ) ) : ?>
												<a href="<?php echo $tematicaLink ?>" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> Veja mais detalhes na apresentação</a>
												<?php endif ?>
											</div>
										</div>
									</article>
									<?php endforeach ?>
								</div>
								<?php endif ?>
							</div>
						</div>
						<div class="row navigation hidden">
							<?php frontend_paging_nav() ?>
						</div>

						<?php if ( $GLOBALS['page_'] == 1 ) : ?>
							<div class="row pagination pagination-container centered">
								<div class="col-xs-12">
									<button class="btn-see-more"><i class="fa fa-plus"></i><span>VER MAIS</span></button>
								</div>
							</div>
						<?php endif ?>
					</div>
				</div>
				<?php if ( $GLOBALS['page_'] == 1 ) : ?>
				
				<!-- PRODUTOS -->
				<div class="tab-pane" id="produtos">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<h3 class="title">Produtos</h3>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<article class="article article-c">
									<div class="row">
										<div class="col-xs-3">
											<div class="box-photo-detail">
												<div class="box-image"><img src="<?php echo get_template_directory_uri() ?>/images/empresas-trabalho-palestras.jpg" alt="" /></div>
											</div>
										</div>
										<div class="col-xs-9">
											<h3 class="title title-b">Palestra</h3>
											<p class="text text-a">
												Promover a consciência da necessidade do autoconhecimento para a construção da saúde emocional. Apresentada em diferentes temáticas, adaptadas aos interesses e objetivos da empresa. 
											</p>
											<!-- <a href="#" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> Veja mais detalhes na apresentação</a> -->
										</div>
									</div>
								</article>
								<article class="article article-c article-right">
									<div class="row">
										<div class="col-xs-3">
											<div class="box-photo-detail">
												<div class="box-image"><img src="<?php echo get_template_directory_uri() ?>/images/empresas-trabalho-cursos.jpg" alt="" /></div>
											</div>
										</div>
										<div class="col-xs-9">
											<h3 class="title title-b">Cursos</h3>
											<p class="text text-a">
												Aulas teórico-práticas voltadas para a aplicação da TGE - Tecnologia de Gestão Emocional ao universo corporativo. Realizados em módulos customizados, de acordo com a temática e o formado escolhido. 
											</p>
										</div>
									</div>
								</article>
								<article class="article article-c">
									<div class="row">
										<div class="col-xs-3">
											<div class="box-photo-detail">
												<div class="box-image"><img src="<?php echo get_template_directory_uri() ?>/images/empresas-trabalho-workshop.jpg" alt="" /></div>
											</div>
										</div>
										<div class="col-xs-9">
											<h3 class="title title-b">Workshop</h3>
											<p class="text text-a">
												Atividade de caráter prático e lúdico, promove a interação entre os participantes, desenvolvendo conhecimentos, habilidades e atitudes. 
											</p>
										</div>
									</div>
								</article>
								<article class="article article-c article-right">
									<div class="row">
										<div class="col-xs-3">
											<div class="box-photo-detail">
												<div class="box-image"><img src="<?php echo get_template_directory_uri() ?>/images/empresas-trabalho-coaching.jpg" alt="" /></div>
											</div>
										</div>
										<div class="col-xs-9">
											<h3 class="title title-b">Coaching</h3>
											<p class="text text-a">
												Encontro personalizado, utiliza os conceitos da TGE para desenvolver a potência criativa do profissional, habilitando-o para a responsabilização pelo próprio cuidado e por seu desempenho. 
											</p>
										</div>
									</div>
								</article>
								<article class="article article-c">
									<div class="row">
										<div class="col-xs-3">
											<div class="box-photo-detail">
												<div class="box-image"><img src="<?php echo get_template_directory_uri() ?>/images/empresas-trabalho-grupos_reflexao.jpg" alt="" /></div>
											</div>
										</div>
										<div class="col-xs-9">
											<h3 class="title title-b">Grupo de Reflexão</h3>
											<p class="text text-a">
												Grupo de estudos sobre a TGE e sua relação com o trabalho. A partir do estudo de conceitos e técnicas, é desenvolvida a reflexão sobre o auto- conhecimento e sua aplicabilidade no ambiente empresarial. 
											</p>
										</div>
									</div>
								</article>
								<article class="article article-c article-right">
									<div class="row">
										<div class="col-xs-3">
											<div class="box-photo-detail">
												<div class="box-image"><img src="<?php echo get_template_directory_uri() ?>/images/empresas-trabalho-cinema.jpg" alt="" /></div>
											</div>
										</div>
										<div class="col-xs-9">
											<h3 class="title title-b">Cine Bororó25 </h3>
											<p class="text text-a">
												Fragmentos de filmes interpretados e discutidos à luz dos conceitos da TGE. Uma reflexão filosófica do cotidiano, das relações e do universo empresarial pelo olhar da arte do cinema. 
											</p>
										</div>
									</div>
								</article>
								<article class="article article-c">
									<div class="row">
										<div class="col-xs-3">
											<div class="box-photo-detail">
												<div class="box-image"><img src="<?php echo get_template_directory_uri() ?>/images/empresas-trabalho-editora.jpg" alt="" /></div>
											</div>
										</div>
										<div class="col-xs-9">
											<h3 class="title title-b">Editora Bororó25  </h3>
											<p class="text text-a">
												A Tecnologia de Gestão Emocional compartilhada em quatro publicações: A Vida como ela é para cada um de nós, Curação - a arte de bem cuidar-se, A Felicidade Possível e a série pocket “A arte de se fazer feliz”. 
											</p>
										</div>
									</div>
								</article>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>
				
				<?php if ( $GLOBALS['page_'] == 1 ) : ?>
				<!-- PROFISSIONAIS -->
				<div class="tab-pane" id="profissionais">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<h3 class="title">Profissionais</h3>
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-xs-3">
								<div class="box-image-author">
									<img src="<?php echo get_template_directory_uri() ?>/images/cristiane-ganzo.png" alt="" />	
								</div>
							</div>
							<div class="col-xs-9">
								<div class="extra-item">
									<h4 class="title">Christiane Ganzo</h4>
									<p class="text">Christiane Ganzo é visceral e sensível, revela que ser o que se é, em todas as dimensões, é o que nos faz humanos. E felizes. É coragem e ousadia. Coragem em sua escolha diária de se envolver profissionalmente com o ser humano e sua complexidade. Ousadia na convicção de que é urgente que as pessoas se alfabetizem emocionalmente. Gostar de gente e se envolver com cada um que a procura é uma característica marcante e seu propósito na Bororó25 e na vida. Psicóloga graduada pela UFRGS e pós-graduada em Clínica Psicanalítica, há mais de 25 anos, trabalha como psicanalista. Christiane Ganzo não se explica. É necessário ser vista, ser ouvida, ser sentida. </p>
									<!-- <a href="#" class="link-a">Assista um vídeo com um resumo sobre as profissionais</a> -->
								</div>
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-xs-3">
								<div class="box-image-author">
									<img src="<?php echo get_template_directory_uri() ?>/images/denise-aerts.png" alt="" />	
								</div>
							</div>
							<div class="col-xs-9">
								<div class="extra-item">
									<h4 class="title">Denise Aerts</h4>
									<p class="text">Denise Aerts é a conjunção de potência e obstinação. Potência na capacidade única de compreender a alma humana e na habilidade de criar conhecimento para que o sujeito aprenda a desenvolver o protagonismo em sua vida. Obstinação na força para conduzir seus propósitos com método, disciplina, rigor técnico e trabalho em equipe. Médica e psicoterapeuta, doutora em Clínica Médica pela UFRGS; há mais de 30 anos atua como pesquisadora em saúde coletiva nas temáticas felicidade e saúde do trabalhador. Intelectual atuante e atualizada, Denise Aerts acredita que o conhecimento no campo da saúde emocional é um imprescindível agente de transformação.</p>
									<!-- <a href="#" class="link-a">Assista um vídeo com um resumo sobre as profissionais</a> -->
								</div>
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-xs-3">
								<div class="box-image-author">
									<img class="img-circle" src="<?php echo get_template_directory_uri() ?>/images/gehysa-alves.png" alt="" />	
								</div>
							</div>
							<div class="col-xs-9">
								<div class="extra-item">
									<br />
									<h4 class="title">Gehysa Guimaraes Alves </h4>
									<p class="text">Gehysa é parceira de longa data, dessas que a gente atravessa um deserto, pois confiamos em sua companhia. Dotada de rara obstinação, tem um olhar especial sobre o encontro entre os processos de aprendizagem e o Método CurAção. É graduada em Ciências Sociais, mestre e doutora em Educação pela PUC-RS, e tem formação em Tecnologia de Gestão das Emoções, pela Bororó25. Coordena o Programa de Pós-Graduação em Promoção da Saúde da Ulbra-Canoas.</p>
								</div>
							</div>
						</div>
						<br />
						<div class="row">
							<div class="col-xs-3">
								<div class="box-image-author">
									<img src="<?php echo get_template_directory_uri() ?>/images/leticia-thorstenberg.png" alt="" />	
								</div>
							</div>
							<div class="col-xs-9">
								<div class="extra-item">
									<br />
									<h4 class="title">Letícia Thorstenberg</h4>
									<p class="text">Letícia é o próprio caleidoscópio. Jornalista, marqueteira, criativa a cada segundo, talentosa cozinheira, bordadeira e excelente “fazedora de cuidados e lidas”- como as boas moças de antigamente. Gerente de projetos, profunda conhecedora e hábil consultora do Método CuraAção, , entre outras humanidades. Graduada em Comunicação Social pela PUC RS,  Pós graduada em marketing pela ESPM.  Tem 5 anos de Formação em Tecnologia de Gestão das Emoções, na Bororó25.</p>
									<!-- <a href="#" class="link-a">Assista um vídeo com um resumo sobre as profissionais</a> -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>
				
				
			</div>
		</div>
	</div>
</section>

