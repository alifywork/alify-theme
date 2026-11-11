<?php
/**
 * Home section: Featured Work — pinned horizontal scroll showcase.
 * Data comes from the "project" CPT (defaults shown until posts exist).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_projects = get_posts(
	array(
		'post_type'      => 'project',
		'posts_per_page' => 5,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
	)
);

$alify_default_work = array(
	array( 'Web Development', 'SaaS Platform Redesign', 'A full-stack rebuild that cut load times by 60%.', 'waveline-01' ),
	array( 'UI/UX Design', 'Fintech Mobile App', 'Research-led UX that doubled daily active users.', 'waveline-02' ),
	array( 'SEO', 'Global E-commerce SEO', 'Top-3 rankings across 40+ commercial keywords.', 'waveline-03' ),
	array( 'Digital Marketing', 'D2C Growth Campaign', 'A 4.2x return on ad spend in two quarters.', 'waveline-04' ),
	array( 'AI Automation', 'Support Automation Suite', 'AI workflows that saved 300+ hours a month.', 'waveline-05' ),
);

$alify_work_url = (string) get_post_type_archive_link( 'project' );
?>

<section class="alify-work" id="alify-work">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-lg-7">
				<p class="alify-section-eyebrow alify-section-eyebrow--light"><?php esc_html_e( 'Our Work', 'alify' ); ?></p>
				<h2 class="alify-section-title alify-section-title--light" style="margin-bottom: 0;">
					<?php echo esc_html( alify_field( 'home_work_title', __( 'Projects That Speak for Themselves', 'alify' ) ) ); ?>
				</h2>
			</div>
			<div class="col-12 col-lg-5">
				<a class="alify-btn alify-btn--secondary alify-work__all" href="<?php echo esc_url( $alify_work_url ); ?>">
					<?php esc_html_e( 'View All Projects', 'alify' ); ?>
				</a>
			</div>
		</div>
	</div>

	<div class="alify-work__viewport">
		<div class="alify-work__track">
			<?php
			for ( $alify_i = 0; $alify_i < 5; $alify_i++ ) :
				if ( isset( $alify_projects[ $alify_i ] ) ) {
					$alify_post    = $alify_projects[ $alify_i ];
					$alify_name    = get_the_title( $alify_post );
					$alify_desc    = get_the_excerpt( $alify_post );
					$alify_url     = (string) get_permalink( $alify_post );
					$alify_thumb   = get_the_post_thumbnail_url( $alify_post, 'alify-card' );
					$alify_image   = $alify_thumb ? $alify_thumb : ALIFY_URI . '/assets/images/waveline/waveline-' . str_pad( (string) ( $alify_i + 1 ), 2, '0', STR_PAD_LEFT ) . '.jpg';
					$alify_terms   = get_the_terms( $alify_post, 'project_category' );
					$alify_cat     = ( $alify_terms && ! is_wp_error( $alify_terms ) ) ? $alify_terms[0]->name : '';
				} else {
					$alify_name  = $alify_default_work[ $alify_i ][1];
					$alify_desc  = $alify_default_work[ $alify_i ][2];
					$alify_url   = $alify_work_url;
					$alify_image = ALIFY_URI . '/assets/images/waveline/' . $alify_default_work[ $alify_i ][3] . '.jpg';
					$alify_cat   = $alify_default_work[ $alify_i ][0];
				}
				?>
				<article class="alify-work-card">
					<a class="alify-work-card__link" href="<?php echo esc_url( $alify_url ); ?>">
						<div class="alify-work-card__media">
							<img src="<?php echo esc_url( $alify_image ); ?>" alt="<?php echo esc_attr( $alify_name ); ?>" loading="lazy">
						</div>
						<div class="alify-work-card__body">
							<?php if ( '' !== $alify_cat ) : ?>
								<span class="alify-work-card__cat"><?php echo esc_html( $alify_cat ); ?></span>
							<?php endif; ?>
							<h3 class="alify-work-card__title"><?php echo esc_html( $alify_name ); ?></h3>
							<p class="alify-work-card__desc"><?php echo esc_html( wp_trim_words( $alify_desc, 14 ) ); ?></p>
						</div>
					</a>
				</article>
			<?php endfor; ?>
		</div>
	</div>
</section>
