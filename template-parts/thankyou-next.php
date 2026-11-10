<?php
/**
 * Thank-you page section: What happens next — 3 step cards + note + home CTA.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="alify-thankyou-next">
	<div class="container">
		<header class="alify-thankyou-next__header">
			<p class="alify-section-eyebrow"><?php esc_html_e( 'What happens next', 'alify' ); ?></p>
			<h2 class="alify-section-title"><?php esc_html_e( 'Your request is in good hands', 'alify' ); ?></h2>
		</header>

		<div class="alify-thankyou-next__steps">
			<article class="alify-thankyou-next__step">
				<span class="alify-thankyou-next__num">01</span>
				<i class="fa-solid fa-inbox alify-thankyou-next__icon" aria-hidden="true"></i>
				<h3 class="alify-thankyou-next__title"><?php esc_html_e( 'We review your request', 'alify' ); ?></h3>
				<p class="alify-thankyou-next__text">
					<?php esc_html_e( 'Our team studies your brief within 24 hours and lines up the right specialists.', 'alify' ); ?>
				</p>
			</article>

			<article class="alify-thankyou-next__step">
				<span class="alify-thankyou-next__num">02</span>
				<i class="fa-solid fa-phone alify-thankyou-next__icon" aria-hidden="true"></i>
				<h3 class="alify-thankyou-next__title"><?php esc_html_e( 'We reach out for a call', 'alify' ); ?></h3>
				<p class="alify-thankyou-next__text">
					<?php esc_html_e( 'A quick discovery call to align on goals, scope, timeline and budget.', 'alify' ); ?>
				</p>
			</article>

			<article class="alify-thankyou-next__step">
				<span class="alify-thankyou-next__num">03</span>
				<i class="fa-solid fa-file-signature alify-thankyou-next__icon" aria-hidden="true"></i>
				<h3 class="alify-thankyou-next__title"><?php esc_html_e( 'You get a clear proposal', 'alify' ); ?></h3>
				<p class="alify-thankyou-next__text">
					<?php esc_html_e( 'A detailed proposal with deliverables, timeline and pricing — no surprises.', 'alify' ); ?>
				</p>
			</article>
		</div>

		<p class="alify-thankyou-next__note">
			<?php esc_html_e( 'A confirmation email is on its way to your inbox. Meanwhile, explore how we have helped brands like yours.', 'alify' ); ?>
		</p>

		<a class="alify-btn alify-btn--dark" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php esc_html_e( 'Back to home', 'alify' ); ?>
		</a>
	</div>
</section>
