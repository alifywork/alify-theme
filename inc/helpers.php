<?php
/**
 * Generic helper functions.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_get_thank_you_url' ) ) {
	/**
	 * URL of the Thank You page. Form submissions redirect here.
	 *
	 * Looks up the published page with the slug "thank-you"; falls back to
	 * /thank-you/ if the page has not been created yet.
	 *
	 * @return string Thank You page URL.
	 */
	function alify_get_thank_you_url() {
		$page = get_page_by_path( 'thank-you', OBJECT, 'page' );

		if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
			return (string) get_permalink( $page );
		}

		return home_url( '/thank-you/' );
	}
}
