<?php

if ( get_row_layout() == 'hero' ) :
	get_template_part( 'components/acf-blocks/hero' );

elseif ( get_row_layout() == 'headline' ) :
	get_template_part( 'components/acf-blocks/headline' );

elseif ( get_row_layout() == 'text_cta' ) :
	get_template_part( 'components/acf-blocks/text-cta' );

elseif ( get_row_layout() == 'image_star_highlight' ) :
	get_template_part( 'components/acf-blocks/image-star-highlight' );

elseif ( get_row_layout() == 'jump_zones' ) :
	get_template_part( 'components/acf-blocks/jump-zones' );

elseif ( get_row_layout() == 'global_block' ) :
	get_template_part( 'components/acf-blocks/global-block' );

elseif ( get_row_layout() == 'call_to_action' ) :
	get_template_part( 'components/acf-blocks/call-to-action' );

elseif ( get_row_layout() == 'how_it_works' ) :
	get_template_part( 'components/acf-blocks/how-it-works' );

elseif ( get_row_layout() == 'contact_person' ) :
	get_template_part( 'components/acf-blocks/contact-person' );

elseif ( get_row_layout() == 'the_team' ) :
	get_template_part( 'components/acf-blocks/the-team' );

elseif ( get_row_layout() == 'opening_times' ) :
	get_template_part( 'components/acf-blocks/opening-times' );

elseif ( get_row_layout() == 'faq' ) :
	get_template_part( 'components/acf-blocks/faq' );

elseif ( get_row_layout() == 'image_slider' ) :
	get_template_part( 'components/acf-blocks/image-slider' );

elseif ( get_row_layout() == 'news' ) :
	get_template_part( 'components/acf-blocks/news' );

elseif ( get_row_layout() == 'location' ) :
	get_template_part( 'components/acf-blocks/location' );

elseif ( get_row_layout() == 'price_list' ) :
	get_template_part( 'components/acf-blocks/price-list' );

elseif ( get_row_layout() == 'offers' ) :
	get_template_part( 'components/acf-blocks/offers' );

endif;

?>