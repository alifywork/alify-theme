<?php
/**
 * Front page (Home): loads the home sections one by one.
 * Each section lives in template-parts/home/ with its own CSS/JS files.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

// Home section assets (before get_header() so styles print in the head).
wp_enqueue_style( 'alify-home-hero', ALIFY_URI . '/assets/css/sections/home/hero.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-home-stats', ALIFY_URI . '/assets/css/sections/home/stats.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-home-services', ALIFY_URI . '/assets/css/sections/home/services.css', array( 'alify-style' ), ALIFY_VERSION );

wp_enqueue_script( 'alify-home-hero', ALIFY_URI . '/assets/js/sections/home/hero.js', array( 'alify-main', 'gsap-splittext' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-home-stats', ALIFY_URI . '/assets/js/sections/home/stats.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-home-services', ALIFY_URI . '/assets/js/sections/home/services.js', array( 'alify-main' ), ALIFY_VERSION, true );

get_header();
?>

<main id="primary" class="site-main alify-home">

	<?php get_template_part( 'template-parts/home/hero' ); ?>
	<?php get_template_part( 'template-parts/home/stats' ); ?>
	<?php get_template_part( 'template-parts/home/services' ); ?>

	<?php // Remaining home sections (work, process, case studies, industries, testimonials, pricing, FAQ, contact CTA) follow next. ?>

</main>

<?php
get_footer();
