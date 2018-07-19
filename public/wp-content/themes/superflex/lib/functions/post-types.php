<?php
// -----------------------------------------------------------
// SETUP CUSTOM POST TYPES 
// -----------------------------------------------------------

// Portfolio custom post-type


function phi_post_type_portfolio() {
	register_post_type('phiportfolio', 
				array(
				'label' => __('Portfolio'),
				'public' => true,
				'show_ui' => true,
				'_builtin' => false, // It's a custom post type, not built in
				'_edit_link' => 'post.php?post=%d',
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array("slug" => "portfolio"), // Permalinks
				'query_var' => "phiportfolio", // This goes to the WP_Query schema
				'supports' => array('title','author','thumbnail', 'editor' ,'comments'/*,'custom-fields'*/),
				'menu_position' => 5,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				));
}	
	
				register_taxonomy("phiportfoliocats", 
				array("phiportfolio"), 
				array("hierarchical" => true, 
						"label" => "Portfolio Categories", 
						"singular_label" => "Category",
						"rewrite" => true,
						"show_ui" => true,));
	
add_action('init', 'phi_post_type_portfolio');


// Slide custom content type

	register_post_type('phislide', 
				array(
				'label' => __('Slides'),
				'singular_label' => __('Slide'),
				'public' => true,
				'show_ui' => true,
				'_builtin' => false, // It's a custom post type, not built in
				'_edit_link' => 'post.php?post=%d',
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array("slug" => "slide"), // Permalinks
				'query_var' => "phislide", // This goes to the WP_Query schema
				'supports' => array('title','author','thumbnail' , 'editor',/*'excerpt', 'custom-fields'*/),
				'menu_position' => 5,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				));




// Testimonial custom post-type
//function phi_post_type_testimonial() {
//	register_post_type('testimonial', 
//				array(
//				'label' => __('Testimonials'),
//				'singular_label' => __('Testimonial'),
//				'public' => true,
//				'show_ui' => true,
//				'_builtin' => false, // It's a custom post type, not built in
//				'_edit_link' => 'post.php?post=%d',
//				'capability_type' => 'post',
//				'hierarchical' => false,
//				'rewrite' => array("slug" => "testimonial"), // Permalinks
//				'query_var' => "phislide", // This goes to the WP_Query schema
//				'supports' => array('title','author','thumbnail', 'editor'/* 'excerpt' ,'custom-fields'*/),
//				'menu_position' => 5,
//				'publicly_queryable' => true,
//				'exclude_from_search' => false,
//				));
//
//}
//add_action('init', 'phi_post_type_testimonial');

// News custom post-type
//function phi_post_type_news() {
//	register_post_type('phinews', 
//				array(
//				'label' => __('News'),
//				'singular_label' => __('News'),
//				'public' => true,
//				'show_ui' => true,
//				'_builtin' => false, // It's a custom post type, not built in
//				'_edit_link' => 'post.php?post=%d',
//				'capability_type' => 'post',
//				'hierarchical' => false,
//				'rewrite' => array("slug" => "news"), // Permalinks
//				'query_var' => "phinews", // This goes to the WP_Query schema
//				'supports' => array('title','author','thumbnail', 'editor'/* 'excerpt' ,'custom-fields'*/),
//				'menu_position' => 6,
//				'publicly_queryable' => true,
//				'exclude_from_search' => false,
//				));
//
//}
//add_action('init', 'phi_post_type_news');
?>