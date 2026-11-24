<?php
/**
 * Shared request guard for TngApi's form handlers (processfamily-*.php,
 * processupload.php). These scripts are loaded directly by URL, so they must
 * check for themselves that the request is a POST from a logged-in user that
 * came from this site's own form (nonce) before touching the database or disk.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function upavadi_tngapi_guard_request( $action ) {
	if ( 'POST' !== ( isset( $_SERVER['REQUEST_METHOD'] ) ? $_SERVER['REQUEST_METHOD'] : '' ) ) {
		status_header( 405 );
		exit( 'Method not allowed.' );
	}
	if ( ! is_user_logged_in() ) {
		status_header( 403 );
		exit( 'Please log in to submit changes.' );
	}
	$nonce = isset( $_POST['_tngapi_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_tngapi_nonce'] ) ) : '';
	if ( ! wp_verify_nonce( $nonce, $action ) ) {
		status_header( 403 );
		exit( 'Your session has expired. Please reload the page and try again.' );
	}
}
