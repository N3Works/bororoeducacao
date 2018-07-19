<?php
/**
 * @package Bororó 25
 */
?>

<?php
	global $post;
?>

<?php
	$cinemaData = get_post_meta( get_the_ID(), 'wpcf-cinema-data', TRUE );
	$cinemaHorario = get_post_meta( get_the_ID(), 'wpcf-cinema-horario', TRUE );
	$cinemaInicio = get_post_meta( get_the_ID(), 'wpcf-cinema-inicio', TRUE );
	$cinemaLocal = get_post_meta( get_the_ID(), 'wpcf-cinema-local', TRUE );
	$cinemaLocalURL = get_post_meta( get_the_ID(), 'wpcf-cinema-local-url', TRUE );
	$cinemaInscrevaURL = get_post_meta( get_the_ID(), 'wpcf-cinema-inscreva-url', TRUE );
	$cinemaImagem = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID() ), '300x300');
?>
<?php
	$tabCursoItens = get_posts(
		array(
			'post_type' => 'curso',
			'posts_per_page' => -1
		)
	);
	$tabCursoExiste = sizeof( $tabCursoItens );

	$tabOficinaItens = get_posts(
		array(
			'post_type' => 'oficina',
			'posts_per_page' => -1
		)
	);
?>

<?php get_template_part( 'module', 'nav' ) ?>

<?php
	$post = get_page_by_path( 'o-que-fazemos' );
	setup_postdata( $post );

	get_template_part( 'module', 'top' );

	wp_reset_postdata();
?>

