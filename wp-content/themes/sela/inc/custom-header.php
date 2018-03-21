<?php
/**
 * Custom Header
 *
 * @package Sela
 */

/**
 * Set up the WordPress core custom header settings.
 */
function sela_custom_header_setup() {
	add_theme_support( 'custom-header', array(
		'default-text-color'     => '333',
		'default-image'			 => '',
		'width'                  => 1180,
		'height'                 => 160,
		'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'sela_header_style',
		'admin-head-callback'    => 'sela_admin_header_style',
		'admin-preview-callback' => 'sela_admin_header_image',
	) );
}
add_action( 'after_setup_theme', 'sela_custom_header_setup' );

if ( ! function_exists( 'sela_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 */
function sela_header_style() {
	$header_image = get_header_image();
	$text_color   = get_header_textcolor();

	// Bail if the text is hidden or if no custom color is set
	if ( display_header_text() && $text_color === get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// Output the CSS for our custom styles
	?>
	<style type="text/css" id="sela-header-css">
		<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) :
		?>
			.site-title,
			.site-description {
				clip: rect(1px, 1px, 1px, 1px);
				position: absolute;
			}
		<?php
			// If the user has set a custom color for the text, use that.
			elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
		?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $text_color ); ?>;
			}
		<?php endif; ?>
	</style>
	<?php
}
endif; // sela_header_style


if ( ! function_exists( 'sela_admin_header_style' ) ) :
/**
 * Style the header image displayed on the Appearance > Header screen.
 */
function sela_admin_header_style() {
?>
	<style type="text/css" id="sela-admin-header-css">
		.appearance_page_custom-header #headimg {
			border: none;
			letter-spacing: 2px;
			max-width: 1180px;
			padding: 3em 0 36px;
			text-align: center;
			text-transform: uppercase;
		}
		#headimg h1 {
			font-family: Oswald, sans-serif;
			font-size: 36px;
			font-weight: 300;
			line-height: 1;
			line-height: 1.3333em;
			margin: 0;
		}
		#headimg h1 a {
			color: #333;
			text-decoration: none;
		}
		#headimg h2 {
			font-family: 'Source Sans Pro', Arial, sans-serif;
			font-size: 13px;
			font-weight: 300;
			line-height: 1.8462em;
			margin: 0;
		}
		#headimg img {
			vertical-align: middle;
		}
	</style>
<?php
}
endif; // sela_admin_header_style

if ( ! function_exists( 'sela_admin_header_image' ) ) :
/**
 * Create the custom header image markup displayed on the Appearance > Header screen.
 *
 */
function sela_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
	$image = '';

	if ( get_header_image() ) :
		$image = ' style="background-image: url( ' . get_header_image() . ' );"';
	endif; ?>
	<div id="headimg"<?php echo $image; ?>>
		<h1 class="displaying-header-text"><a id="name"<?php echo sprintf( ' style="color:#%s;"', get_header_textcolor() ); ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	</div>
<?php
}
endif; // sela_admin_header_image
