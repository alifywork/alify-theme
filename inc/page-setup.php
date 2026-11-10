<?php
/**
 * Default content: pages, menus and reading settings on theme activation.
 *
 * Idempotent — safe to run repeatedly; existing content is left untouched.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_create_default_pages' ) ) {
	/**
	 * Create the core pages once.
	 *
	 * @return int[] Page IDs keyed by slug.
	 */
	function alify_create_default_pages() {
		$titles = array(
			'home'      => 'Home',
			'about'     => 'About Us',
			'blog'      => 'Blog',
			'contact'   => 'Contact',
			'thank-you' => 'Thank You',
		);

		$ids = array();

		foreach ( $titles as $slug => $title ) {
			$page = get_page_by_path( $slug, OBJECT, 'page' );

			if ( $page instanceof WP_Post ) {
				$ids[ $slug ] = (int) $page->ID;
				continue;
			}

			$ids[ $slug ] = (int) wp_insert_post(
				array(
					'post_title'  => $title,
					'post_name'   => $slug,
					'post_status' => 'publish',
					'post_type'   => 'page',
				)
			);
		}

		// Thank You page uses its dedicated page template.
		if ( ! empty( $ids['thank-you'] ) ) {
			update_post_meta( $ids['thank-you'], '_wp_page_template', 'thank-you.php' );
		}

		return $ids;
	}
}

if ( ! function_exists( 'alify_configure_reading_settings' ) ) {
	/**
	 * Front page = Home, posts page = Blog (default Posts).
	 *
	 * @param int[] $ids Page IDs keyed by slug.
	 */
	function alify_configure_reading_settings( $ids ) {
		if ( 'page' !== get_option( 'show_on_front' ) ) {
			update_option( 'show_on_front', 'page' );
		}

		if ( empty( get_option( 'page_on_front' ) ) && ! empty( $ids['home'] ) ) {
			update_option( 'page_on_front', $ids['home'] );
		}

		if ( empty( get_option( 'page_for_posts' ) ) && ! empty( $ids['blog'] ) ) {
			update_option( 'page_for_posts', $ids['blog'] );
		}
	}
}

if ( ! function_exists( 'alify_populate_menu' ) ) {
	/**
	 * Add the default items to a freshly created menu.
	 *
	 * @param string $location Menu location slug.
	 * @param int    $menu_id  Menu term ID.
	 * @param int[]  $ids      Page IDs keyed by slug.
	 */
	function alify_populate_menu( $location, $menu_id, $ids ) {
		$items = array();

		if ( 'primary' === $location || 'mobile' === $location ) {
			$items = array(
				array( 'Home', home_url( '/' ), '' ),
				array( 'Services', (string) get_post_type_archive_link( 'services' ), '' ),
				array( 'Projects', (string) get_post_type_archive_link( 'project' ), '' ),
				array( 'Case Studies', (string) get_post_type_archive_link( 'case_studies' ), '' ),
				array( 'About', isset( $ids['about'] ) ? (string) get_permalink( $ids['about'] ) : home_url( '/about/' ), '' ),
				array( 'Blog', isset( $ids['blog'] ) ? (string) get_permalink( $ids['blog'] ) : home_url( '/blog/' ), '' ),
				array( 'Contact', isset( $ids['contact'] ) ? (string) get_permalink( $ids['contact'] ) : home_url( '/contact/' ), '' ),
			);
		} elseif ( 'footer' === $location ) {
			$items = array(
				array( 'About', isset( $ids['about'] ) ? (string) get_permalink( $ids['about'] ) : home_url( '/about/' ), '' ),
				array( 'Industries', (string) get_post_type_archive_link( 'industries' ), '' ),
				array( 'Pricing', (string) get_post_type_archive_link( 'pricing' ), '' ),
				array( 'FAQs', (string) get_post_type_archive_link( 'faqs' ), '' ),
				array( 'Blog', isset( $ids['blog'] ) ? (string) get_permalink( $ids['blog'] ) : home_url( '/blog/' ), '' ),
				array( 'Contact', isset( $ids['contact'] ) ? (string) get_permalink( $ids['contact'] ) : home_url( '/contact/' ), '' ),
			);
		} elseif ( 'social' === $location ) {
			$items = array(
				array( 'LinkedIn', 'https://www.linkedin.com/', 'fa-brands fa-linkedin' ),
				array( 'X (Twitter)', 'https://x.com/', 'fa-brands fa-x-twitter' ),
				array( 'Facebook', 'https://www.facebook.com/', 'fa-brands fa-facebook-f' ),
				array( 'Instagram', 'https://www.instagram.com/', 'fa-brands fa-instagram' ),
			);
		}

		foreach ( $items as $item ) {
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'   => $item[0],
					'menu-item-url'     => $item[1],
					'menu-item-type'    => 'custom',
					'menu-item-status'  => 'publish',
					'menu-item-classes' => $item[2],
				)
			);
		}
	}
}

if ( ! function_exists( 'alify_create_default_menus' ) ) {
	/**
	 * Create and assign the default menus (idempotent).
	 *
	 * @param int[] $ids Page IDs keyed by slug.
	 */
	function alify_create_default_menus( $ids ) {
		$menus = array(
			'primary' => 'ALIFY Primary',
			'mobile'  => 'ALIFY Mobile',
			'footer'  => 'ALIFY Footer',
			'social'  => 'ALIFY Social',
		);

		$locations = get_theme_mod( 'nav_menu_locations', array() );

		foreach ( $menus as $location => $name ) {
			if ( ! empty( $locations[ $location ] ) && wp_get_nav_menu_object( (int) $locations[ $location ] ) ) {
				continue;
			}

			$menu   = wp_get_nav_menu_object( $name );
			$menu_id = $menu ? (int) $menu->term_id : (int) wp_create_nav_menu( $name );

			if ( ! $menu_id ) {
				continue;
			}

			if ( ! wp_get_nav_menu_items( $menu_id ) ) {
				alify_populate_menu( $location, $menu_id, $ids );
			}

			$locations[ $location ] = $menu_id;
		}

		set_theme_mod( 'nav_menu_locations', $locations );
	}
}

if ( ! function_exists( 'alify_setup_default_content' ) ) {
	/**
	 * Create pages, configure reading settings and build the default menus.
	 */
	function alify_setup_default_content() {
		$ids = alify_create_default_pages();
		alify_configure_reading_settings( $ids );
		alify_create_default_menus( $ids );
		update_option( 'alify_content_version', ALIFY_VERSION );
	}
}
add_action( 'after_switch_theme', 'alify_setup_default_content' );

if ( ! function_exists( 'alify_maybe_setup_default_content' ) ) {
	/**
	 * Re-run after theme updates so newly added pages/menus appear once.
	 */
	function alify_maybe_setup_default_content() {
		if ( is_admin() && ALIFY_VERSION !== get_option( 'alify_content_version' ) ) {
			alify_setup_default_content();
		}
	}
}
add_action( 'admin_init', 'alify_maybe_setup_default_content' );
