<?php
/**
 * Blog listing section: article cards grid + pagination.
 *
 * Args: posts (WP_Post[]).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_grid_posts = ( isset( $args['posts'] ) && is_array( $args['posts'] ) ) ? $args['posts'] : array();

$alify_grid_fallbacks = array(
	'waveline-01',
	'waveline-02',
	'waveline-03',
	'waveline-04',
	'waveline-05',
	'waveline-06',
	'waveline-07',
	'waveline-08',
);
?>

<section class="alify-posts-grid">
	<div class="container">
		<?php if ( ! empty( $alify_grid_posts ) ) : ?>

			<div class="alify-posts-grid__cards">
				<?php foreach ( $alify_grid_posts as $alify_grid_index => $alify_grid_post ) : ?>
					<?php
					$alify_grid_image = get_the_post_thumbnail_url( $alify_grid_post, 'alify-card' );
					if ( ! $alify_grid_image ) {
						$alify_grid_image = ALIFY_URI . '/assets/images/waveline/' . $alify_grid_fallbacks[ $alify_grid_index % count( $alify_grid_fallbacks ) ] . '.jpg';
					}
					$alify_grid_cats = get_the_category( $alify_grid_post->ID );
					?>
					<article class="alify-post-card">
						<a class="alify-post-card__media" href="<?php echo esc_url( (string) get_permalink( $alify_grid_post ) ); ?>">
							<img src="<?php echo esc_url( $alify_grid_image ); ?>" alt="<?php echo esc_attr( get_the_title( $alify_grid_post ) ); ?>" loading="lazy">
						</a>
						<div class="alify-post-card__body">
							<div class="alify-post-card__meta">
								<?php if ( ! empty( $alify_grid_cats ) ) : ?>
									<span class="alify-post-card__cat"><?php echo esc_html( $alify_grid_cats[0]->name ); ?></span>
								<?php endif; ?>
								<time datetime="<?php echo esc_attr( get_the_date( 'c', $alify_grid_post ) ); ?>">
									<?php echo esc_html( get_the_date( '', $alify_grid_post ) ); ?>
								</time>
							</div>
							<h3 class="alify-post-card__title">
								<a href="<?php echo esc_url( (string) get_permalink( $alify_grid_post ) ); ?>">
									<?php echo esc_html( get_the_title( $alify_grid_post ) ); ?>
								</a>
							</h3>
							<p class="alify-post-card__excerpt">
								<?php echo esc_html( get_the_excerpt( $alify_grid_post ) ); ?>
							</p>
							<a class="alify-post-card__link" href="<?php echo esc_url( (string) get_permalink( $alify_grid_post ) ); ?>">
								<?php esc_html_e( 'Read more', 'alify' ); ?>
								<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
							</a>
						</div>
					</article>
				<?php endforeach; ?>
			</div>

			<?php
			the_posts_pagination(
				array(
					'mid_size'  => 2,
					'prev_text' => esc_html__( 'Newer', 'alify' ),
					'next_text' => esc_html__( 'Older', 'alify' ),
				)
			);
			?>

		<?php else : ?>
			<p class="alify-posts-grid__empty"><?php esc_html_e( 'No articles found.', 'alify' ); ?></p>
		<?php endif; ?>
	</div>
</section>
