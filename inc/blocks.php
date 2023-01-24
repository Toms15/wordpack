<?php
/**
 * Custom Functions for displaying Blocks
 *
 * @package WordPack
 */

/**
 * Enqueue Bootstrap style in WP Backend.
 */
function wordpack_add_bootstrap_css_for_blocks() {
    add_theme_support('editor-styles');
    add_editor_style([
        'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css',
        'style.css'
    ]);
}
add_action('after_setup_theme', 'wordpack_add_bootstrap_css_for_blocks');

/**
 * Allowed Blocks types
 */
function wordpack_allowed_block_types( $allowed_blocks, $editor_context ) {
	$allowed_blocks = array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/list-item',
		'acf/team',
		'acf/testimonial'
	);
	/* Check Post Types */
	// if( 'page' === $editor_context->post->post_type ) {}
	/* Check Page Template */
	// if( get_page_template_slug( $editor_context->post ) === 'home.php' ) {
		// $allowed_blocks[] = 'core/shortcode';
	// }
	return $allowed_blocks;
}
add_filter( 'allowed_block_types_all', 'wordpack_allowed_block_types', 25, 2 );

/**
 * Add custom Blocks categories
 */
function wordpack_custom_blocks_categories( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'example',
				'title' => 'Example',
			),
		)
	);
}
add_filter( 'block_categories_all', 'wordpack_custom_blocks_categories', 10, 2);

/**
 * Add registration ACF Blocks
 */
function wordpack_register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/testimonial' );
}
add_action( 'init', 'wordpack_register_acf_blocks' );