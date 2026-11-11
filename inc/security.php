<?php
/**
 * Security hardening.
 *
 * Every rule here reduces the attack surface of the theme/site.
 * New hardening rules must be added here — never in other files.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

/**
 * 1. Stop echoing the WordPress version in <head> (fingerprinting protection).
 */
remove_action( 'wp_head', 'wp_generator' );

/**
 * 2. Remove unused discovery/manifest links from <head>.
 */
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );

/**
 * 3. Disallow the plugin/theme file editor in wp-admin
 *    (only if the site has not already defined it in wp-config.php).
 */
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
}

/**
 * 4. Disable XML-RPC (common brute-force / DDoS attack surface).
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

if ( ! function_exists( 'alify_disable_xmlrpc_methods' ) ) {
	/**
	 * Hard-block XML-RPC methods even if another plugin re-enables the endpoint.
	 *
	 * @param array $methods Registered XML-RPC methods.
	 * @return array Empty array of methods.
	 */
	function alify_disable_xmlrpc_methods( $methods ) {
		return array();
	}
}
add_filter( 'xmlrpc_methods', 'alify_disable_xmlrpc_methods' );

if ( ! function_exists( 'alify_restrict_rest_user_enumeration' ) ) {
	/**
	 * Block unauthenticated user enumeration via the REST API.
	 * Logged-in users keep full access (the block editor needs it).
	 *
	 * @param array $endpoints Registered REST API routes.
	 * @return array Filtered routes.
	 */
	function alify_restrict_rest_user_enumeration( $endpoints ) {
		if ( ! is_user_logged_in() && isset( $endpoints['/wp/v2/users'] ) ) {
			unset( $endpoints['/wp/v2/users'] );
		}

		return $endpoints;
	}
}
add_filter( 'rest_endpoints', 'alify_restrict_rest_user_enumeration' );

if ( ! function_exists( 'alify_security_headers' ) ) {
	/**
	 * Send basic security headers (harmless duplicates if the server already sends them).
	 */
	function alify_security_headers() {
		if ( ! headers_sent() ) {
			header( 'X-Content-Type-Options: nosniff' );
			header( 'Referrer-Policy: strict-origin-when-cross-origin' );
			header( 'X-Frame-Options: SAMEORIGIN' );
		}
	}
}
add_action( 'send_headers', 'alify_security_headers' );

/**
 * Rules for all future code in this theme:
 * - Output: always escape (esc_html, esc_attr, esc_url, wp_kses_post).
 * - Input: always sanitize (sanitize_text_field, absint, wp_unslash first).
 * - Forms / admin actions: always nonce + current_user_can() checks.
 * - Database: always $wpdb->prepare() — never raw SQL.
 */
