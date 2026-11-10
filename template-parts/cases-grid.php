<?php
/**
 * Shared section: Case studies grid — cards with stat badges.
 * Data comes from the "case_studies" CPT (defaults shown until posts exist).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_cases = get_posts(
	array(
		'post_type'      => 'case_studies',
		'posts_per_page' => 6,
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);

$alify_default_cases = array(
	array( 'SEO', 'Global E-commerce Growth', '+230%', __( 'organic traffic', 'alify' ), 'waveline-06' ),
	array( 'UI/UX Design', 'Fintech App Redesign', '2.4x', __( 'daily active users', 'alify' ), 'waveline-07' ),
	array( 'Web Development', 'SaaS Platform Rebuild', '-60%', __( 'load times', 'alify' ), 'waveline-01' ),
	array( 'Digital Marketing', 'D2C Launch Campaign', '4.2x', __( 'return on ad spend', 'alify' ), 'waveline-04' ),
);

$alify_cases_url = (string) get_post_type_archive_link( 'case_studies' );
?>

<section class="alify-cases-grid" id="alify-cases-grid">
	<div class="container">
		<div class="row">
			<?php
			$alify_total = max( (int) count( $alify_cases ), 4 );
			for ( $alify_i = 0; $alify_i < $alify_total; $alify_i++ ) :
				if ( isset( $alify_cases[ $alify_i ] ) ) {
					$alify_post      = $alify_cases[ $alify_i ];
					$alify_name      = get_the_title( $alify_post );
					$alify_url       = (string) get_permalink( $alify_post );
					$alify_thumb     = get_the_post_thumbnail_url( $alify_post, 'alify-card' );
					$alify_image     = $alify_thumb ? $alify_thumb : ALIFY_URI . '/assets/images/waveline/' . $alify_default_cases[ $alify_i % 4 ][4] . '.jpg';
					$alify_terms     = get_the_terms( $alify_post, 'case_study_category' );
					$alify_cat       = ( $alify_terms && ! is_wp_error( $alify_terms ) ) ? $alify_terms[0]->name : '';
					$alify_stat      = function_exists( 'get_field' ) ? (string) get_field( 'case_stat', $alify_post->ID ) : '';
					$alify_stat_note = function_exists( 'get_field' ) ? (string) get_field( 'case_stat_note', $alify_post->ID ) : '';
				} else {
					$alify_cat       = $alify_default_cases[ $alify_i ][0];
					$alify_name      = $alify_default_cases[ $alify_i ][1];
					$alify_stat      = $alify_default_cases[ $alify_i ][2];
					$alify_stat_note = $alify_default_cases[ $alify_i ][3];
					$alify_image     = ALIFY_URI . '/assets/images/waveline/' . $alify_default_cases[ $alify_i ][4] . '.jpg';
					$alify_url       = $alify_cases_url;
				}
				?>
				<div class="col-12 col-lg-6">
					<article class="alify-case-card">
						<a class="alify-case-card__link" href="<?php echo esc_url( $alify_url ); ?>">
							<img class="alify-case-card__bg" src="<?php echo esc_url( $alify_image ); ?>" alt="<?php echo esc_attr( $alify_name ); ?>" loading="lazy">
							<span class="alify-case-card__overlay" aria-hidden="true"></span>
							<?php if ( '' !== $alify_stat ) : ?>
								<span class="alify-case-card__badge">
									<strong><?php echo esc_html( $alify_stat ); ?></strong>
									<?php if ( '' !== $alify_stat_note ) : ?>
										<em><?php echo esc_html( $alify_stat_note ); ?></em>
									<?php endif; ?>
								</span>
							<?php endif; ?>
							<div class="alify-case-card__content">
								<?php if ( '' !== $alify_cat ) : ?>
									<span class="alify-work-card__cat"><?php echo esc_html( $alify_cat ); ?></span>
								<?php endif; ?>
								<h3 class="alify-case-card__title"><?php echo esc_html( $alify_name ); ?></h3>
								<span class="alify-case-card__more">
									<?php esc_html_e( 'Read Case Study', 'alify' ); ?>
									<i class="fa-solid fa-arrow-right-long" aria-hidden="true"></i>
								</span>
							</div>
						</a>
					</article>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
