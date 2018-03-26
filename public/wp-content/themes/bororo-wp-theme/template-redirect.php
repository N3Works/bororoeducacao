<?php
	/**
	 * @package Bororó 25
	 * Template Name: ** Redirect **
	 */

	global $post;

	while ( have_posts() ) {
		the_post();
		$redirecionamento = get_post_meta( get_the_ID(), 'wpcf-redirecionamento', TRUE );
		
		if ( ! empty( $redirecionamento ) ) {
			wp_redirect( $redirecionamento );
		}

		die( 'Faltou configurar redirecionamento' );
	}
?>
