<?php
/**
 * button functions and definitions
 *
 * @package Button
 */

if ( ! function_exists( 'button_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function button_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on button, use a find and replace
	 * to change 'button' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'button', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'button-featured', '982', '9999' );
	add_image_size( 'button-slideshow', '982', '623', true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Top Menu', 'button' ),
		'social'  => esc_html__( 'Social Links Menu', 'button' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'button_custom_background_args', array(
		'default-color' => 'f8f8f8',

		/*
		 * We're using a unique filename for the background image
		 * to avoid users uploading a file with the same filename
		 * and avoiding conflict with the `user-background` body_class
		 * in inc/extras.php and assets/js/customizer.js
		 */

		'default-image' => esc_url( get_template_directory_uri() ) . '/img/buttonbg20151103.png',
	) ) );
}
endif; // button_setup
add_action( 'after_setup_theme', 'button_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function button_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'button_content_width', 663 );
}
add_action( 'after_setup_theme', 'button_content_width', 0 );

/**
 * Adjust content width for full-width page template
 */
function button_adjusted_content_width() {
	global $content_width;

	if ( is_page_template( 'full-width-page.php' ) || ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 982;
	}
}
add_action( 'template_redirect', 'button_adjusted_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function button_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'button' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'button_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function button_scripts() {
	wp_enqueue_style( 'button-style', get_stylesheet_uri() );

	wp_enqueue_style( 'button-fonts', button_fonts_url(), array(), null );

	if ( is_archive() || is_search() || is_home() || 'gallery' == get_post_format() ) {
		wp_enqueue_script( 'button-flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', array( 'jquery' ), '20120206', true );
		wp_enqueue_script( 'button', get_template_directory_uri() . '/assets/js/main.js', array( 'button-flexslider' ), '20120206', true );
	}

	wp_enqueue_script( 'button-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'button-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( wp_style_is( 'genericons', 'registered' ) ) {
		wp_enqueue_style( 'genericons' );
	} else {
		wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), null );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'button_scripts' );

/**
 * Register Google Fonts
 */
function button_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
	 * supported by Lato, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$lato = esc_html_x( 'on', 'Lato font: on or off', 'button' );

	/* Translators: If there are characters in your language that are not
	 * supported by Lora, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$lora = esc_html_x( 'on', 'Lora font: on or off', 'button' );

	if ( 'off' !== $lato || 'off' !== $lora ) {
		$font_families = array();

		if ( 'off' !== $lato ) {
			$font_families[] = 'Lato:400,300,300italic,400italic,700,700italic';
		}

		if ( 'off' !== $lora ) {
			$font_families[] = 'Lora:400italic,700italic';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return $fonts_url;

}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

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
 * Load plugin enhancement file to display admin notices.
 */
require get_template_directory() . '/inc/plugin-enhancements.php';