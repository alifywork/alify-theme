<?php
/**
 * Testimonials archive section: quote cards grid.
 *
 * Data: testimonials CPT (title = author, content = quote,
 * author_role = role), with in-template defaults.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_tgrid_items = array();
$alify_tgrid_query = new WP_Query(
	array(
		'post_type'      => 'testimonials',
		'posts_per_page' => 12,
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
		'no_found_rows'  => true,
	)
);

if ( $alify_tgrid_query->have_posts() ) {
	while ( $alify_tgrid_query->have_posts() ) {
		$alify_tgrid_query->the_post();
		$alify_tgrid_items[] = array(
			'name'  => get_the_title(),
			'role'  => function_exists( 'get_field' ) ? (string) get_field( 'author_role' ) : '',
			'quote' => get_the_content(),
		);
	}
	wp_reset_postdata();
}

if ( empty( $alify_tgrid_items ) ) {
	$alify_tgrid_items = array(
		array(
			'name'  => __( 'Anna Reed', 'alify' ),
			'role'  => __( 'CEO, Brightline SaaS', 'alify' ),
			'quote' => __( 'ALIFY rebuilt our platform and our brand perception. Inbound demos doubled within three months.', 'alify' ),
		),
		array(
			'name'  => __( 'Marcus Lee', 'alify' ),
			'role'  => __( 'Founder, Northwind Realty', 'alify' ),
			'quote' => __( 'The team is fast, creative and genuinely invested in our growth. Our cost per lead dropped 38%.', 'alify' ),
		),
		array(
			'name'  => __( 'Sofia Marques', 'alify' ),
			'role'  => __( 'Director, Verto Finance', 'alify' ),
			'quote' => __( 'From brand to website to automation, one partner handled it all. Absolutely world-class.', 'alify' ),
		),
	);
}
?>

<section class="alify-testimonials-grid">
	<div class="container">
		<header class="alify-testimonials-grid__header">
			<p class="alify-section-eyebrow"><?php esc_html_e( 'Testimonials', 'alify' ); ?></p>
			<h2 class="alify-section-title"><?php echo esc_html( post_type_archive_title( '', false ) ); ?></h2>
			<p class="alify-testimonials-grid__intro">
				<?php esc_html_e( 'What clients around the world say about working with ALIFY.', 'alify' ); ?>
			</p>
		</header>

		<div class="alify-testimonials-grid__cards">
			<?php foreach ( $alify_tgrid_items as $alify_tgrid_item ) : ?>
				<article class="alify-testimonial-card">
					<i class="fa-solid fa-quote-left alify-testimonial-card__icon" aria-hidden="true"></i>
					<div class="alify-testimonial-card__stars" aria-label="<?php esc_attr_e( '5 out of 5 stars', 'alify' ); ?>">
						<?php for ( $alify_tgrid_star = 0; $alify_tgrid_star < 5; $alify_tgrid_star++ ) : ?>
							<i class="fa-solid fa-star" aria-hidden="true"></i>
						<?php endfor; ?>
					</div>
					<blockquote class="alify-testimonial-card__quote">
						<?php echo esc_html( $alify_tgrid_item['quote'] ); ?>
					</blockquote>
					<footer class="alify-testimonial-card__author">
						<strong><?php echo esc_html( $alify_tgrid_item['name'] ); ?></strong>
						<?php if ( '' !== trim( $alify_tgrid_item['role'] ) ) : ?>
							<span><?php echo esc_html( $alify_tgrid_item['role'] ); ?></span>
						<?php endif; ?>
					</footer>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
