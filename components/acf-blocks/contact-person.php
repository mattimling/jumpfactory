<?php

$text = get_sub_field( 'text' );
$title = get_sub_field( 'title' );
$contact_info = get_sub_field( 'contact_info' );
$image = get_sub_field( 'image' );

?>

<div class="px-8 lg:px-16 grid grid-cols-12 lg:gap-x-16 gap-y-16">

	<div class="col-span-12 lg:col-span-7 2xl:col-span-5 flex flex-col justify-between gap-y-16">

		<div class="text-h5 text-red flex flex-col gap-y-8 js-element-blurin">
			<?= $text; ?>
		</div>

		<div class="text-blue flex flex-col gap-y-8 js-element-blurin">

			<div class="text-h3 uppercase">
				<?= $title; ?>
			</div>

			<div class="text-h4 body-links">
				<?= $contact_info; ?>
			</div>

		</div>

	</div>

	<div class="col-span-12 lg:col-start-9 lg:col-span-4 js-element-blurin">

		<div class="rounded-[10px] overflow-hidden aspect-[487/654]">
			<?= mi_get_image( $image, 'xl', 'w-full h-full object-cover' ); ?>
		</div>

	</div>

</div>