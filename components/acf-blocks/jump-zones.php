<?php

$image = get_sub_field( 'image' );
$description_overlay = get_sub_field( 'description_overlay' );

$star_highlight_text = get_sub_field( 'star_highlight_text' );
$star_highlight_color = get_sub_field( 'star_highlight_color' );
$star_highlight_position = get_sub_field( 'star_highlight_position' );

?>

<div class="mx-8 lg:mx-16 relative">

	<!-- Image -->
	<div class="overflow-hidden rounded-[10px] js-element-blurin relative z-0 js-image-star-highlight-image">
		<?= mi_get_image( $image, 'xl', 'w-full h-full object-cover' ); ?>

		<div class="absolute top-0 left-0 w-full h-full">
			<?= mi_get_image( $description_overlay, 'xl', 'w-full h-full object-cover' ); ?>
		</div>
	</div>

	<!-- Star Highlight -->
	<?php if ( $star_highlight_text ) : ?>

		<?php

		switch ( $star_highlight_position ) {
			case 'Top Left':
				$position = '-top-16 left-8';
				break;
			case 'Top Right':
				$position = '-top-16 right-8';
				break;
			case 'Bottom Left':
				$position = '-bottom-16 left-8';
				break;

			case 'Bottom Right':
				$position = '-bottom-16 right-8';
				break;
		}

		?>

		<div class="absolute <?= $position; ?>">

			<?php get_template_part( 'components/acf-blocks/_star_highlight', null, array(
				'text' => $star_highlight_text,
				'color' => $star_highlight_color,
				'blurin' => true,
				'rotate_on_scroll' => true,
			) ); ?>

		</div>

	<?php endif; ?>

</div>