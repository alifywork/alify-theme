<?php
/**
 * Editor configuration: Gutenberg (block editor) disabled site-wide.
 *
 * The site uses the Classic Editor plus ACF Pro for page sections/fields —
 * no block editor, no page builders.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_disable_block_editor' ) ) {
	/**
	 * Force the Classic Editor for every post type.
	 *
	 * @param bool   $use_block_editor Whether to load the block editor.
	 * @param string $post_type        Post type name.
	 * @return bool Always false.
	 */
	function alify_disable_block_editor( $use_block_editor, $post_type ) {
		return false;
	}
}
add_filter( 'use_block_editor_for_post_type', 'alify_disable_block_editor', 10, 2 );

if ( ! function_exists( 'alify_disable_block_editor_for_post' ) ) {
	/**
	 * Belt-and-suspenders: per-post override of the block editor.
	 *
	 * @param bool    $use_block_editor Whether to load the block editor.
	 * @param WP_Post $post             Post object.
	 * @return bool Always false.
	 */
	function alify_disable_block_editor_for_post( $use_block_editor, $post ) {
		return false;
	}
}
add_filter( 'use_block_editor_for_post', 'alify_disable_block_editor_for_post', 10, 2 );

if ( ! function_exists( 'alify_disable_block_widgets' ) ) {
	/**
	 * Force the Classic (non-Gutenberg) widgets screen.
	 *
	 * @param bool $use Whether to use the block-based widgets screen.
	 * @return bool Always false.
	 */
	function alify_disable_block_widgets( $use ) {
		return false;
	}
}
add_filter( 'use_widgets_block_editor', 'alify_disable_block_widgets' );

/*
 * Note: the REST API stays enabled (ACF Pro and custom tooling rely on it) —
 * only the editors are classic.
 */
