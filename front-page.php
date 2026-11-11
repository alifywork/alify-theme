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
wp_enqueue_style( 'alify-home-work', ALIFY_URI . '/assets/css/sections/home/work.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-home-process', ALIFY_URI . '/assets/css/sections/home/process.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-home-case', ALIFY_URI . '/assets/css/sections/home/case-studies.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-home-industries', ALIFY_URI . '/assets/css/sections/home/industries.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-home-testimonials', ALIFY_URI . '/assets/css/sections/home/testimonials.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-home-pricing', ALIFY_URI . '/assets/css/sections/home/pricing.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-home-faq', ALIFY_URI . '/assets/css/sections/home/faq.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-home-contact-cta', ALIFY_URI . '/assets/css/sections/home/contact-cta.css', array( 'alify-style' ), ALIFY_VERSION );

wp_enqueue_script( 'alify-home-hero', ALIFY_URI . '/assets/js/sections/home/hero.js', array( 'alify-main', 'gsap-splittext' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-home-stats', ALIFY_URI . '/assets/js/sections/home/stats.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-home-services', ALIFY_URI . '/assets/js/sections/home/services.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-home-work', ALIFY_URI . '/assets/js/sections/home/work.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-home-process', ALIFY_URI . '/assets/js/sections/home/process.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-home-case', ALIFY_URI . '/assets/js/sections/home/case-studies.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-home-industries', ALIFY_URI . '/assets/js/sections/home/industries.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-home-testimonials', ALIFY_URI . '/assets/js/sections/home/testimonials.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-home-pricing', ALIFY_URI . '/assets/js/sections/home/pricing.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-home-faq', ALIFY_URI . '/assets/js/sections/home/faq.js', array( 'alify-main' ), ALIFY_VERSION, true );

get_header();
?>

<main id="primary" class="site-main alify-home">

	<?php get_template_part( 'template-parts/home/hero' ); ?>
	<?php get_template_part( 'template-parts/home/stats' ); ?>
	<?php get_template_part( 'template-parts/home/services' ); ?>
	<?php get_template_part( 'template-parts/home/work' ); ?>
	<?php get_template_part( 'template-parts/home/process' ); ?>
	<?php get_template_part( 'template-parts/home/case-studies' ); ?>
	<?php get_template_part( 'template-parts/home/industries' ); ?>
	<?php get_template_part( 'template-parts/home/testimonials' ); ?>
	<?php get_template_part( 'template-parts/home/pricing' ); ?>
	<?php get_template_part( 'template-parts/home/faq' ); ?>
	<?php get_template_part( 'template-parts/home/contact-cta' ); ?>

</main>

<?php
get_footer();
