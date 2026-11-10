<?php
/**
 * Customizer theme options.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_customize_register' ) ) {
	/**
	 * Register Customizer panels, sections, settings and controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer instance.
	 */
	function alify_customize_register( $wp_customize ) {
		// Panel.
		$wp_customize->add_panel(
			'alify_options',
			array(
				'title'       => esc_html__( 'ALIFY Theme Options', 'alify' ),
				'description' => esc_html__( 'Global theme options.', 'alify' ),
				'priority'    => 30,
			)
		);

		// ---- General ----.
		$wp_customize->add_section(
			'alify_general',
			array(
				'title' => esc_html__( 'General', 'alify' ),
				'panel' => 'alify_options',
			)
		);

		$wp_customize->add_setting(
			'alify_footer_copyright',
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'alify_footer_copyright',
			array(
				'label'       => esc_html__( 'Footer Copyright Text', 'alify' ),
				'description' => esc_html__( 'Leave empty to use the default.', 'alify' ),
				'section'     => 'alify_general',
				'type'        => 'text',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'alify_footer_copyright',
			array(
				'selector'        => '.site-info',
				'render_callback' => 'alify_footer_copyright',
			)
		);

		// ---- Colors ----.
		$wp_customize->add_section(
			'alify_colors',
			array(
				'title' => esc_html__( 'Colors', 'alify' ),
				'panel' => 'alify_options',
			)
		);

		$wp_customize->add_setting(
			'alify_accent_color',
			array(
				'default'           => '#0d6efd',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'alify_accent_color',
				array(
					'label'   => esc_html__( 'Accent Color', 'alify' ),
					'section' => 'alify_colors',
				)
			)
		);
	}
}
add_action( 'customize_register', 'alify_customize_register' );

if ( ! function_exists( 'alify_footer_copyright' ) ) {
	/**
	 * Print the footer copyright text (custom value or secure default).
	 */
	function alify_footer_copyright() {
		$text = get_theme_mod( 'alify_footer_copyright', '' );

		if ( '' === $text ) {
			$text = '© ' . gmdate( 'Y' ) . ' ' . get_bloginfo( 'name' );
		}

		echo esc_html( $text );
	}
}

if ( ! function_exists( 'alify_customizer_css' ) ) {
	/**
	 * Output Customizer values as CSS custom properties.
	 */
	function alify_customizer_css() {
		$accent = sanitize_hex_color( get_theme_mod( 'alify_accent_color', '#0d6efd' ) );

		if ( $accent ) {
			printf(
				'<style id="alify-customizer-css">:root{--alify-accent-color:%s;}</style>',
				esc_attr( $accent )
			);
		}
	}
}
add_action( 'wp_head', 'alify_customizer_css', 99 );
