<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Button
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="site-info">
	<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'button' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'button' ), 'WordPress' ); ?></a>
	<span class="sep"> &middot; </span>
	<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'button' ), 'Button', '<a href="http://wordpress.com/themes/" rel="designer">Automattic</a>' ); ?>
</div><!-- .site-info -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
