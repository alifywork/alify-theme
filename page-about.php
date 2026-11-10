<?php
/**
 * About page template (auto-applies to the "about" page).
 * Sections: shared hero -> story -> values -> timeline -> team -> quote CTA.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

// Section assets (before get_header() so styles print in the head).
wp_enqueue_style( 'alify-page-hero', ALIFY_URI . '/assets/css/sections/page-hero.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-about-story', ALIFY_URI . '/assets/css/sections/about/story.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-about-values', ALIFY_URI . '/assets/css/sections/about/values.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-about-timeline', ALIFY_URI . '/assets/css/sections/about/timeline.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-about-team', ALIFY_URI . '/assets/css/sections/about/team.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-home-contact-cta', ALIFY_URI . '/assets/css/sections/home/contact-cta.css', array( 'alify-style' ), ALIFY_VERSION );

wp_enqueue_script( 'alify-page-hero', ALIFY_URI . '/assets/js/sections/page-hero.js', array( 'alify-main', 'gsap-splittext' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-about-story', ALIFY_URI . '/assets/js/sections/about/story.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-about-values', ALIFY_URI . '/assets/js/sections/about/values.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-about-timeline', ALIFY_URI . '/assets/js/sections/about/timeline.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-about-team', ALIFY_URI . '/assets/js/sections/about/team.js', array( 'alify-main' ), ALIFY_VERSION, true );

get_header();
?>

<main id="primary" class="site-main alify-about">

	<?php
	get_template_part(
		'template-parts/page-hero',
		null,
		array(
			'title'    => alify_field( 'about_hero_title', __( 'We Are ALIFY — Your Global Growth Partner', 'alify' ) ),
			'subtitle' => alify_field( 'about_hero_sub', __( 'A worldwide team of designers, developers, marketers and automation experts building digital experiences that move businesses forward.', 'alify' ) ),
			'image'    => ALIFY_URI . '/assets/images/neonline/neonline-02.webp',
		)
	);
	?>

	<?php get_template_part( 'template-parts/about/story' ); ?>
	<?php get_template_part( 'template-parts/about/values' ); ?>
	<?php get_template_part( 'template-parts/about/timeline' ); ?>
	<?php get_template_part( 'template-parts/about/team' ); ?>
	<?php get_template_part( 'template-parts/home/contact-cta' ); ?>

</main>

<?php
get_footer();
