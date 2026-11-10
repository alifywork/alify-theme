<?php
/**
 * Site header: sticky navigation with logo, primary menu, CTA and mobile menu.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_contact_page = get_page_by_path( 'contact', OBJECT, 'page' );
$alify_contact_url  = ( $alify_contact_page instanceof WP_Post )
	? (string) get_permalink( $alify_contact_page )
	: home_url( '/contact/' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
	<div class="container">
		<div class="row align-items-center">

			<div class="col-6 col-lg-2">
				<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img class="site-logo__img site-logo__light" src="<?php echo esc_url( ALIFY_URI . '/assets/images/logo/light-logo.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
					<img class="site-logo__img site-logo__dark" src="<?php echo esc_url( ALIFY_URI . '/assets/images/logo/dark-logo.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				</a>
			</div>

			<div class="col-6 col-lg-10 header-nav-col">
				<nav class="header-nav" aria-label="<?php esc_attr_e( 'Primary menu', 'alify' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container'      => false,
							'menu_class'     => 'header-menu',
							'depth'          => 2,
							'fallback_cb'    => false,
						)
					);
					?>
				</nav>

				<div class="header-actions">
					<a class="alify-btn alify-btn--primary header-cta" href="<?php echo esc_url( $alify_contact_url ); ?>">
						<?php esc_html_e( 'Get a Quote', 'alify' ); ?>
					</a>
					<button class="menu-toggle" id="menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-menu">
						<i class="fa-solid fa-bars" aria-hidden="true"></i>
						<span class="screen-reader-text"><?php esc_html_e( 'Toggle menu', 'alify' ); ?></span>
					</button>
				</div>
			</div>

		</div>
	</div>

	<div class="mobile-menu" id="mobile-menu" hidden>
		<nav aria-label="<?php esc_attr_e( 'Mobile menu', 'alify' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'mobile',
					'container'      => false,
					'menu_class'     => 'mobile-menu__list',
					'depth'          => 1,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
		<a class="alify-btn alify-btn--primary mobile-menu__cta" href="<?php echo esc_url( $alify_contact_url ); ?>">
			<?php esc_html_e( 'Get a Quote', 'alify' ); ?>
		</a>
	</div>
</header>

<div id="smooth-wrapper">
	<div id="smooth-content">
