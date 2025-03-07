<?php if ( have_rows( 'blocks' ) ) : ?>

	<?php while ( have_rows( 'blocks' ) ) :
		the_row(); ?>

		<?php

		if ( get_row_layout() == 'hero' ) :
			get_template_part( 'components/acf-blocks/hero' );

		elseif ( get_row_layout() == 'headline' ) :
			get_template_part( 'components/acf-blocks/headline' );

		endif;

		?>

	<?php endwhile; ?>

<?php endif; ?>