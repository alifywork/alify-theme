<?php
/**
 * Contact section: Hero — split layout with the full contact form.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_services = array(
	'Web Development',
	'UI/UX Design',
	'SEO',
	'Digital Marketing',
	'Logo Design',
	'AI Automation',
);

$alify_budgets = array(
	__( 'Under $1,000', 'alify' ),
	__( '$1,000 - $5,000', 'alify' ),
	__( '$5,000 - $15,000', 'alify' ),
	__( '$15,000+', 'alify' ),
);
?>

<section class="alify-contact-hero">
	<div class="alify-contact-hero__bg" aria-hidden="true">
		<img src="<?php echo esc_url( ALIFY_URI . '/assets/images/neonline/neonline-03.webp' ); ?>" alt="">
		<span class="alify-contact-hero__overlay"></span>
	</div>

	<div class="container">
		<div class="row align-items-center">

			<div class="col-12 col-lg-5">
				<p class="alify-section-eyebrow alify-section-eyebrow--light"><?php esc_html_e( 'Contact Us', 'alify' ); ?></p>
				<h1 class="alify-contact-hero__title">
					<?php echo esc_html( alify_field( 'contact_hero_title', __( 'Let’s Build Something Great Together', 'alify' ) ) ); ?>
				</h1>
				<p class="alify-contact-hero__sub">
					<?php esc_html_e( 'Fill in the form and our team will get back to you within one business day with clear next steps — no pressure, no jargon.', 'alify' ); ?>
				</p>
			</div>

			<div class="col-12 col-lg-7">
				<div class="alify-contact-hero__card">
					<form class="alify-form" method="post" action="">
						<?php wp_nonce_field( 'alify_quote', 'alify_quote_nonce' ); ?>
						<input type="hidden" name="alify_quote_source" value="<?php echo esc_url( home_url( add_query_arg( array() ) ) ); ?>">

						<div class="row">
							<div class="col-12 col-md-6">
								<div class="alify-form__group">
									<label class="alify-form__label" for="alify-quote-name">
										<?php esc_html_e( 'Your Name', 'alify' ); ?> *
									</label>
									<input class="alify-form__input" type="text" id="alify-quote-name" name="alify_quote_name" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="alify-form__group">
									<label class="alify-form__label" for="alify-quote-email">
										<?php esc_html_e( 'Email Address', 'alify' ); ?> *
									</label>
									<input class="alify-form__input" type="email" id="alify-quote-email" name="alify_quote_email" required>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="alify-form__group">
									<label class="alify-form__label" for="alify-quote-phone">
										<?php esc_html_e( 'Phone Number', 'alify' ); ?>
									</label>
									<input class="alify-form__input" type="tel" id="alify-quote-phone" name="alify_quote_phone">
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="alify-form__group">
									<label class="alify-form__label" for="alify-quote-service">
										<?php esc_html_e( 'Service You Need', 'alify' ); ?>
									</label>
									<select class="alify-form__input" id="alify-quote-service" name="alify_quote_service">
										<option value=""><?php esc_html_e( 'Select a service', 'alify' ); ?></option>
										<?php foreach ( $alify_services as $alify_service ) : ?>
											<option value="<?php echo esc_attr( $alify_service ); ?>">
												<?php echo esc_html( $alify_service ); ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-12">
								<div class="alify-form__group">
									<label class="alify-form__label" for="alify-quote-budget">
										<?php esc_html_e( 'Estimated Budget', 'alify' ); ?>
									</label>
									<select class="alify-form__input" id="alify-quote-budget" name="alify_quote_budget">
										<option value=""><?php esc_html_e( 'Select a range', 'alify' ); ?></option>
										<?php foreach ( $alify_budgets as $alify_budget ) : ?>
											<option value="<?php echo esc_attr( $alify_budget ); ?>">
												<?php echo esc_html( $alify_budget ); ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-12">
								<div class="alify-form__group">
									<label class="alify-form__label" for="alify-quote-message">
										<?php esc_html_e( 'Tell Us About Your Project', 'alify' ); ?>
									</label>
									<textarea class="alify-form__input" id="alify-quote-message" name="alify_quote_message" rows="5"></textarea>
								</div>
							</div>
						</div>

						<button class="alify-btn alify-btn--primary alify-form__submit" type="submit" name="alify_quote_submit" value="1">
							<?php esc_html_e( 'Send Message', 'alify' ); ?>
							<i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
						</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</section>
