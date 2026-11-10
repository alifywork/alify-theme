<?php
/**
 * About section: Story — brand story text with mini stats.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="alify-story" id="alify-story">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-lg-6">
				<p class="alify-section-eyebrow"><?php esc_html_e( 'Our Story', 'alify' ); ?></p>
				<h2 class="alify-section-title">
					<?php echo esc_html( alify_field( 'about_story_title', __( 'From A Small Studio To A Worldwide Agency', 'alify' ) ) ); ?>
				</h2>
				<div class="alify-story__text">
					<p>
						<?php echo esc_html( alify_field( 'about_story_p1', __( 'ALIFY started with a simple belief: great digital work should not be limited by borders or big budgets. What began as a small design studio grew into a full-service agency serving clients across the globe.', 'alify' ) ) ); ?>
					</p>
					<p>
						<?php echo esc_html( alify_field( 'about_story_p2', __( 'Today we combine web development, UI/UX, SEO, digital marketing, branding and AI automation under one roof — so your brand gets one dedicated team instead of five disconnected vendors.', 'alify' ) ) ); ?>
					</p>
				</div>
			</div>

			<div class="col-12 col-lg-6">
				<div class="alify-story__stats">
					<div class="alify-story__stat">
						<strong>10+</strong>
						<span><?php esc_html_e( 'Years of Experience', 'alify' ); ?></span>
					</div>
					<div class="alify-story__stat">
						<strong>250+</strong>
						<span><?php esc_html_e( 'Projects Delivered', 'alify' ); ?></span>
					</div>
					<div class="alify-story__stat">
						<strong>40+</strong>
						<span><?php esc_html_e( 'Team Members', 'alify' ); ?></span>
					</div>
					<div class="alify-story__stat">
						<strong>18+</strong>
						<span><?php esc_html_e( 'Countries Served', 'alify' ); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
