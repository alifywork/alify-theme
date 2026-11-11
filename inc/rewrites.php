<?php
/**
 * Permalinks: rewrite rule flushing.
 *
 * Rewrite rules are stored in the database and must be re-flushed whenever
 * CPT/taxonomy slugs change, or URLs will 404.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_flush_rewrites' ) ) {
	/**
	 * Flush rewrite rules and remember the flushed theme version.
	 */
	function alify_flush_rewrites() {
		flush_rewrite_rules( false );
		update_option( 'alify_rewrite_version', ALIFY_VERSION );
	}
}
add_action( 'after_switch_theme', 'alify_flush_rewrites' );

if ( ! function_exists( 'alify_maybe_flush_rewrites' ) ) {
	/**
	 * One-time flush after a theme update that changed URL structures.
	 */
	function alify_maybe_flush_rewrites() {
		if ( is_admin() && ALIFY_VERSION !== get_option( 'alify_rewrite_version' ) ) {
			alify_flush_rewrites();
		}
	}
}
add_action( 'admin_init', 'alify_maybe_flush_rewrites' );
