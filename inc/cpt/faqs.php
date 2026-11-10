<?php
/**
 * FAQs custom post type + taxonomy (archive only — no single pages).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_register_cpt_faqs' ) ) {
	/**
	 * Register the FAQs post type.
	 */
	function alify_register_cpt_faqs() {
		register_post_type(
			'faqs',
			array(
				'labels'          => array(
					'name'               => esc_html__( 'FAQs', 'alify' ),
					'singular_name'      => esc_html__( 'FAQ', 'alify' ),
					'menu_name'          => esc_html__( 'FAQs', 'alify' ),
					'add_new'            => esc_html__( 'Add New', 'alify' ),
					'add_new_item'       => esc_html__( 'Add New FAQ', 'alify' ),
					'edit_item'          => esc_html__( 'Edit FAQ', 'alify' ),
					'new_item'           => esc_html__( 'New FAQ', 'alify' ),
					'view_item'          => esc_html__( 'View FAQ', 'alify' ),
					'view_items'         => esc_html__( 'View FAQs', 'alify' ),
					'search_items'       => esc_html__( 'Search FAQs', 'alify' ),
					'not_found'          => esc_html__( 'No FAQs found.', 'alify' ),
					'not_found_in_trash' => esc_html__( 'No FAQs found in Trash.', 'alify' ),
					'all_items'          => esc_html__( 'All FAQs', 'alify' ),
					'featured_image'     => esc_html__( 'FAQ Image', 'alify' ),
					'set_featured_image' => esc_html__( 'Set FAQ image', 'alify' ),
					'remove_image'       => esc_html__( 'Remove FAQ image', 'alify' ),
					'use_featured_image' => esc_html__( 'Use as FAQ image', 'alify' ),
				),
				'public'          => true,
				'publicly_queryable' => true,
				'show_ui'         => true,
				'show_in_menu'    => true,
				'show_in_rest'    => true,
				'query_var'       => true,
				'rewrite'         => array( 'slug' => 'faqs', 'with_front' => false ),
				'capability_type' => 'post',
				'has_archive'     => 'faqs',
				'hierarchical'    => false,
				'menu_position'   => 26,
				'menu_icon'       => 'dashicons-editor-help',
				'supports'        => array( 'title', 'editor', 'revisions', 'page-attributes' ),
			)
		);
	}
}
add_action( 'init', 'alify_register_cpt_faqs' );

if ( ! function_exists( 'alify_register_taxonomy_faq_category' ) ) {
	/**
	 * Register the FAQ Category taxonomy.
	 */
	function alify_register_taxonomy_faq_category() {
		register_taxonomy(
			'faq_category',
			array( 'faqs' ),
			array(
				'labels'            => array(
					'name'              => esc_html__( 'FAQ Categories', 'alify' ),
					'singular_name'     => esc_html__( 'FAQ Category', 'alify' ),
					'search_items'      => esc_html__( 'Search FAQ Categories', 'alify' ),
					'all_items'         => esc_html__( 'All FAQ Categories', 'alify' ),
					'parent_item'       => esc_html__( 'Parent FAQ Category', 'alify' ),
					'parent_item_colon' => esc_html__( 'Parent FAQ Category:', 'alify' ),
					'edit_item'         => esc_html__( 'Edit FAQ Category', 'alify' ),
					'update_item'       => esc_html__( 'Update FAQ Category', 'alify' ),
					'add_new_item'      => esc_html__( 'Add New FAQ Category', 'alify' ),
					'new_item_name'     => esc_html__( 'New FAQ Category Name', 'alify' ),
					'menu_name'         => esc_html__( 'Categories', 'alify' ),
				),
				'hierarchical'      => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_rest'      => true,
				'rewrite'           => array( 'slug' => 'faq-category', 'with_front' => false ),
			)
		);
	}
}
add_action( 'init', 'alify_register_taxonomy_faq_category' );

if ( ! function_exists( 'alify_faqs_redirect_singular' ) ) {
	/**
	 * Keep FAQs archive-only: redirect single requests to the archive.
	 * Editors keep access so post previews keep working.
	 */
	function alify_faqs_redirect_singular() {
		if ( is_singular( 'faqs' ) && ! current_user_can( 'edit_posts' ) ) {
			$archive = get_post_type_archive_link( 'faqs' );
			if ( $archive ) {
				wp_safe_redirect( $archive, 301 );
				exit;
			}
		}
	}
}
add_action( 'template_redirect', 'alify_faqs_redirect_singular' );
