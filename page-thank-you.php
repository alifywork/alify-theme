<?php
/**
 * Template Name: Thank You Page
 *
 * Form submissions redirect here (use alify_get_thank_you_url() from
 * inc/helpers.php). Auto-applies to a page with the slug "thank-you", or it
 * can be assigned to any page via Page Attributes > Template.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

// Section assets (before get_header() so styles print in the head).
wp_enqueue_style( 'alify-thank-you', ALIFY_URI . '/assets/css/sections/thank-you.css', array( 'alify' ), ALIFY_VERSION );
wp_enqueue_script( 'alify-thank-you', ALIFY_URI . '/assets/js/sections/thank-you.js', array( 'alify-scrolltrigger' ), ALIFY_VERSION, true );

get_header();
?>

<main id="primary" class="site-main alify-thank-you-page">

	<?php while ( have_posts() ) : the_post(); ?>

		<section class="alify-thank-you" aria-labelledby="alify-thank-you-title">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="alify-thank-you__inner">

							<div class="alify-thank-you__icon" aria-hidden="true">
								<i class="fa-solid fa-circle-check"></i>
							</div>

							<h1 id="alify-thank-you-title" class="alify-thank-you__title">
								<?php
								$alify_thank_you_title = get_the_title();
								if ( '' === trim( (string) $alify_thank_you_title ) ) {
									$alify_thank_you_title = esc_html__( 'Thank You', 'alify' );
								}
								echo esc_html( $alify_thank_you_title );
								?>
							</h1>

							<div class="alify-thank-you__content">
								<?php
								$alify_thank_you_content = get_the_content();
								if ( '' === trim( (string) $alify_thank_you_content ) ) :
									?>
									<p><?php esc_html_e( 'Thank you for reaching out. Your submission has been received, and our team will get back to you shortly.', 'alify' ); ?></p>
									<?php
								else :
									echo wp_kses_post( apply_filters( 'the_content', $alify_thank_you_content ) );
								endif;
								?>
							</div>

							<div class="alify-thank-you__actions">
								<a class="alify-btn alify-btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<?php esc_html_e( 'Back to Home', 'alify' ); ?>
								</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>

	<?php endwhile; ?>

</main>

<?php
get_footer();
