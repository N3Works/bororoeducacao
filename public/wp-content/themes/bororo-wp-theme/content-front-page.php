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
		'posts_per_page' => 6,
    'orderby' => 'ID',
    'order' => 'ASC'
	);

	$posts_ = get_posts( $params );
	$size = sizeof( $posts_ );
	$cont = 0;
?>

<?php if ( $size > 0 ) : ?>

<section class="section-main">
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
							$videoID = get_post_meta( get_the_ID(), 'wpcf-video-id', TRUE );
							$cont++;
						?>

						<?php if ( $cont == 1 ) : ?>
						<div class="slide <?php if ( ! empty( $imagem ) ) echo 'slide-image' ?>" <?php if ( ! empty( $imagem ) ) echo 'style="background-image:url('. $imagem .')"' ?>>
							<div class="container-slider">
								<div class="box-intro">
									<h2><?php the_title() ?></h2>
								</div>
							</div>
						</div>
						<?php else : ?>
						<div class="slide <?php if ( ! empty( $imagem ) ) echo 'slide-image' ?>" <?php if ( ! empty( $imagem ) ) echo 'style="background-image:url('. $imagem .')"' ?>>
							<div class="container-slider">
								<div class="box-titles">
									<h2 class="title"><a href="<?php echo $linkURL ?>" title="assista ao vídeo"><?php the_title() ?></a></h2>
									<p class="text">
										<a href="<?php echo $linkURL ?>" title="assista ao vídeo"><?php echo $subtitulo ?></a>
									</p>
								</div>
								<div class="box-video">
									<div class="video">
										<div class="lazyYT" data-youtube-id="<?php echo $videoID ?>" data-width="560" data-height="315">&nbsp;</div>
									</div>
								</div>
							</div>
						</div>
						<?php endif ?>
						<?php
							wp_reset_postdata();
						endforeach;
					?>	
				</div>
			</div>
		</div>
	</div>
	<div class="slider-tabs">
		<div class="slider-tabs-item slider-tabs-item-first active" index="0"><i class="fa fa-home2"></i></div>
		<div class="slider-tabs-item" index="1"><i class="fa fa-coracao"></i> nosso dna</div>
		<div class="slider-tabs-item" index="2"><i class="fa fa-oq_fazemos2"></i> o que fazemos</div>
		<div class="slider-tabs-item" index="3"><i class="fa fa-equacao2"></i> a equação</div>
		<div class="slider-tabs-item" index="4"><i class="fa fa-agenda"></i> agenda</div>
		<div class="slider-tabs-item" index="5"><i class="fa fa-empresas2"></i> bororó empresas</div>
	</div>
</section>

<?php endif ?>