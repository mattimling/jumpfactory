<?php
function get_page_or_parent_name() {
	// Get the current page or post object
	$current_page = get_queried_object();

	// Check if it's a page
	if ( is_page() ) {
		// Check if the page has a parent
		$parent_id = wp_get_post_parent_id( $current_page->ID );

		// If the page has a parent, return the parent page title
		if ( $parent_id ) {
			return get_the_title( $parent_id );
		} else {
			// If there is no parent, return the current page title
			return get_the_title( $current_page );
		}
	}

	// Return an empty string or a fallback if not on a page
	return '';
}
?>