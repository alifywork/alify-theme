<?php
/**
 * Single Service template.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
				<h1 class="entry-title"><?php echo esc_html( get_the_title() ); ?></h1>
				<div class="entry-meta">
					<?php
					alify_posted_on();
					alify_posted_by();
					?>
				</div>
			</header>

			<?php alify_post_thumbnail(); ?>

			<div class="entry-content">
				<?php
				the_content();
				wp_link_pages(
					array(
						'before' => '<nav class="page-links">' . esc_html__( 'Pages:', 'alify' ),
						'after'  => '</nav>',
					)
				);
				?>
			</div>

			<footer class="entry-footer">
				<?php alify_entry_footer(); ?>
			</footer>

		</article>
		<?php
	endwhile;
	?>

</main>

<?php
get_sidebar();
get_footer();
