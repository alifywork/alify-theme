<?php
/**
 * About section: Team — team member grid.
 * Data comes from the "teams" CPT (defaults shown until posts exist).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_team = get_posts(
	array(
		'post_type'      => 'teams',
		'posts_per_page' => 8,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
	)
);

$alify_default_team = array(
	array( 'Ali Raza', 'Founder & CEO' ),
	array( 'Sarah Mitchell', 'Creative Director' ),
	array( 'James Okafor', 'Lead Developer' ),
	array( 'Ayesha Khan', 'Head of Marketing' ),
);
?>

<section class="alify-team" id="alify-team">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p class="alify-section-eyebrow"><?php esc_html_e( 'Our Team', 'alify' ); ?></p>
				<h2 class="alify-section-title">
					<?php echo esc_html( alify_field( 'about_team_title', __( 'The People Behind ALIFY', 'alify' ) ) ); ?>
				</h2>
			</div>
		</div>

		<div class="row">
			<?php
			$alify_total = max( (int) count( $alify_team ), (int) count( $alify_default_team ) );
			for ( $alify_i = 0; $alify_i < $alify_total; $alify_i++ ) :
				if ( isset( $alify_team[ $alify_i ] ) ) {
					$alify_post   = $alify_team[ $alify_i ];
					$alify_name   = get_the_title( $alify_post );
					$alify_role   = function_exists( 'get_field' ) ? get_field( 'role', $alify_post->ID ) : '';
					$alify_role   = (string) $alify_role ? (string) $alify_role : __( 'Team Member', 'alify' );
					$alify_thumb  = get_the_post_thumbnail_url( $alify_post, 'alify-card' );
					$alify_url    = (string) get_permalink( $alify_post );
				} else {
					$alify_name  = $alify_default_team[ $alify_i ][0];
					$alify_role  = $alify_default_team[ $alify_i ][1];
					$alify_thumb = '';
					$alify_url   = '';
				}

				$alify_initials = '';
				foreach ( explode( ' ', (string) $alify_name ) as $alify_part ) {
					$alify_initials .= '' !== $alify_part ? mb_strtoupper( mb_substr( $alify_part, 0, 1 ) ) : '';
				}
				?>
				<div class="col-6 col-lg-3">
					<article class="alify-team-card">
						<?php if ( $alify_url ) : ?>
							<a class="alify-team-card__link" href="<?php echo esc_url( $alify_url ); ?>">
						<?php endif; ?>
						<div class="alify-team-card__media">
							<?php if ( $alify_thumb ) : ?>
								<img src="<?php echo esc_url( $alify_thumb ); ?>" alt="<?php echo esc_attr( $alify_name ); ?>" loading="lazy">
							<?php else : ?>
								<span class="alify-team-card__initials" aria-hidden="true"><?php echo esc_html( mb_substr( (string) $alify_initials, 0, 2 ) ); ?></span>
							<?php endif; ?>
						</div>
						<h3 class="alify-team-card__name"><?php echo esc_html( $alify_name ); ?></h3>
						<p class="alify-team-card__role"><?php echo esc_html( $alify_role ); ?></p>
						<?php if ( $alify_url ) : ?>
							</a>
						<?php endif; ?>
					</article>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
