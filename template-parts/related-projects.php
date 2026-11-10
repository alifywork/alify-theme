<?php
/**
 * Shared section: Related content — 3 cards + "View All" button.
 * Used on single templates. Args (optional): post_type ('project'),
 * title, button_text. Excludes the current post when it matches post_type.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_related_type = isset( $args['post_type'] ) ? (string) $args['post_type'] : 'project';
if ( ! in_array( $alify_related_type, array( 'project', 'case_studies', 'services', 'industries', 'teams' ), true ) ) {
	$alify_related_type = 'project';
}
$alify_related_title = isset( $args['title'] ) ? (string) $args['title'] : __( 'Projects You Might Like', 'alify' );
$alify_related_btn   = isset( $args['button_text'] ) ? (string) $args['button_text'] : __( 'View All Projects', 'alify' );

$alify_exclude = ( get_post_type() === $alify_related_type ) ? array( get_the_ID() ) : array();

$alify_projects = get_posts(
	array(
		'post_type'      => $alify_related_type,
		'posts_per_page' => 3,
		'post_status'    => 'publish',
		'post__not_in'   => $alify_exclude,
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);

$alify_default_work = array(
	array( 'SaaS Platform Redesign', 'waveline-01' ),
	array( 'Fintech Mobile App', 'waveline-02' ),
	array( 'Global E-commerce SEO', 'waveline-03' ),
);

$alify_work_url = (string) get_post_type_archive_link( $alify_related_type );
?>

<section class="alify-related-projects" id="alify-related-projects">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-lg-8">
				<p class="alify-section-eyebrow alify-section-eyebrow--light"><?php esc_html_e( 'Related Work', 'alify' ); ?></p>
				<h2 class="alify-section-title alify-section-title--light" style="margin-bottom: 0;">
					<?php esc_html_e( 'Projects You Might Like', 'alify' ); ?>
				</h2>
			</div>
			<div class="col-12 col-lg-4">
				<a class="alify-btn alify-btn--secondary alify-related-projects__all" href="<?php echo esc_url( $alify_work_url ); ?>">
					<?php esc_html_e( 'View All Projects', 'alify' ); ?>
				</a>
			</div>
		</div>

		<div class="row">
			<?php
			for ( $alify_i = 0; $alify_i < 3; $alify_i++ ) :
				if ( isset( $alify_projects[ $alify_i ] ) ) {
					$alify_post  = $alify_projects[ $alify_i ];
					$alify_name  = get_the_title( $alify_post );
					$alify_url   = (string) get_permalink( $alify_post );
					$alify_thumb = get_the_post_thumbnail_url( $alify_post, 'alify-card' );
					$alify_image = $alify_thumb ? $alify_thumb : ALIFY_URI . '/assets/images/waveline/' . $alify_default_work[ $alify_i ][1] . '.jpg';
				} else {
					$alify_name  = $alify_default_work[ $alify_i ][0];
					$alify_url   = $alify_work_url;
					$alify_image = ALIFY_URI . '/assets/images/waveline/' . $alify_default_work[ $alify_i ][1] . '.jpg';
				}
				?>
				<div class="col-12 col-lg-4">
					<article class="alify-related-card">
						<a class="alify-related-card__link" href="<?php echo esc_url( $alify_url ); ?>">
							<div class="alify-related-card__media">
								<img src="<?php echo esc_url( $alify_image ); ?>" alt="<?php echo esc_attr( $alify_name ); ?>" loading="lazy">
							</div>
							<h3 class="alify-related-card__name"><?php echo esc_html( $alify_name ); ?></h3>
						</a>
					</article>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
