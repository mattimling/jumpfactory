<?php

$text = get_sub_field( 'text' );

?>

<div class="px-8 lg:px-16 flex flex-col gap-y-16 lg:gap-y-32">

	<!-- Text -->
	<div class="grid grid-cols-12 lg:gap-x-16">

		<div class="col-span-12 lg:col-span-5">

			<div class="text-h5 text-red js-element-blurin">
				<?= $text; ?>
			</div>

		</div>

	</div>

	<!-- The Team -->
	<?php if ( have_rows( 'members' ) ) : ?>

		<div class="flex flex-wrap gap-x-8 lg:gap-x-16 gap-y-32">

			<?php while ( have_rows( 'members' ) ) :
				the_row();

				$image = get_sub_field( 'image' );
				$title = get_sub_field( 'title' );
				$text = get_sub_field( 'text' );
				$email = get_sub_field( 'email' );
				?>

				<div class="md:w-[calc(50%-1rem)] lg:w-[calc(50%-2rem)] xl:w-[calc(33.33%-2.666rem)] js-element-blurin text-blue flex flex-col gap-y-8 the-team-member">

					<div class="rounded-[10px] overflow-hidden aspect-[487/654]">
						<?= mi_get_image( $image, 'xl', 'w-full h-full object-cover' ); ?>
					</div>

					<div class="text-h4">
						<?= $title; ?>
					</div>

					<div class="text-h5">
						<?= $text; ?>
					</div>

					<div class="text-h5 font-bold body-links">
						<?= mi_get_link( $email, '' ); ?>
					</div>

				</div>

			<?php endwhile; ?>

		</div>

	<?php endif; ?>

</div>