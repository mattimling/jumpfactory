<?php if ( have_rows( 'price_rows' ) ) : ?>

	<div class="px-8 lg:px-16 grid grid-cols-12 xl:gap-x-16 gap-y-16 lg:gap-y-32">

		<?php while ( have_rows( 'price_rows' ) ) :
			the_row();

			$title = get_sub_field( 'title' );
			$text = get_sub_field( 'text' );
			?>

			<!-- Price Rows -->
			<div class="col-span-12 xl:col-span-10 xl:col-start-2 2xl:col-span-8 2xl:col-start-3 text-blue justify-center text-center flex flex-col gap-y-8 js-element-blurin">

				<!-- Title -->
				<div class="text-h2">
					<?= $title; ?>
				</div>

				<!-- Text -->
				<div class="text-h5">
					<?= $text; ?>
				</div>

				<!-- Prices -->
				<?php if ( have_rows( 'prices' ) ) : ?>

					<div class="flex gap-8 justify-center flex-wrap">

						<?php while ( have_rows( 'prices' ) ) :
							the_row();


							$title = get_sub_field( 'title' );
							$hover_text = get_sub_field( 'hover_text' );
							$link = get_sub_field( 'link' );
							?>

							<a href="<?= ($link && $link['url']) ? $link['url'] : '#';?>" class="relative uppercase text-[15px] group lg:h-[44px]">

								<div class="px-5 py-3 lg:group-hover:opacity-0 transition-opacity duration-300 border-2 border-blue">
									<?= $title; ?>
								</div>
                                
                                <div class="relative lg:-top-full left-0 bg-blue text-beige w-full text-center px-5 py-3 lg:opacity-0 group-hover:opacity-100 transition-opacity duration-300 border-2 border-blue h-[44px]">
									<?= $hover_text; ?>
								</div>

							</a>

						<?php endwhile; ?>

					</div>

				<?php endif; ?>

			</div>

		<?php endwhile; ?>

	</div>

<?php endif; ?>