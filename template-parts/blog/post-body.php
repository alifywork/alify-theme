<?php
/**
 * Blog single section: article content + sticky share rail.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_share_url   = rawurlencode( (string) get_permalink() );
$alify_share_title = rawurlencode( (string) get_the_title() );
?>

<section class="alify-post-body">
	<div class="container">
		<div class="alify-post-body__layout">

			<aside class="alify-post-body__share" aria-label="<?php esc_attr_e( 'Share this article', 'alify' ); ?>">
				<span class="alify-post-body__share-label"><?php esc_html_e( 'Share', 'alify' ); ?></span>

				<a class="alify-share-btn" href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' . $alify_share_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Share on Facebook', 'alify' ); ?>">
					<i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
				</a>
				<a class="alify-share-btn" href="<?php echo esc_url( 'https://twitter.com/intent/tweet?url=' . $alify_share_url . '&text=' . $alify_share_title ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Share on X', 'alify' ); ?>">
					<i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
				</a>
				<a class="alify-share-btn" href="<?php echo esc_url( 'https://www.linkedin.com/sharing/share-offsite/?url=' . $alify_share_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Share on LinkedIn', 'alify' ); ?>">
					<i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
				</a>
				<a class="alify-share-btn" href="<?php echo esc_url( 'mailto:?subject=' . $alify_share_title . '&body=' . $alify_share_url ); ?>" aria-label="<?php esc_attr_e( 'Share by email', 'alify' ); ?>">
					<i class="fa-solid fa-envelope" aria-hidden="true"></i>
				</a>
				<button type="button" class="alify-share-btn" data-copy-link aria-label="<?php esc_attr_e( 'Copy link', 'alify' ); ?>">
					<i class="fa-solid fa-link" aria-hidden="true"></i>
				</button>
				<span class="alify-post-body__copied" data-copy-feedback aria-live="polite"></span>
			</aside>

			<div class="alify-post-body__content">
				<?php the_content(); ?>
			</div>

		</div>
	</div>
</section>
