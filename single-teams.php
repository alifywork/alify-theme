<?php
/**
 * Single Team Member template.
 *
 * Sections: member profile (photo/initials + role + name + bio), CTA band.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

wp_enqueue_style( 'alify-team-profile', get_template_directory_uri() . '/assets/css/sections/team-profile.css', array( 'alify-main' ), ALIFY_VERSION );
wp_enqueue_script( 'alify-team-profile', get_template_directory_uri() . '/assets/js/sections/team-profile.js', array( 'alify-main', 'gsap-splittext', 'gsap-scrolltrigger' ), ALIFY_VERSION, true );

wp_enqueue_style( 'alify-cta-band', get_template_directory_uri() . '/assets/css/sections/cta-band.css', array( 'alify-main' ), ALIFY_VERSION );

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/team-profile' );
		?>

		<?php
		get_template_part(
			'template-parts/cta-band',
			null,
			array(
				'title'       => __( 'Want This Team On Your Project?', 'alify' ),
				'button_text' => __( 'Get a Free Quote', 'alify' ),
				'button_url'  => home_url( '/contact/' ),
			)
		);
		?>

	<?php endwhile; ?>

</main>

<?php
get_footer();
