<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer container" role="contentinfo">
		<div class="site-info row">
			<div class="col-md-10 col-md-offset 1">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'understrap' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'understrap' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<a href="http://laneyachtmanagementgroup.com/">Lane Yacht Management Theme</a> by <a href="http://www.whalingcityweb.com">Whaling City Web</a>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
