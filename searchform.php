<?php
/**
 * Search form.
 *
 * @package ALIFY
 */

defined( 'ABSPATH' ) || exit;
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="visually-hidden"><?php esc_html_e( 'Search for:', 'alify' ); ?></span>
		<input
			type="search"
			class="search-field"
			placeholder="<?php esc_attr_e( 'Search &hellip;', 'alify' ); ?>"
			value="<?php echo esc_attr( get_search_query() ); ?>"
			name="s"
		/>
	</label>
	<button type="submit" class="search-submit"><?php esc_html_e( 'Search', 'alify' ); ?></button>
</form>
