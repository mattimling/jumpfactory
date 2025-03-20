<?php

$image = get_sub_field( 'image' );
$image_size = get_sub_field( 'image_size' );

if ( $image_size == 'Small' ) {
	$size = 'aspect-[4/3] lg:aspect-[1580/654]';
} elseif ( $image_size == 'Big' ) {
	$size = 'aspect-[4/3] lg:aspect-video';
} elseif ( $image_size == 'Original' ) {
	$size = '';
}

$star_highlight_text = get_sub_field( 'star_highlight_text' );
$star_highlight_color = get_sub_field( 'star_highlight_color' );
$star_highlight_position = get_sub_field( 'star_highlight_position' );

?>

<div class="px-8 lg:px-16 relative">

	<!-- Image -->
	<div class=" <?= $size; ?> overflow-hidden rounded-[10px] js-element-blurin relative z-0 js-image-star-highlight-image">
		<?= mi_get_image( $image, 'xl', 'w-full h-full object-cover' ); ?>
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