<?php
/**
 * @package Bororó 25
 */
?>

<?php
	global $page_;
?>

<?php get_template_part( 'module', 'nav' ) ?>

<?php
	$siteURL = home_url( '/' );
	$siteName = get_bloginfo( 'name', 'display' );

	$params = array(
		'post_type' => 'h-slide',
		'posts_per_page' => 5,
    'orderby' => 'ID',
    'order' => 'ASC'
	);

	$posts_ = get_posts( $params );
	$size = sizeof( $posts_ );
?>

<?php if ( $size > 0 ) : ?>

<section class="container-fluid section-main">
	<a href="<?php echo $siteURL ?>" class="brand" title="<?php echo $siteName ?>"><img src="<?php echo get_template_directory_uri() ?>/images/bororo25.png" alt="Bororó 25" /></a>
	<a class="toggle-menu">UNIVERSO BORORÓ <i class="fa fa-menu3"></i></a>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="slick-slider slick-slider-main">
					<?php
						foreach ( $posts_ as $post_ ) :
							$post = $post_;
							setup_postdata( $post );
							$subtitulo = get_post_meta( get_the_ID(), 'wpcf-subtitulo', TRUE );
							$imagem = get_post_meta( get_the_ID(), 'wpcf-video-imagem', TRUE );
							$linkURL = get_post_meta( get_the_ID(), 'wpcf-link-url', TRUE );
							$videoURL = get_post_meta( get_the_ID(), 'wpcf-video-url', TRUE );
						?>
						<div class="slide">
							<div class="container-slider">
								<div class="box-titles">
									<h2 class="title"><a href="<?php echo $linkURL ?>" title="assista ao vídeo"><?php the_title() ?></a></h2>
									<p class="text">
										<a href="<?php echo $linkURL ?>" title="assista ao vídeo"><?php echo $subtitulo ?></a>
									</p>
								</div>
								<div class="box-video">
									<div class="video">
										<iframe width="560" height="315" src="<?php echo $videoURL ?>" frameborder="0" allowfullscreen></iframe>
									</div>
								</div>
							</div>
						</div>
						<?php
							wp_reset_postdata();
						endforeach;
					?>	
				</div>
			</div>
		</div>
	</div>
	<div class="slider-tabs">
		<div class="slider-tabs-item active" index="0"><i class="fa fa-coracao"></i> o que fazemos</div>
		<div class="slider-tabs-item" index="1"><i class="fa fa-agenda"></i> agenda</div>
		<div class="slider-tabs-item" index="2"><i class="fa fa-cursos"></i> cursos</div>
		<div class="slider-tabs-item" index="3"><i class="fa fa-empresas"></i> bororó empresas</div>
	</div>
</section>

<?php endif ?>