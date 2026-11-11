<?php
/**
 * Industry single (/industries/{industry}/).
 * Sections: hero -> how we help -> related case studies -> CTA band.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

// Section assets (before get_header() so styles print in the head).
wp_enqueue_style( 'alify-page-hero', ALIFY_URI . '/assets/css/sections/page-hero.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-service-overview', ALIFY_URI . '/assets/css/sections/service-overview.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-related-projects', ALIFY_URI . '/assets/css/sections/related-projects.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-cta-band', ALIFY_URI . '/assets/css/sections/cta-band.css', array( 'alify-style' ), ALIFY_VERSION );

wp_enqueue_script( 'alify-page-hero', ALIFY_URI . '/assets/js/sections/page-hero.js', array( 'alify-main', 'gsap-splittext' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-service-overview', ALIFY_URI . '/assets/js/sections/service-overview.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-related-projects', ALIFY_URI . '/assets/js/sections/related-projects.js', array( 'alify-main' ), ALIFY_VERSION, true );

get_header();
?>

<main id="primary" class="site-main alify-industry-single">

	<?php
	while ( have_posts() ) :
		the_post();

		$alify_hero_image = get_the_post_thumbnail_url( get_the_ID(), 'alify-featured' );
		$alify_hero_image = $alify_hero_image ? $alify_hero_image : ALIFY_URI . '/assets/images/neonline/neonline-11.webp';

		get_template_part(
			'template-parts/page-hero',
			null,
			array(
				'title'    => get_the_title(),
				'subtitle' => wp_strip_all_tags( (string) get_the_excerpt() ),
				'image'    => $alify_hero_image,
			)
		);
		?>

		<?php
		get_template_part(
			'template-parts/service-overview',
			null,
			array( 'heading' => __( 'How We Help %s', 'alify' ) )
		);
		?>
		<?php
		get_template_part(
			'template-parts/related-projects',
			null,
			array(
				'post_type'   => 'case_studies',
				'title'       => __( 'Related Case Studies', 'alify' ),
				'button_text' => __( 'View All Case Studies', 'alify' ),
			)
		);
		?>

		<?php
		get_template_part(
			'template-parts/cta-band',
			null,
			array(
				'title'       => __( 'Grow In This Industry With ALIFY', 'alify' ),
				'button_text' => __( 'Get a Free Quote', 'alify' ),
				'button_url'  => ( get_page_by_path( 'contact', OBJECT, 'page' ) instanceof WP_Post )
					? (string) get_permalink( get_page_by_path( 'contact', OBJECT, 'page' ) )
					: home_url( '/contact/' ),
			)
		);
		?>

	<?php endwhile; ?>

</main>

<?php
get_footer();
