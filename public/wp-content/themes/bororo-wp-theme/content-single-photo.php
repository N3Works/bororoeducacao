<?php
/**
 * @package Bororó 25
 */
?>

<?php
	global $post;
?>

<?php get_template_part( 'module', 'nav' ) ?>
<?php
	$post = get_page_by_path( 'midia' );
	setup_postdata( $post );
	get_template_part( 'module', 'top' );
	wp_reset_postdata();
?>

<section class="section-internal-content">
	<div class="box-tabs">
		<div class="box-nav-tabs">
			<ul class="nav-tabs">
				<li><a class="direct-link" href="/midia/#videos">Vídeos</a></li>
				<li class="active"><a class="direct-link" href="/midia/#fotos">Fotos</a></li>
			</ul>
		</div>
		<div class="box-tab-content">
			<div class="tab-content">
				

				<?php
					$numItensVideo = 7;
					$numItensFromVideo = ( $numItensVideo * $GLOBALS['page_'] ) - $numItensVideo;
					
					$paramsVideo = array(
						'post_type' => 'video',
						'posts_per_page' => $numItensVideo,
						'offset' => $numItensFromVideo
					);

					$tabVideosItens = get_posts( $paramsVideo );
					$size = sizeof( $tabVideosItens );
				?>
				<!-- VIDEOS -->
				<div class="tab-pane" id="videos">
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
									
									<?php if ( $cont == 1 ) : ?>
									<article class="article article-d article-videos">
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
											<!-- <p class="text text-a">
												Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja.
											</p> 
											<p class="text text-a">
												10/05/15
											</p>-->
										</div>
										<div class="clearfix"> </div>
										<br /><br />
									</article>
									<?php else : ?>
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
													<h3 class="title title-a"><a href="<?php echo $videoLink ?>" class="fancybox-video fancybox.iframe"><?php echo $videoTitulo ?></a></h3>
												</div>
											</div>
										</article>
									</div>
									<?php endif ?>
									
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

				<!-- FOTOS -->
				<div class="tab-pane active" id="fotos">
					<div class="container">
						<div class="row">
							<div class="col-xs-8">
								<h3 class="title"><?php the_title() ?></h3>
							</div>
							<div class="col-xs-4">
								<a href="/midia/#fotos" class="link-b"><i class="fa fa-angle-left"></i> Voltar</a>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="box-photo-iframe">
									<?php the_content() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



