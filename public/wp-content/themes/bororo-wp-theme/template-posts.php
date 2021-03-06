<?php
	/**
	 * @package Bororó 25
	 * Template Name: Blog
	 */

	$GLOBALS['page_'] = get_query_var( 'paged' ) ? (int) get_query_var( 'paged' ) : 1;

	if ( $GLOBALS['page_'] == 1 ) get_header();
	
	get_template_part( 'content-template', 'posts' );
	
	if ( $GLOBALS['page_'] == 1 ) get_footer();
?>