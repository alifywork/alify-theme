<?php
/**
 * Widget areas (sidebars).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_widgets_init' ) ) {
	/**
	 * Register widget areas.
	 */
	function alify_widgets_init() {
		$shared = array(
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		);

		// Main sidebar.
		register_sidebar(
			array_merge(
				$shared,
				array(
					'name'        => esc_html__( 'Main Sidebar', 'alify' ),
					'id'          => 'sidebar-1',
					'description' => esc_html__( 'Widgets in this area appear next to the main content.', 'alify' ),
				)
			)
		);

		// Footer columns.
		for ( $i = 1; $i <= 4; $i++ ) {
			register_sidebar(
				array_merge(
					$shared,
					array(
						/* translators: %d: footer column number. */
						'name'        => sprintf( esc_html__( 'Footer Column %d', 'alify' ), $i ),
						'id'          => 'footer-' . $i,
						'description' => esc_html__( 'Footer widget column.', 'alify' ),
					)
				)
			);
		}
	}
}
add_action( 'widgets_init', 'alify_widgets_init' );
