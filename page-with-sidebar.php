<?php
/**
 * Template name: Pagina con Sidebar
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPack
 */

get_header();
?>

	<main id="primary" class="site-main">

		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-8 col-12">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'page' );
					endwhile; // End of the loop.
					?>
				</div>
				<div class="col-lg-3 col-md-4 col-12">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
