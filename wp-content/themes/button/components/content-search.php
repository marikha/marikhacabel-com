<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Button
 */

$format = get_post_format();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( 'gallery' == $format ) : ?>
			<div class="featured-image">
				<span class="corners">
					<?php button_gallery_slideshow(); ?>
					<a class="shadow" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><span class="screen-reader-text"><?php the_title(); ?></span></a>
				</span>
			</div>
		<?php elseif ( has_post_thumbnail() ) : ?>
			<div class="featured-image">
				<span class="corners">
					<?php the_post_thumbnail( 'button-featured' ); ?>
				</span>
				<a class="shadow" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><span class="screen-reader-text"><?php the_title(); ?></span></a>
			</div>
		<?php endif; ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<?php button_entry_cats(); ?>
		<?php endif; ?>

		<?php if ( 'link' == $format ) : ?>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s">', esc_url( button_get_link_url() ) ), '</a></h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php endif; ?>

		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php button_posted_on(); ?>
			</div>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php if ( function_exists( 'button_post_flair' ) ) : ?>
		<div class="entry-flair">
			<?php button_post_flair(); ?>
		</div><!-- .entry-flair -->
	<?php endif; ?>

</article><!-- #post-## -->