<section class="section-internal-content">
	<div class="box-tabs">
		<div class="box-nav-tabs">
			<ul class="nav-tabs">
				<li><a class="direct-link" href="/o-que-fazemos/#o­que­fazemos">O que fazemos</a></li>
				<li><a class="direct-link" href="/o-que-fazemos/#cursos">Cursos</a></li>
				<li><a class="direct-link" href="/o-que-fazemos/#livros">Livros</a></li>
				<li class="active"><a class="direct-link" href="/o-que-fazemos/#cinema">Cinema</a></li>
				<li><a class="direct-link" href="/o-que-fazemos/#grupos­de­estudos">Grupo de estudos</a></li>
				<li><a class="direct-link" href="/o-que-fazemos/#parceiros">Oficinas</a></li>
				<li><a class="direct-link" href="/o-que-fazemos/#trabalho­terapeutico">Trabalho Terapêutico</a></li>
			</ul>
		</div>
		<div class="box-tab-content">
			<div class="tab-content">
				<!-- O QUE FAZEMOS -->
				<div class="tab-pane" id="o­que­fazemos">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<?php get_template_part( 'module', 'circles-1' ) ?>
							</div>
						</div>
					</div>
				</div>
				
				<?php if ( $tabCursoExiste ) : ?>
				<!-- CURSOS -->
				<div class="tab-pane" id="cursos">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<h3 class="title">Cursos dos próximos meses </h3>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<?php if ( sizeof( $tabCursoItens ) ) : ?>
								<div class="box-cards">
									<?php
										foreach ( $tabCursoItens as $tabCursoItem ) :
											$cursoTitulo = apply_filters( 'the_title', $tabCursoItem->post_title );
											$cursoResumo = frontend_get_the_excerpt_by_id( $tabCursoItem->ID, 20);
											$cursoInicio = get_post_meta( $tabCursoItem->ID, 'wpcf-curso-inicio', TRUE );
											$cursoImagem = wp_get_attachment_image_src( get_post_thumbnail_id($tabCursoItem->ID ), '300x300');;
											$cursoLink   = get_the_permalink( $tabCursoItem->ID);
										?>
                    <div class="card card-cinema">
                      <a href="<?php echo $cinemaLink ?>" title="<?php echo $cinemaTitulo ?>">
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
				<?php endif ?>

				<!-- LIVROS -->
				<div class="tab-pane" id="livros">
					<div class="container">
						<?php get_template_part( 'module', 'tab-books' ) ?>
					</div>
				</div>

				<!-- CINEMA -->
				<div class="tab-pane active" id="cinema">
					<div class="container">
						<div class="row">
							<div class="col-xs-8">
								<h3 class="title"><?php the_title() ?></h3>
							</div>
							<div class="col-xs-4">
								<a href="/o-que-fazemos/#cinema" class="link-b"><i class="fa fa-angle-left"></i> Voltar</a>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="box-photo-detail box-photo-detail-cinema">
									<div class="box-image">
										<img src="<?php echo $cinemaImagem[0] ?>" alt="<?php echo $cinemaTitulo ?>">
									</div>
									<?php if ( ! empty( $cinemaData ) || ! empty( $cinemaHorario )  ) : ?>
									<div class="box-content">
										<p class="text"><?php echo $cinemaData ?></p>
										<p class="text"><?php echo $cinemaHorario ?></p>
									</div>
									<?php endif ?>
								</div>
								<br />
								<?php if ( ! empty( $cinemaLocal ) ) : ?>
								<p class="text">
									<?php echo $cinemaLocal ?> <br />
									<a href="<?php echo $cinemaLocalURL ?>" target="_blank">Veja nossa localização no mapa.</a>
								</p>
								<?php endif ?>
							</div>
							
							<div class="col-xs-9">
								<div class="content">
									<?php the_content() ?>
								</div>
								<?php if ( ! empty( $cinemaInscrevaURL ) ) : ?>
								<a href="<?php echo $cinemaInscrevaURL ?>" class="btn btn-default">Inscreva-se</a>
								<?php endif ?>

								<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
								<?php if ( ! empty( $cursoPagseguro ) ) : ?>
								<div class="pagseguro">
									<?php echo $cursoPagseguro ?>
								</div>
								<?php endif ?>
								<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
								
								<img src="<?php echo get_template_directory_uri() ?>/images/pagseguro.png" alt="PagSeguro UOL" />
								<br /><br />
								<div class="extra">
									<p class="text">
										Pagamentos via Pagseguro. <br />
										Dúvidas entre em contato: <a href="mailto: contato@bororo25.com.br">contato@bororo25.com.br</a>
									</p>
								</div>
								
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
										<img src="<?php echo get_template_directory_uri() ?>/images/markers/tab-cinema.jpg" alt="" />
									</div>
								</div>
							</div>
							<div class="col-xs-7">
								<h3 class="title title-a">
									Oferecer ferramentas, conceitos e técnicas para o enfrentamento de crises e para a ação responsável em direção às mudanças
								</h3>
								<p class="text text-a">
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<?php get_template_part( 'module', 'calendar' ) ?>
							</div>
						</div>
					</div>
				</div>

				<!-- OFICINAS -->
				<div class="tab-pane" id="parceiros">
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
										<img src="<?php echo get_template_directory_uri() ?>/images/markers/tab-cinema.jpg" alt="" />
									</div>
								</div>
							</div>
							<div class="col-xs-7">
								<h3 class="title title-a">
									Oferecer ferramentas, conceitos e técnicas para o enfrentamento de crises e para a ação responsável em direção às mudanças
								</h3>
								<p class="text text-a">
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
								</p>
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
													<div class="box-image" <?php if ( ! empty( $oficinaImagem ) ) echo 'style="background-image:url('. $oficinaImagem[0] .')"' ?>>
														<?php echo $oficinaTitulo ?>
													</div>
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
						<div class="row">
							<div class="col-xs-12">
								<?php get_template_part( 'module', 'calendar' ) ?>
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
										<img src="<?php echo get_template_directory_uri() ?>/images/markers/tab-cinema.jpg" alt="" />
									</div>
								</div>
							</div>
							<div class="col-xs-7">
								<h3 class="title title-a">
									Oferecer ferramentas, conceitos e técnicas para o enfrentamento de crises e para a ação responsável em direção às mudanças
								</h3>
								<p class="text text-a">
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
								</p>

								<div class="extra-item">
									<h4 class="title">Casal</h4>
									<p class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
								</div>
								<div class="extra-item">
									<h4 class="title">Família</h4>
									<p class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
								</div>
								<div class="extra-item">
									<h4 class="title">Individual</h4>
									<p class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<?php get_template_part( 'module', 'calendar' ) ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



