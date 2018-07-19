<?php
/**
 * @package Bororó 25
 */
?>

<?php
	global $post;
?>

<?php
	$siteURL = home_url( '/' );
	$subtitulo = get_post_meta( get_the_ID(), 'wpcf-subtitulo', TRUE );
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID() ), '1440x');
?>

<section class="section-internal-top <?php if ( ! empty( $thumbnail ) ) echo 'section-internal-top-image' ?>" <?php if ( ! empty( $thumbnail ) ) echo 'style="background-image:url('. $thumbnail[0] .')"' ?>>
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<a href="<?php echo $siteURL ?>" class="brand" title="<?php echo $siteName ?>"><img src="<?php echo get_template_directory_uri() ?>/images/bororo25.png" alt="Bororó 25" /></a>
				<h2 class="title"><?php the_title() ?></h2>
			</div>
			<div class="col-xs-6">
				<a class="toggle-menu">UNIVERSO BORORÓ <i class="fa fa-menu3"></i></a>
				<div class="box-semicircle">
					<p><?php echo $subtitulo ?></p>
				</div>
			</div>
		</div>
	</div>
</section>