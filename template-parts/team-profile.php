<?php
/**
 * Team single section: member profile — photo/initials + role + name +
 * bio content (dark).
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

$alify_member_photo = get_the_post_thumbnail_url( get_the_ID(), 'alify-featured' );
$alify_member_role  = function_exists( 'get_field' ) ? (string) get_field( 'role' ) : '';
$alify_member_name  = (string) get_the_title();

/* Initials fallback when no photo. */
$alify_member_initials = '';
$alify_member_words    = preg_split( '/\s+/', trim( $alify_member_name ) );
if ( is_array( $alify_member_words ) ) {
	$alify_member_initials = strtoupper( substr( (string) reset( $alify_member_words ), 0, 1 ) );
	if ( count( $alify_member_words ) > 1 ) {
		$alify_member_initials .= strtoupper( substr( (string) end( $alify_member_words ), 0, 1 ) );
	}
}

$alify_teams_url = (string) get_post_type_archive_link( 'teams' );
if ( '' === $alify_teams_url ) {
	$alify_teams_url = home_url( '/' );
}
?>

<section class="alify-team-profile">
	<div class="container">
		<a class="alify-team-profile__back" href="<?php echo esc_url( $alify_teams_url ); ?>">
			<i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
			<?php esc_html_e( 'Back to team', 'alify' ); ?>
		</a>

		<div class="alify-team-profile__top">
			<div class="alify-team-profile__media">
				<?php if ( $alify_member_photo ) : ?>
					<img src="<?php echo esc_url( $alify_member_photo ); ?>" alt="<?php echo esc_attr( $alify_member_name ); ?>">
				<?php else : ?>
					<span class="alify-team-profile__initials" aria-hidden="true"><?php echo esc_html( $alify_member_initials ); ?></span>
				<?php endif; ?>
			</div>

			<div class="alify-team-profile__intro">
				<?php if ( '' !== trim( $alify_member_role ) ) : ?>
					<span class="alify-team-profile__role"><?php echo esc_html( $alify_member_role ); ?></span>
				<?php endif; ?>
				<h1 class="alify-team-profile__name"><?php echo esc_html( $alify_member_name ); ?></h1>
			</div>
		</div>

		<div class="alify-team-profile__bio">
			<?php echo wp_kses_post( apply_filters( 'the_content', get_the_content() ) ); ?>
		</div>
	</div>
</section>
