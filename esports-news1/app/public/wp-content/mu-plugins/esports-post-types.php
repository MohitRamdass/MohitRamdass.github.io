<?php

function esport_post_types(){
	register_post_type('game', array(
        'supports' => array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail'),
		'public' => true,
		'labels' => array(
            'name'=>"Games",
            'add_new_item' => 'Add New Game',
            'edit_item' => 'Edit Game',
            'all_items' => 'All Games',
            'singular_name' => "Game",
        ),
        'menu_icon'=>'dashicons-laptop',
        'rewrite' => array('slug' => 'games'),
        'has_archive' => true,
    ));
    
    register_post_type('player', array(
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'players'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => "Players",
            'add_new_item' => 'Add New Player',
            'edit_item' => 'Edit Player',
            'all_items' => 'All Players',
            'singular_name' => "Player"
        ),
        'menu_icon'=>'dashicons-universal-access',
    ));

    register_post_type('team', array(
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'teams'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => "Teams",
            'add_new_item' => 'Add New Team',
            'edit_item' => 'Edit Team',
            'all_items' => 'All Teams',
            'singular_name' => "Team"
        ),
        'menu_icon'=>'dashicons-admin-site-alt',
    ));
}

add_action('init', 'esport_post_types');

?>