<?php
/**
 * SEO: sitemap hygiene.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_sitemap_exclude_archive_only_types' ) ) {
	/**
	 * Keep archive-only CPT posts out of the XML sitemap.
	 * Their single URLs have no public page, so search engines must not
	 * be pointed at them (the taxonomy terms remain indexed).
	 *
	 * @param string[] $post_types Post type names in the sitemap.
	 * @return string[] Filtered post type names.
	 */
	function alify_sitemap_exclude_archive_only_types( $post_types ) {
		return array_values( array_diff( $post_types, array( 'pricing', 'faqs', 'testimonials' ) ) );
	}
}
add_filter( 'wp_sitemaps_post_types', 'alify_sitemap_exclude_archive_only_types' );
