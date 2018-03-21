<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Button
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 *
 * @since button 1.0
 */
function button_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'button_infinite_scroll_render',
		'footer'    => 'page',
	) );

	add_image_size( 'button-site-logo', '400', '400' );

	add_theme_support( 'site-logo', array( 'size' => 'button-site-logo' ) );

} // end function button_jetpack_setup
add_action( 'after_setup_theme', 'button_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 *
 * @since button 1.0
 */
function button_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'components/content', get_post_format() );
	}
} // end function button_infinite_scroll_render

/**
 * Return early if Site Logo is not available.
 *
 * @since button 1.0
 */
function button_the_site_logo() {
	if ( ! function_exists( 'jetpack_the_site_logo' ) ) {
		return;
	} else {
		jetpack_the_site_logo();
	}
}

/**
* Add theme support for Responsive Videos.
 *
 * @since button 1.0
*/
add_theme_support( 'jetpack-responsive-videos' );

