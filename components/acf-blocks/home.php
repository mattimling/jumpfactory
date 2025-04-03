<?php

$top_left_decoration = get_field( 'top_left_decoration' );
$bottom_right_decoration = get_field( 'bottom_right_decoration' );
$logo = get_field( 'logo' );

$star_highlight_text = get_field( 'star_highlight_text' );
$star_highlight_color = get_field( 'star_highlight_color' );

?>

<div class="w-full h-[100dvh]">

	<!-- Decorations -->
	<div class="absolute top-40 left-8 md:top-16 md:left-16 pointer-events-none max-md:scale-75">
		<?= $top_left_decoration; ?>
	</div>

	<div class="absolute bottom-40 right-8 md:bottom-16 md:right-16 pointer-events-none max-md:scale-75">
		<?= $bottom_right_decoration; ?>
	</div>

	<!-- Menu -->
	<?php if ( have_rows( 'locations' ) ) : ?>

		<div class="absolute top-16 left-0 w-full flex flex-wrap gap-x-8 lg:gap-x-16 justify-center text-h3 text-red uppercase z-10">

			<?php while ( have_rows( 'locations' ) ) :
				the_row();

				$location = get_sub_field( 'location' );
				?>

				<?php if ( $location ) : ?>

					<a href="<?= $location['url']; ?>" class="hover:text-blue transition-colors duration-300">
						<?= $location['title']; ?>
					</a>

				<?php endif; ?>


			<?php endwhile; ?>

		</div>

	<?php endif; ?>

	<!-- Logo -->
	<div class="absolute top-0 left-0 w-full h-full flex justify-center items-center px-8 lg:px-16">

		<div class="w-full md:w-[90vw] lg:w-[80vw] xl:w-[70vw] 2xl:w-[60vw] relative js-home-logo">

			<?= $logo; ?>

			<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 max-md:hidden js-home-star pointer-events-none">

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
	<div class="absolute bottom-16 left-0 w-full flex flex-wrap gap-x-8 lg:gap-x-16 justify-center text-h4 text-red uppercase z-10">

		<a href="#" class="hover:text-blue transition-colors duration-300">
			DE
		</a>

		<a href="#" class="hover:text-blue transition-colors duration-300 text-blue">
			EN
		</a>

		<a href="#" class="hover:text-blue transition-colors duration-300">
			FR
		</a>

	</div>

</div>