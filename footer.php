<?php
/**
 * The footer template.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;
?>

	<footer id="colophon" class="site-footer">

		<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'alify' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu_id'        => 'footer-menu',
					'container'      => false,
					'depth'          => 1,
				)
			);
			?>
		</nav>

		<p class="site-info">
			<?php alify_footer_copyright(); ?>
		</p>

	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
