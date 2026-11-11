<?php
/**
 * Shared section: Case study story — long-form content with a sticky
 * stats sidebar (ACF-ready: "case_stat" + "case_stat_note", "client").
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_stat      = function_exists( 'get_field' ) ? (string) get_field( 'case_stat' ) : '';
$alify_stat_note = function_exists( 'get_field' ) ? (string) get_field( 'case_stat_note' ) : '';
$alify_client    = function_exists( 'get_field' ) ? (string) get_field( 'client' ) : '';
$alify_contact_page = get_page_by_path( 'contact', OBJECT, 'page' );
$alify_contact_url  = ( $alify_contact_page instanceof WP_Post )
	? (string) get_permalink( $alify_contact_page )
	: home_url( '/contact/' );
?>

<section class="alify-case-story" id="alify-case-story">
	<div class="container">
		<div class="row">

			<div class="col-12 col-lg-8">
				<div class="alify-case-story__content">
					<?php echo wp_kses_post( apply_filters( 'the_content', get_the_content() ) ); ?>
				</div>
			</div>

			<div class="col-12 col-lg-4">
				<aside class="alify-case-story__aside">
					<?php if ( '' !== $alify_stat ) : ?>
						<div class="alify-case-story__stat">
							<strong><?php echo esc_html( $alify_stat ); ?></strong>
							<?php if ( '' !== $alify_stat_note ) : ?>
								<span><?php echo esc_html( $alify_stat_note ); ?></span>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( '' !== $alify_client ) : ?>
						<div class="alify-case-story__meta">
							<small><?php esc_html_e( 'Client', 'alify' ); ?></small>
							<strong><?php echo esc_html( $alify_client ); ?></strong>
						</div>
					<?php endif; ?>

					<a class="alify-btn alify-btn--primary alify-case-story__cta" href="<?php echo esc_url( $alify_contact_url ); ?>">
						<?php esc_html_e( 'Start Your Success Story', 'alify' ); ?>
					</a>
				</aside>
			</div>

		</div>
	</div>
</section>
