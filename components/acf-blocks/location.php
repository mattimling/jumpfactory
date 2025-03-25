<?php

$star_highlight_text = get_sub_field( 'star_highlight_text' );
$star_highlight_color = get_sub_field( 'star_highlight_color' );

?>

<div class="px-8 lg:px-16 grid grid-cols-12 lg:gap-x-16 gap-y-16">

	<div class="col-span-12 lg:col-span-6 relative flex flex-col justify-end gap-y-5 z-[1]">

		<div class="absolute top-0 right-0 lg:left-0 max-xl:hidden js-element-blurin">

			<?php get_template_part( 'components/acf-blocks/_star_highlight', null, array(
				'text' => $star_highlight_text,
				'color' => $star_highlight_color,
				'blurin' => true,
				'rotate_on_scroll' => true,
			) ); ?>

		</div>

		<?php if ( have_rows( 'locations' ) ) : ?>

			<?php while ( have_rows( 'locations' ) ) :
				the_row();

				$title = get_sub_field( 'title' );
				$address = get_sub_field( 'address' );
				?>

				<div class="js-faq js-faq-open will-change-transform js-element-blurin">

					<div class="text-h2 text-blue js-faq-toggle cursor-pointer hover:text-red transition-all duration-150 ease-in-out js-faq-toggle [&.is-active]:!text-red js-location-link [&.is-active]:pointer-events-none" data-title="<?= $title; ?>">
						<?= $title; ?>
					</div>

					<div class="max-h-0 overflow-hidden js-faq-content transition-all duration-500 ease-custom-in-out text-red">

						<div class="py-8 will-change-transform">
							<?= $address; ?>
						</div>

					</div>

				</div>

			<?php endwhile; ?>

		<?php endif; ?>

	</div>

	<div class="col-span-12 lg:col-span-6 js-element-blurin">

		<?php if ( have_rows( 'locations' ) ) : ?>

			<div class="aspect-square w-full h-full relative">

				<?php while ( have_rows( 'locations' ) ) :
					the_row();

					$title = get_sub_field( 'title' );
					$google_map_embed_code = get_sub_field( 'google_map_embed_code' );

					preg_match( '/src="([^"]+)"/', $google_map_embed_code, $matches );
					$google_map_src = $matches[1] ?? '';
					?>

					<div class="absolute pb-[100%] w-full h-0 overflow-hidden max-w-full rounded-[10px] js-location-map transition-opacity duration-500 ease-custom-in-out" data-title="<?= $title; ?>">

						<iframe src="<?= $google_map_src; ?>" class="absolute top-0 left-0 w-full h-full" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

					</div>

				<?php endwhile; ?>

			</div>

		<?php endif; ?>

	</div>

</div>