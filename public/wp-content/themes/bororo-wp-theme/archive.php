<?php
	/**
	 * @package Bororó 25
	 */
	
	global $page_;
	$page_ = get_query_var( 'paged' ) ? (int) get_query_var( 'paged' ) : 1;

	if ( $page_ == 1 ) get_header();
	get_template_part( 'content', 'archive' );
	if ( $page_ == 1 ) get_footer();
?>
