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
	$post = get_page_by_path( 'blog' );
	setup_postdata( $post );
	get_template_part( 'module', 'top' );
	wp_reset_postdata();
?>

<section class="section-internal-content">
	<div class="box-tabs">
		<div class="box-tab-content">
			<div class="tab-content">
				<div class="tab-pane active">
					<div class="container">
						<div class="row">
							<div class="col-xs-8">
								<header class="post-header">
									<h2 class="post-title"><?php the_title() ?></h3>
									<div class="post-meta">
										<div class="post-date"><?php echo get_the_date( 'd.m.Y | H\hi' ) ?></div>
									</div>
								</header>
							</div>
							<div class="col-xs-4">
								<a href="/blog" class="link-b"><i class="fa fa-angle-left"></i> Voltar</a>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="post-content">
									<?php the_content() ?>
								</div>
								<div class="social-bar-article">
									<span>Compartilhe: </span>
									<div class="social-bar-article-buttons">
										<div title="Compartilhe no Facebook" class="social-bar-article-button social-bar-article-button-facebook">
											<a href="https://www.facebook.com/dialog/feed?app_id=839458146107351&amp;link=<?php echo urlencode_santopixel( get_permalink() ) ?>&amp;redirect_uri=<?php echo urlencode_santopixel( get_permalink() ) ?>&amp;picture=<?php echo urlencode_santopixel( get_share_image( get_the_ID() ) ) ?>&amp;caption=<?php echo textencode_santopixel( get_bloginfo( 'name' ) ) ?>" rel="nofollow" target="_blank"><i class="fa fa-facebook"></i><?php if ( $showText ) echo ' <span>Compartilhe <span>no facebook</span></span>' ?></a>
										</div>
										<div title="Compartilhe no Twitter" class="social-bar-article-button social-bar-article-button-twitter">
											<a href="https://twitter.com/share?text=<?php echo textencode_santopixel( the_title( '', '', FALSE ) ) ?>&amp;url=<?php echo urlencode_santopixel( get_permalink() ) ?>" rel="nofollow" target="_blank"><i class="fa fa-twitter"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



