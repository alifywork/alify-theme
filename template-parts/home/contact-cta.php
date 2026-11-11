<?php
/**
 * Home section: Contact CTA — split layout with the Quick Quote form.
 * Form handling lives in inc/forms/quote.php (redirects to the thank-you page).
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

$alify_email = alify_field( 'contact_email', 'hello@alify.com', 'option' );
$alify_phone = alify_field( 'contact_phone', '+1 (555) 000-1234', 'option' );
?>

<section class="alify-contact-cta" id="alify-contact-cta">
	<div class="container">
		<div class="row align-items-center">

			<div class="col-12 col-lg-5">
				<p class="alify-section-eyebrow alify-section-eyebrow--light"><?php esc_html_e( 'Get In Touch', 'alify' ); ?></p>
				<h2 class="alify-section-title alify-section-title--light">
						<?php echo esc_html( alify_field( 'home_cta_title', __( 'Have A Project In Mind? Let’s Talk.', 'alify' ), 'option' ) ); ?>
				</h2>
				<p class="alify-contact-cta__text">
					<?php esc_html_e( 'Tell us about your project and we will get back to you within one business day with next steps.', 'alify' ); ?>
				</p>

				<ul class="alify-contact-cta__info">
					<li>
						<i class="fa-solid fa-envelope" aria-hidden="true"></i>
						<a href="<?php echo esc_url( 'mailto:' . sanitize_email( $alify_email ) ); ?>"><?php echo esc_html( $alify_email ); ?></a>
					</li>
					<li>
						<i class="fa-solid fa-phone" aria-hidden="true"></i>
						<a href="<?php echo esc_url( 'tel:' . preg_replace( '/[^0-9+]/', '', $alify_phone ) ); ?>"><?php echo esc_html( $alify_phone ); ?></a>
					</li>
				</ul>
			</div>

			<div class="col-12 col-lg-7">
				<div class="alify-contact-cta__card">
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
							<div class="col-12">
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
									<label class="alify-form__label" for="alify-quote-message">
										<?php esc_html_e( 'Tell Us About Your Project', 'alify' ); ?>
									</label>
									<textarea class="alify-form__input" id="alify-quote-message" name="alify_quote_message" rows="5"></textarea>
								</div>
							</div>
						</div>

						<button class="alify-btn alify-btn--primary alify-form__submit" type="submit" name="alify_quote_submit" value="1">
							<?php esc_html_e( 'Send Request', 'alify' ); ?>
							<i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
						</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</section>
