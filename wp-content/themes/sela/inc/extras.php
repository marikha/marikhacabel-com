<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * @package Sela
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function sela_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'sela_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 */
function sela_body_classes( $classes ) {
	if ( is_page_template( 'full-width-page.php' ) || is_page_template( 'grid-page.php' ) )
		$classes[] = 'full-width-page';

	if ( ! is_multi_author() ) {
		$classes[] = 'not-multi-author';
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
    }

	if ( display_header_text() ) {
		$classes[] = 'display-header-text';
	}

    if ( is_page() && ! comments_open() && '0' == get_comments_number() ) {
		$classes[] = 'comments-closed';
    }

	return $classes;
}
add_filter( 'body_class', 'sela_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 */
function sela_post_classes( $classes ) {

    if ( ! has_post_thumbnail() ) {
        $classes[] = 'without-featured-image';
    } else {
        $classes[] = 'with-featured-image';
    }

    return $classes;
}
add_filter( 'post_class', 'sela_post_classes' );

/**
 * Change the class of the hero area depending on featured image.
 */
function sela_additional_class() {

	$jetpack_options = get_theme_mod( 'jetpack_testimonials' );

	if ( is_post_type_archive() && ( ! isset( $jetpack_options['featured-image'] ) || ! $jetpack_options['featured-image'] ) ) {
		$additional_class =  'without-featured-image';
	} else if ( is_page() && ! has_post_thumbnail() ) {
		$additional_class =  'without-featured-image';
	} else {
		$additional_class =  'with-featured-image';
	}

	return $additional_class;
}

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function sela_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) ) {
		return $url;
	}

	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id ) {
		$url .= '#main';
	}

	return $url;
}
add_filter( 'attachment_link', 'sela_enhanced_image_navigation', 10, 2 );

if ( ! function_exists( '_wp_render_title_tag' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 */
	function sela_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}
		global $page, $paged;
		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}
		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'sela' ), max( $paged, $page ) );
		}
		return $title;
	}
	add_filter( 'wp_title', 'sela_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function sela_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'sela_render_title' );
endif;
