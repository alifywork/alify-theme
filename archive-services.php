<?php
/**
 * Services archive (/services/).
 * Sections: hero -> services grid -> process -> stats -> quick quote CTA.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

// Section assets (before get_header() so styles print in the head).
wp_enqueue_style( 'alify-page-hero', ALIFY_URI . '/assets/css/sections/page-hero.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-services-grid', ALIFY_URI . '/assets/css/sections/services-grid.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-home-process', ALIFY_URI . '/assets/css/sections/home/process.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-home-stats', ALIFY_URI . '/assets/css/sections/home/stats.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-home-contact-cta', ALIFY_URI . '/assets/css/sections/home/contact-cta.css', array( 'alify-style' ), ALIFY_VERSION );

wp_enqueue_script( 'alify-page-hero', ALIFY_URI . '/assets/js/sections/page-hero.js', array( 'alify-main', 'gsap-splittext' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-services-grid', ALIFY_URI . '/assets/js/sections/services-grid.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-home-process', ALIFY_URI . '/assets/js/sections/home/process.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-home-stats', ALIFY_URI . '/assets/js/sections/home/stats.js', array( 'alify-main' ), ALIFY_VERSION, true );

get_header();
?>

<main id="primary" class="site-main alify-services-page">

	<?php
	get_template_part(
		'template-parts/page-hero',
		null,
		array(
			'title'    => alify_field( 'services_hero_title', __( 'Services That Power Your Growth', 'alify' ), 'option' ),
			'subtitle' => alify_field( 'services_hero_sub', __( 'From web development to AI automation — everything your business needs to build, launch and scale, delivered by one global team.', 'alify' ), 'option' ),
			'image'    => ALIFY_URI . '/assets/images/neonline/neonline-04.webp',
		)
	);
	?>

	<?php get_template_part( 'template-parts/services-grid' ); ?>
	<?php get_template_part( 'template-parts/home/process' ); ?>
	<?php get_template_part( 'template-parts/home/stats' ); ?>
	<?php get_template_part( 'template-parts/home/contact-cta' ); ?>

</main>

<?php
get_footer();
