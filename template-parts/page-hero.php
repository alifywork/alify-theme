<?php
/**
 * Shared inner-page hero (kinetic title over the neon background).
 * Args: title (string), subtitle (string), image (string, optional).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_hero_title = isset( $args['title'] ) && '' !== (string) $args['title'] ? (string) $args['title'] : get_the_title();
$alify_hero_sub   = isset( $args['subtitle'] ) ? (string) $args['subtitle'] : '';
$alify_hero_image = isset( $args['image'] ) && '' !== (string) $args['image']
	? (string) $args['image']
	: ALIFY_URI . '/assets/images/neonline/neonline-02.webp';
?>

<section class="alify-page-hero">
	<div class="alify-page-hero__bg" aria-hidden="true">
		<img src="<?php echo esc_url( $alify_hero_image ); ?>" alt="">
		<span class="alify-page-hero__overlay"></span>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-9">
				<h1 class="alify-page-hero__title"><?php echo esc_html( $alify_hero_title ); ?></h1>
				<?php if ( '' !== $alify_hero_sub ) : ?>
					<p class="alify-page-hero__sub"><?php echo esc_html( $alify_hero_sub ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
