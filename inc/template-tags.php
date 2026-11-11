<?php
/**
 * Reusable template tags.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'alify_posted_on' ) ) {
	/**
	 * Print the publish (and, if different, updated) date.
	 */
	function alify_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on">%1$s <a href="%2$s" rel="bookmark">%3$s</a></span>',
			esc_html__( 'Posted on', 'alify' ),
			esc_url( get_permalink() ),
			$time_string // Escaped above.
		);
	}
}

if ( ! function_exists( 'alify_posted_by' ) ) {
	/**
	 * Print the post author with a link to their archive.
	 */
	function alify_posted_by() {
		printf(
			'<span class="byline">%1$s <a class="url fn n" href="%2$s">%3$s</a></span>',
			esc_html__( 'by', 'alify' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
}

if ( ! function_exists( 'alify_entry_footer' ) ) {
	/**
	 * Print categories, tags, comments link and edit link.
	 */
	function alify_entry_footer() {
		if ( 'post' === get_post_type() ) {
			$categories = get_the_category_list( esc_html__( ', ', 'alify' ) );
			if ( $categories ) {
				printf(
					'<span class="cat-links">%1$s %2$s</span>',
					esc_html__( 'Posted in', 'alify' ),
					wp_kses_post( $categories )
				);
			}

			$tags = get_the_tag_list( '', esc_html__( ', ', 'alify' ) );
			if ( $tags ) {
				printf(
					'<span class="tags-links">%1$s %2$s</span>',
					esc_html__( 'Tagged', 'alify' ),
					wp_kses_post( $tags )
				);
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a Comment', 'alify' ) );
			echo '</span>';
		}

		edit_post_link( esc_html__( 'Edit', 'alify' ), '<span class="edit-link">', '</span>' );
	}
}

if ( ! function_exists( 'alify_field' ) ) {
	/**
	 * ACF field value with a fallback default (ACF Pro is the content layer).
	 *
	 * @param string $key     Field name.
	 * @param string $default Default when the field is empty or ACF is inactive.
	 * @param string $key     ACF field name.
	 * @param mixed  $default Default when the field is missing/empty.
	 * @param int    $post_id Optional post ID (defaults to current post).
	 * @return mixed Field value or default.
	 */
	function alify_field( $key, $default = '', $post_id = false ) {
		if ( function_exists( 'get_field' ) ) {
			$value = ( false === $post_id ) ? get_field( $key ) : get_field( $key, $post_id );

			if ( is_array( $value ) ) {
				return ! empty( $value ) ? $value : $default;
			}
			if ( is_string( $value ) && '' !== trim( $value ) ) {
				return $value;
			}
			if ( is_int( $value ) || is_float( $value ) ) {
				return $value;
			}
		}

		return $default;
	}
}

if ( ! function_exists( 'alify_upper' ) ) {
	/**
	 * Uppercase a string — works with or without the mbstring extension
	 * (mb_strtoupper is not polyfilled by WordPress core).
	 *
	 * @param string $string Text to uppercase.
	 * @return string Uppercased text.
	 */
	function alify_upper( $string ) {
		$string = (string) $string;
		return function_exists( 'mb_strtoupper' ) ? mb_strtoupper( $string ) : strtoupper( $string );
	}
}

if ( ! function_exists( 'alify_entry_terms' ) ) {
	/**
	 * Print linked terms of the given taxonomies for the current post.
	 *
	 * @param string|array $taxonomies Taxonomy name or names.
	 */
	function alify_entry_terms( $taxonomies ) {
		$terms = get_the_term_list( get_the_ID(), $taxonomies, '', esc_html__( ', ', 'alify' ) );

		if ( ! is_wp_error( $terms ) && $terms ) {
			printf(
				'<span class="terms-links">%s</span>',
				wp_kses_post( $terms )
			);
		}
	}
}

if ( ! function_exists( 'alify_post_thumbnail' ) ) {
	/**
	 * Print the featured image (full on singles, linked card elsewhere).
	 */
	function alify_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail( 'alify-featured' ); ?>
			</div>
			<?php
		else :
			?>
			<a class="post-thumbnail" href="<?php echo esc_url( get_permalink() ); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail( 'alify-card', array( 'alt' => esc_attr( get_the_title() ) ) ); ?>
			</a>
			<?php
		endif;
	}
}
