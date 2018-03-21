<?php
/**
 * Template part for displaying posts.
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

	<?php if ( 'aside' == $format || 'link' == $format || 'quote' == $format || 'video' == $format ) : ?>
		<div class="entry-content">
			<?php the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'button' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) ); ?>
		</div><!-- .entry-content -->
	<?php else : ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<?php if ( function_exists( 'button_post_flair' ) ) : ?>
			<div class="entry-flair">
				<?php button_post_flair(); ?>
			</div><!-- .entry-flair -->
		<?php endif; ?>
	<?php endif; ?>

	<footer class="entry-footer">
		<?php button_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
