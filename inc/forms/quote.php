<?php
/**
 * Quick Quote form handling (home contact CTA and inner page bottom forms).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_handle_quote_form' ) ) {
	/**
	 * Process the quick quote form and redirect to the thank-you page.
	 */
	function alify_handle_quote_form() {
		if ( ! isset( $_POST['alify_quote_submit'] ) ) {
			return;
		}

		$nonce = isset( $_POST['alify_quote_nonce'] )
			? sanitize_text_field( wp_unslash( $_POST['alify_quote_nonce'] ) )
			: '';

		if ( ! wp_verify_nonce( $nonce, 'alify_quote' ) ) {
			return;
		}

		$name    = isset( $_POST['alify_quote_name'] ) ? sanitize_text_field( wp_unslash( $_POST['alify_quote_name'] ) ) : '';
		$email   = isset( $_POST['alify_quote_email'] ) ? sanitize_email( wp_unslash( $_POST['alify_quote_email'] ) ) : '';
		$service = isset( $_POST['alify_quote_service'] ) ? sanitize_text_field( wp_unslash( $_POST['alify_quote_service'] ) ) : '';
		$message = isset( $_POST['alify_quote_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['alify_quote_message'] ) ) : '';
		$source  = isset( $_POST['alify_quote_source'] ) ? esc_url_raw( wp_unslash( $_POST['alify_quote_source'] ) ) : '';

		if ( '' === $name || ! is_email( $email ) ) {
			return;
		}

		$entries   = (array) get_option( 'alify_quote_submissions', array() );
		$entries[] = array(
			'name'    => $name,
			'email'   => $email,
			'service' => $service,
			'message' => $message,
			'source'  => $source,
			'date'    => current_time( 'mysql' ),
		);

		if ( count( $entries ) > 200 ) {
			$entries = array_slice( $entries, -200 );
		}

		update_option( 'alify_quote_submissions', $entries, false );

		wp_mail(
			get_option( 'admin_email' ),
			sprintf(
				/* translators: %s: requested service name. */
				__( 'New Quote Request: %s', 'alify' ),
				$service ? $service : __( 'General', 'alify' )
			),
			sprintf(
				"Name: %s\nEmail: %s\nService: %s\nSource: %s\n\n%s",
				$name,
				$email,
				$service,
				$source,
				$message
			)
		);

		$thank_you = get_page_by_path( 'thank-you', OBJECT, 'page' );
		$redirect  = ( $thank_you instanceof WP_Post )
			? (string) get_permalink( $thank_you )
			: home_url( '/thank-you/' );

		wp_safe_redirect( $redirect );
		exit;
	}
}
add_action( 'template_redirect', 'alify_handle_quote_form', 5 );
