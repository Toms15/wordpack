<?php
/**
 * Custom Functions for WordPress' editor
 *
 * @package WordPack
 */

/**
 * Adding custom colors in editor
 */
function wordpack_mce_options($init) {
    $custom_colours = '
        "000000", "Black",
        "FFFFFF", "White"
    ';
    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$custom_colours.']';
    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 2;
    return $init;
}
add_filter('tiny_mce_before_init', 'wordpack_mce_options');

/** 
 * Excerpt function
 */
function wordpack_excerpt($num)
{
  global $post;
  $limit = $num + 1;
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  array_pop($excerpt);
  $excerpt = implode(" ", $excerpt) . "...";
  echo $excerpt;
}
function wordpack_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wordpack_excerpt_length', 999 );
function wordpack_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'wordpack_excerpt_more');