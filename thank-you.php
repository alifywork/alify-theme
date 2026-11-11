<?php
/**
 * Template Name: Thank You
 *
 * Thank-you page: hero + what happens next steps + contact CTA band.
 * Auto-assigned to the Thank-You page by inc/page-setup.php.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

wp_enqueue_style( 'alify-page-hero', get_template_directory_uri() . '/assets/css/sections/page-hero.css', array( 'alify-main' ), ALIFY_VERSION );
wp_enqueue_script( 'alify-page-hero', get_template_directory_uri() . '/assets/js/sections/page-hero.js', array( 'alify-main', 'gsap-splittext', 'gsap-scrolltrigger' ), ALIFY_VERSION, true );

wp_enqueue_style( 'alify-thankyou-next', get_template_directory_uri() . '/assets/css/sections/thankyou-next.css', array( 'alify-main' ), ALIFY_VERSION );
wp_enqueue_script( 'alify-thankyou-next', get_template_directory_uri() . '/assets/js/sections/thankyou-next.js', array( 'alify-main', 'gsap-scrolltrigger' ), ALIFY_VERSION, true );

wp_enqueue_style( 'alify-contact-cta', get_template_directory_uri() . '/assets/css/sections/home/contact-cta.css', array( 'alify-main' ), ALIFY_VERSION );

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part(
			'template-parts/page-hero',
			null,
			array(
				'title'    => get_the_title() ? get_the_title() : __( 'Thank you!', 'alify' ),
				'subtitle' => get_the_excerpt() ? get_the_excerpt() : __( 'We have received your request and our team is already on it. Here is what happens next.', 'alify' ),
				'image'    => get_template_directory_uri() . '/assets/images/neonline/neonline-14.webp',
			)
		);
		?>

		<?php get_template_part( 'template-parts/thankyou-next' ); ?>

		<?php get_template_part( 'template-parts/home/contact-cta' ); ?>

	<?php endwhile; ?>

</main>

<?php
get_footer();
