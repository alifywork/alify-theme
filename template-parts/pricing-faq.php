<?php
/**
 * Pricing page section: FAQ strip — compact accordion of pricing FAQs +
 * link to the full FAQs page.
 *
 * Data: faqs CPT (faq_category = "pricing"), with in-template defaults.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_faq_strip_items = array();
$alify_faq_strip_query = new WP_Query(
	array(
		'post_type'      => 'faqs',
		'posts_per_page' => 4,
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
		'no_found_rows'  => true,
		'tax_query'      => array(
			array(
				'taxonomy' => 'faq_category',
				'field'    => 'slug',
				'terms'    => 'pricing',
			),
		),
	)
);

if ( $alify_faq_strip_query->have_posts() ) {
	while ( $alify_faq_strip_query->have_posts() ) {
		$alify_faq_strip_query->the_post();
		$alify_faq_strip_items[] = array(
			'question' => get_the_title(),
			'answer'   => get_the_content(),
		);
	}
	wp_reset_postdata();
}

if ( empty( $alify_faq_strip_items ) ) {
	$alify_faq_strip_items = array(
		array(
			'question' => __( 'Can I get a custom quote?', 'alify' ),
			'answer'   => __( 'Absolutely — every project is scoped to your needs. Tell us about your goals and we will send a detailed, no-obligation quote.', 'alify' ),
		),
		array(
			'question' => __( 'What are your payment terms?', 'alify' ),
			'answer'   => __( 'Typically 50% to start and 50% on delivery. Larger builds can be split across milestones, and retainers are billed monthly.', 'alify' ),
		),
		array(
			'question' => __( 'Are there any hidden costs?', 'alify' ),
			'answer'   => __( 'None. Every quote lists exactly what is included — hosting, licences or third-party tools are always flagged up front.', 'alify' ),
		),
		array(
			'question' => __( 'Do you offer a money-back guarantee?', 'alify' ),
			'answer'   => __( 'If you are not happy with the first design round, we refund your deposit — no questions asked.', 'alify' ),
		),
	);
}

$alify_faq_strip_page = get_page_by_path( 'faqs' );
$alify_faq_strip_url  = $alify_faq_strip_page ? get_permalink( $alify_faq_strip_page ) : home_url( '/faqs/' );
?>

<section class="alify-faq-strip">
	<div class="container">
		<div class="alify-faq-strip__layout">
			<header class="alify-faq-strip__header">
				<p class="alify-section-eyebrow"><?php esc_html_e( 'FAQs', 'alify' ); ?></p>
				<h2 class="alify-section-title"><?php esc_html_e( 'Pricing questions, answered', 'alify' ); ?></h2>
				<a class="alify-btn alify-btn--secondary alify-faq-strip__all" href="<?php echo esc_url( $alify_faq_strip_url ); ?>">
					<?php esc_html_e( 'View all FAQs', 'alify' ); ?>
				</a>
			</header>

			<div class="alify-faq-strip__list">
				<?php foreach ( $alify_faq_strip_items as $alify_faq_strip_item ) : ?>
					<div class="alify-faq-strip__item">
						<button type="button" class="alify-faq-strip__question" aria-expanded="false">
							<span><?php echo esc_html( $alify_faq_strip_item['question'] ); ?></span>
							<i class="fa-solid fa-plus alify-faq-strip__icon" aria-hidden="true"></i>
						</button>
						<div class="alify-faq-strip__answer-wrap">
							<div class="alify-faq-strip__answer">
								<?php echo esc_html( $alify_faq_strip_item['answer'] ); ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
