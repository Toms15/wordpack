<?php
/**
 * Custom Functions for disabling some WordPress' functions
 *
 * @package WordPack
 */

/**
 * Disable the emoji's
 */
function wordpack_disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    // add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
}
add_action('init', 'wordpack_disable_emojis');

/**
 * Disable wp-embed.min.js
 */
function wordpack_deregister_scripts(){
  wp_dequeue_script( 'wp-embed' );
 }
add_action( 'wp_footer', 'wordpack_deregister_scripts' );

// Remove Gutenberg Block Library CSS from loading on the frontend
function wordpack_remove_wp_block_library_css(){
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'wordpack_remove_wp_block_library_css', 100 );

/**
 * Remove lazy load from first image
 */
function wordpack_remove_lazy_load_from_first_image($content){
    if ( is_single() || is_page() || is_front_page() || is_home() ) {
        $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
        $document = new DOMDocument();
        libxml_use_internal_errors(true);
        $document->loadHTML(utf8_decode($content));
        $imgs = $document->getElementsByTagName('img');
        $img = $imgs[0];
        if ($imgs[0] == 1) { // Check if the post has images first
            $img->removeAttribute( 'loading' );
            $html = $document->saveHTML();
            return $html;
        }
        else {
            return $content;
        }
     }
     else {
        return $content;
     }
}
add_filter ('the_content', 'wordpack_remove_lazy_load_from_first_image');