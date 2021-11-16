<?php
/**
 * Template name: Homepage
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
                <div class="col-lg-12 col-md-12 col-12">
                    <img src="<?php echo get_template_directory_uri() . '/images/1080x540.webp'?>" alt="Example WebP image">
                    <h1 class="title"><?php printf( esc_html__( 'Title Here', 'wordpack' ) ); ?></h1>
                    <h2 class="subtitle"><?php printf( esc_html__( 'Subtitle Here', 'wordpack' ) ); ?></h2>
                </div>
            </div>
        </div>

	</main><!-- #main -->

<?php
get_footer();
