<?php
function get_page_or_parent_name() {
	$current_page = get_queried_object();

	// If it's a page
	if ( is_page() ) {
		$parent_id = wp_get_post_parent_id( $current_page->ID );

		if ( $parent_id ) {
			return strtolower( get_the_title( $parent_id ) );
		} else {
			return strtolower( get_the_title( $current_page ) );
		}
	}

	// If it's a post
	if ( is_single() && get_post_type() === 'post' ) {
		$articles_options = get_field( 'articles', 'options' );
		$articles_page_url = $articles_options['articles_page'];

		if ( $articles_page_url ) {
			$page_id = url_to_postid( $articles_page_url );
			if ( $page_id ) {
				return strtolower( get_the_title( $page_id ) );
			}
		}
	}

	return '';
}
?>