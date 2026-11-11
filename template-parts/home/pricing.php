<?php
/**
 * Home section: Pricing teaser — plan cards with optional category chips.
 * Data comes from the "pricing" CPT (defaults shown until posts exist).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_plans = get_posts(
	array(
		'post_type'      => 'pricing',
		'posts_per_page' => 3,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
	)
);

$alify_default_plans = array(
	array( 'Starter', '$999', __( 'per project', 'alify' ), array( __( 'Up to 5 pages', 'alify' ), __( 'UI/UX design', 'alify' ), __( 'Basic SEO setup', 'alify' ), __( '2 revision rounds', 'alify' ), __( '1 month support', 'alify' ) ), false ),
	array( 'Growth', '$2,499', __( 'per project', 'alify' ), array( __( 'Up to 15 pages', 'alify' ), __( 'Custom UI/UX + branding', 'alify' ), __( 'Technical SEO + analytics', 'alify' ), __( '4 revision rounds', 'alify' ), __( '3 months support', 'alify' ) ), true ),
	array( 'Enterprise', __( 'Custom', 'alify' ), __( 'tailored scope', 'alify' ), array( __( 'Unlimited scope', 'alify' ), __( 'Dedicated team', 'alify' ), __( 'Full SEO + marketing', 'alify' ), __( 'Unlimited revisions', 'alify' ), __( 'Ongoing support', 'alify' ) ), false ),
);

$alify_pricing_terms = get_terms(
	array(
		'taxonomy'   => 'pricing_category',
		'hide_empty' => true,
	)
);
$alify_has_terms = ( $alify_pricing_terms && ! is_wp_error( $alify_pricing_terms ) );

$alify_contact_page = get_page_by_path( 'contact', OBJECT, 'page' );
$alify_contact_url  = ( $alify_contact_page instanceof WP_Post )
	? (string) get_permalink( $alify_contact_page )
	: home_url( '/contact/' );
?>

<section class="alify-pricing" id="alify-pricing">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p class="alify-section-eyebrow"><?php esc_html_e( 'Pricing', 'alify' ); ?></p>
				<h2 class="alify-section-title">
					<?php echo esc_html( alify_field( 'home_pricing_title', __( 'Transparent Plans For Every Stage', 'alify' ) ) ); ?>
				</h2>
			</div>
		</div>

		<?php if ( $alify_has_terms ) : ?>
			<div class="row">
				<div class="col-12">
					<div class="alify-pricing__chips">
						<button class="alify-chip alify-pricing__chip is-active" type="button" data-category="all">
							<?php esc_html_e( 'All Plans', 'alify' ); ?>
						</button>
						<?php foreach ( $alify_pricing_terms as $alify_term ) : ?>
							<button class="alify-chip alify-pricing__chip" type="button" data-category="<?php echo esc_attr( $alify_term->slug ); ?>">
								<?php echo esc_html( $alify_term->name ); ?>
							</button>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="row">
			<?php
			$alify_total = max( (int) count( $alify_plans ), 3 );
			for ( $alify_i = 0; $alify_i < $alify_total; $alify_i++ ) :
				if ( isset( $alify_plans[ $alify_i ] ) ) {
					$alify_post  = $alify_plans[ $alify_i ];
					$alify_name  = get_the_title( $alify_post );
					$alify_price = function_exists( 'get_field' ) ? get_field( 'price', $alify_post->ID ) : '';
					$alify_note  = function_exists( 'get_field' ) ? get_field( 'price_note', $alify_post->ID ) : '';
					$alify_feats = function_exists( 'get_field' ) ? get_field( 'features', $alify_post->ID ) : '';
					$alify_feats = is_array( $alify_feats ) ? $alify_feats : array();
					$alify_terms = get_the_terms( $alify_post, 'pricing_category' );
					$alify_slugs = ( $alify_terms && ! is_wp_error( $alify_terms ) ) ? wp_list_pluck( $alify_terms, 'slug' ) : array();
					$alify_pop   = (bool) ( function_exists( 'get_field' ) && get_field( 'plan_highlight', $alify_post->ID ) );
					$alify_price = (string) $alify_price ? (string) $alify_price : __( 'Custom', 'alify' );
					$alify_note  = (string) $alify_note;
				} else {
					$alify_name  = $alify_default_plans[ $alify_i ][0];
					$alify_price = $alify_default_plans[ $alify_i ][1];
					$alify_note  = $alify_default_plans[ $alify_i ][2];
					$alify_feats = $alify_default_plans[ $alify_i ][3];
					$alify_slugs = array();
					$alify_pop   = $alify_default_plans[ $alify_i ][4];
				}
				?>
				<div class="col-12 col-lg-4">
					<article class="alify-plan<?php echo esc_attr( $alify_pop ? ' alify-plan--popular' : '' ); ?>"
						data-category="<?php echo esc_attr( implode( ' ', $alify_slugs ) ); ?>">
						<?php if ( $alify_pop ) : ?>
							<span class="alify-plan__badge"><?php esc_html_e( 'Most Popular', 'alify' ); ?></span>
						<?php endif; ?>
						<h3 class="alify-plan__name"><?php echo esc_html( $alify_name ); ?></h3>
						<p class="alify-plan__price">
							<strong><?php echo esc_html( $alify_price ); ?></strong>
							<?php if ( '' !== $alify_note ) : ?>
								<span><?php echo esc_html( $alify_note ); ?></span>
							<?php endif; ?>
						</p>
						<?php if ( $alify_feats ) : ?>
							<ul class="alify-plan__features">
								<?php foreach ( $alify_feats as $alify_feat ) : ?>
									<?php
									$alify_feat_text = is_array( $alify_feat )
										? ( isset( $alify_feat['feature'] ) ? (string) $alify_feat['feature'] : '' )
										: (string) $alify_feat;
									if ( '' === trim( $alify_feat_text ) ) {
										continue;
									}
									?>
									<li>
										<i class="fa-solid fa-check" aria-hidden="true"></i>
										<?php echo esc_html( $alify_feat_text ); ?>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<a class="alify-btn <?php echo $alify_pop ? 'alify-btn--primary' : 'alify-btn--dark'; ?> alify-plan__cta" href="<?php echo esc_url( $alify_contact_url ); ?>">
							<?php esc_html_e( 'Get Started', 'alify' ); ?>
						</a>
					</article>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
