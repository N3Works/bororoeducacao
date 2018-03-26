<?php
/**
 * @package Bororó 25
 */

/*
function santopixel_nocache( $headers )
{
	unset( $headers['Cache-Control'] );
	return $headers;
}
add_filter( 'wp_headers', 'santopixel_nocache' );
*/
function santopixel_nocache( $headers )
{
	header_remove( 'Cache-Control' );
}
add_action( 'send_headers', 'santopixel_nocache' );

function bororo_wp_theme_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	// Default Post Thumbnail dimensions (cropped)
	set_post_thumbnail_size( 150, 150, true );

	add_image_size( '1200x', 1200, 9999 ); // the image
	add_image_size( '1440x', 1440, 9999 ); // the image

	//add_image_size( '1200x', 1200, 9999 ); // share option 1
	add_image_size( '900x', 900, 9999 ); // share option 2
	add_image_size( '600x', 600, 9999 ); // share option 3

	add_image_size( '300x300', 300, 300 ); // 200x200
	add_image_size( '270x390', 270, 390 ); // 130x130
	add_image_size( '470x340', 470, 340 ); // 130x130

	// Menus
	register_nav_menus( array(
		'main' => 'Menu principal',
		'footer' => 'Menu rodapé'
	) );
}
add_action( 'after_setup_theme', 'bororo_wp_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function bororo_wp_theme_scripts() {
	//wp_register_style( 'screen1', get_template_directory_uri().'/css/bootstrap-modal-carousel.min.css', array(), '20150407v2' );
	//wp_register_style( 'screen2', get_template_directory_uri().'/css/slick.css', array(), '20150407v2' );
	wp_register_style( 'screen3', get_template_directory_uri().'/style.css', array(), '20150504' );
	
	wp_enqueue_style( 'screen1' );
	wp_enqueue_style( 'screen2' );
	wp_enqueue_style( 'screen3' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bororo_wp_theme_scripts' );


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * SantoPixel functions.
 */
require get_template_directory() . '/inc/santopixel.php';


if ( get_magic_quotes_gpc() ) {
    $_POST      = array_map( 'stripslashes_deep', $_POST );
    $_GET       = array_map( 'stripslashes_deep', $_GET );
    $_COOKIE    = array_map( 'stripslashes_deep', $_COOKIE );
    $_REQUEST   = array_map( 'stripslashes_deep', $_REQUEST );
}

?>
