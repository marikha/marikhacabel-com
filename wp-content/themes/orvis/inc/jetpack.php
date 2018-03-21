<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Orvis
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 * See: https://jetpack.me/support/custom-content-types/#portfolios
 * See: https://jetpack.me/support/site-logo/
 * See: https://jetpack.me/support/social-menu/
 */
function orvis_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'orvis_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Portfolio Custom Post Type.
	add_theme_support( 'jetpack-portfolio', array(
		'title'          => true,
		'content'        => true,
		'featured-image' => true
	) );

	// Add theme support for Site Logo.
	add_image_size( 'orvis-logo', 1248, 176 );
	add_theme_support( 'site-logo', array(
		'size' => 'orvis-logo'
	) );

	// Add theme support for Social Menu.
	add_theme_support( 'jetpack-social-menu' );
} // end function orvis_jetpack_setup
add_action( 'after_setup_theme', 'orvis_jetpack_setup' );

/**
 * Define the code that is used to render the posts added by Infinite Scroll.
 *
 * Includes the whole loop. Used to include the correct template part for the Portfolio CPT.
 */
function orvis_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();

		if ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) {
			get_template_part( 'template-parts/content', 'portfolio' );
		} else {
			get_template_part( 'template-parts/content', get_post_format() );
		}
	}
} // end function orvis_infinite_scroll_render

/**
 * Return early if Site Logo is not available.
 */
function orvis_the_site_logo() {
	if ( ! function_exists( 'jetpack_the_site_logo' ) ) {
		return;
	} else {
		jetpack_the_site_logo();
	}
} // end function orvis_the_site_logo

/**
 * Return early if Social Menu is not available.
 */
function orvis_social_menu() {
	if ( ! function_exists( 'jetpack_social_menu' ) ) {
		return;
	} else {
		jetpack_social_menu();
	}
} // end function orvis_social_menu

/**
 * Create Portfolio Navigation.
 */
function orvis_get_the_portfolio_navigation( $args = array() ) {
    $navigation = '';

    if ( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	} elseif ( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	} else {
		$paged = 1;
	}

	$posts_per_page = get_option( 'jetpack_portfolio_posts_per_page', '10' );
	$args = array(
		'post_type'      => 'jetpack-portfolio',
		'posts_per_page' => $posts_per_page,
		'paged'          => $paged,
	);
	$project_query = new WP_Query ( $args );

    // Don't print empty markup if there's only one page.
    if ( $project_query->max_num_pages > 1 ) {
        $args = wp_parse_args( $args, array(
            'prev_text'          => esc_html__( 'Older projects', 'orvis' ),
            'next_text'          => esc_html__( 'Newer projects', 'orvis' ),
            'screen_reader_text' => esc_html__( 'Portfolio navigation', 'orvis' ),
        ) );

        $next_link = get_previous_posts_link( $args['next_text'], $project_query->max_num_pages );
        $prev_link = get_next_posts_link( $args['prev_text'], $project_query->max_num_pages );

        if ( $prev_link ) {
            $navigation .= '<div class="nav-previous">' . $prev_link . '</div>';
        }

        if ( $next_link ) {
            $navigation .= '<div class="nav-next">' . $next_link . '</div>';
        }

        $navigation = _navigation_markup( $navigation, 'posts-navigation', $args['screen_reader_text'] );
    }

    return $navigation;
} // end function orvis_get_the_portfolio_navigation

function orvis_the_portfolio_navigation( $args = array() ) {
    echo orvis_get_the_portfolio_navigation( $args );
} // end function orvis_the_portfolio_navigation

/**
 * Portfolio Title.
 */
function orvis_portfolio_title( $before = '', $after = '' ) {
	$jetpack_portfolio_title = get_option( 'jetpack_portfolio_title' );
	$title = '';

	if ( is_post_type_archive( 'jetpack-portfolio' ) ) {
		if ( isset( $jetpack_portfolio_title ) && '' != $jetpack_portfolio_title ) {
			$title = esc_html( $jetpack_portfolio_title );
		} else {
			$title = post_type_archive_title( '', false );
		}
	} elseif ( is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) {
		$title = single_term_title( '', false );
	}

	echo $before . $title . $after;
}

/**
 * Portfolio Content.
 */
function orvis_portfolio_content( $before = '', $after = '' ) {
	$jetpack_portfolio_content = get_option( 'jetpack_portfolio_content' );

	if ( is_tax() && get_the_archive_description() ) {
		echo $before . get_the_archive_description() . $after;
	} else if ( isset( $jetpack_portfolio_content ) && '' != $jetpack_portfolio_content ) {
		$content = convert_chars( convert_smilies( wptexturize( stripslashes( wp_filter_post_kses( addslashes( $jetpack_portfolio_content ) ) ) ) ) );
		echo $before . $content . $after;
	}
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function orvis_portfolio_body_classes( $classes ) {
	$jetpack_portfolio_content = get_option( 'jetpack_portfolio_content' );

	if ( ( is_post_type_archive( 'jetpack-portfolio' ) && isset( $jetpack_portfolio_content ) && '' != $jetpack_portfolio_content ) || ( ( is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) && ( get_the_archive_description() || ( isset( $jetpack_portfolio_content ) && '' != $jetpack_portfolio_content ) ) ) ) {
		$classes[] = 'custom-archive-jetpack-portfolio';
	}

	return $classes;
}
add_filter( 'body_class', 'orvis_portfolio_body_classes' );

/**
 * Portfolio Featured Image.
 */
function orvis_portfolio_thumbnail( $before = '', $after = '' ) {
	$jetpack_portfolio_featured_image = get_option( 'jetpack_portfolio_featured_image' );

	if ( isset( $jetpack_portfolio_featured_image ) && '' != $jetpack_portfolio_featured_image ) {
		$featured_image = wp_get_attachment_image( (int) $jetpack_portfolio_featured_image, 'post-thumbnail' );
		echo $before . $featured_image . $after;
	}
}

/**
 * Filter Infinite Scroll text handle.
 */
function orvis_portfolio_infinite_scroll_navigation( $js_settings ) {
	if ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) {
		$js_settings[ 'text' ] = esc_js( esc_html__( 'Older projects', 'orvis' ) );
	}

	return $js_settings;
}
add_filter( 'infinite_scroll_js_settings', 'orvis_portfolio_infinite_scroll_navigation' );

/**
 * Load Jetpack scripts.
 */
function orvis_jetpack_scripts() {
	if ( is_post_type_archive( 'jetpack-portfolio' ) || is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) || is_page_template( 'page-templates/portfolio-page.php' ) ) {
		wp_enqueue_script( 'orvis-portfolio', get_template_directory_uri() . '/js/portfolio.js', array( 'jquery', 'masonry' ), '20151231', true );

		wp_localize_script( 'orvis-portfolio', 'direction', array(
			'rtl' => is_rtl(),
		) );
	}

	if ( is_singular() && 'jetpack-portfolio' == get_post_type() ) {
		wp_enqueue_script( 'orvis-portfolio-single', get_template_directory_uri() . '/js/portfolio-single.js', array( 'jquery' ), '20151231', true );
	}
}
add_action( 'wp_enqueue_scripts', 'orvis_jetpack_scripts' );
