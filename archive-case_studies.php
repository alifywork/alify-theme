<?php
/**
 * Case Studies archive (/case-studies/).
 * Sections: hero -> case cards with stat badges -> CTA band.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

// Section assets (before get_header() so styles print in the head).
wp_enqueue_style( 'alify-page-hero', ALIFY_URI . '/assets/css/sections/page-hero.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-cases-grid', ALIFY_URI . '/assets/css/sections/cases-grid.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-cta-band', ALIFY_URI . '/assets/css/sections/cta-band.css', array( 'alify-style' ), ALIFY_VERSION );

wp_enqueue_script( 'alify-page-hero', ALIFY_URI . '/assets/js/sections/page-hero.js', array( 'alify-main', 'gsap-splittext' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-cases-grid', ALIFY_URI . '/assets/js/sections/cases-grid.js', array( 'alify-main' ), ALIFY_VERSION, true );

get_header();
?>

<main id="primary" class="site-main alify-cases-page">

	<?php
	get_template_part(
		'template-parts/page-hero',
		null,
		array(
			'title'    => alify_field( 'cases_hero_title', __( 'Success Stories, Backed By Data', 'alify' ) ),
			'subtitle' => alify_field( 'cases_hero_sub', __( 'Real projects, real numbers. See how we have helped brands worldwide grow traffic, revenue and efficiency.', 'alify' ) ),
			'image'    => ALIFY_URI . '/assets/images/neonline/neonline-08.webp',
		)
	);
	?>

	<?php get_template_part( 'template-parts/cases-grid' ); ?>

	<?php
	get_template_part(
		'template-parts/cta-band',
		null,
		array(
			'title'       => __( 'Want Results Like These?', 'alify' ),
			'button_text' => __( 'Get a Free Quote', 'alify' ),
			'button_url'  => ( get_page_by_path( 'contact', OBJECT, 'page' ) instanceof WP_Post )
				? (string) get_permalink( get_page_by_path( 'contact', OBJECT, 'page' ) )
				: home_url( '/contact/' ),
		)
	);
	?>

</main>

<?php
get_footer();
