<?php
/**
 * Shared section: Service overview — content column + "What's Included"
 * feature list (ACF-ready). Args (optional): heading (printf pattern with
 * %s for the post title).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_overview_heading = isset( $args['heading'] ) && '' !== (string) $args['heading']
	? (string) $args['heading']
	: __( 'How We Deliver %s', 'alify' );

$alify_features = function_exists( 'get_field' ) ? get_field( 'features' ) : '';
$alify_features = is_array( $alify_features ) ? $alify_features : array();

if ( ! $alify_features ) {
	$alify_features = array(
		__( 'Dedicated project manager', 'alify' ),
		__( 'UI/UX design and prototyping', 'alify' ),
		__( 'Responsive, SEO-ready build', 'alify' ),
		__( 'Performance and security hardening', 'alify' ),
		__( 'Analytics and tracking setup', 'alify' ),
		__( 'Post-launch support', 'alify' ),
	);
}
?>

<section class="alify-service-overview" id="alify-service-overview">
	<div class="container">
		<div class="row">

			<div class="col-12 col-lg-7">
				<p class="alify-section-eyebrow"><?php esc_html_e( 'Overview', 'alify' ); ?></p>
				<h2 class="alify-section-title">
					<?php
					printf( esc_html( $alify_overview_heading ), esc_html( get_the_title() ) );
					?>
				</h2>
				<div class="alify-service-overview__content">
					<?php echo wp_kses_post( apply_filters( 'the_content', get_the_content() ) ); ?>
				</div>
			</div>

			<div class="col-12 col-lg-5">
				<div class="alify-service-overview__card">
					<h3 class="alify-service-overview__card-title">
						<?php esc_html_e( 'What’s Included', 'alify' ); ?>
					</h3>
					<ul class="alify-service-overview__features">
						<?php foreach ( $alify_features as $alify_feature ) : ?>
							<?php
							$alify_feature_text = is_array( $alify_feature )
								? ( isset( $alify_feature['feature'] ) ? (string) $alify_feature['feature'] : '' )
								: (string) $alify_feature;
							if ( '' === trim( $alify_feature_text ) ) {
								continue;
							}
							?>
							<li>
								<i class="fa-solid fa-check" aria-hidden="true"></i>
								<?php echo esc_html( $alify_feature_text ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>

		</div>
	</div>
</section>
