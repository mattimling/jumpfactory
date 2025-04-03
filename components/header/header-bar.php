<?php

$id = get_the_ID();
$hero_without_image = get_field( 'hero_without_image', $id );

// Determine class names
if ( $hero_without_image ) {
	$red = '';
	$beige = 'pointer-events-none opacity-0';
	$no_hero = '';
} else {
	$beige = '';
	$red = 'pointer-events-none opacity-0';
	$no_hero = 'js-hbi-no-hero';
}

?>

<div class="fixed top-0 left-0 z-[11] w-full js-hbi <?= esc_attr( $no_hero ) ?>">

	<!-- Beige -->
	<?php get_template_part( 'components/header/header-bar-inner', null, [ 
		'text' => 'text-beige',
		'path' => '[&_path]:fill-beige',
		'class' => 'js-hbi-under ' . esc_attr( $beige ),
	] ); ?>

	<!-- Red -->
	<?php get_template_part( 'components/header/header-bar-inner', null, [ 
		'text' => 'text-red',
		'path' => '[&_path]:fill-red',
		'class' => 'js-hbi-over ' . esc_attr( $red ),
	] ); ?>

</div>

<?php get_template_part( 'components/header/menu' ); ?>