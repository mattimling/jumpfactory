<?php

$preloader = is_localhost() ? 0 : 1;

?>

<!doctype html>

<html <?php language_attributes(); ?> style="background-color: #EEE9D2;" <?= $preloader ? 'style="opacity: 0; overflow: hidden;"' : ''; ?>>

<head>
	<meta name="author" content="EmeleCollab">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />

	<?php wp_head(); ?>
</head>

<?php $body_classes = 'font-pjs text-body select-none text-charcoal bg-beige'; ?>

<body data-barba="js-barba-wrapper" <?php body_class( $body_classes ); ?> <?= $preloader ? 'style="opacity: 0"' : ''; ?>>

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

	// Page transition
	// get_template_part( 'components/global/page-transition' );
	
	?>

	<?php get_template_part( 'components/header/header-bar' ); ?>

	<div class="page-wrapper js-page-wrapper" <?= $preloader ? 'style="opacity: 0"' : ''; ?>>

		<main data-barba="js-barba-content" data-barba-namespace="<?= $wp_query->queried_object->post_name ?>">

			<div class="content-wrapper js-content-wrapper">