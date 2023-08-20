<?php
/**
 * The searchform.php template. You can create your own search form in this template
 *
 * Used any time that get_search_form() is called.
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$wp_default_unique_id = wp_unique_id( 'search-form-' );

$wp_default_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>
<form role="search" <?php echo $wp_default_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input type="search" id="<?php echo esc_attr( $wp_default_unique_id ); ?>" class="search-field form-control rounded-0 border-0 border-white border-bottom bg-body-tertiary px-0" placeholder="Search Title" value="<?php echo get_search_query(); ?>" name="s" />
	<input type="submit" class="btn btn-outline-secondary rounded-0 border-white text-white" value="<?php echo esc_attr_x( 'Search', 'submit button', 'twentytwentyone' ); ?>" />
    </div>
</form>
