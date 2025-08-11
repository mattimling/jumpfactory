<?php
$text = get_sub_field( 'text' );
$button = get_sub_field( 'button' );
$roller_checkout_param = get_sub_field( 'roller_checkout_param' );
?>

<div class="px-8 lg:px-16 grid grid-cols-12 lg:gap-x-16 gap-y-16 block-text-cta">
	<div class="col-span-12 xl:col-span-6 text-h3 text-red js-element-blurin will-change-transform block-text-cta-text">
		<?= $text; ?>
	</div>

	<?php if ( $button ) : ?>
		<div class="col-span-12 xl:col-span-6 flex xl:justify-end xl:items-end will-change-transform">
			<?php get_template_part( 'components/acf-blocks/_button', null, array(
				'button' => $button,
				'class' => 'js-element-blurin',
				'roller_checkout_param' => $roller_checkout_param,
			) ); ?>
		</div>
	<?php endif; ?>
</div>