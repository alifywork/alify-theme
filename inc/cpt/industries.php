<?php
/**
 * Industries custom post type + taxonomy.
 *
 * URL structure:
 * - Single:  /industry/{post-slug}/
 * - Archive: /industries/
 * - Category:/industries/{category-slug}/   (category name in URL, no machine slugs)
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_register_taxonomy_industry_category' ) ) {
	/**
	 * Register the Industry Category taxonomy.
	 */
	function alify_register_taxonomy_industry_category() {
		register_taxonomy(
			'industry_category',
			array( 'industries' ),
			array(
				'labels'            => array(
					'name'              => esc_html__( 'Industry Categories', 'alify' ),
					'singular_name'     => esc_html__( 'Industry Category', 'alify' ),
					'search_items'      => esc_html__( 'Search Industry Categories', 'alify' ),
					'all_items'         => esc_html__( 'All Industry Categories', 'alify' ),
					'parent_item'       => esc_html__( 'Parent Industry Category', 'alify' ),
					'parent_item_colon' => esc_html__( 'Parent Industry Category:', 'alify' ),
					'edit_item'         => esc_html__( 'Edit Industry Category', 'alify' ),
					'update_item'       => esc_html__( 'Update Industry Category', 'alify' ),
					'add_new_item'      => esc_html__( 'Add New Industry Category', 'alify' ),
					'new_item_name'     => esc_html__( 'New Industry Category Name', 'alify' ),
					'menu_name'         => esc_html__( 'Categories', 'alify' ),
				),
				'hierarchical'      => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_rest'      => true,
				'rewrite'           => array( 'slug' => 'industries', 'with_front' => false ),
			)
		);
	}
}
add_action( 'init', 'alify_register_taxonomy_industry_category', 10 );

if ( ! function_exists( 'alify_register_cpt_industries' ) ) {
	/**
	 * Register the Industries post type.
	 */
	function alify_register_cpt_industries() {
		register_post_type(
			'industries',
			array(
				'labels'          => array(
					'name'               => esc_html__( 'Industries', 'alify' ),
					'singular_name'      => esc_html__( 'Industry', 'alify' ),
					'menu_name'          => esc_html__( 'Industries', 'alify' ),
					'add_new'            => esc_html__( 'Add New', 'alify' ),
					'add_new_item'       => esc_html__( 'Add New Industry', 'alify' ),
					'edit_item'          => esc_html__( 'Edit Industry', 'alify' ),
					'new_item'           => esc_html__( 'New Industry', 'alify' ),
					'view_item'          => esc_html__( 'View Industry', 'alify' ),
					'view_items'         => esc_html__( 'View Industries', 'alify' ),
					'search_items'       => esc_html__( 'Search Industries', 'alify' ),
					'not_found'          => esc_html__( 'No industries found.', 'alify' ),
					'not_found_in_trash' => esc_html__( 'No industries found in Trash.', 'alify' ),
					'all_items'          => esc_html__( 'All Industries', 'alify' ),
					'featured_image'     => esc_html__( 'Industry Image', 'alify' ),
					'set_featured_image' => esc_html__( 'Set industry image', 'alify' ),
					'remove_image'       => esc_html__( 'Remove industry image', 'alify' ),
					'use_featured_image' => esc_html__( 'Use as industry image', 'alify' ),
				),
				'public'          => true,
				'publicly_queryable' => true,
				'show_ui'         => true,
				'show_in_menu'    => true,
				'show_in_rest'    => true,
				'query_var'       => true,
				'rewrite'         => array( 'slug' => 'industry', 'with_front' => false ),
				'capability_type' => 'post',
				'has_archive'     => 'industries',
				'hierarchical'    => false,
				'menu_position'   => 23,
				'menu_icon'       => 'dashicons-chart-area',
				'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes' ),
			)
		);
	}
}
add_action( 'init', 'alify_register_cpt_industries', 11 );
