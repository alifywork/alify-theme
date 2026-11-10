<?php
/**
 * Shared section: Services grid — 2-column service cards with icons.
 * Used on the services archive (and reusable elsewhere).
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
	array( 'fa-code', 'Web Development', __( 'Fast, scalable websites and web apps built to convert visitors into customers.', 'alify' ) ),
	array( 'fa-pen-ruler', 'UI/UX Design', __( 'Research-driven interfaces and design systems that people love to use.', 'alify' ) ),
	array( 'fa-magnifying-glass-chart', 'SEO', __( 'Technical and content SEO that earns lasting rankings worldwide.', 'alify' ) ),
	array( 'fa-bullhorn', 'Digital Marketing', __( 'Campaigns across search, social and email that pay for themselves.', 'alify' ) ),
	array( 'fa-swatchbook', 'Logo Design', __( 'Identities and brand systems that stand out in any market.', 'alify' ) ),
	array( 'fa-robot', 'AI Automation', __( 'Smart workflows and automations that save your team hours daily.', 'alify' ) ),
);

$alify_services_url = (string) get_post_type_archive_link( 'services' );
?>

<section class="alify-services-grid" id="alify-services-grid">
	<div class="container">
		<div class="row">
			<?php
			for ( $alify_i = 0; $alify_i < 6; $alify_i++ ) :
				if ( isset( $alify_services[ $alify_i ] ) ) {
					$alify_post = $alify_services[ $alify_i ];
					$alify_name = get_the_title( $alify_post );
					$alify_desc = get_the_excerpt( $alify_post );
					$alify_url  = (string) get_permalink( $alify_post );
					$alify_icon = 'fa-briefcase';
				} else {
					$alify_icon = $alify_default_services[ $alify_i ][0];
					$alify_name = $alify_default_services[ $alify_i ][1];
					$alify_desc = $alify_default_services[ $alify_i ][2];
					$alify_url  = $alify_services_url;
				}
				?>
				<div class="col-12 col-lg-6">
					<a class="alify-service-card" href="<?php echo esc_url( $alify_url ); ?>">
						<i class="fa-solid <?php echo esc_attr( $alify_icon ); ?> alify-service-card__icon" aria-hidden="true"></i>
						<div class="alify-service-card__body">
							<h3 class="alify-service-card__name"><?php echo esc_html( $alify_name ); ?></h3>
							<p class="alify-service-card__desc"><?php echo esc_html( wp_trim_words( $alify_desc, 20 ) ); ?></p>
							<span class="alify-service-card__more">
								<?php esc_html_e( 'Learn More', 'alify' ); ?>
								<i class="fa-solid fa-arrow-right-long" aria-hidden="true"></i>
							</span>
						</div>
					</a>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
