<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Button
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function button_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	$bgimage = get_background_image();

	$bgimage = basename( $bgimage ); //Get the background's filename

	if ( 'buttonbg20151103.png' !== $bgimage ) {

		//If not using the default background, apply a special body class
		$classes[] = 'user-background';

	}

	return $classes;
}
add_filter( 'body_class', 'button_body_classes' );
