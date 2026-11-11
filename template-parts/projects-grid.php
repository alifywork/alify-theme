<?php
/**
 * Shared section: Projects grid — filterable card grid with category chips.
 * Data comes from the "project" CPT (defaults shown until posts exist).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_projects = get_posts(
	array(
		'post_type'      => 'project',
		'posts_per_page' => 9,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
	)
);

$alify_default_projects = array(
	array( 'Web Development', 'SaaS Platform Redesign', 'waveline-01' ),
	array( 'UI/UX Design', 'Fintech Mobile App', 'waveline-02' ),
	array( 'SEO', 'Global E-commerce SEO', 'waveline-03' ),
	array( 'Digital Marketing', 'D2C Growth Campaign', 'waveline-04' ),
	array( 'AI Automation', 'Support Automation Suite', 'waveline-05' ),
	array( 'Web Development', 'E-learning Platform', 'waveline-06' ),
);

$alify_project_terms = get_terms(
	array(
		'taxonomy'   => 'project_category',
		'hide_empty' => true,
	)
);
$alify_has_terms = ( $alify_project_terms && ! is_wp_error( $alify_project_terms ) );

$alify_work_url = (string) get_post_type_archive_link( 'project' );
?>

<section class="alify-projects-grid" id="alify-projects-grid">
	<div class="container">

		<?php if ( $alify_has_terms ) : ?>
			<div class="row">
				<div class="col-12">
					<div class="alify-projects-grid__chips">
						<button class="alify-chip alify-projects-grid__chip is-active" type="button" data-category="all">
							<?php esc_html_e( 'All Projects', 'alify' ); ?>
						</button>
						<?php foreach ( $alify_project_terms as $alify_term ) : ?>
							<button class="alify-chip alify-projects-grid__chip" type="button" data-category="<?php echo esc_attr( $alify_term->slug ); ?>">
								<?php echo esc_html( $alify_term->name ); ?>
							</button>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="row">
			<?php
			$alify_total = max( (int) count( $alify_projects ), 6 );
			for ( $alify_i = 0; $alify_i < $alify_total; $alify_i++ ) :
				if ( isset( $alify_projects[ $alify_i ] ) ) {
					$alify_post  = $alify_projects[ $alify_i ];
					$alify_name  = get_the_title( $alify_post );
					$alify_url   = (string) get_permalink( $alify_post );
					$alify_thumb = get_the_post_thumbnail_url( $alify_post, 'alify-card' );
					$alify_image = $alify_thumb ? $alify_thumb : ALIFY_URI . '/assets/images/waveline/' . $alify_default_projects[ $alify_i % 6 ][2] . '.jpg';
					$alify_terms = get_the_terms( $alify_post, 'project_category' );
					$alify_cat   = ( $alify_terms && ! is_wp_error( $alify_terms ) ) ? $alify_terms[0]->name : '';
					$alify_slugs = ( $alify_terms && ! is_wp_error( $alify_terms ) ) ? implode( ' ', wp_list_pluck( $alify_terms, 'slug' ) ) : '';
				} else {
					$alify_cat   = $alify_default_projects[ $alify_i ][0];
					$alify_name  = $alify_default_projects[ $alify_i ][1];
					$alify_image = ALIFY_URI . '/assets/images/waveline/' . $alify_default_projects[ $alify_i ][2] . '.jpg';
					$alify_url   = $alify_work_url;
					$alify_slugs = sanitize_title( $alify_cat );
				}
				?>
				<div class="col-12 col-sm-6 col-lg-4">
					<article class="alify-project-card" data-category="<?php echo esc_attr( $alify_slugs ); ?>">
						<a class="alify-project-card__link" href="<?php echo esc_url( $alify_url ); ?>">
							<div class="alify-project-card__media">
								<img src="<?php echo esc_url( $alify_image ); ?>" alt="<?php echo esc_attr( $alify_name ); ?>" loading="lazy">
							</div>
							<?php if ( '' !== $alify_cat ) : ?>
								<span class="alify-project-card__cat"><?php echo esc_html( $alify_cat ); ?></span>
							<?php endif; ?>
							<h3 class="alify-project-card__name"><?php echo esc_html( $alify_name ); ?></h3>
						</a>
					</article>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
