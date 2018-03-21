<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Orvis
 */

if ( ! function_exists( 'orvis_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories.
 */
function orvis_entry_meta() {
	// Display category text for posts.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'orvis' ) );
		if ( $categories_list && orvis_categorized_blog() ) {
			echo '<div class="entry-meta"><span class="cat-links">' . $categories_list . '</span></div>'; // WPCS: XSS OK.
		}
	}

	// Display type text for projects.
	if ( 'jetpack-portfolio' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_term_list( get_the_ID(), 'jetpack-portfolio-type', '', esc_html__( ', ', 'orvis' ) );
		if ( $categories_list ) {
			echo '<div class="entry-meta"><span class="cat-links">' . $categories_list . '</span></div>'; // WPCS: XSS OK.
		}
	}
}
endif;

if ( ! function_exists( 'orvis_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the tags, comments, the current post-date/time and author.
 */
function orvis_entry_footer() {
	// Display current post-date/time, author and tag text for posts.
	if ( 'post' === get_post_type() ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>', esc_url( get_permalink() ), $time_string );

		if ( is_sticky() && ! is_single() ) {
			$posted_on = sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>', esc_url( get_permalink() ), esc_html__( 'Featured Post', 'orvis' ) );
		}

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

		$byline = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) );

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'orvis' ) );
		if ( $tags_list ) {
			echo '<span class="tags-links">' . $tags_list . '</span>'; // WPCS: XSS OK.
		}
	}

	// Display tag text for projects.
	if ( 'jetpack-portfolio' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_term_list( get_the_ID(), 'jetpack-portfolio-tag', '', esc_html__( ', ', 'orvis' ) );
		if ( $tags_list ) {
			echo '<span class="tags-links">' . $tags_list . '</span>'; // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'orvis' ), esc_html__( '1 Comment', 'orvis' ), esc_html__( '% Comments', 'orvis' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'orvis' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function orvis_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'orvis_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'orvis_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so orvis_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so orvis_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in orvis_categorized_blog.
 */
function orvis_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'orvis_categories' );
}
add_action( 'edit_category', 'orvis_category_transient_flusher' );
add_action( 'save_post',     'orvis_category_transient_flusher' );

if ( ! function_exists( 'orvis_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function orvis_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}
	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>

	<?php endif; // End is_singular()
}
endif;
