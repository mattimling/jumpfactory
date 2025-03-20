<?php

$text = get_sub_field( 'text' );
$button = get_sub_field( 'button' );

?>

<div class="px-8 lg:px-16 grid grid-cols-12 gap-x-16 gap-y-16 block-text-cta">

	<div class="col-span-12 xl:col-span-6 text-h3 text-red js-element-blurin will-change-transform block-text-cta-text">
		<?= $text; ?>
	</div>

	<?php if ( $button ) : ?>

		<div class="col-span-12 xl:col-span-6 flex xl:justify-end xl:items-end will-change-transform">

			<?= mi_get_link( $button, 'button-big js-element-blurin' ); ?>

		</div>

	<?php endif; ?>

</div>