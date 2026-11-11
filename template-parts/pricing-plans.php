<?php
/**
 * Shared section: Pricing plans — category tabs, plan cards and a plan
 * comparison table (one filter state across cards and table).
 *
 * Data: pricing CPT per pricing_category term, with in-template defaults
 * used when no posts exist yet (and as per-plan fallbacks).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_plans_defaults = array(
	'web'       => array(
		'label'    => __( 'Web Development', 'alify' ),
		'features' => array(
			__( 'Pages designed & built', 'alify' ),
			__( 'Custom UI/UX design', 'alify' ),
			__( 'WordPress CMS', 'alify' ),
			__( 'E-commerce ready', 'alify' ),
			__( 'Technical SEO setup', 'alify' ),
			__( 'Speed optimization', 'alify' ),
			__( 'Post-launch support', 'alify' ),
		),
		'plans'    => array(
			array(
				'title'    => __( 'Web Starter', 'alify' ),
				'amount'   => '$2,490',
				'note'     => __( 'one-time', 'alify' ),
				'badge'    => '',
				'teaser'   => array( __( 'Up to 5 pages', 'alify' ), __( 'Template-based UI', 'alify' ), __( 'WordPress CMS', 'alify' ) ),
				'includes' => array( 1, 0, 1, 0, 1, 0, 1 ),
			),
			array(
				'title'    => __( 'Web Growth', 'alify' ),
				'amount'   => '$4,900',
				'note'     => __( 'per project', 'alify' ),
				'badge'    => __( 'Most popular', 'alify' ),
				'teaser'   => array( __( 'Up to 15 pages', 'alify' ), __( 'Custom UI/UX design', 'alify' ), __( 'CMS + blog setup', 'alify' ) ),
				'includes' => array( 1, 1, 1, 0, 1, 1, 1 ),
			),
			array(
				'title'    => __( 'Web Scale', 'alify' ),
				'amount'   => '$8,900+',
				'note'     => __( 'per project', 'alify' ),
				'badge'    => '',
				'teaser'   => array( __( 'Unlimited pages', 'alify' ), __( 'Custom UI/UX design', 'alify' ), __( 'E-commerce ready', 'alify' ) ),
				'includes' => array( 1, 1, 1, 1, 1, 1, 1 ),
			),
		),
	),
	'seo'       => array(
		'label'    => __( 'SEO', 'alify' ),
		'features' => array(
			__( 'Keyword research', 'alify' ),
			__( 'On-page optimization', 'alify' ),
			__( 'Technical SEO audit', 'alify' ),
			__( 'Content plan', 'alify' ),
			__( 'Link building', 'alify' ),
			__( 'Monthly reporting', 'alify' ),
			__( 'Dedicated strategist', 'alify' ),
		),
		'plans'    => array(
			array(
				'title'    => __( 'SEO Launch', 'alify' ),
				'amount'   => '$990',
				'note'     => __( 'per month', 'alify' ),
				'badge'    => '',
				'teaser'   => array( __( 'Up to 20 keywords', 'alify' ), __( 'Monthly reporting', 'alify' ), __( 'Email support', 'alify' ) ),
				'includes' => array( 1, 1, 1, 0, 0, 1, 0 ),
			),
			array(
				'title'    => __( 'SEO Momentum', 'alify' ),
				'amount'   => '$1,990',
				'note'     => __( 'per month', 'alify' ),
				'badge'    => __( 'Most popular', 'alify' ),
				'teaser'   => array( __( 'Up to 60 keywords', 'alify' ), __( 'Link building outreach', 'alify' ), __( 'Dedicated strategist', 'alify' ) ),
				'includes' => array( 1, 1, 1, 1, 1, 1, 1 ),
			),
		),
	),
	'marketing' => array(
		'label'    => __( 'Digital Marketing', 'alify' ),
		'features' => array(
			__( 'Campaign strategy', 'alify' ),
			__( 'Ad creative & copy', 'alify' ),
			__( 'Google Ads management', 'alify' ),
			__( 'Social ads management', 'alify' ),
			__( 'Landing page setup', 'alify' ),
			__( 'Analytics & reporting', 'alify' ),
			__( 'Monthly strategy call', 'alify' ),
		),
		'plans'    => array(
			array(
				'title'    => __( 'Growth Marketing', 'alify' ),
				'amount'   => '$1,490',
				'note'     => __( 'per month', 'alify' ),
				'badge'    => '',
				'teaser'   => array( __( '2 ad channels', 'alify' ), __( 'Monthly reporting', 'alify' ), __( 'Email support', 'alify' ) ),
				'includes' => array( 1, 1, 1, 0, 1, 1, 0 ),
			),
			array(
				'title'    => __( 'Performance Ads', 'alify' ),
				'amount'   => '$1,990',
				'note'     => __( 'per month', 'alify' ),
				'badge'    => __( 'Most popular', 'alify' ),
				'teaser'   => array( __( 'All ad channels', 'alify' ), __( 'Conversion optimization', 'alify' ), __( 'Monthly strategy call', 'alify' ) ),
				'includes' => array( 1, 1, 1, 1, 1, 1, 1 ),
			),
		),
	),
	'design'    => array(
		'label'    => __( 'Logo & Brand', 'alify' ),
		'features' => array(
			__( 'Logo concepts', 'alify' ),
			__( 'Unlimited revisions', 'alify' ),
			__( 'Brand guidelines', 'alify' ),
			__( 'Stationery kit', 'alify' ),
			__( 'Social media kit', 'alify' ),
			__( 'Source files', 'alify' ),
			__( 'UI/UX screens', 'alify' ),
		),
		'plans'    => array(
			array(
				'title'    => __( 'Logo & Brand', 'alify' ),
				'amount'   => '$690',
				'note'     => __( 'one-time', 'alify' ),
				'badge'    => '',
				'teaser'   => array( __( '3 logo concepts', 'alify' ), __( 'Brand guidelines', 'alify' ), __( 'Source files', 'alify' ) ),
				'includes' => array( 1, 1, 1, 1, 1, 1, 0 ),
			),
			array(
				'title'    => __( 'UI/UX Design', 'alify' ),
				'amount'   => '$2,900',
				'note'     => __( 'per project', 'alify' ),
				'badge'    => '',
				'teaser'   => array( __( 'Up to 10 screens', 'alify' ), __( 'Interactive prototype', 'alify' ), __( 'Design system basics', 'alify' ) ),
				'includes' => array( 1, 1, 1, 0, 0, 1, 1 ),
			),
		),
	),
);

/* Build groups: taxonomy terms when they exist, defaults as content base. */
$alify_plans_groups = array();
$alify_plans_terms  = get_terms(
	array(
		'taxonomy'   => 'pricing_category',
		'hide_empty' => false,
	)
);

