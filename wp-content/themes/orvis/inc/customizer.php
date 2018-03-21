<?php
/**
 * Orvis Theme Customizer.
 *
 * @package Orvis
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function orvis_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_setting( 'orvis_hide_portfolio_page_title', array(
		'default'           => '',
		'sanitize_callback' => 'orvis_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'orvis_hide_portfolio_page_title', array(
		'label'             => esc_html__( 'Hide page title on Portfolio Page Template', 'orvis' ),
		'section'           => 'jetpack_portfolio',
		'type'              => 'checkbox',
	) );
}
add_action( 'customize_register', 'orvis_customize_register' );

/**
 * Sanitize the checkbox.
 *
 * @param boolean $input.
 * @return boolean true if portfolio page template displays title and content.
 */
function orvis_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function orvis_customize_preview_js() {
	wp_enqueue_script( 'orvis_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151231', true );
}
add_action( 'customize_preview_init', 'orvis_customize_preview_js' );