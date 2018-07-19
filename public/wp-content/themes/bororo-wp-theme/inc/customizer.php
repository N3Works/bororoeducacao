<?php
/**
 * @package FMSS
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bororo_wp_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'bororo_wp_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bororo_wp_theme_customize_preview_js() {
	wp_enqueue_script( 'bororo_wp_theme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20150311', true );
}
add_action( 'customize_preview_init', 'bororo_wp_theme_customize_preview_js' );

/**
 * bororo_customize_register
 */
function bororo_customize_register( $wp_customize ) {
	
	// Remove default sections

	//$wp_customize->remove_section( 'title_tagline' );
	$wp_customize->remove_section( 'nav' );
	$wp_customize->remove_section( 'static_front_page' );
}
function bororo_theme_options( $name, $default = false ) {
	$options = ( get_option( 'bororo_theme_options' ) ) ? get_option( 'bororo_theme_options' ) : null;

	if ( isset( $options[ $name ] ) ) {
		return apply_filters( 'bororo_theme_options_$name', $options[ $name ] );
	}

	return apply_filters( 'bororo_theme_options_$name', $default );
}
add_action( 'customize_register', 'bororo_customize_register' );

?>