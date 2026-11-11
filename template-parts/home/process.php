<?php
/**
 * Home section: Process — sticky stacking steps (Discover → Design →
 * Develop → Grow).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_steps = array(
	array( 'fa-compass', __( 'Discover', 'alify' ), __( 'We dig into your goals, market and users to define what winning looks like.', 'alify' ) ),
	array( 'fa-pen-ruler', __( 'Design', 'alify' ), __( 'Wireframes, prototypes and visual systems crafted around real user needs.', 'alify' ) ),
	array( 'fa-code', __( 'Develop', 'alify' ), __( 'Clean, scalable builds with performance, SEO and security baked in.', 'alify' ) ),
	array( 'fa-arrow-trend-up', __( 'Grow', 'alify' ), __( 'Launch, measure, iterate — marketing and optimization that compound.', 'alify' ) ),
);
?>

<section class="alify-process" id="alify-process">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p class="alify-section-eyebrow"><?php esc_html_e( 'How We Work', 'alify' ); ?></p>
				<h2 class="alify-section-title">
					<?php echo esc_html( alify_field( 'home_process_title', __( 'A Proven Process, Zero Guesswork', 'alify' ) ) ); ?>
				</h2>
			</div>
		</div>

		<div class="alify-process__steps">
			<?php foreach ( $alify_steps as $alify_index => $alify_step ) : ?>
				<div class="alify-process__step">
					<div class="alify-process__card">
						<span class="alify-process__num">
							<?php echo esc_html( str_pad( (string) ( $alify_index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?>
						</span>
						<i class="fa-solid <?php echo esc_attr( $alify_step[0] ); ?> alify-process__icon" aria-hidden="true"></i>
						<h3 class="alify-process__name"><?php echo esc_html( $alify_step[1] ); ?></h3>
						<p class="alify-process__desc"><?php echo esc_html( $alify_step[2] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
