<?php

$title = get_sub_field( 'title' );

?>

<div class="px-8 lg:px-16 text-blue flex flex-col gap-y-16">

	<h6 class="js-element-blurin">
		<?= $title; ?>
	</h6>

	<div class="grid grid-cols-12 2xl:gap-x-16">

		<div class="col-span-12 2xl:col-span-8 flex flex-col gap-y-16">

			<?php if ( have_rows( 'items' ) ) : ?>

				<?php while ( have_rows( 'items' ) ) :
					the_row();

					$title = get_sub_field( 'title' );
					$text = get_sub_field( 'text' );
					?>

					<div class="flex flex-col gap-y-8 js-element-blurin">

						<h2 class="text-h2">
							<?= $title ?>
						</h2>

						<div class="text-h5">
							<?= $text; ?>
						</div>

					</div>

				<?php endwhile; ?>

			<?php endif; ?>

		</div>

	</div>

</div>