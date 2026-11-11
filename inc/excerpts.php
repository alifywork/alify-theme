<?php
/**
 * Excerpt length and read-more link.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_excerpt_length' ) ) {
	/**
	 * Trim excerpts to a readable length.
	 *
	 * @param int $length Default word count.
	 * @return int Word count.
	 */
	function alify_excerpt_length( $length ) {
		return 25;
	}
}
add_filter( 'excerpt_length', 'alify_excerpt_length', 999 );

if ( ! function_exists( 'alify_excerpt_more' ) ) {
	/**
	 * Replace the default […] with a read-more link.
	 *
	 * @param string $more Default more string.
	 * @return string Escaped read-more link.
	 */
	function alify_excerpt_more( $more ) {
		return sprintf(
			'&hellip; <a class="read-more" href="%1$s">%2$s</a>',
			esc_url( get_permalink() ),
			esc_html__( 'Read more', 'alify' )
		);
	}
}
add_filter( 'excerpt_more', 'alify_excerpt_more' );
