<?php if ( have_rows( 'slides' ) ) : ?>
	<div class="overflow-hidden js-swiper-centered js-element-blurin">
		<div class="flex relative swiper-wrapper cursor-move">
			<?php while ( have_rows( 'slides' ) ) :
				the_row();
				$image = get_sub_field( 'image' );
				$title = get_sub_field( 'title' );
				?>

				<div class="!w-[85%] lg:!w-[66.47%] shrink-0 aspect-[904/596] h-full swiper-slide mx-2 lg:mx-8 relative">
					<?= mi_get_image( $image, 'xl', 'w-full h-full object-cover rounded-[10px] overflow-hidden' ) ?>

					<div class="absolute bottom-4 lg:bottom-8 left-4 lg:left-8 text-h3 text-beige">
						<?= $title; ?>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>