<?php
/**
 * Industries archive (/industries/).
 * Sections: hero -> industry icon cards -> CTA band.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

// Section assets (before get_header() so styles print in the head).
wp_enqueue_style( 'alify-page-hero', ALIFY_URI . '/assets/css/sections/page-hero.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-industries-grid', ALIFY_URI . '/assets/css/sections/industries-grid.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-cta-band', ALIFY_URI . '/assets/css/sections/cta-band.css', array( 'alify-style' ), ALIFY_VERSION );

wp_enqueue_script( 'alify-page-hero', ALIFY_URI . '/assets/js/sections/page-hero.js', array( 'alify-main', 'gsap-splittext' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-industries-grid', ALIFY_URI . '/assets/js/sections/industries-grid.js', array( 'alify-main' ), ALIFY_VERSION, true );

get_header();
?>

<main id="primary" class="site-main alify-industries-page">

	<?php
	get_template_part(
		'template-parts/page-hero',
		null,
		array(
			'title'    => alify_field( 'industries_hero_title', __( 'Industries We Serve', 'alify' ) ),
			'subtitle' => alify_field( 'industries_hero_sub', __( 'Deep experience across the sectors that shape the global economy — tailored strategies, never templates.', 'alify' ) ),
			'image'    => ALIFY_URI . '/assets/images/neonline/neonline-10.webp',
		)
	);
	?>

	<?php get_template_part( 'template-parts/industries-grid' ); ?>

	<?php
	get_template_part(
		'template-parts/cta-band',
		null,
		array(
			'title'       => __( 'Do Not See Your Industry?', 'alify' ),
			'button_text' => __( 'Let’s Talk', 'alify' ),
			'button_url'  => ( get_page_by_path( 'contact', OBJECT, 'page' ) instanceof WP_Post )
				? (string) get_permalink( get_page_by_path( 'contact', OBJECT, 'page' ) )
				: home_url( '/contact/' ),
		)
	);
	?>

</main>

<?php
get_footer();
