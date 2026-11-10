<?php
/**
 * Projects custom post type + taxonomy.
 *
 * URL structure:
 * - Single:  /project/{post-slug}/
 * - Archive: /projects/
 * - Category:/projects/{category-slug}/   (category name in URL, no machine slugs)
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_register_taxonomy_project_category' ) ) {
	/**
	 * Register the Project Category taxonomy.
	 */
	function alify_register_taxonomy_project_category() {
		register_taxonomy(
			'project_category',
			array( 'project' ),
			array(
				'labels'            => array(
					'name'              => esc_html__( 'Project Categories', 'alify' ),
					'singular_name'     => esc_html__( 'Project Category', 'alify' ),
					'search_items'      => esc_html__( 'Search Project Categories', 'alify' ),
					'all_items'         => esc_html__( 'All Project Categories', 'alify' ),
					'parent_item'       => esc_html__( 'Parent Project Category', 'alify' ),
					'parent_item_colon' => esc_html__( 'Parent Project Category:', 'alify' ),
					'edit_item'         => esc_html__( 'Edit Project Category', 'alify' ),
					'update_item'       => esc_html__( 'Update Project Category', 'alify' ),
					'add_new_item'      => esc_html__( 'Add New Project Category', 'alify' ),
					'new_item_name'     => esc_html__( 'New Project Category Name', 'alify' ),
					'menu_name'         => esc_html__( 'Categories', 'alify' ),
				),
				'hierarchical'      => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_rest'      => true,
				'rewrite'           => array( 'slug' => 'projects', 'with_front' => false ),
			)
		);
	}
}
add_action( 'init', 'alify_register_taxonomy_project_category', 10 );

if ( ! function_exists( 'alify_register_cpt_project' ) ) {
	/**
	 * Register the Project post type.
	 */
	function alify_register_cpt_project() {
		register_post_type(
			'project',
			array(
				'labels'          => array(
					'name'               => esc_html__( 'Projects', 'alify' ),
					'singular_name'      => esc_html__( 'Project', 'alify' ),
					'menu_name'          => esc_html__( 'Projects', 'alify' ),
					'add_new'            => esc_html__( 'Add New', 'alify' ),
					'add_new_item'       => esc_html__( 'Add New Project', 'alify' ),
					'edit_item'          => esc_html__( 'Edit Project', 'alify' ),
					'new_item'           => esc_html__( 'New Project', 'alify' ),
					'view_item'          => esc_html__( 'View Project', 'alify' ),
					'view_items'         => esc_html__( 'View Projects', 'alify' ),
					'search_items'       => esc_html__( 'Search Projects', 'alify' ),
					'not_found'          => esc_html__( 'No projects found.', 'alify' ),
					'not_found_in_trash' => esc_html__( 'No projects found in Trash.', 'alify' ),
					'all_items'          => esc_html__( 'All Projects', 'alify' ),
					'featured_image'     => esc_html__( 'Project Image', 'alify' ),
					'set_featured_image' => esc_html__( 'Set project image', 'alify' ),
					'remove_image'       => esc_html__( 'Remove project image', 'alify' ),
					'use_featured_image' => esc_html__( 'Use as project image', 'alify' ),
				),
				'public'          => true,
				'publicly_queryable' => true,
				'show_ui'         => true,
				'show_in_menu'    => true,
				'show_in_rest'    => true,
				'query_var'       => true,
				'rewrite'         => array( 'slug' => 'project', 'with_front' => false ),
				'capability_type' => 'post',
				'has_archive'     => 'projects',
				'hierarchical'    => false,
				'menu_position'   => 21,
				'menu_icon'       => 'dashicons-portfolio',
				'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes' ),
			)
		);
	}
}
add_action( 'init', 'alify_register_cpt_project', 11 );
