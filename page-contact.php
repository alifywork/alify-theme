<?php
/**
 * Contact page template (auto-applies to the "contact" page).
 * Sections: hero with the full form -> info cards -> global reach -> FAQ strip.
 * Form handling lives in inc/forms/quote.php (redirects to the thank-you page).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

// Section assets (before get_header() so styles print in the head).
wp_enqueue_style( 'alify-contact-hero', ALIFY_URI . '/assets/css/sections/contact/hero.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-contact-info', ALIFY_URI . '/assets/css/sections/contact/info.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-contact-global', ALIFY_URI . '/assets/css/sections/contact/global.css', array( 'alify-style' ), ALIFY_VERSION );
wp_enqueue_style( 'alify-home-faq', ALIFY_URI . '/assets/css/sections/home/faq.css', array( 'alify-style' ), ALIFY_VERSION );

wp_enqueue_script( 'alify-contact-hero', ALIFY_URI . '/assets/js/sections/contact/hero.js', array( 'alify-main' ), ALIFY_VERSION, true );
wp_enqueue_script( 'alify-home-faq', ALIFY_URI . '/assets/js/sections/home/faq.js', array( 'alify-main' ), ALIFY_VERSION, true );

get_header();
?>

<main id="primary" class="site-main alify-contact">

	<?php get_template_part( 'template-parts/contact/hero' ); ?>
	<?php get_template_part( 'template-parts/contact/info' ); ?>
	<?php get_template_part( 'template-parts/contact/global' ); ?>
	<?php get_template_part( 'template-parts/home/faq' ); ?>

</main>

<?php
get_footer();
