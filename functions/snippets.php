<?php

function mi_get_link( $link, $class = '', $active = false, $icon = '' ) {

	if ( ! $link ) {
		return;
	}

	$active_class = $active && $link['url'] === get_permalink() ? ' is-active' : '';
	$url = esc_url( $link['url'] );
	$target = acf_esc_html( $link['target'] );
	$title = acf_esc_html( $link['title'] );

	return '<a href="' . $url . '" class="' . $class . $active_class . '" target="' . $target . '">' . $title . $icon . '</a>';

}

function mi_get_image( $image_id, $size, $class, $lazy = 'lazy' ) {

	$alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );

	echo wp_get_attachment_image(
		$image_id,
		$size,
		false,
		array(
			'class' => esc_attr( $class ),
			'loading' => $lazy,
			'alt' => $alt,
		)
	);

}

function mi_get_icon( $icon, $class = '' ) {

	ob_start();

	get_template_part( 'components/icons/' . $icon );

	$icon_svg = ob_get_clean();

	if ( $class ) {
		// Add class to the first <svg> tag in the file
		$icon_svg = preg_replace( '/<svg([^>]+)>/', '<svg$1 class="' . esc_attr( $class ) . '">', $icon_svg, 1 );
	}

	return $icon_svg;

}
