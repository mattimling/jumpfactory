<?php
$form_embed = get_sub_field( 'form_embed' );
$text = get_sub_field( 'text' );
?>

<div class="px-8 lg:px-16 grid grid-cols-12 gap-y-16 lg:gap-x-16">
	<div class="col-span-12 lg:col-span-6 xl:col-span-5 contact-form js-element-blurin">
		<?= $form_embed; ?>
	</div>

	<div class="col-span-12 lg:col-span-6 xl:col-span-5 xl:col-start-8 js-element-blurin">
		<div class="text-h5 text-blue">
			<?= $text; ?>
		</div>
	</div>
</div>