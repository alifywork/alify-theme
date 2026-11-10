<?php
/**
 * Home section: Services — interactive numbered list with hover image swap.
 * Data comes from the "services" CPT (defaults shown until posts exist).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_services = get_posts(
	array(
		'post_type'      => 'services',
		'posts_per_page' => 6,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
	)
);

$alify_default_services = array(
	array( 'Web Development', __( 'Fast, scalable websites and web apps built to convert.', 'alify' ) ),
	array( 'UI/UX Design', __( 'Research-driven interfaces that people love to use.', 'alify' ) ),
	array( 'SEO', __( 'Technical and content SEO that earns lasting rankings.', 'alify' ) ),
	array( 'Digital Marketing', __( 'Campaigns across search, social and email that pay off.', 'alify' ) ),
	array( 'Logo Design', __( 'Identities and brand systems that stand out anywhere.', 'alify' ) ),
	array( 'AI Automation', __( 'Smart workflows and automations that save hours daily.', 'alify' ) ),
);

$alify_service_images = array(
	ALIFY_URI . '/assets/images/ripplewave/ripplewave-02.webp',
	ALIFY_URI . '/assets/images/ripplewave/ripplewave-03.webp',
	ALIFY_URI . '/assets/images/ripplewave/ripplewave-04.webp',
	ALIFY_URI . '/assets/images/ripplewave/ripplewave-05.webp',
	ALIFY_URI . '/assets/images/ripplewave/ripplewave-06.webp',
	ALIFY_URI . '/assets/images/ripplewave/ripplewave-07.webp',
);

$alify_services_url = (string) get_post_type_archive_link( 'services' );
?>

<section class="alify-services" id="alify-services">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p class="alify-section-eyebrow"><?php esc_html_e( 'What We Do', 'alify' ); ?></p>
				<h2 class="alify-section-title">
					<?php echo esc_html( alify_field( 'home_services_title', __( 'Services Built To Move Your Business Forward', 'alify' ) ) ); ?>
				</h2>
			</div>
		</div>

		<div class="row align-items-center">
			<div class="col-12 col-lg-7">
				<ul class="alify-services__list">
					<?php
					for ( $alify_i = 0; $alify_i < 6; $alify_i++ ) :
						if ( isset( $alify_services[ $alify_i ] ) ) {
							$alify_name = get_the_title( $alify_services[ $alify_i ] );
							$alify_desc = get_the_excerpt( $alify_services[ $alify_i ] );
							$alify_url  = (string) get_permalink( $alify_services[ $alify_i ] );
						} else {
							$alify_name = $alify_default_services[ $alify_i ][0];
							$alify_desc = $alify_default_services[ $alify_i ][1];
							$alify_url  = $alify_services_url;
						}
						?>
						<li class="alify-service-row<?php echo 0 === $alify_i ? ' is-active' : ''; ?>"
							data-image="<?php echo esc_url( $alify_service_images[ $alify_i ] ); ?>">
							<a class="alify-service-row__link" href="<?php echo esc_url( $alify_url ); ?>">
								<span class="alify-service-row__num"><?php echo esc_html( str_pad( (string) ( $alify_i + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
								<span class="alify-service-row__body">
									<span class="alify-service-row__name"><?php echo esc_html( $alify_name ); ?></span>
									<span class="alify-service-row__desc"><?php echo esc_html( wp_trim_words( $alify_desc, 12 ) ); ?></span>
								</span>
								<i class="fa-solid fa-arrow-right-long alify-service-row__arrow" aria-hidden="true"></i>
							</a>
						</li>
					<?php endfor; ?>
				</ul>
			</div>

			<div class="col-12 col-lg-5">
				<div class="alify-services__preview" aria-hidden="true">
					<img src="<?php echo esc_url( $alify_service_images[0] ); ?>" alt="">
				</div>
			</div>
		</div>
	</div>
</section>
