<?php
/**
 * @package Bororó 25
 */
?>

<?php
	global $page_;
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
					<li class="active"><a href="#videos">Vídeos</a></li>
					<li><a href="#fotos">Fotos</a></li>
				</ul>
			</div>

		<?php endif ?>

		<div class="box-tab-content">
			<div class="tab-content">
				
				<?php if ( $GLOBALS['page_'] == 1 || $_GET['type'] == 'video' ) : ?>

					<?php
						$numItensVideo = 6;
						$numItensFromVideo = ( $numItensVideo * $GLOBALS['page_'] ) - $numItensVideo;
						
						$paramsVideo = array(
							'post_type' => 'video',
							'posts_per_page' => $numItensVideo,
							'offset' => $numItensFromVideo
						);

						$tabVideosItens = get_posts( $paramsVideo );
						$size = sizeof( $tabVideosItens );
						$cont = 0;
					?>
					<!-- VIDEOS -->
					<div class="tab-pane active" id="videos">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<h3 class="title">Vídeos</h3>
								</div>
							</div>
							<div class="row">
								<?php if ( sizeof( $tabVideosItens ) ) : ?>
									<div class="box-videos ajax-container">
										<?php
											foreach ( $tabVideosItens as $tabVideoItem ) :
												$videoTitulo = apply_filters( 'the_title', $tabVideoItem->post_title );
												$videoImagem = wp_get_attachment_image_src( get_post_thumbnail_id($tabVideoItem->ID ), '300x300');
												
												$videoLink = get_post_meta( $tabVideoItem->ID, 'wpcf-video-link', TRUE );
												$videoLink = str_replace( '&feature=youtube_gdata_player', '', $videoLink );
												$videoLink = str_replace( 'watch?v=', 'embed/', $videoLink );
												$videoLink .= '?enablejsapi=1';

												$videoId   = get_post_meta( $tabVideoItem->ID, 'wpcf-youtube-id', TRUE );
												$cont++;
											?>
										
										<?php //if ( $cont == 1 ) : ?>
										<!-- <article class="article article-d article-videos">
											<div class="col-xs-6">
												<div class="box-photo-detail">
													<div class="box-image" <?php if ( ! empty( $videoImagem ) ) echo 'style="background-image:url('. $videoImagem[0] .')"' ?>>
														<a href="<?php echo $videoLink ?>" title="<?php echo $videoTitulo ?>" class="fancybox-video fancybox.iframe"><?php echo $videoTitulo ?></a>
													</div>
												</div>
											</div>
											<div class="col-xs-6">
												<h3 class="title">
													<a href="<?php echo $videoLink ?>" title="<?php echo $videoTitulo ?>" class="fancybox-video fancybox.iframe"><?php echo $videoTitulo ?></a>
												</h3>
											</div>
											<div class="clearfix"> </div>
											<br /><br />
										</article> -->
										<?php //else : ?>
										<div class="col-xs-4 ajax-item">
											<article class="article article-d article-videos">
												<div class="row">
													<div class="col-xs-12">
														<div class="box-photo-detail">
															<div class="box-image" <?php if ( ! empty( $videoImagem ) ) echo 'style="background-image:url('. $videoImagem[0] .')"' ?>>
																<a href="<?php echo $videoLink ?>" title="<?php echo $videoTitulo ?>" class="fancybox-video fancybox.iframe"><?php echo $videoTitulo ?></a>
															</div>
														</div>
													</div>
													<div class="col-xs-12">
														<h3 class="title title-b"><a href="<?php echo $videoLink ?>" class="fancybox-video fancybox.iframe"><?php echo $videoTitulo ?></a></h3>
													</div>
												</div>
											</article>
										</div>
										<?php //endif ?>
										
										<?php endforeach ?>
									</div>
								<?php endif ?>
							</div>
							
							<div class="row navigation hidden">
								<?php frontend_paging_nav('video') ?>
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

				<?php endif ?>
				
				<?php if ( $GLOBALS['page_'] == 1 || $_GET['type'] == 'foto' ) : ?>
				
					<?php
						$numItensFotos = 6;
						$numItensFromFotos = ( $numItensFotos * $GLOBALS['page_'] ) - $numItensFotos;

						$paramsFoto = array(
							'post_type' => 'foto',
							'posts_per_page' => $numItensFotos,
							'offset' => $numItensFromFotos
						);

						$tabFotosItens = get_posts( $paramsFoto );
						$size = sizeof( $tabFotosItens );
					?>
					<!-- FOTOS -->
					<div class="tab-pane" id="fotos">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<h3 class="title">Fotos</h3>
								</div>
							</div>
							<div class="row">
								<?php if ( sizeof( $tabFotosItens ) ) : ?>
									<div class="box-photos ajax-container">
										<?php
											foreach ( $tabFotosItens as $tabFotoItem ) :
												$fotoTitulo = apply_filters( 'the_title', $tabFotoItem->post_title );
												$fotoImagem = wp_get_attachment_image_src( get_post_thumbnail_id($tabFotoItem->ID ), '300x300');
												$fotoLink   = get_the_permalink( $tabFotoItem->ID);
											?>
										
										<div class="col-xs-4 ajax-item">
											<article class="article article-d article-photos">
												<div class="row">
													<div class="col-xs-12">
														<div class="box-photo-detail">
															<div class="box-image" <?php if ( ! empty( $fotoImagem ) ) echo 'style="background-image:url('. $fotoImagem[0] .')"' ?>>
																<a href="<?php echo $fotoLink ?>" title="<?php echo $fotoTitulo ?>"><?php echo $fotoTitulo ?></a>
															</div>
														</div>
													</div>
													<div class="col-xs-12">
														<h3 class="title title-a"><a href="<?php echo $fotoLink ?>"><?php echo $fotoTitulo ?></a></h3>
													</div>
												</div>
											</article>
										</div>
										<?php endforeach ?>
									</div>
								<?php endif ?>
							</div>

							<div class="row navigation hidden">
								<?php frontend_paging_nav('foto') ?>
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

				<?php endif ?>
				
			</div>
		</div>
	</div>
</section>

