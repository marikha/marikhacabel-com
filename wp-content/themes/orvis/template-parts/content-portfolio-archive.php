<?php
/**
 * The template used for displaying Portfolio Archive view
 *
 * @package Orvis
 */
?>

<header class="page-header">
	<?php orvis_portfolio_thumbnail( '<div class="post-thumbnail">', '</div>' ); ?>

	<?php orvis_portfolio_title( '<h1 class="page-title">', '</h1>' ); ?>
</header><!-- .page-header -->

<?php orvis_portfolio_content( '<div class="portfolio-content"><div class="page-content">', '</div></div>' ); ?>

<div class="portfolio-projects">
	<div class="portfolio-wrapper">

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'portfolio' ); ?>

		<?php endwhile; ?>

	</div><!-- .portfolio-wrapper -->
</div><!-- .portfolio-projects -->

<?php
	the_posts_navigation( array(
		'prev_text'          => esc_html__( 'Older projects', 'orvis' ),
		'next_text'          => esc_html__( 'Newer projects', 'orvis' ),
		'screen_reader_text' => esc_html__( 'Portfolio navigation', 'orvis' ),
	) );
?>