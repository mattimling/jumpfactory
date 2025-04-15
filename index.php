<?php if ( is_404() ) : ?>

	<?php get_template_part( 'pages/404' ); ?>

<?php else : ?>

	<?php get_template_part( 'components/header/header' ); ?>

	<div class="bred">

		<?php the_content(); ?>

	</div>

	<?php get_template_part( 'components/footer/footer' ); ?>

<?php endif; ?>