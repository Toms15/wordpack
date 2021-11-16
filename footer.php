<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPack
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-12">
					<div class="site-info">
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'An happy artwork by %2$s.', 'wordpack' ), 'wordpack', '<a href="https://widerview.it/" target="_blank" rel="nofollow">Wider View</a>' );
						?>
					</div><!-- .site-info -->					
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
