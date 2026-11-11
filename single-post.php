<?php
/**
 * Blog single (default "Posts").
 *
 * Sections: article header (dark + featured image), article body with
 * sticky share rail, related posts, CTA band.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

wp_enqueue_style( 'alify-post-header', get_template_directory_uri() . '/assets/css/sections/blog/post-header.css', array( 'alify-main' ), ALIFY_VERSION );
wp_enqueue_script( 'alify-post-header', get_template_directory_uri() . '/assets/js/sections/blog/post-header.js', array( 'alify-main', 'gsap-splittext', 'gsap-scrolltrigger' ), ALIFY_VERSION, true );

wp_enqueue_style( 'alify-post-body', get_template_directory_uri() . '/assets/css/sections/blog/post-body.css', array( 'alify-main' ), ALIFY_VERSION );
wp_enqueue_script( 'alify-post-body', get_template_directory_uri() . '/assets/js/sections/blog/post-body.js', array( 'alify-main', 'gsap-scrolltrigger' ), ALIFY_VERSION, true );

wp_enqueue_style( 'alify-related-projects', get_template_directory_uri() . '/assets/css/sections/related-projects.css', array( 'alify-main' ), ALIFY_VERSION );
wp_enqueue_script( 'alify-related-projects', get_template_directory_uri() . '/assets/js/sections/related-projects.js', array( 'alify-main', 'gsap-scrolltrigger' ), ALIFY_VERSION, true );

wp_enqueue_style( 'alify-cta-band', get_template_directory_uri() . '/assets/css/sections/cta-band.css', array( 'alify-main' ), ALIFY_VERSION );

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/blog/post-header' );
		?>

		<?php get_template_part( 'template-parts/blog/post-body' ); ?>

		<?php
		get_template_part(
			'template-parts/related-projects',
			null,
			array(
				'post_type'   => 'post',
				'eyebrow'     => __( 'Keep Reading', 'alify' ),
				'title'       => __( 'Articles You Might Like', 'alify' ),
				'button_text' => __( 'View All Articles', 'alify' ),
			)
		);
		?>

		<?php
		get_template_part(
			'template-parts/cta-band',
			null,
			array(
				'title'       => __( 'Have A Project In Mind?', 'alify' ),
				'button_text' => __( 'Get a Free Quote', 'alify' ),
				'button_url'  => home_url( '/contact/' ),
			)
		);
		?>

	<?php endwhile; ?>

</main>

<?php
get_footer();
