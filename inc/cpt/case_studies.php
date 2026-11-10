<?php
/**
 * Case Studies custom post type + taxonomy.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_register_cpt_case_studies' ) ) {
	/**
	 * Register the Case Studies post type.
	 */
	function alify_register_cpt_case_studies() {
		register_post_type(
			'case_studies',
			array(
				'labels'          => array(
					'name'               => esc_html__( 'Case Studies', 'alify' ),
					'singular_name'      => esc_html__( 'Case Study', 'alify' ),
					'menu_name'          => esc_html__( 'Case Studies', 'alify' ),
					'add_new'            => esc_html__( 'Add New', 'alify' ),
					'add_new_item'       => esc_html__( 'Add New Case Study', 'alify' ),
					'edit_item'          => esc_html__( 'Edit Case Study', 'alify' ),
					'new_item'           => esc_html__( 'New Case Study', 'alify' ),
					'view_item'          => esc_html__( 'View Case Study', 'alify' ),
					'view_items'         => esc_html__( 'View Case Studies', 'alify' ),
					'search_items'       => esc_html__( 'Search Case Studies', 'alify' ),
					'not_found'          => esc_html__( 'No case studies found.', 'alify' ),
					'not_found_in_trash' => esc_html__( 'No case studies found in Trash.', 'alify' ),
					'all_items'          => esc_html__( 'All Case Studies', 'alify' ),
					'featured_image'     => esc_html__( 'Case Study Image', 'alify' ),
					'set_featured_image' => esc_html__( 'Set case study image', 'alify' ),
					'remove_image'       => esc_html__( 'Remove case study image', 'alify' ),
					'use_featured_image' => esc_html__( 'Use as case study image', 'alify' ),
				),
				'public'          => true,
				'publicly_queryable' => true,
				'show_ui'         => true,
				'show_in_menu'    => true,
				'show_in_rest'    => true,
				'query_var'       => true,
				'rewrite'         => array( 'slug' => 'case-studies', 'with_front' => false ),
				'capability_type' => 'post',
				'has_archive'     => 'case-studies',
				'hierarchical'    => false,
				'menu_position'   => 24,
				'menu_icon'       => 'dashicons-portfolio-alt',
				'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes' ),
			)
		);
	}
}
add_action( 'init', 'alify_register_cpt_case_studies' );

if ( ! function_exists( 'alify_register_taxonomy_case_study_category' ) ) {
	/**
	 * Register the Case Study Category taxonomy.
	 */
	function alify_register_taxonomy_case_study_category() {
		register_taxonomy(
			'case_study_category',
			array( 'case_studies' ),
			array(
				'labels'            => array(
					'name'              => esc_html__( 'Case Study Categories', 'alify' ),
					'singular_name'     => esc_html__( 'Case Study Category', 'alify' ),
					'search_items'      => esc_html__( 'Search Case Study Categories', 'alify' ),
					'all_items'         => esc_html__( 'All Case Study Categories', 'alify' ),
					'parent_item'       => esc_html__( 'Parent Case Study Category', 'alify' ),
					'parent_item_colon' => esc_html__( 'Parent Case Study Category:', 'alify' ),
					'edit_item'         => esc_html__( 'Edit Case Study Category', 'alify' ),
					'update_item'       => esc_html__( 'Update Case Study Category', 'alify' ),
					'add_new_item'      => esc_html__( 'Add New Case Study Category', 'alify' ),
					'new_item_name'     => esc_html__( 'New Case Study Category Name', 'alify' ),
					'menu_name'         => esc_html__( 'Categories', 'alify' ),
				),
				'hierarchical'      => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_rest'      => true,
				'rewrite'           => array( 'slug' => 'case-study-category', 'with_front' => false ),
			)
		);
	}
}
add_action( 'init', 'alify_register_taxonomy_case_study_category' );
