<?php
/**
 * 404 template.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main">

	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Page Not Found', 'alify' ); ?></h1>
	</header>

	<p><?php esc_html_e( 'The page you are looking for does not exist. Try a search instead.', 'alify' ); ?></p>

	<?php get_search_form(); ?>

	<p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php esc_html_e( 'Back to Home', 'alify' ); ?>
		</a>
	</p>

</main>

<?php
get_footer();
