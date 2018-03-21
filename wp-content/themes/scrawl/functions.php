<?php
/**
 * Scrawl functions and definitions
 *
 * @package Scrawl
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1000; /* pixels */
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Overwrites the parent theme's setup function
 */
function scrawl_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Scrawl, use a find and replace
	 * to change 'scrawl' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'scrawl', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'scrawl-featured-header', '2000', '1500', true );
	add_image_size( 'scrawl-site-logo', '300', '300' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'scrawl' ),
		'social'  => __( 'Social Links', 'scrawl' ),
	) );

	add_editor_style( array( 'editor-style.css', scrawl_fonts_url(), get_template_directory_uri() . '/genericons/genericons.css' ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio', 'chat', 'status'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'scrawl_custom_background_args', array(
		'default-color' => 'fffdfd',
	) ) );
}
add_action( 'after_setup_theme', 'scrawl_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function scrawl_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Slide-Out Sidebar', 'scrawl' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'scrawl_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function scrawl_scripts() {
	wp_enqueue_style( 'scrawl-style', get_stylesheet_uri() );
	wp_enqueue_style( 'scrawl-fonts', scrawl_fonts_url(), array(), null );

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '3.3' );

	wp_enqueue_script( 'scrawl-script', get_template_directory_uri() . '/js/scrawl.js', array( 'jquery' ), '20150309', true );

	wp_enqueue_script( 'scrawl-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'scrawl_scripts', 1 );

/**
 * Register Google Fonts
 */
function scrawl_fonts_url() {
    $fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Arbutus Slab, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$arbutusslab = _x( 'on', 'Arbutus Slab font: on or off', 'scrawl' );

	/* Translators: If there are characters in your language that are not
	 * supported by Merriweather, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$merriweather = _x( 'on', 'Merriweather font: on or off', 'scrawl' );

	if ( 'off' !== $arbutusslab && 'off' !== $merriweather ) {

		$font_families = array();

		if ( 'off' !== $arbutusslab  ) {

			$font_families[] = 'Lora:400,700';

		}

		if ( 'off' !== $merriweather  ) {

			$font_families[] = 'Merriweather:400italic,400,700,700italic';

		}
	}

	$query_args = array(
		'family' => implode( '|', $font_families ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return $fonts_url;

}

/**
 * Enqueue Google Fonts for custom headers
 */
function scrawl_admin_scripts( $hook_suffix ) {

	wp_enqueue_style( 'scrawl-fonts', scrawl_fonts_url(), array(), null );

}
add_action( 'admin_enqueue_scripts', 'scrawl_admin_scripts' );

if ( ! function_exists( 'scrawl_featured_header' ) ) :
	function scrawl_featured_header() {
		if ( ! has_post_thumbnail() || ! is_single() ) {
			return;
		}

		$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'scrawl-featured-header' );
		?>
		<style type="text/css" id="scrawl-featured-header">
			.featured-header-image {
				background-image: url( <?php echo esc_url( $img[0] ); ?> );
				background-size: cover;
				background-position: center;
				position: relative;
				width: 100%;
				height: 40%;
				z-index: 0;
			}
			.entry-title {
				color: white;
				margin-top: 0;
				margin-bottom: 0;
				padding: .75em 0;
				position: relative;
					left: 50%;
					top: 50%;
					bottom: 0;
				text-shadow: 0px 2px 5px rgba(0,0,0,0.5);
				-webkit-transform: translate(-50%, -50%);
						transform: translate(-50%, -50%);
				width: 90%;
				z-index: 1;
			}
			@media screen and ( min-width: 58em ) {
				.entry-title {
					position: absolute;
						top: auto;
						bottom: .75em;
					-webkit-transform: translate(-50%, 0);
							transform: translate(-50%, 0);
					width: 20em;
				}
				.featured-header-image {
					height: 90%;
				}
				.single.has-thumbnail .entry-title a:after {
					content: "\f431";
					display: block;
					font-size: 72px;
					opacity: .75;
					transition: all .1s ease-in-out;
				}
				.single.has-thumbnail .entry-title:hover a:after {
					opacity: 1;
					transition: all .1s ease-in-out;
				}
			}
			.single.has-thumbnail .entry-title a {
				color: white;
			}
		</style>
		<?php
	}
endif;
add_action( 'wp_head', 'scrawl_featured_header', 999 );

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
