<?php
/* 
	Template Name: Blocks
 */
?>

<?php get_template_part( 'components/header/header' ); ?>

<?php if ( class_exists( 'ACF' ) ) : ?>
	<?php
	$id = get_the_ID();
	$hero_without_image = get_field( 'hero_without_image', $id );
	?>

	<div class="flex flex-col gap-y-16 lg:gap-y-32 Xmb-16 Xlg:mb-32 <?= $hero_without_image ? 'pt-24 lg:pt-40' : ''; ?>">
		<?php get_template_part( 'components/acf-blocks/index' ); ?>
	</div>
<?php else : ?>
	Theme needs ACF plugin to work properly
<?php endif; ?>

<?php get_template_part( 'components/footer/footer' ); ?>