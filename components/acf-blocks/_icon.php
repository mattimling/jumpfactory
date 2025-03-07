<?php

$icon_form = $args['icon_form'] ?? '';
$icon_color = $args['icon_color'] ?? '';

?>

<div class="">

	<?php

	// Color
	switch ( $icon_color ) {
		case 'Blue':
			$color = COLOR_BLUE;
			break;
		case 'Light Blue':
			$color = COLOR_LIGHT_BLUE;
			break;
		case 'Red':
			$color = COLOR_RED;
			break;
	}

	// Form
	switch ( $icon_form ) {
		case 'Circle':
			$form = '<svg width="90" height="90" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M45 90C69.8556 90 90 69.8556 90 45C90 20.1444 69.8556 1.38288e-06 45 0C20.1444 -1.38287e-06 1.38257e-06 20.1498 0 45C-1.38257e-06 69.8502 20.1444 90 45 90Z" fill="' . $color . '"/>
</svg>';
			break;

		case 'Square':
			$form = '<svg width="92" height="92" viewBox="0 0 92 92" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M91.3391 1.33989L1.34037 0.868652L0.869141 90.8674L90.8679 91.3387L91.3391 1.33989Z" fill="' . $color . '"/>
</svg>';
			break;

		case 'Bow':
			$form = '<svg width="91" height="91" viewBox="0 0 91 91" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.765329 0.0634766L45.4179 45.419L90.7626 0.766296L90.0598 90.7636L45.4179 45.419L0.0625 90.0608L0.765329 0.0634766Z" fill="' . $color . '"/>
</svg>';
			break;

		case 'Ovals':
			$form = '<svg width="92" height="93" viewBox="0 0 92 93" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M30.9472 47.4549C30.1271 22.6141 22.7553 2.69334 14.4824 2.96645C6.20942 3.23957 0.167379 23.5977 0.987641 48.4441C1.80796 73.2903 9.17955 93.2055 17.4526 92.9321C25.7255 92.6597 31.7675 72.3012 30.9472 47.4549Z" fill="' . $color . '"/>
<path d="M60.9418 46.4646C60.1217 21.6238 52.7499 1.7031 44.4769 1.97621C36.2039 2.24932 30.1619 22.6075 30.9822 47.4537C31.8025 72.3 39.174 92.2157 47.4471 91.9423C55.7201 91.6689 61.7621 71.3109 60.9418 46.4646Z" fill="' . $color . '"/>
<path d="M90.9403 45.4744C90.1201 20.6336 82.7483 0.712797 74.4753 0.98593C66.2024 1.25907 60.1604 21.6173 60.9806 46.4635C61.8009 71.3097 69.1725 91.2251 77.4456 90.952C85.7181 90.6787 91.7601 70.3205 90.9403 45.4744Z" fill="' . $color . '"/>
</svg>';
			break;

		case 'Crown':
			$form = '<svg width="92" height="92" viewBox="0 0 92 92" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M90.4205 91.0796L0.422852 90.4207L1.08183 0.423096L45.7511 45.7513L91.0794 1.08207L90.4205 91.0796Z" fill="' . $color . '"/>
</svg>';
			break;
	}

	?>

	<div class="w-[90px] h-[90px]" style="transform: rotate(<?= rand( -20, 20 ); ?>deg);">
		<?= $form; ?>
	</div>


</div>