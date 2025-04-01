<?php

// Constants.
define( 'THEME_PATH', get_template_directory() );
define( 'FUNCTIONS_PATH', THEME_PATH . '/functions' );
define( 'JS_PATH', get_template_directory_uri() . '/assets/js' );
define( 'CSS_PATH', get_template_directory_uri() . '/assets/css' );
define( 'COLOR_BLUE', '#272CC5' );
define( 'COLOR_LIGHT_BLUE', '#5C95ED' );
define( 'COLOR_RED', '#DF0D29' );

// Functions.
$required_functions = [ 
	'acf-settings',
	'add-svg-support',
	'clean-head-links',
	'custom-image-size',
	'enqueue-styles-scripts',
	'is-localhost',
	'responsive-images',
	'snippets',
	'theme-settings',
	'cpt-global-blocks',
	'clean-video-embed',
	'acf-add-menu',
	'get-page-or-parent-name',
];

foreach ( $required_functions as $function ) {
	require_once FUNCTIONS_PATH . '/' . $function . '.php';
}