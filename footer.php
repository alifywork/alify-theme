<?php
/**
 * Site footer: brand column, service/company links, newsletter signup and
 * the copyright bar.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_contact_page = get_page_by_path( 'contact', OBJECT, 'page' );
$alify_contact_url  = ( $alify_contact_page instanceof WP_Post )
	? (string) get_permalink( $alify_contact_page )
	: home_url( '/contact/' );
?>

	</div><!-- #smooth-content -->
</div><!-- #smooth-wrapper -->

<footer class="site-footer">
	<div class="container">
		<div class="row site-footer__top">

			<div class="col-12 col-lg-3">
				<a class="site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo esc_url( ALIFY_URI . '/assets/images/logo/light-logo.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				</a>
				<p class="site-footer__about">
					<?php esc_html_e( 'Worldwide web development, UI/UX, SEO, digital marketing, logo design and AI automation services.', 'alify' ); ?>
				</p>
				<div class="site-footer__social">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'social',
							'container'      => false,
							'menu_class'     => 'social-menu',
							'depth'          => 1,
							'fallback_cb'    => false,
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>',
						)
					);
					?>
				</div>
			</div>

			<div class="col-6 col-lg-3">
				<h4 class="site-footer__heading"><?php esc_html_e( 'Services', 'alify' ); ?></h4>
				<ul class="site-footer__links">
					<li><a href="<?php echo esc_url( (string) get_post_type_archive_link( 'services' ) ); ?>"><?php esc_html_e( 'Web Development', 'alify' ); ?></a></li>
					<li><a href="<?php echo esc_url( (string) get_post_type_archive_link( 'services' ) ); ?>"><?php esc_html_e( 'UI/UX Design', 'alify' ); ?></a></li>
					<li><a href="<?php echo esc_url( (string) get_post_type_archive_link( 'services' ) ); ?>"><?php esc_html_e( 'SEO', 'alify' ); ?></a></li>
					<li><a href="<?php echo esc_url( (string) get_post_type_archive_link( 'services' ) ); ?>"><?php esc_html_e( 'Digital Marketing', 'alify' ); ?></a></li>
					<li><a href="<?php echo esc_url( (string) get_post_type_archive_link( 'services' ) ); ?>"><?php esc_html_e( 'Logo Design', 'alify' ); ?></a></li>
					<li><a href="<?php echo esc_url( (string) get_post_type_archive_link( 'services' ) ); ?>"><?php esc_html_e( 'AI Automation', 'alify' ); ?></a></li>
				</ul>
			</div>

			<div class="col-6 col-lg-3">
				<h4 class="site-footer__heading"><?php esc_html_e( 'Company', 'alify' ); ?></h4>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'site-footer__links',
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
				?>
			</div>

			<div class="col-12 col-lg-3">
				<h4 class="site-footer__heading"><?php esc_html_e( 'Newsletter', 'alify' ); ?></h4>
				<p class="site-footer__about">
					<?php esc_html_e( 'Get occasional insights on design, development and growth.', 'alify' ); ?>
				</p>
				<form class="newsletter-form" method="post" action="">
					<?php wp_nonce_field( 'alify_newsletter', 'alify_newsletter_nonce' ); ?>
					<label class="screen-reader-text" for="alify-newsletter-email">
						<?php esc_html_e( 'Email address', 'alify' ); ?>
					</label>
					<input class="newsletter-form__input" type="email" id="alify-newsletter-email" name="alify_newsletter_email" placeholder="<?php esc_attr_e( 'Your email address', 'alify' ); ?>" required>
					<button class="newsletter-form__submit" type="submit" name="alify_newsletter_submit" value="1">
						<i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
						<span class="screen-reader-text"><?php esc_html_e( 'Subscribe', 'alify' ); ?></span>
					</button>
				</form>
			</div>

		</div>

		<div class="row site-footer__bottom">
			<div class="col-12 col-lg-6">
				<?php alify_footer_copyright(); ?>
			</div>
			<div class="col-12 col-lg-6">
				<ul class="site-footer__legal">
					<li><a href="<?php echo esc_url( $alify_contact_url ); ?>"><?php esc_html_e( 'Contact', 'alify' ); ?></a></li>
					<li><a href="<?php echo esc_url( (string) get_post_type_archive_link( 'faqs' ) ); ?>"><?php esc_html_e( 'FAQs', 'alify' ); ?></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
