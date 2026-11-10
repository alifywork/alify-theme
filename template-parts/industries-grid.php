<?php
/**
 * Shared section: Industries grid — 3-column icon cards.
 * Data comes from the "industries" CPT (defaults shown until posts exist).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_industries = get_posts(
	array(
		'post_type'      => 'industries',
		'posts_per_page' => 8,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
	)
);

$alify_default_industries = array(
	array( 'fa-heart-pulse', 'Healthcare', __( 'HIPAA-aware platforms and patient-first experiences.', 'alify' ) ),
	array( 'fa-cart-shopping', 'E-commerce', __( 'Storefronts and funnels built to sell at scale.', 'alify' ) ),
	array( 'fa-cloud', 'SaaS', __( 'Product design and growth for software companies.', 'alify' ) ),
	array( 'fa-chart-pie', 'Finance', __( 'Secure, compliant and trustworthy digital products.', 'alify' ) ),
	array( 'fa-graduation-cap', 'Education', __( 'Learning platforms that keep students engaged.', 'alify' ) ),
	array( 'fa-building', 'Real Estate', __( 'Listings, portals and lead engines that convert.', 'alify' ) ),
	array( 'fa-hotel', 'Hospitality', __( 'Booking experiences guests remember and reuse.', 'alify' ) ),
	array( 'fa-rocket', 'Startups', __( 'MVPs and brand launches with zero wasted time.', 'alify' ) ),
);

$alify_industries_url = (string) get_post_type_archive_link( 'industries' );
?>

<section class="alify-industries-grid" id="alify-industries-grid">
	<div class="container">
		<div class="row">
			<?php
			for ( $alify_i = 0; $alify_i < 8; $alify_i++ ) :
				if ( isset( $alify_industries[ $alify_i ] ) ) {
					$alify_post = $alify_industries[ $alify_i ];
					$alify_name = get_the_title( $alify_post );
					$alify_desc = get_the_excerpt( $alify_post );
					$alify_url  = (string) get_permalink( $alify_post );
					$alify_icon = 'fa-briefcase';
				} else {
					$alify_icon = $alify_default_industries[ $alify_i ][0];
					$alify_name = $alify_default_industries[ $alify_i ][1];
					$alify_desc = $alify_default_industries[ $alify_i ][2];
					$alify_url  = $alify_industries_url;
				}
				?>
				<div class="col-12 col-sm-6 col-lg-3">
					<a class="alify-industry-card" href="<?php echo esc_url( $alify_url ); ?>">
						<i class="fa-solid <?php echo esc_attr( $alify_icon ); ?> alify-industry-card__icon" aria-hidden="true"></i>
						<h3 class="alify-industry-card__name"><?php echo esc_html( $alify_name ); ?></h3>
						<p class="alify-industry-card__desc"><?php echo esc_html( wp_trim_words( $alify_desc, 12 ) ); ?></p>
						<i class="fa-solid fa-arrow-right-long alify-industry-card__arrow" aria-hidden="true"></i>
					</a>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
