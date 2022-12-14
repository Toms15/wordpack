<?php
/**
 * Custom Functions for displaying admin notices into WordPress
 *
 * @package WordPack
 */

/**
 * Show Documentation Notice
 */
function wordpack_admin_notice_training() {
	$user = wp_get_current_user();
	echo
		'<div class="notice notice-info is-dismissible">
			<p><strong>Documentazione sito web</strong></p>
	    	<p>Visualizza la <a href="/documentation" target="_blank">documentazione completa</a> per gestire i contenuti del sito web.</p>
	    </div>';
}
add_action( 'admin_notices', 'wordpack_admin_notice_training' );

/*
 * Show Duplicate Post Types Notice
 */
add_action( 'admin_notices', 'wordpack_duplication_admin_notice' );
function wordpack_duplication_admin_notice() {
	// Get the current screen
	$screen = get_current_screen();
	if ( 'edit' !== $screen->base ) {
		return;
	}
    //Checks if settings updated
    if ( isset( $_GET[ 'saved' ] ) && 'post_duplication_created' == $_GET[ 'saved' ] ) {
		echo '<div class="notice notice-success is-dismissible"><p>Post type duplicato correttamente.</p></div>';
    }
}