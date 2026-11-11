<?php
/**
 * About section: Timeline — company milestones.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_milestones = array(
	array( '2016', __( 'The Beginning', 'alify' ), __( 'ALIFY is founded as a small design and development studio.', 'alify' ) ),
	array( '2018', __( 'Going Global', 'alify' ), __( 'First international clients across the UK and North America.', 'alify' ) ),
	array( '2020', __( 'Full-Service Agency', 'alify' ), __( 'UI/UX, SEO and digital marketing join our service lineup.', 'alify' ) ),
	array( '2022', __( '100+ Projects', 'alify' ), __( 'Our distributed team grows to specialists across four continents.', 'alify' ) ),
	array( '2024', __( 'AI Practice Launched', 'alify' ), __( 'Dedicated AI automation services help clients save thousands of hours.', 'alify' ) ),
	array( '2026', __( 'Worldwide Today', 'alify' ), __( '250+ projects delivered for clients in 18+ countries and counting.', 'alify' ) ),
);
?>

<section class="alify-timeline" id="alify-timeline">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p class="alify-section-eyebrow"><?php esc_html_e( 'Our Journey', 'alify' ); ?></p>
				<h2 class="alify-section-title">
					<?php echo esc_html( alify_field( 'about_timeline_title', __( 'Milestones That Shaped Us', 'alify' ) ) ); ?>
				</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-lg-10">
				<ol class="alify-timeline__list">
					<?php foreach ( $alify_milestones as $alify_milestone ) : ?>
						<li class="alify-timeline__item">
							<span class="alify-timeline__year"><?php echo esc_html( $alify_milestone[0] ); ?></span>
							<div class="alify-timeline__body">
								<h3 class="alify-timeline__name"><?php echo esc_html( $alify_milestone[1] ); ?></h3>
								<p class="alify-timeline__text"><?php echo esc_html( $alify_milestone[2] ); ?></p>
							</div>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
		</div>
	</div>
</section>
