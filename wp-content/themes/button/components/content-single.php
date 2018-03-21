<?php
/**
 * Template part for displaying single posts.
 *
 * @package Button
 */

$format = get_post_format();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php button_entry_cats(); ?>

		<?php if ( 'link' == $format ) : ?>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( button_get_link_url() ) ), '</a></h1>' ); ?>
		<?php else : ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php endif; ?>

		<div class="entry-meta">
			<?php button_posted_on(); ?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">',
				'after'  => '</div>',
				'link_before' => '<span class="active-link">',
				'link_after' => '</span>'
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php button_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

