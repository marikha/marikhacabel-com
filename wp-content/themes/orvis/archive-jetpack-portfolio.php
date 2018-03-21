<?php
/**
 * The template for displaying the Portfolio archive page.
 *
 * @package Orvis
 */

get_header();

$jetpack_portfolio_content = get_option( 'jetpack_portfolio_content' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
			if ( have_posts() ) {
				get_template_part( 'template-parts/content', 'portfolio-archive' );
			} else {
				get_template_part( 'template-parts/content', 'none' );
			}
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
	if ( ! isset( $jetpack_portfolio_content ) || '' === $jetpack_portfolio_content ) {
		get_sidebar();
	}
?>
<?php get_footer(); ?>