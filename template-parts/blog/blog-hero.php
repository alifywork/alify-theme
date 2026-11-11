<?php
/**
 * Blog listing section: header + category chips + featured article card.
 *
 * Args (optional): featured (WP_Post|null).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_blog_featured = ( isset( $args['featured'] ) && $args['featured'] instanceof WP_Post ) ? $args['featured'] : null;

$alify_blog_title = get_the_title( (int) get_option( 'page_for_posts' ) );
if ( '' === $alify_blog_title ) {
	$alify_blog_title = __( 'The ALIFY Blog', 'alify' );
}

$alify_blog_terms = get_terms(
	array(
		'taxonomy'   => 'category',
		'hide_empty' => true,
		'number'     => 8,
	)
);
if ( is_wp_error( $alify_blog_terms ) ) {
	$alify_blog_terms = array();
}

$alify_blog_index_url = (string) get_permalink( (int) get_option( 'page_for_posts' ) );
if ( '' === $alify_blog_index_url ) {
	$alify_blog_index_url = home_url( '/' );
}
?>

<section class="alify-blog-hero">
	<div class="container">
		<header class="alify-blog-hero__header">
			<p class="alify-section-eyebrow"><?php esc_html_e( 'Insights & Stories', 'alify' ); ?></p>
			<h1 class="alify-blog-hero__title"><?php echo esc_html( $alify_blog_title ); ?></h1>
			<p class="alify-blog-hero__sub">
				<?php esc_html_e( 'Notes on design, development, growth and the craft of building brands online.', 'alify' ); ?>
			</p>
		</header>

		<?php if ( ! empty( $alify_blog_terms ) ) : ?>
			<nav class="alify-blog-hero__chips" aria-label="<?php esc_attr_e( 'Blog categories', 'alify' ); ?>">
				<a class="alify-blog-hero__chip" href="<?php echo esc_url( $alify_blog_index_url ); ?>">
					<?php esc_html_e( 'All', 'alify' ); ?>
				</a>
				<?php foreach ( $alify_blog_terms as $alify_blog_term ) : ?>
					<a class="alify-blog-hero__chip" href="<?php echo esc_url( (string) get_term_link( $alify_blog_term ) ); ?>">
						<?php echo esc_html( $alify_blog_term->name ); ?>
					</a>
				<?php endforeach; ?>
			</nav>
		<?php endif; ?>

		<?php if ( $alify_blog_featured ) : ?>
			<?php
			$alify_blog_image = get_the_post_thumbnail_url( $alify_blog_featured, 'alify-featured' );
			if ( ! $alify_blog_image ) {
				$alify_blog_image = ALIFY_URI . '/assets/images/waveline/waveline-08.jpg';
			}
			$alify_blog_cats = get_the_category( $alify_blog_featured->ID );
			?>
			<article class="alify-blog-featured">
				<a class="alify-blog-featured__media" href="<?php echo esc_url( (string) get_permalink( $alify_blog_featured ) ); ?>">
					<img src="<?php echo esc_url( $alify_blog_image ); ?>" alt="<?php echo esc_attr( get_the_title( $alify_blog_featured ) ); ?>" loading="lazy">
				</a>
				<div class="alify-blog-featured__body">
					<div class="alify-blog-featured__meta">
						<?php if ( ! empty( $alify_blog_cats ) ) : ?>
							<span class="alify-blog-featured__cat"><?php echo esc_html( $alify_blog_cats[0]->name ); ?></span>
						<?php endif; ?>
						<time datetime="<?php echo esc_attr( get_the_date( 'c', $alify_blog_featured ) ); ?>">
							<?php echo esc_html( get_the_date( '', $alify_blog_featured ) ); ?>
						</time>
					</div>
					<h2 class="alify-blog-featured__title">
						<a href="<?php echo esc_url( (string) get_permalink( $alify_blog_featured ) ); ?>">
							<?php echo esc_html( get_the_title( $alify_blog_featured ) ); ?>
						</a>
					</h2>
					<p class="alify-blog-featured__excerpt">
						<?php echo esc_html( get_the_excerpt( $alify_blog_featured ) ); ?>
					</p>
					<a class="alify-btn alify-btn--dark" href="<?php echo esc_url( (string) get_permalink( $alify_blog_featured ) ); ?>">
						<?php esc_html_e( 'Read article', 'alify' ); ?>
					</a>
				</div>
			</article>
		<?php endif; ?>
	</div>
</section>
