<?php
/**
 * Teams custom post type + taxonomy.
 *
 * URL structure:
 * - Single:  /team/{member-slug}/
 * - Archive: /teams/
 * - Category:/teams/{category-slug}/   (category name in URL, no machine slugs)
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_register_taxonomy_team_category' ) ) {
	/**
	 * Register the Team Category taxonomy (e.g. departments).
	 */
	function alify_register_taxonomy_team_category() {
		register_taxonomy(
			'team_category',
			array( 'teams' ),
			array(
				'labels'            => array(
					'name'              => esc_html__( 'Team Categories', 'alify' ),
					'singular_name'     => esc_html__( 'Team Category', 'alify' ),
					'search_items'      => esc_html__( 'Search Team Categories', 'alify' ),
					'all_items'         => esc_html__( 'All Team Categories', 'alify' ),
					'parent_item'       => esc_html__( 'Parent Team Category', 'alify' ),
					'parent_item_colon' => esc_html__( 'Parent Team Category:', 'alify' ),
					'edit_item'         => esc_html__( 'Edit Team Category', 'alify' ),
					'update_item'       => esc_html__( 'Update Team Category', 'alify' ),
					'add_new_item'      => esc_html__( 'Add New Team Category', 'alify' ),
					'new_item_name'     => esc_html__( 'New Team Category Name', 'alify' ),
					'menu_name'         => esc_html__( 'Categories', 'alify' ),
				),
				'hierarchical'      => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_rest'      => true,
				'rewrite'           => array( 'slug' => 'teams', 'with_front' => false ),
			)
		);
	}
}
add_action( 'init', 'alify_register_taxonomy_team_category', 10 );

if ( ! function_exists( 'alify_register_cpt_teams' ) ) {
	/**
	 * Register the Teams post type.
	 */
	function alify_register_cpt_teams() {
		register_post_type(
			'teams',
			array(
				'labels'          => array(
					'name'               => esc_html__( 'Teams', 'alify' ),
					'singular_name'      => esc_html__( 'Team Member', 'alify' ),
					'menu_name'          => esc_html__( 'Teams', 'alify' ),
					'add_new'            => esc_html__( 'Add New', 'alify' ),
					'add_new_item'       => esc_html__( 'Add New Team Member', 'alify' ),
					'edit_item'          => esc_html__( 'Edit Team Member', 'alify' ),
					'new_item'           => esc_html__( 'New Team Member', 'alify' ),
					'view_item'          => esc_html__( 'View Team Member', 'alify' ),
					'view_items'         => esc_html__( 'View Teams', 'alify' ),
					'search_items'       => esc_html__( 'Search Teams', 'alify' ),
					'not_found'          => esc_html__( 'No team members found.', 'alify' ),
					'not_found_in_trash' => esc_html__( 'No team members found in Trash.', 'alify' ),
					'all_items'          => esc_html__( 'All Team Members', 'alify' ),
					'featured_image'     => esc_html__( 'Member Photo', 'alify' ),
					'set_featured_image' => esc_html__( 'Set member photo', 'alify' ),
					'remove_image'       => esc_html__( 'Remove member photo', 'alify' ),
					'use_featured_image' => esc_html__( 'Use as member photo', 'alify' ),
				),
				'public'          => true,
				'publicly_queryable' => true,
				'show_ui'         => true,
				'show_in_menu'    => true,
				'show_in_rest'    => true,
				'query_var'       => true,
				'rewrite'         => array( 'slug' => 'team', 'with_front' => false ),
				'capability_type' => 'post',
				'has_archive'     => 'teams',
				'hierarchical'    => false,
				'menu_position'   => 22,
				'menu_icon'       => 'dashicons-groups',
				'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes' ),
			)
		);
	}
}
add_action( 'init', 'alify_register_cpt_teams', 11 );
