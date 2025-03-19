<?php

$block = get_sub_field( 'block' );

?>

<?php if ( $block ) :

	$block_id = $block->ID;
	?>

	<?php if ( have_rows( 'blocks', $block_id ) ) : ?>

		<?php while ( have_rows( 'blocks', $block_id ) ) :
			the_row(); ?>

			<?php get_template_part( 'components/acf-blocks/_blocks' ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

<?php endif; ?>