<div class="fixed top-0 left-0 z-[11] w-full js-hbi">

	<!-- Beige -->
	<?php get_template_part( 'components/header/header-bar-inner', null, array(
		'text' => 'text-beige',
		'path' => '[&_path]:fill-beige',
		'class' => 'js-hbi-under',
	) ); ?>

	<!-- Red -->
	<?php get_template_part( 'components/header/header-bar-inner', null, array(
		'text' => 'text-red',
		'path' => '[&_path]:fill-red',
		'class' => 'js-hbi-over opacity-0 pointer-events-none',
	) ); ?>


</div>

<?php get_template_part( 'components/header/menu' ); ?>