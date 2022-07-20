<?php
/**
 * Sample implementation of the Custom Post Type
 *
 * @package WordPack
 */

function offices_taxonomy () {
    $labels = array(
        'name' => _x('Sedi', 'Taxonomy General Name', 'wordpack'),
        'singular_name' => _x('Sede', 'Taxonomy Singular Name', 'wordpack'),
        'add_new_item' => __('Aggiungi nuova sede', 'wordpack')
    );
    $args = [
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'publicly_queryable' => true,
        'rewrite' => ['slug' => 'office-destination'],
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
        'show_in_rest' => true,
        'show_tagcloud' => false,
        'show_in_quick_edit' => true,
    ];
    register_taxonomy('office-destination', 'job', $args);
}

add_action('init', 'offices_taxonomy');