if ( ! is_wp_error( $alify_plans_terms ) && ! empty( $alify_plans_terms ) ) {
	foreach ( $alify_plans_terms as $alify_plans_term ) {
		$alify_plans_slug  = $alify_plans_term->slug;
		$alify_plans_group = isset( $alify_plans_defaults[ $alify_plans_slug ] )
			? $alify_plans_defaults[ $alify_plans_slug ]
			: array(
				'label'    => $alify_plans_term->name,
				'features' => array(),
				'plans'    => array(),
			);
		$alify_plans_group['label'] = $alify_plans_term->name;

		$alify_plans_query = new WP_Query(
			array(
				'post_type'      => 'pricing',
				'posts_per_page' => 4,
				'orderby'        => 'menu_order date',
				'order'          => 'ASC',
				'no_found_rows'  => true,
				'tax_query'      => array(
					array(
						'taxonomy' => 'pricing_category',
						'field'    => 'slug',
						'terms'    => $alify_plans_slug,
					),
				),
			)
		);

		if ( $alify_plans_query->have_posts() ) {
			$alify_plans_plans = array();
			$alify_plans_index = 0;
			while ( $alify_plans_query->have_posts() ) {
				$alify_plans_query->the_post();
				$alify_plans_def = isset( $alify_plans_defaults[ $alify_plans_slug ]['plans'][ $alify_plans_index ] )
					? $alify_plans_defaults[ $alify_plans_slug ]['plans'][ $alify_plans_index ]
					: array(
						'title'    => '',
						'amount'   => '',
						'note'     => '',
						'badge'    => '',
						'teaser'   => array(),
						'includes' => array(),
					);

				$alify_plans_teaser = alify_field( 'features', $alify_plans_def['teaser'] );
				if ( ! is_array( $alify_plans_teaser ) ) {
					$alify_plans_teaser = $alify_plans_def['teaser'];
				}

				$alify_plans_highlight = (bool) ( function_exists( 'get_field' ) && get_field( 'plan_highlight' ) );

				$alify_plans_plans[] = array(
					'title'    => get_the_title(),
					'amount'   => (string) alify_field( 'price', $alify_plans_def['amount'] ),
					'note'     => (string) alify_field( 'price_note', $alify_plans_def['note'] ),
					'badge'    => (string) alify_field( 'pricing_badge', $alify_plans_highlight ? __( 'Most Popular', 'alify' ) : $alify_plans_def['badge'] ),
					'teaser'   => $alify_plans_teaser,
					'includes' => $alify_plans_def['includes'],
				);
				$alify_plans_index++;
			}
			wp_reset_postdata();
			$alify_plans_group['plans'] = $alify_plans_plans;
		}

		$alify_plans_groups[ $alify_plans_slug ] = $alify_plans_group;
	}
} else {
	$alify_plans_groups = $alify_plans_defaults;
}

