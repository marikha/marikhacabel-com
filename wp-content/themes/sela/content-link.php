<?php
/**
 * @package Sela
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php sela_post_thumbnail(); ?>

	<header class="entry-header">
		<?php if ( is_single() ) : ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( '<h1 class="entry-title"><a href=" ' . esc_url( sela_get_link_url() ). '" rel="bookmark">', '</a></h1>' ); ?>
		<?php endif; // is_single() ?>
	</header><!-- .entry-header -->

	<div class="entry-body">
		<div class="entry-meta">
			<?php sela_entry_meta(); ?>
		</div><!-- .entry-meta -->

		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'sela' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'sela' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<?php if ( is_single() ) : ?>
		<footer class="entry-meta">
			<?php sela_footer_entry_meta(); ?>
		</footer><!-- .entry-meta -->
		<?php endif; ?>
	</div><!-- .entry-body -->

</article><!-- #post-## -->
