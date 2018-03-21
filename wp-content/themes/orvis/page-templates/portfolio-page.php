<?php
/**
 * Template Name: Portfolio Page Template
 *
 * @package Orvis
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					if ( ! get_theme_mod( 'orvis_hide_portfolio_page_title' ) ) {
						the_title( '<header class="page-header"><h1 class="page-title">', '</h1></header>' );
					}
				?>

				<div class="portfolio-content">

					<div class="page-content">
						<?php
							the_content();
							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'orvis' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) );
						?>
					</div><!-- .page-content -->

					<?php edit_post_link( esc_html__( 'Edit', 'orvis' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>

				</div>

			<?php endwhile; // end of the loop. ?>

			<?php
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
			?>

			<div class="portfolio-projects">

				<?php if ( post_type_exists( 'jetpack-portfolio' ) && $project_query -> have_posts() ) : ?>

					<div class="portfolio-wrapper">

						<?php while ( $project_query -> have_posts() ) : $project_query -> the_post(); ?>

							<?php get_template_part( 'template-parts/content', 'portfolio' ); ?>

						<?php endwhile; ?>

					</div><!-- .portfolio-wrapper -->

				<?php else : ?>

					<section class="no-results not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'orvis' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<?php if ( current_user_can( 'publish_posts' ) ) : ?>

								<p><?php printf( wp_kses( __( 'Ready to publish your first project? <a href="%1$s">Get started here</a>.', 'orvis' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php?post_type=jetpack-portfolio' ) ) ); ?></p>

							<?php else : ?>

								<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'orvis' ); ?></p>
								<?php get_search_form(); ?>

							<?php endif; ?>
						</div><!-- .page-content -->
					</section><!-- .no-results -->

				<?php endif; ?>

			</div><!-- .portfolio-projects -->

			<?php orvis_the_portfolio_navigation(); ?>

			<?php wp_reset_postdata(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>