<?php

$text = get_sub_field( 'text' );

?>

<div class="px-8 lg:px-16 grid grid-cols-12 lg:gap-x-16 gap-y-16">

	<div class="col-span-12 lg:col-span-5 2xl:col-span-4 text-justify flex flex-col gap-y-8 js-element-blurin">

		<?php if ( have_rows( 'schedule' ) ) : ?>

			<?php while ( have_rows( 'schedule' ) ) :
				the_row();

				$day = get_sub_field( 'day' );
				$time = get_sub_field( 'time' );
				?>

				<div class="flex text-h4 text-blue justify-between">
					<div class="">
						<?= $day; ?>
					</div>
					<div class="">
						<?= $time; ?>
					</div>
				</div>

			<?php endwhile; ?>

		<?php endif; ?>

	</div>

	<div class="col-span-12 lg:col-span-5 lg:col-start-8 2xl:col-start-9 2xl:col-span-4 js-element-blurin">

		<div class="text-h5 text-blue">
			<?= $text; ?>
		</div>

	</div>

</div>