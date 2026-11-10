<?php
/**
 * Navigation menu locations.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_menus' ) ) {
	/**
	 * Register navigation menu locations.
	 */
	function alify_menus() {
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'alify' ),
				'mobile'  => esc_html__( 'Mobile Menu', 'alify' ),
				'footer'  => esc_html__( 'Footer Menu', 'alify' ),
				'social'  => esc_html__( 'Social Links Menu', 'alify' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'alify_menus' );
