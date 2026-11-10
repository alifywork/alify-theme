<?php
/**
 * Newsletter signup (footer form) handling.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_handle_newsletter' ) ) {
	/**
	 * Process the footer newsletter form and redirect to the thank-you page.
	 */
	function alify_handle_newsletter() {
		if ( ! isset( $_POST['alify_newsletter_submit'] ) ) {
			return;
		}

		$nonce = isset( $_POST['alify_newsletter_nonce'] )
			? sanitize_text_field( wp_unslash( $_POST['alify_newsletter_nonce'] ) )
			: '';

		if ( ! wp_verify_nonce( $nonce, 'alify_newsletter' ) ) {
			return;
		}

		$email = isset( $_POST['alify_newsletter_email'] )
			? sanitize_email( wp_unslash( $_POST['alify_newsletter_email'] ) )
			: '';

		if ( ! is_email( $email ) ) {
			return;
		}

		$emails = (array) get_option( 'alify_newsletter_emails', array() );
		$emails[] = $email;
		$emails   = array_values( array_unique( $emails ) );

		if ( count( $emails ) > 5000 ) {
			$emails = array_slice( $emails, -5000 );
		}

		update_option( 'alify_newsletter_emails', $emails, false );

		$thank_you = get_page_by_path( 'thank-you', OBJECT, 'page' );
		$redirect  = ( $thank_you instanceof WP_Post )
			? (string) get_permalink( $thank_you )
			: home_url( '/thank-you/' );

		wp_safe_redirect( $redirect );
		exit;
	}
}
add_action( 'template_redirect', 'alify_handle_newsletter', 5 );
