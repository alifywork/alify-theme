<?php
/**
 * Home section: Hero (kinetic headline over the neon background).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_contact_page = get_page_by_path( 'contact', OBJECT, 'page' );
$alify_contact_url  = ( $alify_contact_page instanceof WP_Post )
	? (string) get_permalink( $alify_contact_page )
	: home_url( '/contact/' );
$alify_work_url = (string) get_post_type_archive_link( 'project' );
?>

<section class="alify-hero" id="alify-hero">
	<div class="alify-hero__bg" aria-hidden="true">
		<img src="<?php echo esc_url( ALIFY_URI . '/assets/images/neonline/neonline-01.webp' ); ?>" alt="">
		<span class="alify-hero__overlay"></span>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-10">
				<p class="alify-hero__eyebrow">
					<?php echo esc_html( alify_field( 'home_hero_eyebrow', __( 'Worldwide Digital Agency', 'alify' ) ) ); ?>
				</p>
				<h1 class="alify-hero__title">
					<?php echo esc_html( alify_field( 'home_hero_title', __( 'Digital Services That Drive Growth Worldwide', 'alify' ) ) ); ?>
				</h1>
				<p class="alify-hero__sub">
					<?php echo esc_html( alify_field( 'home_hero_sub', __( 'Web development, UI/UX, SEO, digital marketing, logo design and AI automation — everything your brand needs to scale, from one dedicated team.', 'alify' ) ) ); ?>
				</p>
				<div class="alify-hero__actions">
					<a class="alify-btn alify-btn--primary" href="<?php echo esc_url( $alify_contact_url ); ?>">
						<?php echo esc_html( alify_field( 'home_hero_cta_primary', __( 'Get a Free Quote', 'alify' ) ) ); ?>
					</a>
					<a class="alify-btn alify-btn--secondary" href="<?php echo esc_url( $alify_work_url ); ?>">
						<?php esc_html_e( 'View Our Work', 'alify' ); ?>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="alify-hero__scroll" aria-hidden="true">
		<i class="fa-solid fa-arrow-down"></i>
	</div>
</section>
