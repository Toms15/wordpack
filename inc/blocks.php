<?php
/**
 * Custom Functions for displaying Blocks
 *
 * @package WordPack
 */

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
	if( 'page' === $editor_context->post->post_type ) {
		$allowed_blocks[] = 'core/shortcode';
	}
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