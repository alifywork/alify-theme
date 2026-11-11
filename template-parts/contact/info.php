<?php
/**
 * Contact section: Info cards — email, phone and working hours.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_email = alify_field( 'contact_email', 'hello@alify.com' );
$alify_phone = alify_field( 'contact_phone', '+1 (555) 000-1234' );
?>

<section class="alify-contact-info" id="alify-contact-info">
	<div class="container">
		<div class="row">

			<div class="col-12 col-lg-4">
				<div class="alify-info-card">
					<i class="fa-solid fa-envelope alify-info-card__icon" aria-hidden="true"></i>
					<h3 class="alify-info-card__title"><?php esc_html_e( 'Email Us', 'alify' ); ?></h3>
					<a class="alify-info-card__link" href="<?php echo esc_url( 'mailto:' . sanitize_email( $alify_email ) ); ?>">
						<?php echo esc_html( $alify_email ); ?>
					</a>
				</div>
			</div>

			<div class="col-12 col-lg-4">
				<div class="alify-info-card">
					<i class="fa-solid fa-phone alify-info-card__icon" aria-hidden="true"></i>
					<h3 class="alify-info-card__title"><?php esc_html_e( 'Call Us', 'alify' ); ?></h3>
					<a class="alify-info-card__link" href="<?php echo esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', $alify_phone ) ); ?>">
						<?php echo esc_html( $alify_phone ); ?>
					</a>
				</div>
			</div>

			<div class="col-12 col-lg-4">
				<div class="alify-info-card">
					<i class="fa-solid fa-clock alify-info-card__icon" aria-hidden="true"></i>
					<h3 class="alify-info-card__title"><?php esc_html_e( 'Working Hours', 'alify' ); ?></h3>
					<p class="alify-info-card__text">
						<?php echo esc_html( alify_field( 'contact_hours', __( 'Monday - Friday, 9:00 AM - 6:00 PM (GMT)', 'alify' ) ) ); ?>
					</p>
				</div>
			</div>

		</div>
	</div>
</section>
