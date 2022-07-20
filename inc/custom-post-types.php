<?php
/**
 * Sample implementation of the Custom Post Type
 *
 * @package WordPack
 */

function jobs_position () {
    $labels = [
        'name' => __('Posizioni aperte', 'Post Type General Name', 'wordpack'),
        'singular_name' => __('Posizione aperta', 'Post Type Singular Name', 'wordpack'),
        'menu_name' => __('Posizioni aperte', 'wordpack'),
        'search_items' => __('Cerca posizioni aperte', 'wordpack'),
        'edit_item' => __('Modifica posizione aperta', 'wordpack'),
    ];
    $args = [
        'label' => __('Posizioni aperte', 'wordpack'),
        'description' => __('Posizioni aperte di Mister Smart Innovation', 'wordpack'),
        'labels' => $labels,
        'supports' => ['title', 'editor'],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => null,
        'menu_icon' => 'dashicons-groups',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => false,
        'show_in_rest' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'capability_type' => 'post',
        'rewrite' => [ 'slug' => 'jobs' ]
    ];
    register_post_type('job', $args);
}

add_action('init', 'jobs_position');