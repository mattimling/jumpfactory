<div class="fixed bottom-1/2 left-0 z-50 bg-[#ff0000] text-[#fff] text-[15px] p-2">

	<?php

	$args = array(
		'sort_column' => 'menu_order'
	);

	wp_nav_menu( $args );

	?>

</div>