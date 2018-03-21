<?php
/*
Plugin Name: sync-users
Plugin URI: https://xcesiv.io/sync-users/
Description: sync users and meta
Author: xcesiv
Version: 1.0
Author URI: https://xcesiv.io/sync-users/
*/

function sync_users( $user_id, $role ) {
	// Site 1
	// Change value if needed
  $prefix_1 = 'wp_24tuzm_';

	// Site 2 prefix
	// Change value if needed
	$prefix_2 = 'wp_hxrd_';

	$caps = get_user_meta( $user_id, $prefix_1 . 'capabilities', true );
	$level = get_user_meta( $user_id, $prefix_1 . 'user_level', true );
	if ( $caps ){
		update_user_meta( $user_id, $prefix_2 . 'capabilities', $caps );
	}
	if ( $level ){
		update_user_meta( $user_id, $prefix_2 . 'user_level', $level );
	}
}
add_action( 'set_user_role', 'sync_users', 10, 2 );
