<?php
/**
 * Theme setup: supports and content width.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_setup' ) ) {
	/**
	 * Register theme supports.
	 */
	function alify_setup() {
		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// RSS feed links in <head>.
		add_theme_support( 'automatic-feed-links' );

		// Featured images.
		add_theme_support( 'post-thumbnails' );

		// Custom logo (matches the sizes in assets/images/logo/).
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 125,
				'width'       => 469,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		// HTML5 markup for forms, comments, galleries and scripts.
		add_theme_support(
			'html5',
			array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
		);

		// Responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Style the Classic Editor content (Gutenberg is disabled — inc/editor.php).
		add_editor_style( 'assets/css/style.css' );

		// Live-preview widgets in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Max content width in pixels.
		if ( ! isset( $GLOBALS['content_width'] ) ) {
			$GLOBALS['content_width'] = 1200;
		}
	}
}
add_action( 'after_setup_theme', 'alify_setup' );
