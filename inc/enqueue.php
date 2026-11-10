<?php
/**
 * Styles and scripts.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

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
