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
		wp_enqueue_style( 'alify-variables', ALIFY_URI . '/assets/css/variable.css', array(), ALIFY_VERSION );
		wp_enqueue_style( 'alify-fonts', ALIFY_URI . '/assets/css/font.css', array( 'alify-variables' ), ALIFY_VERSION );
		wp_enqueue_style( 'bootstrap', ALIFY_URI . '/assets/bootstrap/css/bootstrap.min.css', array( 'alify-fonts' ), ALIFY_VERSION );
		wp_enqueue_style( 'fontawesome', ALIFY_URI . '/assets/icons/css/all.min.css', array(), ALIFY_VERSION );
		wp_enqueue_style( 'alify-utility', ALIFY_URI . '/assets/css/utility.css', array( 'alify-variables', 'alify-fonts' ), ALIFY_VERSION );
		wp_enqueue_style( 'alify-style', ALIFY_URI . '/assets/css/style.css', array( 'bootstrap', 'fontawesome', 'alify-utility' ), ALIFY_VERSION );
		wp_enqueue_style( 'alify-header', ALIFY_URI . '/assets/css/sections/header.css', array( 'alify-style' ), ALIFY_VERSION );
		wp_enqueue_style( 'alify-footer', ALIFY_URI . '/assets/css/sections/footer.css', array( 'alify-style' ), ALIFY_VERSION );

		// Scripts (loaded in the footer).
		wp_enqueue_script( 'bootstrap-bundle', ALIFY_URI . '/assets/bootstrap/js/bootstrap.bundle.min.js', array(), ALIFY_VERSION, true );
		wp_enqueue_script( 'gsap', ALIFY_URI . '/assets/gsap/gsap.min.js', array(), ALIFY_VERSION, true );
		wp_enqueue_script( 'gsap-scrolltrigger', ALIFY_URI . '/assets/gsap/ScrollTrigger.min.js', array( 'gsap' ), ALIFY_VERSION, true );
		wp_enqueue_script( 'gsap-scrollsmoother', ALIFY_URI . '/assets/gsap/ScrollSmoother.min.js', array( 'gsap', 'gsap-scrolltrigger' ), ALIFY_VERSION, true );
		wp_enqueue_script( 'gsap-splittext', ALIFY_URI . '/assets/gsap/SplitText.min.js', array( 'gsap' ), ALIFY_VERSION, true );

		wp_enqueue_script( 'alify-main', ALIFY_URI . '/assets/js/main.js', array( 'gsap', 'gsap-scrolltrigger', 'gsap-scrollsmoother', 'gsap-splittext', 'bootstrap-bundle' ), ALIFY_VERSION, true );
		wp_enqueue_script( 'alify-header-js', ALIFY_URI . '/assets/js/sections/header.js', array( 'alify-main' ), ALIFY_VERSION, true );
	}
}
add_action( 'wp_enqueue_scripts', 'alify_assets' );
