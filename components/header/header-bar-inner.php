<?php if ( have_rows( 'header', 'options' ) ) : ?>

	<?php while ( have_rows( 'header', 'options' ) ) :
		the_row();

		$location_icon = get_sub_field( 'location_icon' );
		$location_name = get_sub_field( 'location_name' );
		$main_logo = get_sub_field( 'main_logo' );
		$menu_logo = get_sub_field( 'menu_logo' );
		$close_logo = get_sub_field( 'close_logo' );

		$text = $args['text'] ?? '';
		$path = $args['path'] ?? '';
		$class = $args['class'] ?? '';

		?>

		<div class="absolute top-0 left-0 w-full p-8 grid grid-cols-12 lg:gap-x-16 <?= $text; ?> <?= $path; ?> <?= $class; ?>">

			<!-- Location -->
			<div class="col-span-4 flex">

				<a href="#" class="flex self-start gap-x-2 items-center hover-opacity">
					<div class="w-[20px]">
						<?= $location_icon; ?>
					</div>

					<div class="font-agn text-[18px] leading-[0.8] relative top-[2px] max-lg:hidden">
						<?= $location_name; ?>
					</div>
				</a>

			</div>

			<!-- Logo -->
			<div class="col-span-4 flex justify-center">

				<a href="<?= home_url( '/' ) ?>" class="w-[50px] hover-opacity">
					<?= $main_logo; ?>
				</a>

			</div>

			<!-- Menu -->
			<div class="col-span-4 flex justify-end">

				<a href="#" class="w-[29px] js-hb-menu prevent-children relative hover-opacity">

					<span class="absolute top-0 left-0 js-hb-menu-open transition-opacity duration-1000">
						<?= $menu_logo; ?>
					</span>

					<span class="absolute top-0 left-0 js-hb-menu-close transition-opacity duration-1000 opacity-0">
						<?= $close_logo; ?>
					</span>

				</a>

			</div>

		</div>

	<?php endwhile; ?>

<?php endif; ?>