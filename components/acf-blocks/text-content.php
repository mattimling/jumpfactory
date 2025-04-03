<?php

$text = get_sub_field( 'text' );
$text_color = get_sub_field( 'text_color' );
$text_width = get_sub_field( 'text_width' );

?>

<div class="px-8 lg:px-16 <?= $text_color == 'Blue' ? 'text-blue' : 'text-red'; ?> <?= $text_width == 'Full Width' ? '' : 'max-w-[1200px]'; ?> text-h5 block-text-content flex flex-col gap-y-5 js-element-blurin body-links-small [&_a]:decoration-blue">

	<?= $text; ?>

</div>