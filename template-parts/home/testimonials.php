<?php
/**
 * Home section: Testimonials — auto-play slider with arrows.
 * Data comes from the "testimonials" CPT (defaults shown until posts exist).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_testimonials = get_posts(
	array(
		'post_type'      => 'testimonials',
		'posts_per_page' => 6,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
	)
);

$alify_default_testimonials = array(
	array( 'Sarah Mitchell', 'CEO, Brightwave Media', __( 'ALIFY rebuilt our entire web presence in eight weeks. Leads doubled, and the site finally feels like our brand.', 'alify' ) ),
	array( 'James Okafor', 'Founder, Loopwise SaaS', __( 'From UI/UX to automation, one team handled everything. The quality matched agencies charging three times more.', 'alify' ) ),
	array( 'Ayesha Khan', 'Marketing Director, Northwind Retail', __( 'Their SEO and marketing work took us from page three to the top of search across every market we entered.', 'alify' ) ),
);
?>

<section class="alify-testimonials" id="alify-testimonials">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-lg-8">
				<p class="alify-section-eyebrow alify-section-eyebrow--light"><?php esc_html_e( 'Testimonials', 'alify' ); ?></p>
				<h2 class="alify-section-title alify-section-title--light" style="margin-bottom: 0;">
					<?php echo esc_html( alify_field( 'home_testimonials_title', __( 'Trusted By Clients Around the World', 'alify' ) ) ); ?>
				</h2>
			</div>
			<div class="col-12 col-lg-4">
				<div class="alify-testimonials__nav">
					<button class="alify-testimonials__arrow alify-testimonials__prev" type="button" aria-label="<?php esc_attr_e( 'Previous testimonial', 'alify' ); ?>">
						<i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
					</button>
					<button class="alify-testimonials__arrow alify-testimonials__next" type="button" aria-label="<?php esc_attr_e( 'Next testimonial', 'alify' ); ?>">
						<i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
					</button>
				</div>
			</div>
		</div>
	</div>

	<div class="alify-testimonials__viewport">
		<div class="alify-testimonials__track">
			<?php
			$alify_total = max( (int) count( $alify_testimonials ), (int) count( $alify_default_testimonials ) );
			for ( $alify_i = 0; $alify_i < $alify_total; $alify_i++ ) :
				if ( isset( $alify_testimonials[ $alify_i ] ) ) {
					$alify_post = $alify_testimonials[ $alify_i ];
					$alify_name = get_the_title( $alify_post );
					$alify_quote = get_the_excerpt( $alify_post );
					$alify_role = function_exists( 'get_field' ) ? get_field( 'author_role', $alify_post->ID ) : '';
				} else {
					$alify_name  = $alify_default_testimonials[ $alify_i ][0];
					$alify_role  = $alify_default_testimonials[ $alify_i ][1];
					$alify_quote = $alify_default_testimonials[ $alify_i ][2];
				}

				$alify_initials = '';
				foreach ( explode( ' ', (string) $alify_name ) as $alify_part ) {
					$alify_initials .= '' !== $alify_part ? alify_upper( mb_substr( $alify_part, 0, 1 ) ) : '';
				}
				?>
				<article class="alify-testimonial">
					<i class="fa-solid fa-quote-left alify-testimonial__quote-icon" aria-hidden="true"></i>
					<blockquote class="alify-testimonial__quote">
						<?php echo esc_html( wp_trim_words( $alify_quote, 32 ) ); ?>
					</blockquote>
					<footer class="alify-testimonial__author">
						<span class="alify-testimonial__avatar" aria-hidden="true"><?php echo esc_html( mb_substr( (string) $alify_initials, 0, 2 ) ); ?></span>
						<span class="alify-testimonial__meta">
							<strong><?php echo esc_html( $alify_name ); ?></strong>
							<?php if ( '' !== (string) $alify_role ) : ?>
								<span><?php echo esc_html( (string) $alify_role ); ?></span>
							<?php endif; ?>
						</span>
					</footer>
				</article>
			<?php endfor; ?>
		</div>
	</div>
</section>
