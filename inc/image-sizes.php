<?php
/**
 * Custom image sizes.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_image_sizes' ) ) {
	/**
	 * Register custom image sizes.
	 */
	function alify_image_sizes() {
		// Large featured image on single posts/pages.
		add_image_size( 'alify-featured', 1200, 675, true );

		// Card thumbnail for archive/search listings.
		add_image_size( 'alify-card', 640, 480, true );

		// Small square thumbnail.
		add_image_size( 'alify-thumbnail', 150, 150, true );
	}
}
add_action( 'after_setup_theme', 'alify_image_sizes' );
