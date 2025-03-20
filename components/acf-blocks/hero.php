<?php

$background_image = get_sub_field( 'background_image' );
$video_link = get_sub_field( 'video_link' );

$title = get_sub_field( 'title' );
$subtitle = get_sub_field( 'subtitle' );

$star_highlight_text = get_sub_field( 'star_highlight_text' );
$star_highlight_color = get_sub_field( 'star_highlight_color' );

?>


<div class="w-full h-[100dvh] js-hero relative will-change-transform overflow-hidden">

	<!-- Video / Image -->
	<?php if ( $video_link ) : ?>

		<div class="w-full h-full js-hero-media overflow-hidden origin-bottom pointer-events-none">

			<div class="w-full h-full js-hero-media-inner">

				<video preload="auto" muted playsinline loop class="w-full h-full object-cover">
					<source src="<?= $video_link; ?>" type="video/mp4">
				</video>

			</div>

		</div>

	<?php else : ?>

		<div class="w-full h-full js-hero-media overflow-hidden origin-bottom pointer-events-none">

			<div class="w-full h-full js-hero-media-inner">

				<?= mi_get_image( $background_image, 'xl', 'w-full h-full object-cover' ); ?>

			</div>

		</div>

	<?php endif; ?>

	<!-- Title + Subtitle -->
	<?php if ( $title || $subtitle ) : ?>

		<div class="absolute bottom-0 left-0 p-8 lg:p-16 grid grid-cols-12 lg:gap-x-16 gap-y-8 js-hero-titles w-full">

			<h1 class="col-span-12 text-h1 text-beige break-words will-change-transform">
				<?= $title; ?>
			</h1>

			<h2 class="col-span-12 xl:col-span-6 text-h3 text-beige will-change-transform">
				<?= $subtitle; ?>
			</h2>

		</div>

	<?php endif; ?>

	<!-- Icons -->
	<?php if ( have_rows( 'icons' ) ) : ?>

		<div class="absolute bottom-0 left-0 p-8 lg:p-16">

			<?php
			$counter = 0; // Initialize counter
		
			while ( have_rows( 'icons' ) ) :
				the_row();
				$counter++; // Increment counter
		
				$icon_form = get_sub_field( 'icon_form' );
				$icon_color = get_sub_field( 'icon_color' );

				// Add special class only to the second item
				$special_class = ( $counter === 2 ) ? 'relative left-[120px]' : '';
				?>

				<div class="<?= $special_class; ?> js-hero-icon">
					<?php get_template_part( 'components/acf-blocks/_icon', null, array(
						'icon_form' => $icon_form,
						'icon_color' => $icon_color,
					) ); ?>
				</div>

			<?php endwhile; ?>


		</div>

	<?php endif; ?>

	<!-- Star Highlight -->
	<?php if ( $star_highlight_text ) : ?>

		<div class="absolute bottom-16 lg:bottom-24 right-8 lg:right-16 w-56 h-56">

			<?php get_template_part( 'components/acf-blocks/_star_highlight', null, array(
				'text' => $star_highlight_text,
				'color' => $star_highlight_color,
				'blurin' => true,
				'rotate_on_scroll' => true,
			) ); ?>

		</div>

	<?php endif; ?>

</div>