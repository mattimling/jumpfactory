<div class="px-8 lg:px-16 flex flex-col gap-y-8">

	<?php if ( have_rows( 'faq' ) ) : ?>

		<?php while ( have_rows( 'faq' ) ) :
			the_row();

			$title = get_sub_field( 'title' );
			$text = get_sub_field( 'text' );
			?>

			<div class="js-element-blurin">

				<div class="text-h3 uppercase text-blue flex justify-between">
					<span>
						<?= $title; ?>
					</span>

					<span>
						+
					</span>
				</div>

				<div class="text-h5 h-0 overflow-hidden">
					<?= $text; ?>
				</div>

			</div>

		<?php endwhile; ?>

	<?php endif; ?>

</div>