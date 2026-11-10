<?php
/**
 * Pricing archive template (archive only — single URLs 301 here).
 *
 * Rich layout: hero + plans (tabs, cards, comparison) + FAQ strip +
 * Quick Quote form band. Category URLs (/pricing/{category}/) preselect
 * the matching tab.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

wp_enqueue_style( 'alify-page-hero', get_template_directory_uri() . '/assets/css/sections/page-hero.css', array( 'alify-main' ), ALIFY_VERSION );
wp_enqueue_script( 'alify-page-hero', get_template_directory_uri() . '/assets/js/sections/page-hero.js', array( 'alify-main', 'gsap-splittext', 'gsap-scrolltrigger' ), ALIFY_VERSION, true );

wp_enqueue_style( 'alify-pricing-plans', get_template_directory_uri() . '/assets/css/sections/pricing-plans.css', array( 'alify-main' ), ALIFY_VERSION );
wp_enqueue_script( 'alify-pricing-plans', get_template_directory_uri() . '/assets/js/sections/pricing-plans.js', array( 'alify-main', 'gsap-scrolltrigger' ), ALIFY_VERSION, true );

wp_enqueue_style( 'alify-pricing-faq', get_template_directory_uri() . '/assets/css/sections/pricing-faq.css', array( 'alify-main' ), ALIFY_VERSION );
wp_enqueue_script( 'alify-pricing-faq', get_template_directory_uri() . '/assets/js/sections/pricing-faq.js', array( 'alify-main' ), ALIFY_VERSION, true );

wp_enqueue_style( 'alify-contact-cta', get_template_directory_uri() . '/assets/css/sections/home/contact-cta.css', array( 'alify-main' ), ALIFY_VERSION );

get_header();

$alify_pricing_term  = get_queried_object();
$alify_pricing_is_tax = ( $alify_pricing_term instanceof WP_Term );
$alify_pricing_title  = $alify_pricing_is_tax
	? $alify_pricing_term->name
	: post_type_archive_title( '', false );
$alify_pricing_subtitle = ( $alify_pricing_is_tax && '' !== (string) $alify_pricing_term->description )
	? $alify_pricing_term->description
	: __( 'Transparent pricing for web, SEO, marketing and design. Choose a plan, or ask us for a custom quote.', 'alify' );
$alify_pricing_active = $alify_pricing_is_tax ? $alify_pricing_term->slug : '';
?>

<main id="primary" class="site-main">

	<?php
	get_template_part(
		'template-parts/page-hero',
		null,
		array(
			'title'    => $alify_pricing_title,
			'subtitle' => $alify_pricing_subtitle,
			'image'    => get_template_directory_uri() . '/assets/images/neonline/neonline-12.webp',
		)
	);
	?>

	<?php
	get_template_part(
		'template-parts/pricing-plans',
		null,
		array( 'active_category' => $alify_pricing_active )
	);
	?>

	<?php get_template_part( 'template-parts/pricing-faq' ); ?>

	<div id="quote-form"></div>
	<?php get_template_part( 'template-parts/home/contact-cta' ); ?>

</main>

<?php
get_footer();
