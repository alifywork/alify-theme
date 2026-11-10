<?php
/**
 * Home section: Case Study Spotlight — two large cards with stat callouts.
 * Data comes from the "case_studies" CPT (defaults shown until posts exist).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_cases = get_posts(
	array(
		'post_type'      => 'case_studies',
		'posts_per_page' => 2,
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);

$alify_default_cases = array(
	array( 'SEO', 'Global E-commerce Growth', '+230%', __( 'organic traffic in six months', 'alify' ), 'waveline-06' ),
	array( 'UI/UX Design', 'Fintech App Redesign', '2.4x', __( 'increase in daily active users', 'alify' ), 'waveline-07' ),
);

$alify_cases_url = (string) get_post_type_archive_link( 'case_studies' );
?>

<section class="alify-case" id="alify-case">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-lg-8">
				<p class="alify-section-eyebrow alify-section-eyebrow--light"><?php esc_html_e( 'Case Studies', 'alify' ); ?></p>
				<h2 class="alify-section-title alify-section-title--light" style="margin-bottom: 0;">
					<?php echo esc_html( alify_field( 'home_case_title', __( 'Real Results, Backed By Numbers', 'alify' ) ) ); ?>
				</h2>
			</div>
			<div class="col-12 col-lg-4">
				<a class="alify-btn alify-btn--secondary alify-case__all" href="<?php echo esc_url( $alify_cases_url ); ?>">
					<?php esc_html_e( 'All Case Studies', 'alify' ); ?>
				</a>
			</div>
		</div>

		<div class="row">
			<?php
			for ( $alify_i = 0; $alify_i < 2; $alify_i++ ) :
				if ( isset( $alify_cases[ $alify_i ] ) ) {
					$alify_post  = $alify_cases[ $alify_i ];
					$alify_name  = get_the_title( $alify_post );
					$alify_desc  = get_the_excerpt( $alify_post );
					$alify_url   = (string) get_permalink( $alify_post );
					$alify_thumb = get_the_post_thumbnail_url( $alify_post, 'alify-featured' );
					$alify_image = $alify_thumb ? $alify_thumb : ALIFY_URI . '/assets/images/waveline/waveline-' . str_pad( (string) ( $alify_i + 6 ), 2, '0', STR_PAD_LEFT ) . '.jpg';
					$alify_terms = get_the_terms( $alify_post, 'case_study_category' );
					$alify_cat   = ( $alify_terms && ! is_wp_error( $alify_terms ) ) ? $alify_terms[0]->name : '';
					$alify_stat  = function_exists( 'get_field' ) ? get_field( 'case_stat', $alify_post->ID ) : '';
					$alify_stat_note = function_exists( 'get_field' ) ? get_field( 'case_stat_note', $alify_post->ID ) : '';
				} else {
					$alify_cat       = $alify_default_cases[ $alify_i ][0];
					$alify_name      = $alify_default_cases[ $alify_i ][1];
					$alify_stat      = $alify_default_cases[ $alify_i ][2];
					$alify_stat_note = $alify_default_cases[ $alify_i ][3];
					$alify_desc      = '';
					$alify_url       = $alify_cases_url;
					$alify_image     = ALIFY_URI . '/assets/images/waveline/' . $alify_default_cases[ $alify_i ][4] . '.jpg';
				}
				?>
				<div class="col-12 col-lg-6">
					<article class="alify-case-card">
						<a class="alify-case-card__link" href="<?php echo esc_url( $alify_url ); ?>">
							<img class="alify-case-card__bg" src="<?php echo esc_url( $alify_image ); ?>" alt="<?php echo esc_attr( $alify_name ); ?>" loading="lazy">
							<span class="alify-case-card__overlay" aria-hidden="true"></span>
							<div class="alify-case-card__content">
								<?php if ( '' !== $alify_cat ) : ?>
									<span class="alify-work-card__cat"><?php echo esc_html( $alify_cat ); ?></span>
								<?php endif; ?>
								<h3 class="alify-case-card__title"><?php echo esc_html( $alify_name ); ?></h3>
								<?php if ( '' !== (string) $alify_stat ) : ?>
									<p class="alify-case-card__stat">
										<strong><?php echo esc_html( (string) $alify_stat ); ?></strong>
										<?php if ( '' !== (string) $alify_stat_note ) : ?>
											<span><?php echo esc_html( (string) $alify_stat_note ); ?></span>
										<?php endif; ?>
									</p>
								<?php endif; ?>
								<?php if ( '' !== (string) $alify_desc ) : ?>
									<p class="alify-case-card__desc"><?php echo esc_html( wp_trim_words( $alify_desc, 16 ) ); ?></p>
								<?php endif; ?>
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
