<?php
	if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) die();

	delete_option( 'spyi_installed' );
	delete_option( 'spyi_activated' );

	global $wpdb;
	$wpdbobj = clone $wpdb;
	
	// Remove spyi_site_status + spyi_last_run
	// Remove spyi_yt_playlist_id

	$wpdbobj->query( "
		DELETE FROM {$wpdbobj->options}
			WHERE option_name = 'spyi_site_status' OR option_name = 'spyi_last_run'
			OR option_name = 'spyi_yt_playlist_id'
			" );
?>