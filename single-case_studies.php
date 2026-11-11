<?php
/**
 * Case Study single (/case-studies/{case-study}/).
 * Sections: hero -> long-form story with sticky stats -> related work.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

// Section assets (before get_header() so styles print in the head).
wp_enqueue_style( 'alify-page-hero', ALIFY_URI . '/assets/css/sections/page-hero.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-case-story', ALIFY_URI . '/assets/css/sections/case-story.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-related-projects', ALIFY_URI . '/assets/css/sections/related-projects.css', array( 'alify-style' ), ALIFY_VERSION );

wp_enqueue_script( 'alify-page-hero', ALIFY_URI . '/assets/js/sections/page-hero.js', array( 'alify-main', 'gsap-splittext' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-case-story', ALIFY_URI . '/assets/js/sections/case-story.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-related-projects', ALIFY_URI . '/assets/js/sections/related-projects.js', array( 'alify-main' ), ALIFY_VERSION, true );

get_header();
?>

<main id="primary" class="site-main alify-case-single">

	<?php
	while ( have_posts() ) :
		the_post();

		$alify_hero_image = get_the_post_thumbnail_url( get_the_ID(), 'alify-featured' );
		$alify_hero_image = $alify_hero_image ? $alify_hero_image : ALIFY_URI . '/assets/images/neonline/neonline-09.webp';

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

		<?php get_template_part( 'template-parts/case-story' ); ?>
		<?php
		get_template_part(
			'template-parts/related-projects',
			null,
			array(
				'post_type'   => 'project',
				'title'       => __( 'Projects Behind The Results', 'alify' ),
				'button_text' => __( 'View All Projects', 'alify' ),
			)
		);
		?>

	<?php endwhile; ?>

</main>

<?php
get_footer();
