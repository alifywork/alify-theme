<?php
/**
 * Home section: FAQ — accessible accordion (top questions + View All link).
 * Data comes from the "faqs" CPT (defaults shown until posts exist).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_faqs = get_posts(
	array(
		'post_type'      => 'faqs',
		'posts_per_page' => 6,
		'post_status'    => 'publish',
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
	)
);

$alify_default_faqs = array(
	array( __( 'How long does a typical project take?', 'alify' ), __( 'Most projects launch in 4-8 weeks depending on scope. We share a detailed timeline before any work begins.', 'alify' ) ),
	array( __( 'Do you work with clients outside your country?', 'alify' ), __( 'Yes — ALIFY serves clients worldwide with async communication and overlapping meeting hours.', 'alify' ) ),
	array( __( 'Which services can I combine?', 'alify' ), __( 'Any of them. Most clients pair web development with UI/UX, SEO and ongoing digital marketing.', 'alify' ) ),
	array( __( 'How do payments work?', 'alify' ), __( 'Typically 50% to start and 50% on launch, or monthly retainers for ongoing work.', 'alify' ) ),
	array( __( 'Do you provide support after launch?', 'alify' ), __( 'Absolutely. Every plan includes support, and we offer ongoing maintenance and growth plans.', 'alify' ) ),
	array( __( 'Can you work with our existing brand guidelines?', 'alify' ), __( 'Of course — we can follow your existing brand system or help you build a new one.', 'alify' ) ),
);

$alify_faqs_url = (string) get_post_type_archive_link( 'faqs' );
?>

<section class="alify-faq" id="alify-faq">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<p class="alify-section-eyebrow"><?php esc_html_e( 'FAQ', 'alify' ); ?></p>
				<h2 class="alify-section-title">
					<?php echo esc_html( alify_field( 'home_faq_title', __( 'Questions? Answered.', 'alify' ) ) ); ?>
				</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-12 col-lg-10">
				<div class="alify-faq__list">
					<?php
					for ( $alify_i = 0; $alify_i < 6; $alify_i++ ) :
						if ( isset( $alify_faqs[ $alify_i ] ) ) {
							$alify_q = get_the_title( $alify_faqs[ $alify_i ] );
							$alify_a = wp_strip_all_tags( (string) get_post_field( 'post_content', $alify_faqs[ $alify_i ] ) );
						} else {
							$alify_q = $alify_default_faqs[ $alify_i ][0];
							$alify_a = $alify_default_faqs[ $alify_i ][1];
						}
						?>
						<div class="alify-faq__item">
							<h3 class="alify-faq__heading">
								<button class="alify-faq__question" type="button" aria-expanded="false">
									<span><?php echo esc_html( $alify_q ); ?></span>
									<i class="fa-solid fa-plus alify-faq__icon" aria-hidden="true"></i>
								</button>
							</h3>
							<div class="alify-faq__panel">
								<div class="alify-faq__answer">
									<?php echo esc_html( wp_trim_words( $alify_a, 40 ) ); ?>
								</div>
							</div>
						</div>
					<?php endfor; ?>
				</div>

				<a class="alify-btn alify-btn--dark alify-faq__all" href="<?php echo esc_url( $alify_faqs_url ); ?>">
					<?php esc_html_e( 'View All FAQs', 'alify' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>
