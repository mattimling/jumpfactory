<div class="px-8 lg:px-16 flex flex-col gap-y-8">

	<?php if ( have_rows( 'faq' ) ) : ?>

		<?php while ( have_rows( 'faq' ) ) :
			the_row();

			$title = get_sub_field( 'title' );
			$text = get_sub_field( 'text' );
			?>

			<div class="js-element-blurin js-faq will-change-transform">

				<div class="text-h3 uppercase text-blue flex justify-between items-center cursor-pointer hover:text-red transition-all duration-150 ease-in-out js-faq-toggle [&.is-active]:!text-red [&.is-active_.js-faq-icon]:rotate-[135deg]">
					<span>
						<?= $title; ?>
					</span>

					<span class="relative -top-[1px] transition-all duration-500 js-faq-icon">
						+
					</span>
				</div>

				<div class="text-h5 text-red max-h-0 overflow-hidden js-faq-content transition-all duration-500 ease-custom-in-out">

					<div class="pt-8 pb-1 w-full max-w-[95%] will-change-transform">
						<?= $text; ?>
					</div>

				</div>

			</div>

		<?php endwhile; ?>

	<?php endif; ?>

</div>