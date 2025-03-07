<?php if ( have_rows( 'blocks' ) ) : ?>

	<?php while ( have_rows( 'blocks' ) ) :
		the_row(); ?>

		<?php

		if ( get_row_layout() == 'hero' ) :
			get_template_part( 'components/acf-blocks/hero' );

		elseif ( get_row_layout() == 'headline' ) :
			get_template_part( 'components/acf-blocks/headline' );

		elseif ( get_row_layout() == 'text_cta' ) :
			get_template_part( 'components/acf-blocks/text-cta' );

		elseif ( get_row_layout() == 'image_star_highlight' ) :
			get_template_part( 'components/acf-blocks/image-star-highlight' );

		endif;

		?>

	<?php endwhile; ?>

<?php endif; ?>