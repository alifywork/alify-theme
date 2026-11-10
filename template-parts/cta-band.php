<?php
/**
 * Shared section: CTA band — short dark banner with a single action button.
 * Args: title (string), button_text (string), button_url (string).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_cta_title = isset( $args['title'] ) ? (string) $args['title'] : __( 'Ready To Start Your Project?', 'alify' );
$alify_cta_text  = isset( $args['button_text'] ) ? (string) $args['button_text'] : __( 'Get a Free Quote', 'alify' );
$alify_cta_url   = isset( $args['button_url'] ) ? (string) $args['button_url'] : home_url( '/contact/' );
?>

<section class="alify-cta-band">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-lg-8">
				<h2 class="alify-cta-band__title"><?php echo esc_html( $alify_cta_title ); ?></h2>
			</div>
			<div class="col-12 col-lg-4">
				<a class="alify-btn alify-btn--primary alify-cta-band__btn" href="<?php echo esc_url( $alify_cta_url ); ?>">
					<?php echo esc_html( $alify_cta_text ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
