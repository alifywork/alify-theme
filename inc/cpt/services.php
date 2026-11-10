<?php
/**
 * Services custom post type (no taxonomies).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_register_cpt_services' ) ) {
	/**
	 * Register the Services post type.
	 */
	function alify_register_cpt_services() {
		register_post_type(
			'services',
			array(
				'labels'          => array(
					'name'               => esc_html__( 'Services', 'alify' ),
					'singular_name'      => esc_html__( 'Service', 'alify' ),
					'menu_name'          => esc_html__( 'Services', 'alify' ),
					'add_new'            => esc_html__( 'Add New', 'alify' ),
					'add_new_item'       => esc_html__( 'Add New Service', 'alify' ),
					'edit_item'          => esc_html__( 'Edit Service', 'alify' ),
					'new_item'           => esc_html__( 'New Service', 'alify' ),
					'view_item'          => esc_html__( 'View Service', 'alify' ),
					'view_items'         => esc_html__( 'View Services', 'alify' ),
					'search_items'       => esc_html__( 'Search Services', 'alify' ),
					'not_found'          => esc_html__( 'No services found.', 'alify' ),
					'not_found_in_trash' => esc_html__( 'No services found in Trash.', 'alify' ),
					'all_items'          => esc_html__( 'All Services', 'alify' ),
					'featured_image'     => esc_html__( 'Service Image', 'alify' ),
					'set_featured_image' => esc_html__( 'Set service image', 'alify' ),
					'remove_image'       => esc_html__( 'Remove service image', 'alify' ),
					'use_featured_image' => esc_html__( 'Use as service image', 'alify' ),
				),
				'public'          => true,
				'publicly_queryable' => true,
				'show_ui'         => true,
				'show_in_menu'    => true,
				'show_in_rest'    => true,
				'query_var'       => true,
				'rewrite'         => array( 'slug' => 'services', 'with_front' => false ),
				'capability_type' => 'post',
				'has_archive'     => 'services',
				'hierarchical'    => false,
				'menu_position'   => 20,
				'menu_icon'       => 'dashicons-hammer',
				'supports'        => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'page-attributes' ),
			)
		);
	}
}
add_action( 'init', 'alify_register_cpt_services' );
