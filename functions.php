<?php
/**
 * ALIFY theme functions and definitions.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme constants.
 */
define( 'ALIFY_VERSION', '1.0.0' );
define( 'ALIFY_DIR', get_template_directory() );
define( 'ALIFY_URI', get_template_directory_uri() );

if ( ! function_exists( 'alify_setup' ) ) {
	/**
	 * Theme supports and navigation menus.
	 */
	function alify_setup() {
		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

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

		// Navigation menu locations.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'alify' ),
				'footer'  => esc_html__( 'Footer Menu', 'alify' ),
			)
		);

		// Max content width in pixels.
		if ( ! isset( $GLOBALS['content_width'] ) ) {
			$GLOBALS['content_width'] = 1200;
		}
	}
}
add_action( 'after_setup_theme', 'alify_setup' );

if ( ! function_exists( 'alify_assets' ) ) {
	/**
	 * Enqueue theme styles and scripts.
	 */
	function alify_assets() {
		// Styles.
		wp_enqueue_style( 'bootstrap', ALIFY_URI . '/assets/bootstrap/css/bootstrap.min.css', array(), ALIFY_VERSION );
		wp_enqueue_style( 'fontawesome', ALIFY_URI . '/assets/icons/css/all.min.css', array(), ALIFY_VERSION );
		wp_enqueue_style( 'alify-style', ALIFY_URI . '/assets/css/style.css', array( 'bootstrap', 'fontawesome' ), ALIFY_VERSION );

		// Scripts (loaded in the footer).
		wp_enqueue_script( 'bootstrap-bundle', ALIFY_URI . '/assets/bootstrap/js/bootstrap.bundle.min.js', array(), ALIFY_VERSION, true );
		wp_enqueue_script( 'gsap', ALIFY_URI . '/assets/gsap/gsap.min.js', array(), ALIFY_VERSION, true );
		wp_enqueue_script( 'gsap-scrolltrigger', ALIFY_URI . '/assets/gsap/ScrollTrigger.min.js', array( 'gsap' ), ALIFY_VERSION, true );

		// More GSAP plugins (Draggable, Flip, SplitText, ScrollSmoother, ...)
		// can be enqueued here as the frontend needs them.

		wp_enqueue_script( 'alify-main', ALIFY_URI . '/assets/js/main.js', array( 'gsap', 'gsap-scrolltrigger', 'bootstrap-bundle' ), ALIFY_VERSION, true );
	}
}
add_action( 'wp_enqueue_scripts', 'alify_assets' );
