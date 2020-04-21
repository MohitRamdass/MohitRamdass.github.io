<?php
/**
 * Include the TGM_Plugin_Activation class. (included in init.php)
 */

function di_magazine_register_required_plugins() {
	
	$plugins = array(
		
		array(
			'name'      => __( 'Contact Form 7 (For Forms)', 'di-magazine'),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),

		array(
			'name'      => __( 'Max Mega Menu (for Mega Menu)', 'di-magazine'),
			'slug'      => 'megamenu',
			'required'  => false,
		),

		array(
			'name'      => __( 'Regenerate Thumbnails', 'di-magazine'),
			'slug'      => 'regenerate-thumbnails',
			'required'  => false,
		),

		array(
			'name'      => __( 'Di Themes Demo Site Importer', 'di-magazine'),
			'slug'      => 'di-themes-demo-site-importer',
			'required'  => false,
		),
		
	);
	
	
	$config = array(
		'id'           => 'di-magazine',                 	// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      			// Default absolute path to bundled plugins.
		'menu'         => 'di-magazine-install-plugins', 	// Menu slug.
		'has_notices'  => true,                    			// Show admin notices or not.
		'dismissable'  => true,                    			// If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      			// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   			// Automatically activate plugins after installation or not.
		'message'      => '',                      			// Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'di_magazine_register_required_plugins' );

