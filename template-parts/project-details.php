<?php
/**
 * Shared section: Project details — content, results stats, gallery and the
 * prev/next project navigation (ACF-ready: "project_stats" repeater with
 * value/label, "gallery" image field).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_stats = function_exists( 'get_field' ) ? get_field( 'project_stats' ) : '';
$alify_stats = is_array( $alify_stats ) ? $alify_stats : array();

$alify_gallery = function_exists( 'get_field' ) ? get_field( 'gallery' ) : '';
$alify_gallery = is_array( $alify_gallery ) ? $alify_gallery : array();
?>

<section class="alify-project-details" id="alify-project-details">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-9">
				<div class="alify-project-details__content">
					<?php echo wp_kses_post( apply_filters( 'the_content', get_the_content() ) ); ?>
				</div>

				<?php if ( $alify_stats ) : ?>
					<div class="alify-project-details__stats">
						<?php foreach ( $alify_stats as $alify_stat ) : ?>
							<?php
							$alify_stat_value = is_array( $alify_stat ) && isset( $alify_stat['value'] ) ? (string) $alify_stat['value'] : '';
							$alify_stat_label = is_array( $alify_stat ) && isset( $alify_stat['label'] ) ? (string) $alify_stat['label'] : '';
							if ( '' === trim( $alify_stat_value ) ) {
								continue;
							}
							?>
							<div class="alify-project-details__stat">
								<strong><?php echo esc_html( $alify_stat_value ); ?></strong>
								<?php if ( '' !== trim( $alify_stat_label ) ) : ?>
									<span><?php echo esc_html( $alify_stat_label ); ?></span>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<?php if ( $alify_gallery ) : ?>
					<div class="alify-project-details__gallery">
						<?php foreach ( $alify_gallery as $alify_image ) : ?>
							<?php
							$alify_image_url = '';
							if ( is_array( $alify_image ) && isset( $alify_image['url'] ) ) {
								$alify_image_url = (string) $alify_image['url'];
							} elseif ( is_numeric( $alify_image ) ) {
								$alify_image_url = (string) wp_get_attachment_image_url( (int) $alify_image, 'large' );
							}
							if ( '' === $alify_image_url ) {
								continue;
							}
							?>
							<figure class="alify-project-details__gallery-item">
								<img src="<?php echo esc_url( $alify_image_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy">
							</figure>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<nav class="alify-project-details__nav" aria-label="<?php esc_attr_e( 'Project navigation', 'alify' ); ?>">
					<?php
					$alify_prev = get_previous_post();
					$alify_next = get_next_post();
					?>
					<?php if ( $alify_prev ) : ?>
						<a class="alify-project-details__nav-link alify-project-details__nav-link--prev" href="<?php echo esc_url( (string) get_permalink( $alify_prev ) ); ?>">
							<i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
							<span>
								<small><?php esc_html_e( 'Previous Project', 'alify' ); ?></small>
								<strong><?php echo esc_html( get_the_title( $alify_prev ) ); ?></strong>
							</span>
						</a>
					<?php endif; ?>
					<?php if ( $alify_next ) : ?>
						<a class="alify-project-details__nav-link alify-project-details__nav-link--next" href="<?php echo esc_url( (string) get_permalink( $alify_next ) ); ?>">
							<span>
								<small><?php esc_html_e( 'Next Project', 'alify' ); ?></small>
								<strong><?php echo esc_html( get_the_title( $alify_next ) ); ?></strong>
							</span>
							<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
						</a>
					<?php endif; ?>
				</nav>
			</div>

			<div class="col-12 col-lg-3">
				<aside class="alify-project-details__meta">
					<?php
					$alify_meta = array(
						array( __( 'Client', 'alify' ), function_exists( 'get_field' ) ? (string) get_field( 'client' ) : '' ),
						array( __( 'Industry', 'alify' ), function_exists( 'get_field' ) ? (string) get_field( 'industry' ) : '' ),
						array( __( 'Services', 'alify' ), function_exists( 'get_field' ) ? (string) get_field( 'services_list' ) : '' ),
						array( __( 'Year', 'alify' ), function_exists( 'get_field' ) ? (string) get_field( 'year' ) : '' ),
					);
					foreach ( $alify_meta as $alify_meta_item ) :
						if ( '' === trim( $alify_meta_item[1] ) ) {
							continue;
						}
						?>
						<div class="alify-project-details__meta-item">
							<small><?php echo esc_html( $alify_meta_item[0] ); ?></small>
							<strong><?php echo esc_html( $alify_meta_item[1] ); ?></strong>
						</div>
					<?php endforeach; ?>
				</aside>
			</div>
		</div>
	</div>
</section>
