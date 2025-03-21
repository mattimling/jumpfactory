<?php if ( have_rows( 'news' ) ) : ?>

	<div class="bg-charcoal text-beige text-h4 flex flex-nowrap whitespace-nowrap gap-x-8 overflow-scroll">

		<?php while ( have_rows( 'news' ) ) :
			the_row();

			$news = get_sub_field( 'news' );
			?>

			<?php if ( $news ) : ?>

				<a href="<?= $news['url']; ?>" class="py-8">

					<?= $news['title']; ?>

				</a>

			<?php endif; ?>

		<?php endwhile; ?>

	</div>

<?php endif; ?>