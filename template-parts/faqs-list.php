<?php
/**
 * FAQs page section: FAQ groups — one accordion group per faq_category
 * term, with a sticky category nav.
 *
 * Data: faqs CPT grouped by faq_category, with in-template defaults.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_faqs_defaults = array(
	'general'   => array(
		'label'   => __( 'General', 'alify' ),
		'entries' => array(
			array(
				'question' => __( 'What services does ALIFY offer?', 'alify' ),
				'answer'   => __( 'Web development, UI/UX design, SEO, digital marketing, logo and brand design, and AI automation — delivered by one senior team.', 'alify' ),
			),
			array(
				'question' => __( 'What industries do you work with?', 'alify' ),
				'answer'   => __( 'We work across healthcare, fintech, real estate, SaaS, education, e-commerce, hospitality and more.', 'alify' ),
			),
		),
	),
	'pricing'   => array(
		'label'   => __( 'Pricing', 'alify' ),
		'entries' => array(
			array(
				'question' => __( 'Can I get a custom quote?', 'alify' ),
				'answer'   => __( 'Absolutely — every project is scoped to your needs. Tell us about your goals and we will send a detailed, no-obligation quote.', 'alify' ),
			),
			array(
				'question' => __( 'Are there any hidden costs?', 'alify' ),
				'answer'   => __( 'None. Every quote lists exactly what is included — hosting, licences or third-party tools are always flagged up front.', 'alify' ),
			),
		),
	),
	'process'   => array(
		'label'   => __( 'Process', 'alify' ),
		'entries' => array(
			array(
				'question' => __( 'How does the design process work?', 'alify' ),
				'answer'   => __( 'Discover, design, build, launch — with structured feedback rounds and your approval at every milestone.', 'alify' ),
			),
			array(
				'question' => __( 'What is your typical timeline?', 'alify' ),
				'answer'   => __( 'A website typically takes 4–8 weeks depending on scope. We confirm an exact schedule in your proposal.', 'alify' ),
			),
		),
	),
	'support'   => array(
		'label'   => __( 'Support', 'alify' ),
		'entries' => array(
			array(
				'question' => __( 'Do you offer on-going support?', 'alify' ),
				'answer'   => __( 'Yes — every project includes 30-day post-launch support, and we offer monthly care plans for updates, backups and monitoring.', 'alify' ),
			),
			array(
				'question' => __( 'Do you offer a money-back guarantee?', 'alify' ),
				'answer'   => __( 'If you are not happy with the first design round, we refund your deposit — no questions asked.', 'alify' ),
			),
		),
	),
	'contracts' => array(
		'label'   => __( 'Contracts & Ownership', 'alify' ),
		'entries' => array(
			array(
				'question' => __( 'Who owns the final work?', 'alify' ),
				'answer'   => __( 'You do. On final payment, full ownership of the designs and code transfers to you.', 'alify' ),
			),
			array(
				'question' => __( 'What are your payment terms?', 'alify' ),
				'answer'   => __( 'Typically 50% to start and 50% on delivery. Larger builds can be split across milestones, and retainers are billed monthly.', 'alify' ),
			),
		),
	),
);

/* Build groups from taxonomy terms + faqs CPT posts. */
$alify_faqs_groups = array();
$alify_faqs_terms  = get_terms(
	array(
		'taxonomy'   => 'faq_category',
		'hide_empty' => false,
	)
);

if ( ! is_wp_error( $alify_faqs_terms ) && ! empty( $alify_faqs_terms ) ) {
	foreach ( $alify_faqs_terms as $alify_faqs_term ) {
		$alify_faqs_entries = array();
		$alify_faqs_query   = new WP_Query(
			array(
				'post_type'      => 'faqs',
				'posts_per_page' => 20,
				'orderby'        => 'menu_order date',
				'order'          => 'ASC',
				'no_found_rows'  => true,
				'tax_query'      => array(
					array(
						'taxonomy' => 'faq_category',
						'field'    => 'slug',
						'terms'    => $alify_faqs_term->slug,
					),
				),
			)
		);

		if ( $alify_faqs_query->have_posts() ) {
			while ( $alify_faqs_query->have_posts() ) {
				$alify_faqs_query->the_post();
				$alify_faqs_entries[] = array(
					'question' => get_the_title(),
					'answer'   => get_the_content(),
				);
			}
			wp_reset_postdata();
		} elseif ( isset( $alify_faqs_defaults[ $alify_faqs_term->slug ] ) ) {
			$alify_faqs_entries = $alify_faqs_defaults[ $alify_faqs_term->slug ]['entries'];
		}

		if ( ! empty( $alify_faqs_entries ) ) {
			$alify_faqs_groups[ $alify_faqs_term->slug ] = array(
				'label'   => $alify_faqs_term->name,
				'entries' => $alify_faqs_entries,
			);
		}
	}
}

if ( empty( $alify_faqs_groups ) ) {
	foreach ( $alify_faqs_defaults as $alify_faqs_slug => $alify_faqs_group ) {
		$alify_faqs_groups[ $alify_faqs_slug ] = $alify_faqs_group;
	}
}

/* Single-category view (category archive URLs). */
$alify_faqs_category = isset( $args['category'] ) ? (string) $args['category'] : '';
if ( '' !== $alify_faqs_category && isset( $alify_faqs_groups[ $alify_faqs_category ] ) ) {
	$alify_faqs_groups = array(
		$alify_faqs_category => $alify_faqs_groups[ $alify_faqs_category ],
	);
}
?>

<section class="alify-faqs">
	<div class="container">
		<header class="alify-faqs__header">
			<p class="alify-section-eyebrow"><?php esc_html_e( 'Help centre', 'alify' ); ?></p>
			<h2 class="alify-section-title"><?php esc_html_e( 'Everything you need to know', 'alify' ); ?></h2>
		</header>

		<?php if ( count( $alify_faqs_groups ) > 1 ) : ?>
			<nav class="alify-faqs__nav" aria-label="<?php esc_attr_e( 'FAQ categories', 'alify' ); ?>">
				<?php foreach ( $alify_faqs_groups as $alify_faqs_slug => $alify_faqs_group ) : ?>
					<a class="alify-faqs__chip" href="#faq-<?php echo esc_attr( $alify_faqs_slug ); ?>">
						<?php echo esc_html( $alify_faqs_group['label'] ); ?>
					</a>
				<?php endforeach; ?>
			</nav>
		<?php endif; ?>

		<?php foreach ( $alify_faqs_groups as $alify_faqs_slug => $alify_faqs_group ) : ?>
			<div class="alify-faqs__group" id="faq-<?php echo esc_attr( $alify_faqs_slug ); ?>">
				<h3 class="alify-faqs__group-title"><?php echo esc_html( $alify_faqs_group['label'] ); ?></h3>
				<div class="alify-faqs__list">
					<?php foreach ( $alify_faqs_group['entries'] as $alify_faqs_entry ) : ?>
						<div class="alify-faqs__item">
							<button type="button" class="alify-faqs__question" aria-expanded="false">
								<span><?php echo esc_html( $alify_faqs_entry['question'] ); ?></span>
								<i class="fa-solid fa-plus alify-faqs__icon" aria-hidden="true"></i>
							</button>
							<div class="alify-faqs__answer-wrap">
								<div class="alify-faqs__answer">
									<?php echo esc_html( $alify_faqs_entry['answer'] ); ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
