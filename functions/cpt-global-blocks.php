<?php

add_action( 'init', function () {
	// Register the 'global_blocks' custom post type
	register_post_type( 'global_blocks',
		array(
			'labels' => array(
				'name' => __( 'Global Blocks', 'jumpfactory' ),
				'singular_name' => __( 'Global Block', 'jumpfactory' ),
				'add_new' => __( 'Add New Global Block', 'jumpfactory' ),
				'all_items' => __( 'All Global Blocks', 'jumpfactory' ),
				'edit_item' => __( 'Edit Global Block', 'jumpfactory' ),
				'new_item' => __( 'New Global Block', 'jumpfactory' ),
				'view_item' => __( 'View Global Block', 'jumpfactory' ),
				'search_items' => __( 'Search Global Blocks', 'jumpfactory' ),
				'not_found' => __( 'No Global Blocks found', 'jumpfactory' ),
				'not_found_in_trash' => __( 'No Global Blocks found in Trash', 'jumpfactory' ),
			),
			'public' => false, // Make it unavailable publicly
			'has_archive' => false, // Disable archives
			'rewrite' => false, // Disable custom permalink
			'supports' => array( 'title', 'thumbnail', 'editor' ), // Added 'editor' support for content editing
			'show_ui' => true, // Keep the post type available in admin UI
			'show_in_rest' => true, // Enable the block editor (Gutenberg)
		)
	);

	// Remove the custom taxonomy for categories and tags (not needed anymore)
	// No categories or tags for Global Blocks
} );
?>