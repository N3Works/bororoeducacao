<?php
	/**
	 * @package Bororó 25
	 */
	
	get_header();
	
	while ( have_posts() ) {
		the_post();

		if ( get_post_type() == 'curso' ) {
			get_template_part( 'content', 'single-course' );
		}
		elseif ( get_post_type() == 'cinema' ) {
			get_template_part( 'content', 'single-cinema' );
		}
		elseif ( get_post_type() == 'foto' ) {
			get_template_part( 'content', 'single-photo' );
		}
		elseif ( get_post_type() == 'post' ) {
			get_template_part( 'content', 'single-post' );
		}
		else {
			get_template_part( 'content', 'none' );
		}
		
	}

	get_footer();
?>
