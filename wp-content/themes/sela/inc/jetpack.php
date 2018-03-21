<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Sela
 */

/**
 * Add support for Jetpack features.
 */
function sela_jetpack_setup() {

	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'footer_widgets' => array( 'sidebar-2', 'sidebar-3', 'sidebar-4' ),
		'container' 	 => 'main',
		'render'    	 => 'sela_infinite_scroll_render',
		'footer'    	 => 'content',
	) );

	add_theme_support( 'jetpack-testimonial' );

	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Site Logo.
	add_theme_support( 'site-logo', array( 'size' => 'sela-logo' ) );

	add_image_size( 'sela-logo', 1180, 380 );

	// Add theme support for Content Options.
	add_theme_support( 'jetpack-content-options', array(
		'blog-display' => 'content',
		'author-bio'   => false,
		'post-details' => array(
			'stylesheet' => 'sela-style',
			'date'       => 'entry-meta .date',
			'categories' => 'cat-links, .cat-links + .sep',
			'tags'       => 'tags-links',
		),
	) );
}
add_action( 'after_setup_theme', 'sela_jetpack_setup' );

/**
 * Return early if Site Logo is not available.
 */
function sela_the_site_logo() {
	if ( ! function_exists( 'jetpack_the_site_logo' ) ) {
		return;
	} else {
		jetpack_the_site_logo();
	}
}

/**
 * Flush the Rewrite Rules for the testimonials CPT after the user has activated the theme.
 */
function sela_flush_rewrite_rules() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'sela_flush_rewrite_rules' );

/**
 * Define the code that is used to render the posts added by Infinite Scroll.
 *
 * Includes the whole loop. Used to include the correct template part for the Testimonials CPT.
 */
function sela_infinite_scroll_render() {
	while( have_posts() ) {
		the_post();

		if ( is_post_type_archive( 'jetpack-testimonial' ) ) {
			get_template_part( 'content', 'testimonial' );
		} else {
			get_template_part( 'content', get_post_format() );
		}
	}
}
