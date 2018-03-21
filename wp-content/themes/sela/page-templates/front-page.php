<?php
/**
 * Template Name: Front Page
 *
 * @package Sela
 */

get_header(); ?>

	<div id="primary" class="content-area front-page-content-area">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="hero">

				<?php if ( has_post_thumbnail() ) : ?>
				<figure class="hero-content">
					<?php the_post_thumbnail( 'sela-hero-thumbnail' ); ?>
					<div class="hero-content-overlayer">
						<div class="hero-container-outer">
							<div class="hero-container-inner">
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<header class="entry-header">
										<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
									</header><!-- .entry-header -->

									<div class="entry-content">
										<?php the_content(); ?>
									</div><!-- .entry-content -->
									<?php edit_post_link( __( 'Edit', 'sela' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
								</article><!-- #post-## -->
							</div><!-- .hero-container-inner -->
						</div><!-- .hero-container-outer -->
					</div><!-- .hero-content-overlayer -->
				</figure><!-- .hero-content -->

				<?php else : ?>
					<?php get_template_part( 'content', 'page' ); ?>
				<?php endif; ?>

			</div><!-- .hero -->
		<?php endwhile; ?>
	</div><!-- #primary -->

	<?php get_sidebar( 'front-page' ); ?>

	<?php
		$testimonials = new WP_Query( array(
			'post_type'      => 'jetpack-testimonial',
			'order'          => 'ASC',
			'orderby'        => 'menu_order',
			'posts_per_page' => 2,
			'no_found_rows'  => true,
		) );
	?>

	<?php if ( $testimonials->have_posts() ) : ?>
	<div id="front-page-testimonials" class="front-testimonials testimonials">
		<div class="grid-row">
		<?php
			while ( $testimonials->have_posts() ) : $testimonials->the_post();
				 get_template_part( 'content', 'testimonial' );
			endwhile;
			wp_reset_postdata();
		?>
		</div>
	</div><!-- .testimonials -->
	<?php endif; ?>

<?php get_sidebar( 'footer' ); ?>
<?php get_footer(); ?>