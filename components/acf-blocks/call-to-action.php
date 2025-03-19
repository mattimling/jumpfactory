<?php

$background_image = get_sub_field( 'background_image' );
$title = get_sub_field( 'title' );
$text = get_sub_field( 'text' );
$button = get_sub_field( 'button' );

$star_highlight_text = get_sub_field( 'star_highlight_text' );
$star_highlight_color = get_sub_field( 'star_highlight_color' );

?>

<div class="p-8 lg:p-16 relative js-element-blurin">

	<!-- Image -->
	<div class="w-full h-full absolute top-0 left-0 z-0 js-image-star-highlight-image object-cover bg-charcoal pointer-events-none">
		<?= mi_get_image( $background_image, 'xl', 'w-full h-full object-cover opacity-70' ); ?>
	</div>

	<div class="relative z-[1] text-beige flex flex-col h-full justify-between">

		<h3 class="text-h2 pt-24 pb-24 lg:pb-48 2xl:pb-72 2xl:max-w-[70vw]">
			<?= $title; ?>
		</h3>

		<div class="flex max-lg:flex-col gap-y-8 justify-between lg:items-end">

			<h5 class="text-h5 max-w-[500px]">
				<?= $text; ?>
			</h5>

			<?php if ( $button ) : ?>

				<div class="col-span-12 xl:col-span-6 flex xl:justify-end xl:items-end will-change-transform">

					<?= mi_get_link( $button, 'button-big button-beige' ); ?>

				</div>

			<?php endif; ?>

		</div>

	</div>

	<!-- Star Highlight -->
	<?php if ( $star_highlight_text ) : ?>

		<div class="absolute -top-16 right-8 overflow-hidden js-element-blurin">

			<?php get_template_part( 'components/acf-blocks/_star_highlight', null, array(
				'text' => $star_highlight_text,
				'color' => $star_highlight_color,
				'blurin' => false,
				'rotate_on_scroll' => true,
			) ); ?>

		</div>

	<?php endif; ?>

</div>