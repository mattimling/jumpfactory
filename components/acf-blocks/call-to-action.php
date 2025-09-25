<?php
$background_image = get_sub_field( 'background_image' );
$title = get_sub_field( 'title' );
$text = get_sub_field( 'text' );
$button = get_sub_field( 'button' );
$open_popup = get_sub_field( 'open_popup' );
$roller_checkout_param = get_sub_field( 'roller_checkout_param' );

$star_highlight_text = get_sub_field( 'star_highlight_text' );
$star_highlight_color = get_sub_field( 'star_highlight_color' );
?>

<div class="p-8 lg:p-16 relative js-element-blurin">
	<!-- Image -->
	<div class="w-full h-full absolute top-0 left-0 z-0 js-image-star-highlight-image object-cover bg-charcoal pointer-events-none">
		<?= mi_get_image( $background_image, 'xl', 'w-full h-full object-cover opacity-70' ); ?>
	</div>

	<div class="relative z-[1] text-beige flex flex-col h-full justify-between">
		<h3 class="text-h2 pt-8 md:pt-16 pb-16 lg:py-32 xl:py-48 2xl:max-w-[70vw]">
			<?= $title; ?>
		</h3>

		<div class="flex max-lg:flex-col gap-y-16 justify-between lg:items-end">
			<h5 class="text-h5 max-w-[500px]">
				<?= $text; ?>
			</h5>

			<?php if ( $button ) : ?>
				<div class="col-span-12 xl:col-span-6 flex xl:justify-end xl:items-end will-change-transform">
					<?php get_template_part( 'components/acf-blocks/_button', null, array(
						'button' => $button,
						'class' => 'button-beige',
						'roller_checkout_param' => $roller_checkout_param,
						'open_popup' => $open_popup
					) ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<!-- Star Highlight -->
	<?php if ( $star_highlight_text ) : ?>
		<div class="absolute -top-16 right-8 overflow-hidden js-element-blurin max-lg:hidden">
			<?php get_template_part( 'components/acf-blocks/_star_highlight', null, array(
				'text' => $star_highlight_text,
				'color' => $star_highlight_color,
				'blurin' => false,
				'rotate_on_scroll' => true,
			) ); ?>
		</div>
	<?php endif; ?>
</div>