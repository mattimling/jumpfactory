<?php
// Get ACF fields
$all_categories = get_categories();
$category = get_sub_field( 'category' ); // Selected category from ACF
$current_cat = get_query_var( 'cat' ); // Category from the query var
$articles_limit = get_sub_field( 'articles_limit' ) ?: 3; // Set default to 3 if not set
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$articles_options = get_field( 'articles', 'options' );

// Handle the case when a category is selected or not
$category_query = [];

if ( $category ) {
	if ( is_array( $category ) ) {
		// Multiple categories selected, extract term IDs
		$category_query = array_map( function ($term) {
			return $term->term_id; // Extracting term ID
		}, $category );
	} else {
		// Only one category selected
		$category_query = [ $category->term_id ]; // Extract term ID
	}
}

// Setup WP_Query arguments
$args = array(
	'post_type' => 'post',
	'posts_per_page' => intval( $articles_limit ),
	'paged' => $paged,
);

// Add category filter to the query if a category is selected
if ( ! empty( $category_query ) ) {
	// If categories are selected via ACF or query, use category__in to filter posts
	$args['category__in'] = $category_query;
} elseif ( $current_cat ) {
	// If no category is selected in ACF but a category is selected via the query var, use that
	$args['cat'] = $current_cat;
}

$query = new WP_Query( $args );

?>

<!-- Category Filter -->
<div class="px-8 lg:px-16 flex flex-wrap justify-center gap-x-8 lg:gap-x-16 gap-y-4 text-red uppercase text-h3 js-element-blurin">
	<?php
	// Get the current page URL without trailing slash and pagination
	$current_url = untrailingslashit( home_url( add_query_arg( [], $wp->request ) ) );
	$current_page_slug = basename( $current_url );  // Get the last part of the URL (like 'news' or 'wohlen')
	
	// If the URL includes pagination (like '/page/2/'), get the base URL (e.g. 'news')
	if ( preg_match( '/page\/\d+/', $current_url ) ) {
		$current_url_parts = explode( '/', $current_url );
		$current_page_slug = $current_url_parts[ count( $current_url_parts ) - 3 ];  // Get the base URL (before '/page/2')
	}

	// Get filter links
	$filter = $articles_options['articles_filter'];
	?>

	<?php foreach ( $filter as $item ) : ?>
		<?php
		$link = $item['link'];
		$title = $link['title'];
		$url = untrailingslashit( $link['url'] );
		$link_slug = basename( $url );  // Get the last part of the link URL
	
		// Check if the current page URL matches the link URL (handles pagination)
		$is_active = ( $current_page_slug === $link_slug );
		?>
		<a href="<?= esc_url( $url ); ?>" class="transition-all duration-300 hover:text-blue <?= $is_active ? 'is-active text-blue' : ''; ?>">
			<?= esc_html( $title ); ?>
		</a>
	<?php endforeach; ?>
</div>

<!-- Posts Grid -->
<div class="px-8 lg:px-16 grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 gap-16">
	<?php if ( $query->have_posts() ) : ?>
		<?php while ( $query->have_posts() ) :
			$query->the_post(); ?>
			<?php
			$featured_image = get_field( 'featured_image' );
			$categories = get_the_category();
			?>
			<div class="flex flex-col gap-y-8">
				<a href="<?= get_permalink(); ?>" class="flex flex-col gap-y-8 group text-blue js-element-blurin">
					<?php if ( $featured_image ) : ?>
						<div class="overflow-hidden rounded-[10px] aspect-[4/3]">
							<?= mi_get_image( $featured_image, 'xl', 'w-full h-full object-cover group-hover:scale-[1.05] transition-all duration-500 custom-ease-in-out' ); ?>
						</div>
					<?php endif; ?>

					<div class="text-h3 group-hover:text-red transition-colors duration-300 custom-ease-in-out">
						<?= get_the_title(); ?>
					</div>

					<div class="text-h5">
						<?= get_the_excerpt(); ?>
					</div>
				</a>

				<div class="flex flex-wrap gap-2 text-h5 text-blue">

					<?php

					$articles_page = $articles_options['articles_page'];
					$article_category = $categories[0]->name;
					$article_category_link = $articles_page . strtolower( $article_category );

					?>

					<a href="<?= $article_category_link ?>" class="font-bold hover:text-red transition-colors duration-300 custom-ease-in-out">
						<?= $article_category; ?>
					</a>

				</div>
			</div>
		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>
	<?php else : ?>
		<p>No posts found.</p>
	<?php endif; ?>
</div>

<!-- Pagination -->
<?php
$pagination_links = paginate_links( array(
	'total' => $query->max_num_pages,
	'current' => $paged,
	'prev_text' => $articles_options['prev_page_text'],
	'next_text' => $articles_options['next_page_text'],
	'type' => 'array',
	'end_size' => 1,
	'mid_size' => 2,
) );

$prev_link = '';
$next_link = '';
$number_links = [];

if ( $pagination_links ) {
	foreach ( $pagination_links as $link ) {
		if ( strpos( $link, 'prev' ) !== false ) {
			$prev_link = $link;
		} elseif ( strpos( $link, 'next' ) !== false ) {
			$next_link = $link;
		} else {
			$number_links[] = $link;
		}
	}
}
?>

<?php if ( $pagination_links ) : ?>
	<div class="px-8 lg:px-16 js-element-blurin flex justify-center lg:justify-between text-h4 text-red items-center [&_a:hover]:text-blue [&__.current]:text-blue [&_a]:transition-all [&_a]:duration-300">
		<!-- Prev -->
		<div class="<?= $paged <= 1 ? 'opacity-30 pointer-events-none' : '' ?> max-lg:hidden">
			<?= $prev_link ?: $articles_options['prev_page_text']; ?>
		</div>

		<!-- Page Numbers -->
		<div class="flex gap-x-8 lg:gap-x-16">
			<?php foreach ( $number_links as $number_link ) : ?>
				<?= $number_link; ?>
			<?php endforeach; ?>
		</div>

		<!-- Next -->
		<div class="<?= $paged >= $query->max_num_pages ? 'opacity-30 pointer-events-none' : '' ?> max-lg:hidden">
			<?= $next_link ?: $articles_options['next_page_text']; ?>
		</div>
	</div>
<?php endif; ?>