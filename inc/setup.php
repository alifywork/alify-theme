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

		// Wide and full-width block alignment.
		add_theme_support( 'align-wide' );

		// Responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Block editor extras: front-end block styles.
		add_theme_support( 'wp-block-styles' );

		// Load the theme stylesheet into the block editor.
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/style.css' );

		// Live-preview widgets in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Block-based widgets.
		add_theme_support( 'widgets-block-editor' );

		// Max content width in pixels.
		if ( ! isset( $GLOBALS['content_width'] ) ) {
			$GLOBALS['content_width'] = 1200;
		}
	}
}
add_action( 'after_setup_theme', 'alify_setup' );
