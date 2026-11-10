<?php
/**
 * Testimonials archive template (archive only — no single pages).
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

		<div class="testimonial-list">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<figure class="testimonial-photo">
						<?php the_post_thumbnail( 'alify-thumbnail' ); ?>
					</figure>

					<div class="entry-content">
						<?php the_content(); ?>
					</div>

					<header class="entry-header">
						<h2 class="entry-title"><?php echo esc_html( get_the_title() ); ?></h2>
					</header>

					<footer class="entry-footer">
						<?php alify_entry_terms( 'testimonial_category' ); ?>
					</footer>

				</article>
				<?php
			endwhile;
			?>
		</div>

		<?php the_posts_navigation(); ?>

	<?php else : ?>

		<p><?php esc_html_e( 'No testimonials found.', 'alify' ); ?></p>

	<?php endif; ?>

</main>

<?php
get_sidebar();
get_footer();
