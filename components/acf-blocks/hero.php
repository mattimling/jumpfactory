<?php

$background_image = get_sub_field( 'background_image' );
$video_link = get_sub_field( 'video_link' );

$title = get_sub_field( 'title' );
$subtitle = get_sub_field( 'subtitle' );

$star_highlight_text = get_sub_field( 'star_highlight_text' );
$star_highlight_color = get_sub_field( 'star_highlight_color' );

?>


<div class="w-full h-[100dvh] js-hero relative will-change-transform">

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

		<div class="absolute bottom-0 left-0 p-8 lg:p-16 grid grid-cols-12 gap-x-8 gap-y-8 js-hero-titles w-full">

			<h1 class="col-span-12 text-h1 text-beige break-words will-change-transform">
				<?= $title; ?>
			</h1>

			<h2 class="col-span-12 2xl:col-span-6 text-h2 text-beige will-change-transform">
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

		<div class="absolute bottom-8 lg:bottom-16 right-8 lg:right-16 w-56 h-56">

			<div class="js-hero-star">
				<?php

				switch ( $star_highlight_color ) {
					case 'Blue':
						$star_color = COLOR_BLUE;
						break;
					case 'Light Blue':
						$star_color = COLOR_LIGHT_BLUE;
						break;
					case 'Red':
						$star_color = COLOR_RED;
						break;
				}

				?>
				<svg class="w-full h-auto" width="226" height="226" viewBox="0 0 226 226" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M114.512 0.978771L125.473 25.4198C125.963 26.506 127.404 26.7399 128.203 25.8497L146.179 5.98767C147.137 4.93157 148.895 5.49734 149.046 6.92306L151.919 33.5592C152.048 34.7436 153.353 35.4074 154.386 34.819L177.619 21.4896C178.857 20.7805 180.35 21.8668 180.063 23.2623L174.564 49.4836C174.323 50.6528 175.356 51.6863 176.518 51.4374L202.738 45.9381C204.134 45.6439 205.22 47.1375 204.511 48.3822L191.182 71.6163C190.586 72.6497 191.25 73.9548 192.442 74.083L219.077 76.9571C220.495 77.1079 221.069 78.8656 220.013 79.8236L200.151 97.7998C199.269 98.5994 199.495 100.048 200.581 100.531L225.021 111.491C226.326 112.072 226.326 113.92 225.021 114.509L200.581 125.469C199.495 125.96 199.261 127.401 200.151 128.2L220.013 146.176C221.069 147.134 220.503 148.892 219.077 149.043L192.442 151.917C191.258 152.045 190.594 153.35 191.182 154.384L204.511 177.618C205.22 178.855 204.134 180.349 202.738 180.062L176.518 174.563C175.349 174.321 174.315 175.355 174.564 176.516L180.063 202.738C180.358 204.133 178.864 205.219 177.619 204.51L154.386 191.181C153.353 190.585 152.048 191.249 151.919 192.441L149.046 219.077C148.895 220.495 147.137 221.068 146.179 220.012L128.203 200.15C127.404 199.268 125.956 199.494 125.473 200.58L114.512 225.021C113.932 226.326 112.084 226.326 111.495 225.021L100.535 200.58C100.044 199.494 98.6037 199.26 97.8041 200.15L79.8285 220.012C78.8705 221.068 77.1129 220.503 76.9621 219.077L74.0881 192.441C73.9598 191.256 72.6549 190.593 71.6214 191.181L48.3882 204.51C47.1511 205.219 45.6575 204.133 45.9441 202.738L51.4432 176.516C51.6846 175.347 50.6511 174.314 49.4895 174.563L23.2691 180.062C21.8736 180.356 20.7874 178.862 21.4964 177.618L34.8254 154.384C35.4213 153.35 34.7575 152.045 33.5656 151.917L6.93038 149.043C5.51224 148.892 4.93895 147.134 5.99501 146.176L25.8564 128.2C26.739 127.401 26.5127 125.952 25.4265 125.469L0.978739 114.516C-0.326246 113.935 -0.326246 112.087 0.978739 111.499L25.4189 100.538C26.5051 100.048 26.739 98.607 25.8489 97.8074L6.00255 79.8236C4.9465 78.8656 5.51224 77.1079 6.93792 76.9571L33.5732 74.083C34.7575 73.9548 35.4213 72.6497 34.8329 71.6163L21.504 48.3822C20.7949 47.1451 21.8811 45.6515 23.2766 45.9381L49.497 51.4374C50.6662 51.6787 51.6997 50.6453 51.4507 49.4836L45.9517 23.2623C45.6575 21.8668 47.1511 20.7805 48.3957 21.4896L71.629 34.819C72.6624 35.4149 73.9674 34.7511 74.0956 33.5592L76.9696 6.92306C77.1205 5.50488 78.878 4.93157 79.836 5.98767L97.8117 25.8497C98.6112 26.7323 100.06 26.506 100.542 25.4198L111.495 0.978771C112.076 -0.326257 113.924 -0.326257 114.512 0.978771Z" fill="<?= $star_color; ?>" />
				</svg>
			</div>

			<div class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-center z-[1]">

				<div class="font-agn text-[22px] text-beige uppercase m-10 leading-[1] will-change-transform">
					<?= $star_highlight_text; ?>
				</div>

			</div>

		</div>

	<?php endif; ?>

</div>