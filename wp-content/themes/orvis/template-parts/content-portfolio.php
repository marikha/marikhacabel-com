<?php
/**
 * The template used for displaying projects on Archive/Portfolio Page Template view
 *
 * @package Orvis
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( '' != get_the_post_thumbnail() ) : ?>
		<div class="project-thumbnail">
			<?php the_post_thumbnail( 'orvis-project-thumbnail' ); ?>
		</div><!-- .project-thumbnail -->
	<?php endif; ?>

	<div class="project-info">
		<a href="<?php the_permalink(); ?>" rel="bookmark" class="image-link" tabindex="-1"></a>

		<?php the_title( '<header class="entry-header"><h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2></header>' ); ?>

		<?php orvis_entry_meta(); ?>
	</div><!-- .project-info -->
</article><!-- #post-## -->