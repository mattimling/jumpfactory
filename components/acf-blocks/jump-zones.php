<?php

$image = get_sub_field( 'image' );
$description_overlay = get_sub_field( 'description_overlay' );

$star_highlight_text = get_sub_field( 'star_highlight_text' );
$star_highlight_color = get_sub_field( 'star_highlight_color' );
$star_highlight_position = get_sub_field( 'star_highlight_position' );

?>

<div class="relative">

	<!-- Map-->
	<?php if ( have_rows( 'zones' ) ) : ?>

		<div class="relative mb-8 js-element-blurin">

			<?php $first = true; ?>

			<?php while ( have_rows( 'zones' ) ) :
				the_row();

				$title = get_sub_field( 'title' );
				$image = get_sub_field( 'image' );
				?>

				<div class="absolute top-0 left-0 w-full opacity-0 transition-all duration-150 [&.is-active]:opacity-100 js-zone-map" data-zone="<?= sanitize_title( $title ); ?>">
					<?= mi_get_image( $image, 'xl', 'w-full' ); ?>
				</div>

				<?php if ( $first ) : ?>

					<div class="w-full pointer-events-none invisible">
						<?= mi_get_image( $image, 'xl', 'w-full' ); ?>
					</div>

					<?php $first = false; ?>

				<?php endif; ?>

			<?php endwhile; ?>

		</div>

	<?php endif; ?>

	<!-- Buttons -->
	<?php if ( have_rows( 'zones' ) ) : ?>

		<div class="px-8 lg:px-16 flex gap-8 justify-center flex-wrap js-element-blurin">

			<?php while ( have_rows( 'zones' ) ) :
				the_row();

				$title = get_sub_field( 'title' );
				?>

				<a href="#" class="js-zone-button cursor-pointer px-5 py-3 hover:bg-blue hover:text-beige transition-all duration-300 border-[3px] border-blue uppercase text-[15px] text-blue [&.is-active]:text-beige [&.is-active]:bg-blue" data-zone="<?= sanitize_title( $title ); ?>">
					<?= $title; ?>
				</a>

			<?php endwhile; ?>

		</div>

	<?php endif; ?>

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

		<div class="px-8 lg:px-16 absolute top-0 left-0 w-full h-full pointer-events-none">

			<div class="absolute <?= $position; ?> max-xl:hidden">

				<?php get_template_part( 'components/acf-blocks/_star_highlight', null, array(
					'text' => $star_highlight_text,
					'color' => $star_highlight_color,
					'blurin' => true,
					'rotate_on_scroll' => true,
				) ); ?>

			</div>

		</div>

	<?php endif; ?>

</div>