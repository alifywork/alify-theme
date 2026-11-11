<?php
/**
 * Testimonials custom post type + taxonomy (archive only — no single pages).
 *
 * URL structure:
 * - Archive: /testimonials/
 * - Category:/testimonials/{category-slug}/   (category name in URL, no machine slugs)
 * - Single:  none (requests 301 to the archive / resolve as 404)
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_register_taxonomy_testimonial_category' ) ) {
	/**
	 * Register the Testimonial Category taxonomy.
	 *
	 * Registered BEFORE the post type so category rules win the shared
	 * /testimonials/ base (see inc/rewrites.php for the flush handling).
	 */
	function alify_register_taxonomy_testimonial_category() {
		register_taxonomy(
			'testimonial_category',
			array( 'testimonials' ),
			array(
				'labels'            => array(
					'name'              => esc_html__( 'Testimonial Categories', 'alify' ),
					'singular_name'     => esc_html__( 'Testimonial Category', 'alify' ),
					'search_items'      => esc_html__( 'Search Testimonial Categories', 'alify' ),
					'all_items'         => esc_html__( 'All Testimonial Categories', 'alify' ),
					'parent_item'       => esc_html__( 'Parent Testimonial Category', 'alify' ),
					'parent_item_colon' => esc_html__( 'Parent Testimonial Category:', 'alify' ),
					'edit_item'         => esc_html__( 'Edit Testimonial Category', 'alify' ),
					'update_item'       => esc_html__( 'Update Testimonial Category', 'alify' ),
					'add_new_item'      => esc_html__( 'Add New Testimonial Category', 'alify' ),
					'new_item_name'     => esc_html__( 'New Testimonial Category Name', 'alify' ),
					'menu_name'         => esc_html__( 'Categories', 'alify' ),
				),
				'hierarchical'      => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_rest'      => true,
				'rewrite'           => array( 'slug' => 'testimonials', 'with_front' => false ),
			)
		);
	}
}
add_action( 'init', 'alify_register_taxonomy_testimonial_category', 10 );

if ( ! function_exists( 'alify_register_cpt_testimonials' ) ) {
	/**
	 * Register the Testimonials post type.
	 */
	function alify_register_cpt_testimonials() {
		register_post_type(
			'testimonials',
			array(
				'labels'          => array(
					'name'               => esc_html__( 'Testimonials', 'alify' ),
					'singular_name'      => esc_html__( 'Testimonial', 'alify' ),
					'menu_name'          => esc_html__( 'Testimonials', 'alify' ),
					'add_new'            => esc_html__( 'Add New', 'alify' ),
					'add_new_item'       => esc_html__( 'Add New Testimonial', 'alify' ),
					'edit_item'          => esc_html__( 'Edit Testimonial', 'alify' ),
					'new_item'           => esc_html__( 'New Testimonial', 'alify' ),
					'view_item'          => esc_html__( 'View Testimonial', 'alify' ),
					'view_items'         => esc_html__( 'View Testimonials', 'alify' ),
					'search_items'       => esc_html__( 'Search Testimonials', 'alify' ),
					'not_found'          => esc_html__( 'No testimonials found.', 'alify' ),
					'not_found_in_trash' => esc_html__( 'No testimonials found in Trash.', 'alify' ),
					'all_items'          => esc_html__( 'All Testimonials', 'alify' ),
					'featured_image'     => esc_html__( 'Client Photo', 'alify' ),
					'set_featured_image' => esc_html__( 'Set client photo', 'alify' ),
					'remove_image'       => esc_html__( 'Remove client photo', 'alify' ),
					'use_featured_image' => esc_html__( 'Use as client photo', 'alify' ),
				),
				'public'          => true,
				'publicly_queryable' => true,
				'show_ui'         => true,
				'show_in_menu'    => true,
				'show_in_rest'    => true,
				'query_var'       => true,
				'rewrite'         => array( 'slug' => 'testimonials', 'with_front' => false ),
				'capability_type' => 'post',
				'has_archive'     => 'testimonials',
				'hierarchical'    => false,
				'menu_position'   => 27,
				'menu_icon'       => 'dashicons-format-quote',
				'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
			)
		);
	}
}
add_action( 'init', 'alify_register_cpt_testimonials', 11 );

if ( ! function_exists( 'alify_testimonials_redirect_singular' ) ) {
	/**
	 * Keep Testimonials archive-only: redirect direct single requests to the archive.
	 * Editors keep access so admin previews keep working.
	 */
	function alify_testimonials_redirect_singular() {
		if ( is_singular( 'testimonials' ) && ! current_user_can( 'edit_posts' ) ) {
			$archive = get_post_type_archive_link( 'testimonials' );
			if ( $archive ) {
				wp_safe_redirect( $archive, 301 );
				exit;
			}
		}
	}
}
add_action( 'template_redirect', 'alify_testimonials_redirect_singular' );

if ( ! function_exists( 'alify_testimonials_preview_link' ) ) {
	/**
	 * Editor previews use ?p= based URLs (there is no public single URL).
	 *
	 * @param string  $preview_link Default preview link.
	 * @param WP_Post $post         Post object.
	 * @return string Preview URL.
	 */
	function alify_testimonials_preview_link( $preview_link, $post ) {
		if ( 'testimonials' !== $post->post_type ) {
			return $preview_link;
		}

		return add_query_arg(
			array(
				'preview'       => 'true',
				'preview_id'    => absint( $post->ID ),
				'preview_nonce' => wp_create_post_nonce( 'post_preview_' . $post->ID ),
			),
			home_url( '/?p=' . absint( $post->ID ) . '&post_type=testimonials' )
		);
	}
}
add_filter( 'preview_post_link', 'alify_testimonials_preview_link', 10, 2 );

if ( ! function_exists( 'alify_testimonials_post_link' ) ) {
	/**
	 * Point generated permalinks at the archive (singles have no public page).
	 *
	 * @param string  $post_link Post permalink.
	 * @param WP_Post $post      Post object.
	 * @return string Link URL.
	 */
	function alify_testimonials_post_link( $post_link, $post ) {
		if ( 'testimonials' !== $post->post_type ) {
			return $post_link;
		}

		$archive = get_post_type_archive_link( 'testimonials' );

		return $archive ? $archive : $post_link;
	}
}
add_filter( 'post_type_link', 'alify_testimonials_post_link', 10, 2 );
