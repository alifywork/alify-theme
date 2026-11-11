<?php
/**
 * Search results template.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main">

	<header class="page-header">
		<h1 class="page-title">
			<?php esc_html_e( 'Search Results for:', 'alify' ); ?>
			<span><?php echo esc_html( get_search_query() ); ?></span>
		</h1>
	</header>

	<?php if ( have_posts() ) : ?>

		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">
					<h2 class="entry-title">
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
					</h2>
				</header>

				<div class="entry-summary">
					<?php echo wp_kses_post( get_the_excerpt() ); ?>
				</div>

			</article>
			<?php
		endwhile;

		the_posts_navigation();
		?>

	<?php else : ?>

		<p><?php esc_html_e( 'Nothing found. Try a different search term.', 'alify' ); ?></p>
		<?php get_search_form(); ?>

	<?php endif; ?>

</main>

<?php
get_sidebar();
get_footer();
