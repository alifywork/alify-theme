<?php
/**
 * Testimonials archive template (archive only — no single pages).
 *
 * Sections: quote cards grid + CTA band.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

wp_enqueue_style( 'alify-testimonials-grid', get_template_directory_uri() . '/assets/css/sections/testimonials-grid.css', array( 'alify-main' ), ALIFY_VERSION );
wp_enqueue_script( 'alify-testimonials-grid', get_template_directory_uri() . '/assets/js/sections/testimonials-grid.js', array( 'alify-main', 'gsap-scrolltrigger' ), ALIFY_VERSION, true );

wp_enqueue_style( 'alify-cta-band', get_template_directory_uri() . '/assets/css/sections/cta-band.css', array( 'alify-main' ), ALIFY_VERSION );

get_header();
?>

<main id="primary" class="site-main">

	<?php get_template_part( 'template-parts/testimonials-grid' ); ?>

	<?php
	get_template_part(
		'template-parts/cta-band',
		null,
		array(
			'title'       => __( 'Ready To Write Your Own Success Story?', 'alify' ),
			'button_text' => __( 'Start a Conversation', 'alify' ),
			'button_url'  => home_url( '/contact/' ),
		)
	);
	?>

</main>

<?php
get_footer();
