<?php

$scroll_speed = get_sub_field( 'scroll_speed' );

?>

<?php if ( have_rows( 'news' ) ) : ?>

	<div class="bg-charcoal text-beige text-h4 flex overflow-hidden js-element-blurin js-news [&>.js-news-item]:ml-8" data-scroll-speed="<?= $scroll_speed ? $scroll_speed : '2'; ?>">

		<div class="js-news-items flex shrink-0 ml-8 gap-x-8">

			<?php
			// Define available icons and colors
			$icons = [ 'bow', 'circle', 'crown', 'ovals', 'square' ];
			$colors = [ '[&_path]:fill-red', '[&_path]:fill-blue', '[&_path]:fill-lightBlue' ];

			// Initialize previous icon and color
			$prev_icon = '';
			$prev_color = '';

			while ( have_rows( 'news' ) ) :
				the_row();

				$news = get_sub_field( 'news' );

				if ( $news ) :

					// Select a random icon that is different from the previous one
					do {
						$random_icon = $icons[ array_rand( $icons ) ];
					} while ( $random_icon === $prev_icon );

					// Select a random color that is different from the previous one
					do {
						$random_color = $colors[ array_rand( $colors ) ];
					} while ( $random_color === $prev_color );

					// Generate a random rotation value between -15 and 15 degrees
					$random_rotation = rand( -15, 15 );

					// Store the current selections as previous values for the next iteration
					$prev_icon = $random_icon;
					$prev_color = $random_color;

					$url = esc_url( $news['url'] );
					$title = esc_html( $news['title'] );
					?>

					<div class="py-8 flex gap-x-8 shrink-0 justify-center items-center">

						<a href="<?= $url; ?>" class="shrink-0 <?= ( $url == '#' || $url == '' ) ? 'pointer-events-none' : 'hover:text-red transition-all duration-300'; ?>">
							<?= $title; ?>
						</a>

						<div class="w-[20px] lg:w-[30px] shrink-0 flex justify-center" style="transform: rotate(<?= $random_rotation; ?>deg);">
							<?= mi_get_icon( $random_icon, $random_color ); ?>
						</div>

					</div>

				<?php endif; ?>

			<?php endwhile; ?>

		</div>

	</div>

<?php endif; ?>