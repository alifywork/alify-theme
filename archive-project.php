<?php
/**
 * Projects archive template.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main">

	<header class="page-header">
		<h1 class="page-title"><?php echo esc_html( post_type_archive_title( '', false ) ); ?></h1>
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

				<?php alify_post_thumbnail(); ?>

				<div class="entry-summary">
					<?php echo wp_kses_post( get_the_excerpt() ); ?>
				</div>

				<footer class="entry-footer">
					<?php alify_entry_terms( 'project_category' ); ?>
				</footer>

			</article>
			<?php
		endwhile;

		the_posts_navigation();
		?>

	<?php else : ?>

		<p><?php esc_html_e( 'No projects found.', 'alify' ); ?></p>

	<?php endif; ?>

</main>

<?php
get_sidebar();
get_footer();
