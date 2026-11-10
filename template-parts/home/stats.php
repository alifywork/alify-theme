<?php
/**
 * Home section: Stats counters + services marquee.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="alify-stats" id="alify-stats">
	<div class="container">
		<div class="row">

			<div class="col-6 col-lg-3">
				<div class="alify-stat">
					<span class="alify-stat__value" data-count="250" data-suffix="+">0</span>
					<span class="alify-stat__label"><?php esc_html_e( 'Projects Delivered', 'alify' ); ?></span>
				</div>
			</div>

			<div class="col-6 col-lg-3">
				<div class="alify-stat">
					<span class="alify-stat__value" data-count="120" data-suffix="+">0</span>
					<span class="alify-stat__label"><?php esc_html_e( 'Happy Clients', 'alify' ); ?></span>
				</div>
			</div>

			<div class="col-6 col-lg-3">
				<div class="alify-stat">
					<span class="alify-stat__value" data-count="18" data-suffix="+">0</span>
					<span class="alify-stat__label"><?php esc_html_e( 'Countries Served', 'alify' ); ?></span>
				</div>
			</div>

			<div class="col-6 col-lg-3">
				<div class="alify-stat">
					<span class="alify-stat__value" data-count="4.9" data-decimals="1" data-suffix="/5">0</span>
					<span class="alify-stat__label"><?php esc_html_e( 'Average Rating', 'alify' ); ?></span>
				</div>
			</div>

		</div>
	</div>

	<div class="alify-marquee" aria-hidden="true">
		<div class="alify-marquee__track">
			<?php for ( $alify_i = 0; $alify_i < 2; $alify_i++ ) : ?>
				<span class="alify-marquee__item"><?php esc_html_e( 'Web Development', 'alify' ); ?> <i class="fa-solid fa-asterisk"></i></span>
				<span class="alify-marquee__item"><?php esc_html_e( 'UI/UX Design', 'alify' ); ?> <i class="fa-solid fa-asterisk"></i></span>
				<span class="alify-marquee__item"><?php esc_html_e( 'SEO', 'alify' ); ?> <i class="fa-solid fa-asterisk"></i></span>
				<span class="alify-marquee__item"><?php esc_html_e( 'Digital Marketing', 'alify' ); ?> <i class="fa-solid fa-asterisk"></i></span>
				<span class="alify-marquee__item"><?php esc_html_e( 'Logo Design', 'alify' ); ?> <i class="fa-solid fa-asterisk"></i></span>
				<span class="alify-marquee__item"><?php esc_html_e( 'AI Automation', 'alify' ); ?> <i class="fa-solid fa-asterisk"></i></span>
			<?php endfor; ?>
		</div>
	</div>
</section>
