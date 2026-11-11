<?php
/**
 * Blog listing (posts index) — uses WordPress's default Posts.
 *
 * Sections: blog hero (header + chips + featured article), posts grid +
 * pagination, CTA band. On page 1 the newest post is featured; remaining
 * posts render as cards.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

wp_enqueue_style( 'alify-blog-hero', get_template_directory_uri() . '/assets/css/sections/blog/blog-hero.css', array( 'alify-main' ), ALIFY_VERSION );
wp_enqueue_script( 'alify-blog-hero', get_template_directory_uri() . '/assets/js/sections/blog/blog-hero.js', array( 'alify-main', 'gsap-splittext', 'gsap-scrolltrigger' ), ALIFY_VERSION, true );

wp_enqueue_style( 'alify-posts-grid', get_template_directory_uri() . '/assets/css/sections/blog/posts-grid.css', array( 'alify-main' ), ALIFY_VERSION );
wp_enqueue_script( 'alify-posts-grid', get_template_directory_uri() . '/assets/js/sections/blog/posts-grid.js', array( 'alify-main', 'gsap-scrolltrigger' ), ALIFY_VERSION, true );

wp_enqueue_style( 'alify-cta-band', get_template_directory_uri() . '/assets/css/sections/cta-band.css', array( 'alify-main' ), ALIFY_VERSION );

get_header();

$alify_blog_posts = array();
while ( have_posts() ) {
	the_post();
	$alify_blog_posts[] = get_post();
}

$alify_blog_featured = null;
if ( ! is_paged() && ! empty( $alify_blog_posts ) ) {
	$alify_blog_featured = array_shift( $alify_blog_posts );
}
?>

<main id="primary" class="site-main">

	<?php
	get_template_part(
		'template-parts/blog/blog-hero',
		null,
		array( 'featured' => $alify_blog_featured )
	);
	?>

	<?php
	get_template_part(
		'template-parts/blog/posts-grid',
		null,
		array( 'posts' => $alify_blog_posts )
	);
	?>

	<?php
	get_template_part(
		'template-parts/cta-band',
		null,
		array(
			'title'       => __( 'Ready To Turn Ideas Into Results?', 'alify' ),
			'button_text' => __( 'Start a Conversation', 'alify' ),
			'button_url'  => home_url( '/contact/' ),
		)
	);
	?>

</main>

<?php
get_footer();
