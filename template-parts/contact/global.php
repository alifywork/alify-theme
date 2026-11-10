<?php
/**
 * Contact section: Global reach — worldwide service locations.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_locations = array(
	array( 'fa-location-dot', __( 'Karachi', 'alify' ), __( 'Head Office — Pakistan', 'alify' ) ),
	array( 'fa-location-dot', __( 'London', 'alify' ), __( 'United Kingdom', 'alify' ) ),
	array( 'fa-location-dot', __( 'New York', 'alify' ), __( 'United States', 'alify' ) ),
);
?>

<section class="alify-contact-global" id="alify-contact-global">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p class="alify-section-eyebrow alify-section-eyebrow--light"><?php esc_html_e( 'Global Reach', 'alify' ); ?></p>
				<h2 class="alify-section-title alify-section-title--light">
					<?php echo esc_html( alify_field( 'contact_global_title', __( 'One Team, Timezones That Work For You', 'alify' ) ) ); ?>
				</h2>
			</div>
		</div>

		<div class="row">
			<?php foreach ( $alify_locations as $alify_location ) : ?>
				<div class="col-12 col-lg-4">
					<div class="alify-location-card">
						<i class="fa-solid <?php echo esc_attr( $alify_location[0] ); ?> alify-location-card__icon" aria-hidden="true"></i>
						<h3 class="alify-location-card__city"><?php echo esc_html( $alify_location[1] ); ?></h3>
						<p class="alify-location-card__note"><?php echo esc_html( $alify_location[2] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
