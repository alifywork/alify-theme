<?php
/**
 * Projects archive (/projects/).
 * Sections: hero -> filterable project grid -> CTA band.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

// Section assets (before get_header() so styles print in the head).
wp_enqueue_style( 'alify-page-hero', ALIFY_URI . '/assets/css/sections/page-hero.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-projects-grid', ALIFY_URI . '/assets/css/sections/projects-grid.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-cta-band', ALIFY_URI . '/assets/css/sections/cta-band.css', array( 'alify-style' ), ALIFY_VERSION );

wp_enqueue_script( 'alify-page-hero', ALIFY_URI . '/assets/js/sections/page-hero.js', array( 'alify-main', 'gsap-splittext' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-projects-grid', ALIFY_URI . '/assets/js/sections/projects-grid.js', array( 'alify-main' ), ALIFY_VERSION, true );

get_header();
?>

<main id="primary" class="site-main alify-projects-page">

	<?php
	get_template_part(
		'template-parts/page-hero',
		null,
		array(
			'title'    => alify_field( 'projects_hero_title', __( 'Work That Makes A Difference', 'alify' ), 'option' ),
			'subtitle' => alify_field( 'projects_hero_sub', __( 'A selection of projects delivered for startups and global brands across web, design, marketing and automation.', 'alify' ), 'option' ),
			'image'    => ALIFY_URI . '/assets/images/neonline/neonline-06.webp',
		)
	);
	?>

	<?php get_template_part( 'template-parts/projects-grid' ); ?>

	<?php
	get_template_part(
		'template-parts/cta-band',
		null,
		array(
			'title'       => __( 'Have A Similar Project In Mind?', 'alify' ),
			'button_text' => __( 'Get a Free Quote', 'alify' ),
			'button_url'  => alify_field(
				'projects_cta_url',
				( get_page_by_path( 'contact', OBJECT, 'page' ) instanceof WP_Post )
					? (string) get_permalink( get_page_by_path( 'contact', OBJECT, 'page' ) )
					: home_url( '/contact/' ),
				'option'
			),
		)
	);
	?>

</main>

<?php
get_footer();
