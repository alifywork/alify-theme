<?php
/**
 * About section: Values — bento grid of mission, vision and core values.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_cells = array(
	array( 'alify-value-cell--wide', 'fa-bullseye', __( 'Our Mission', 'alify' ), __( 'Deliver world-class digital services — development, design, marketing and automation — that give ambitious brands a real competitive edge, wherever they are.', 'alify' ) ),
	array( 'alify-value-cell--tall', 'fa-eye', __( 'Our Vision', 'alify' ), __( 'To be the most trusted digital partner for growing businesses worldwide.', 'alify' ) ),
	array( '', 'fa-handshake', __( 'Partnership', 'alify' ), __( 'We work as an extension of your team, not a black box.', 'alify' ) ),
	array( '', 'fa-lightbulb', __( 'Innovation', 'alify' ), __( 'New tools, smarter workflows, better results — always.', 'alify' ) ),
	array( '', 'fa-shield-halved', __( 'Integrity', 'alify' ), __( 'Honest timelines, transparent pricing, zero surprises.', 'alify' ) ),
	array( '', 'fa-chart-line', __( 'Results', 'alify' ), __( 'Every decision is measured against your growth.', 'alify' ) ),
);
?>

<section class="alify-values" id="alify-values">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p class="alify-section-eyebrow alify-section-eyebrow--light"><?php esc_html_e( 'What Drives Us', 'alify' ); ?></p>
				<h2 class="alify-section-title alify-section-title--light">
					<?php echo esc_html( alify_field( 'about_values_title', __( 'Mission, Vision And The Values We Live By', 'alify' ) ) ); ?>
				</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="alify-values__bento">
					<?php foreach ( $alify_cells as $alify_cell ) : ?>
						<div class="alify-value-cell <?php echo esc_attr( $alify_cell[0] ); ?>">
							<i class="fa-solid <?php echo esc_attr( $alify_cell[1] ); ?> alify-value-cell__icon" aria-hidden="true"></i>
							<h3 class="alify-value-cell__name"><?php echo esc_html( $alify_cell[2] ); ?></h3>
							<p class="alify-value-cell__text"><?php echo esc_html( $alify_cell[3] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
