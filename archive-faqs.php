<?php
/**
 * FAQs archive template (archive only — single URLs 301 here).
 *
 * Rich layout: hero + category-grouped accordions + contact CTA band.
 * Category URLs (/faqs/{category}/) show that group only.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

wp_enqueue_style( 'alify-page-hero', get_template_directory_uri() . '/assets/css/sections/page-hero.css', array( 'alify-main' ), ALIFY_VERSION );
wp_enqueue_script( 'alify-page-hero', get_template_directory_uri() . '/assets/js/sections/page-hero.js', array( 'alify-main', 'gsap-splittext', 'gsap-scrolltrigger' ), ALIFY_VERSION, true );

wp_enqueue_style( 'alify-faqs-list', get_template_directory_uri() . '/assets/css/sections/faqs-list.css', array( 'alify-main' ), ALIFY_VERSION );
wp_enqueue_script( 'alify-faqs-list', get_template_directory_uri() . '/assets/js/sections/faqs-list.js', array( 'alify-main', 'gsap-scrolltrigger' ), ALIFY_VERSION, true );

wp_enqueue_style( 'alify-contact-cta', get_template_directory_uri() . '/assets/css/sections/home/contact-cta.css', array( 'alify-main' ), ALIFY_VERSION );

get_header();

$alify_faqs_term   = get_queried_object();
$alify_faqs_is_tax = ( $alify_faqs_term instanceof WP_Term );
$alify_faqs_title  = $alify_faqs_is_tax
	? $alify_faqs_term->name
	: post_type_archive_title( '', false );
$alify_faqs_subtitle = ( $alify_faqs_is_tax && '' !== (string) $alify_faqs_term->description )
	? $alify_faqs_term->description
	: __( 'Answers to the questions we hear most — about services, pricing, process and support.', 'alify' );
$alify_faqs_active = $alify_faqs_is_tax ? $alify_faqs_term->slug : '';
?>

<main id="primary" class="site-main">

	<?php
	get_template_part(
		'template-parts/page-hero',
		null,
		array(
			'title'    => $alify_faqs_title,
			'subtitle' => $alify_faqs_subtitle,
			'image'    => get_template_directory_uri() . '/assets/images/neonline/neonline-13.webp',
		)
	);
	?>

	<?php
	get_template_part(
		'template-parts/faqs-list',
		null,
		array( 'category' => $alify_faqs_active )
	);
	?>

	<?php get_template_part( 'template-parts/home/contact-cta' ); ?>

</main>

<?php
get_footer();
