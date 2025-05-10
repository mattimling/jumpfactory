<?php
$preloader = is_localhost() ? 0 : 1;
$general_options = get_field( 'general', 'options' );
$bg_color = ! empty( $general_options['background_color'] ) ? $general_options['background_color'] : '#EEE9D2';
?>

<!doctype html>

<html <?php language_attributes(); ?> style="background-color: <?= $bg_color; ?>; <?= $preloader ? 'overflow: hidden; pointer-events: none;' : ''; ?>">

<head>
	<meta name="author" content="EmeleCollab">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />

	<?php wp_head(); ?>

	<?= $general_options['roller_checkout_script'] ?? ''; ?>
</head>

<?php $body_classes = 'font-pjs text-body select-none text-charcoal overflow-x-hidden'; ?>

<body data-barba="js-barba-wrapper" <?php body_class( $body_classes ); ?> <?= $preloader ? 'style="opacity: 0"' : ''; ?> style="<?= $bg_color; ?>">
	<?php
	// Tailwind breakpoints only on localhost
	if ( is_localhost() ) {
		get_template_part( 'components/dev/tailwind-breakpoints' );

		// get_template_part( 'components/dev/menu' );
	}

	// Preloader only if preloader = true
	if ( $preloader ) {
		get_template_part( 'components/global/preloader' );
	}

	// Preload all media
	get_template_part( 'components/global/preload-media' );
	?>

	<div class="page-wrapper js-page-wrapper relative" <?= $preloader ? 'style="opacity: 0"' : ''; ?>>
		<main data-barba="js-barba-content" data-barba-namespace="<?= $wp_query->queried_object->post_name ?>">
			<div class="content-wrapper js-content-wrapper">
				<?php if ( ! is_404() ) : ?>
					<?php get_template_part( 'components/header/header-bar' ); ?>
				<?php endif; ?>