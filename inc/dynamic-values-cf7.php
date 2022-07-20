<?php
/**
 * Sample implementation Dynamic field value for CF7 by Custom Post Type
 *
 * @package WordPack
 */

function dynamic_jobs_for_cf7 ( $tag, $unused ) {
    if ( $tag['name'] != 'jobs' )
        return $tag;
    
    $args = array (
        'numberposts'   => -1,
        'post_type'     => 'job',
        'orderby'       => 'title',
        'order'         => 'ASC',
        'lang'          => ''
    );
    $custom_posts = get_posts($args);

    if ( ! $custom_posts )
        return $tag;

    foreach ( $custom_posts as $custom_post ) {
        $tag['raw_values'][] = $custom_post->post_title;
        $tag['values'][] = $custom_post->post_title;
        $tag['labels'][] = $custom_post->post_title;
    }
    return $tag;
}

add_filter( 'wpcf7_form_tag', 'dynamic_jobs_for_cf7', 10, 2);