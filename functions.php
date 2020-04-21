<?php

if( ! defined( 'ABSPATH' ) ) {
	die( "No Direct access" );
}

// Load init.php file.
require_once get_template_directory() . '/inc/init.php';

/*
* Do not edit any code of theme, use child theme instead
*/

function esports_features(){
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	/* set_post_thumbnail_size(200, 200, true); */
	/*add_image_size('playerImage', 200, 200, true); */
	/*add_image_size('gameImage', 800, 600, true); */
}

add_action('after_setup_theme', 'esports_features');

?>