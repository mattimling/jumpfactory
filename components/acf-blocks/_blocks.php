<?php

if ( get_row_layout() == 'hero' ) :
	get_template_part( 'components/acf-blocks/hero' );

elseif ( get_row_layout() == 'headline' ) :
	get_template_part( 'components/acf-blocks/headline' );

elseif ( get_row_layout() == 'text_cta' ) :
	get_template_part( 'components/acf-blocks/text-cta' );

elseif ( get_row_layout() == 'image_star_highlight' ) :
	get_template_part( 'components/acf-blocks/image-star-highlight' );

elseif ( get_row_layout() == 'global_block' ) :
	get_template_part( 'components/acf-blocks/global-block' );

elseif ( get_row_layout() == 'call_to_action' ) :
	get_template_part( 'components/acf-blocks/call-to-action' );

endif;

?>