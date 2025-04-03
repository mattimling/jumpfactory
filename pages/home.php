<?php
/* 
	Template Name: Home
 */
?>

<?php get_template_part( 'components/header/header' ); ?>

<?php if ( class_exists( 'ACF' ) ) : ?>

	<?php get_template_part( 'components/acf-blocks/home' ); ?>

<?php else : ?>

	Theme needs ACF plugin to work properly

<?php endif; ?>

<?php get_template_part( 'components/footer/footer' ); ?>