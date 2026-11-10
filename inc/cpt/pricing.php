<?php
/**
 * Pricing custom post type + taxonomy (archive only — no single pages).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_register_cpt_pricing' ) ) {
	/**
	 * Register the Pricing post type.
	 */
	function alify_register_cpt_pricing() {
		register_post_type(
			'pricing',
			array(
				'labels'          => array(
					'name'               => esc_html__( 'Pricing', 'alify' ),
					'singular_name'      => esc_html__( 'Pricing Plan', 'alify' ),
					'menu_name'          => esc_html__( 'Pricing', 'alify' ),
					'add_new'            => esc_html__( 'Add New', 'alify' ),
					'add_new_item'       => esc_html__( 'Add New Pricing Plan', 'alify' ),
					'edit_item'          => esc_html__( 'Edit Pricing Plan', 'alify' ),
					'new_item'           => esc_html__( 'New Pricing Plan', 'alify' ),
					'view_item'          => esc_html__( 'View Pricing Plan', 'alify' ),
					'view_items'         => esc_html__( 'View Pricing', 'alify' ),
					'search_items'       => esc_html__( 'Search Pricing', 'alify' ),
					'not_found'          => esc_html__( 'No pricing plans found.', 'alify' ),
					'not_found_in_trash' => esc_html__( 'No pricing plans found in Trash.', 'alify' ),
					'all_items'          => esc_html__( 'All Pricing Plans', 'alify' ),
					'featured_image'     => esc_html__( 'Pricing Image', 'alify' ),
					'set_featured_image' => esc_html__( 'Set pricing image', 'alify' ),
					'remove_image'       => esc_html__( 'Remove pricing image', 'alify' ),
					'use_featured_image' => esc_html__( 'Use as pricing image', 'alify' ),
				),
				'public'          => true,
				'publicly_queryable' => true,
				'show_ui'         => true,
				'show_in_menu'    => true,
				'show_in_rest'    => true,
				'query_var'       => true,
				'rewrite'         => array( 'slug' => 'pricing', 'with_front' => false ),
				'capability_type' => 'post',
				'has_archive'     => 'pricing',
				'hierarchical'    => false,
				'menu_position'   => 25,
				'menu_icon'       => 'dashicons-money',
				'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes' ),
			)
		);
	}
}
add_action( 'init', 'alify_register_cpt_pricing' );

if ( ! function_exists( 'alify_register_taxonomy_pricing_category' ) ) {
	/**
	 * Register the Pricing Category taxonomy.
	 */
	function alify_register_taxonomy_pricing_category() {
		register_taxonomy(
			'pricing_category',
			array( 'pricing' ),
			array(
				'labels'            => array(
					'name'              => esc_html__( 'Pricing Categories', 'alify' ),
					'singular_name'     => esc_html__( 'Pricing Category', 'alify' ),
					'search_items'      => esc_html__( 'Search Pricing Categories', 'alify' ),
					'all_items'         => esc_html__( 'All Pricing Categories', 'alify' ),
					'parent_item'       => esc_html__( 'Parent Pricing Category', 'alify' ),
					'parent_item_colon' => esc_html__( 'Parent Pricing Category:', 'alify' ),
					'edit_item'         => esc_html__( 'Edit Pricing Category', 'alify' ),
					'update_item'       => esc_html__( 'Update Pricing Category', 'alify' ),
					'add_new_item'      => esc_html__( 'Add New Pricing Category', 'alify' ),
					'new_item_name'     => esc_html__( 'New Pricing Category Name', 'alify' ),
					'menu_name'         => esc_html__( 'Categories', 'alify' ),
				),
				'hierarchical'      => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_rest'      => true,
				'rewrite'           => array( 'slug' => 'pricing-category', 'with_front' => false ),
			)
		);
	}
}
add_action( 'init', 'alify_register_taxonomy_pricing_category' );

if ( ! function_exists( 'alify_pricing_redirect_singular' ) ) {
	/**
	 * Keep Pricing archive-only: redirect single requests to the archive.
	 * Editors keep access so post previews keep working.
	 */
	function alify_pricing_redirect_singular() {
		if ( is_singular( 'pricing' ) && ! current_user_can( 'edit_posts' ) ) {
			$archive = get_post_type_archive_link( 'pricing' );
			if ( $archive ) {
				wp_safe_redirect( $archive, 301 );
				exit;
			}
		}
	}
}
add_action( 'template_redirect', 'alify_pricing_redirect_singular' );
