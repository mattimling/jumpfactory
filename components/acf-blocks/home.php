<?php
// Determine which page ID to use for ACF fields
if ( is_404() ) {
	// Get the fallback page URL from options (saved in default language)
	$error_404_url = get_field( 'error_404_page', 'options' );

	// Get the fallback page object in default language
	$fallback_page = get_page_by_path( str_replace( home_url( '/' ), '', trailingslashit( $error_404_url ) ) );
	$default_page_id = $fallback_page ? $fallback_page->ID : null;

	// Translate page ID to current language using WPML
	$page_id = apply_filters( 'wpml_object_id', $default_page_id, 'page', true, ICL_LANGUAGE_CODE );

	$text = get_field( 'text', $page_id );
} else {
	$page_id = get_queried_object_id();
}


// Now fetch fields from the selected page ID
$top_left_decoration = get_field( 'top_left_decoration', $page_id );
$bottom_right_decoration = get_field( 'bottom_right_decoration', $page_id );
$logo = get_field( 'logo', $page_id );
$star_highlight_text = get_field( 'star_highlight_text', $page_id );
$star_highlight_color = get_field( 'star_highlight_color', $page_id );
?>

<div class="w-full h-[100dvh] js-home overflow-hidden">
	<!-- Decorations -->
	<div class="absolute top-40 left-8 md:top-16 md:left-16 pointer-events-none max-md:scale-75 max-w-[96px]">
		<?= $top_left_decoration; ?>
	</div>

	<div class="absolute bottom-40 right-8 md:bottom-16 md:right-16 pointer-events-none max-md:scale-75 max-w-[96px]">
		<?= $bottom_right_decoration; ?>
	</div>

	<!-- Menu -->
	<?php if ( have_rows( 'locations', $page_id ) ) : ?>
		<div class="absolute top-16 left-0 w-full flex justify-center text-h3 text-red uppercase z-10">
			<div class="flex flex-wrap gap-x-8 lg:gap-x-16 lg:p-10 js-home-hoverable">
				<?php while ( have_rows( 'locations', $page_id ) ) :
					the_row();
					$location = get_sub_field( 'location' );
					?>

					<?php if ( $location ) : ?>
						<a href="<?= $location['url']; ?>" class="hover:text-blue transition-colors duration-300 js-barba-prevent js-exit-link">
							<?= $location['title']; ?>
						</a>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>

	<!-- Logo -->
	<div class="absolute top-0 left-0 w-full h-full flex justify-center items-center px-8 lg:px-16">
		<div class="w-full md:w-[90vw] lg:w-[80vw] xl:w-[70vw] 2xl:w-[60vw] relative js-home-logo">
			<?= $logo; ?>

			<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 max-md:hidden js-home-star pointer-events-none [&.is-hovered]:opacity-0 transition-opacity duration-300">
				<?php get_template_part( 'components/acf-blocks/_star_highlight', null, array(
					'text' => $star_highlight_text,
					'color' => $star_highlight_color,
					'blurin' => true,
					'rotate_on_scroll' => false,
				) ); ?>
			</div>
		</div>
	</div>

	<!-- Languages -->
	<div class="absolute bottom-16 left-0 w-full flex justify-center text-h4 text-red uppercase z-10">
		<div class="flex flex-wrap gap-x-8 lg:gap-x-16 lg:p-10 js-home-hoverable">
			<?php if ( is_404() ) : ?>
				<div class="text-center text-h3 error-404">
					<?= $text; ?>
				</div>
			<?php else : ?>
				<?php
				$languages = apply_filters( 'wpml_active_languages', NULL, array( 'skip_missing' => 0 ) );

				if ( ! empty( $languages ) ) :
					foreach ( $languages as $lang ) :
						$is_current = $lang['active'] ? 'text-blue' : '';
						?>
						<a href="<?= esc_url( $lang['url'] ); ?>" class="hover:text-blue transition-colors duration-300 <?= $is_current; ?>">
							<?= esc_html( strtoupper( $lang['code'] ) ); ?>
						</a>
						<?php
					endforeach;
				endif;
				?>
			<?php endif; ?>
		</div>
	</div>

</div>