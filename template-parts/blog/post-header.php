<?php
/**
 * Blog single section: article header (dark) + featured image.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_post_image = get_the_post_thumbnail_url( get_the_ID(), 'alify-featured' );
if ( ! $alify_post_image ) {
	$alify_post_image = ALIFY_URI . '/assets/images/waveline/waveline-08.jpg';
}
$alify_post_cats     = get_the_category();
$alify_blog_index_url = (string) get_permalink( (int) get_option( 'page_for_posts' ) );
if ( '' === $alify_blog_index_url ) {
	$alify_blog_index_url = home_url( '/' );
}
?>

<section class="alify-post-header">
	<div class="container">
		<a class="alify-post-header__back" href="<?php echo esc_url( $alify_blog_index_url ); ?>">
			<i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
			<?php esc_html_e( 'Back to blog', 'alify' ); ?>
		</a>

		<div class="alify-post-header__meta">
			<?php if ( ! empty( $alify_post_cats ) ) : ?>
				<span class="alify-post-header__cat"><?php echo esc_html( $alify_post_cats[0]->name ); ?></span>
			<?php endif; ?>
			<span><?php echo esc_html( get_the_author() ); ?></span>
			<span aria-hidden="true">/</span>
			<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
		</div>

		<h1 class="alify-post-header__title"><?php echo esc_html( get_the_title() ); ?></h1>
	</div>

	<div class="alify-post-header__media">
		<div class="container">
			<img src="<?php echo esc_url( $alify_post_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
		</div>
	</div>
</section>
