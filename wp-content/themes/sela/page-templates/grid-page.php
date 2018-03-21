<?php
/**
 * Template Name: Grid Page
 *
 * @package Sela
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'hero' ); ?>

	<?php endwhile; ?>

	<?php rewind_posts(); ?>

	<div class="content-wrapper full-width <?php echo sela_additional_class(); ?>">
		<div id="primary" class="content-area grid-page-content-area ">
			<div id="main" class="site-content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; // end of the loop. ?>

				<?php
					$sela_child_pages = new WP_Query( array(
						'post_type'      => 'page',
						'orderby'        => 'menu_order',
						'order'          => 'ASC',
						'post_parent'    => $post->ID,
						'posts_per_page' => 999,
						'no_found_rows'  => true,
					) );
				?>

				<?php if ( $sela_child_pages->have_posts() ) : ?>

				<div class="child-pages grid">

						<?php
						while ( $sela_child_pages->have_posts() ) : $sela_child_pages->the_post();

							get_template_part( 'content', 'grid' );

						endwhile;
						?>

				</div><!-- .child-pages .grid -->

				<?php
					endif;
					wp_reset_postdata();
				?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) {
						comments_template();
					}
				?>
			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- .content-wrapper -->

<?php get_footer(); ?>
