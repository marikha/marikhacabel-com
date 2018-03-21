<?php
/**
 * @package Scrawl
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( 'link' == get_post_format() ) : ?>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( scrawl_get_link_url() ) ), '</a></h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'scrawl' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'scrawl' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>
	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta clear">
			<?php scrawl_posted_on(); ?>
			<span class="secondary-entry-meta">
				<?php if ( is_sticky() ) : ?>
					<span class="entry-format"><a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'Featured', 'scrawl' ); ?>"><span class="screen-reader-text"><?php esc_attr_e( 'Featured', 'scrawl' ); ?></span></a></span>
				<?php else : ?>
					<?php scrawl_post_format(); ?>
				<?php endif; ?>
				<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
					echo '<span class="comments-link">';
					comments_popup_link( __( '0', 'scrawl' ), __( '1', 'scrawl' ), __( '%', 'scrawl' ) );
					echo '</span>';
				} ?>
				<?php edit_post_link( '<span class="screen-reader-text" title="' . __( 'Edit', 'scrawl' ) . '">' . __( 'Edit', 'scrawl' ) . '</span>', '<span class="edit-link">', '</span>' ); ?>
			</span>
		</div><!-- .entry-meta -->
	<?php endif; ?>
</article><!-- #post-## -->