if ( empty( $alify_plans_groups ) ) {
	$alify_plans_groups = $alify_plans_defaults;
}
?>

<section class="alify-plans" id="plans">
	<div class="container">
		<header class="alify-plans__header">
			<p class="alify-section-eyebrow"><?php esc_html_e( 'Pricing', 'alify' ); ?></p>
			<h2 class="alify-section-title"><?php esc_html_e( 'Simple, honest pricing', 'alify' ); ?></h2>
			<p class="alify-plans__intro">
				<?php esc_html_e( 'Pick a starting point — every plan can be tailored to your scope, timeline and goals.', 'alify' ); ?>
			</p>
		</header>

		<div
			class="alify-plans__tabs"
			role="tablist"
			aria-label="<?php esc_attr_e( 'Pricing categories', 'alify' ); ?>"
			data-active="<?php echo esc_attr( isset( $args['active_category'] ) ? (string) $args['active_category'] : '' ); ?>"
		>
			<?php $alify_plans_first = true; ?>
			<?php foreach ( $alify_plans_groups as $alify_plans_slug => $alify_plans_group ) : ?>
				<button
					type="button"
					class="alify-plans__tab<?php echo $alify_plans_first ? ' is-active' : ''; ?>"
					data-category="<?php echo esc_attr( $alify_plans_slug ); ?>"
					role="tab"
					aria-selected="<?php echo $alify_plans_first ? 'true' : 'false'; ?>"
				>
					<?php echo esc_html( $alify_plans_group['label'] ); ?>
				</button>
				<?php $alify_plans_first = false; ?>
			<?php endforeach; ?>
		</div>

		<?php $alify_plans_first = true; ?>
		<?php foreach ( $alify_plans_groups as $alify_plans_slug => $alify_plans_group ) : ?>
			<div
				class="alify-plans__group<?php echo $alify_plans_first ? ' is-active' : ''; ?>"
				data-category="<?php echo esc_attr( $alify_plans_slug ); ?>"
				role="tabpanel"
			>
				<div class="alify-plans__cards">
					<?php foreach ( $alify_plans_group['plans'] as $alify_plans_plan ) : ?>
						<article class="alify-plan-card<?php echo '' !== $alify_plans_plan['badge'] ? ' alify-plan-card--featured' : ''; ?>">
							<?php if ( '' !== $alify_plans_plan['badge'] ) : ?>
								<span class="alify-plan-card__badge"><?php echo esc_html( $alify_plans_plan['badge'] ); ?></span>
							<?php endif; ?>
							<h3 class="alify-plan-card__title"><?php echo esc_html( $alify_plans_plan['title'] ); ?></h3>
							<p class="alify-plan-card__amount"><?php echo esc_html( $alify_plans_plan['amount'] ); ?></p>
							<?php if ( '' !== $alify_plans_plan['note'] ) : ?>
								<p class="alify-plan-card__note"><?php echo esc_html( $alify_plans_plan['note'] ); ?></p>
							<?php endif; ?>
							<ul class="alify-plan-card__list">
								<?php foreach ( (array) $alify_plans_plan['teaser'] as $alify_plans_feature ) : ?>
									<?php
									$alify_plans_feature_text = is_array( $alify_plans_feature )
										? ( isset( $alify_plans_feature['feature'] ) ? (string) $alify_plans_feature['feature'] : '' )
										: (string) $alify_plans_feature;
									if ( '' === trim( $alify_plans_feature_text ) ) {
										continue;
									}
									?>
									<li><?php echo esc_html( $alify_plans_feature_text ); ?></li>
								<?php endforeach; ?>
							</ul>
							<a class="alify-btn alify-btn--dark alify-plan-card__cta" href="#quote-form">
								<?php esc_html_e( 'Start with this plan', 'alify' ); ?>
							</a>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
			<?php $alify_plans_first = false; ?>
		<?php endforeach; ?>

		<div class="alify-compare">
			<h3 class="alify-compare__title"><?php esc_html_e( 'Compare plans', 'alify' ); ?></h3>
			<?php $alify_plans_first = true; ?>
			<?php foreach ( $alify_plans_groups as $alify_plans_slug => $alify_plans_group ) : ?>
				<?php
				if ( empty( $alify_plans_group['features'] ) || empty( $alify_plans_group['plans'] ) ) {
					continue;
				}
				?>
				<div
					class="alify-compare__group<?php echo $alify_plans_first ? ' is-active' : ''; ?>"
					data-category="<?php echo esc_attr( $alify_plans_slug ); ?>"
				>
					<div class="alify-compare__scroll">
						<table class="alify-compare__table">
							<thead>
								<tr>
									<th scope="col"><?php esc_html_e( 'Feature', 'alify' ); ?></th>
									<?php foreach ( $alify_plans_group['plans'] as $alify_plans_plan ) : ?>
										<th scope="col"><?php echo esc_html( $alify_plans_plan['title'] ); ?></th>
									<?php endforeach; ?>
								</tr>
							</thead>
							<tbody>
								<?php foreach ( $alify_plans_group['features'] as $alify_plans_row => $alify_plans_feature ) : ?>
									<tr>
										<th scope="row"><?php echo esc_html( $alify_plans_feature ); ?></th>
										<?php foreach ( $alify_plans_group['plans'] as $alify_plans_plan ) : ?>
											<td>
												<?php if ( ! empty( $alify_plans_plan['includes'][ $alify_plans_row ] ) ) : ?>
													<i class="fa-solid fa-check alify-compare__yes" aria-hidden="true"></i>
													<span class="screen-reader-text"><?php esc_html_e( 'Included', 'alify' ); ?></span>
												<?php else : ?>
													<i class="fa-solid fa-minus alify-compare__no" aria-hidden="true"></i>
													<span class="screen-reader-text"><?php esc_html_e( 'Not included', 'alify' ); ?></span>
												<?php endif; ?>
											</td>
										<?php endforeach; ?>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<?php $alify_plans_first = false; ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
