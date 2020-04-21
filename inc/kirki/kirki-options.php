<?php
// Disable kirki telemetry
add_filter( 'kirki_telemetry', '__return_false' );

//set Kirki config
Kirki::add_config( 'di_magazine_config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

//the main panel
Kirki::add_panel( 'di_magazine_options', array(
    'title'       => esc_html__( 'Di Magazine Options', 'di-magazine' ),
    'description' => esc_html__( 'All options of Di Magazine theme', 'di-magazine' ),
) );

//typography
Kirki::add_section( 'typography_options', array(
	'title'          => esc_html__( 'Typography Options', 'di-magazine' ),
	'panel'          => 'di_magazine_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'body_typog',
	'label'       => esc_html__( 'Body Typography', 'di-magazine' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Lora',
		'variant'        => 'regular',
		'font-size'      => '14px',
	),
	'output'      => array(
		array(
			'element' => 'body',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'site_title_typog',
	'label'       => esc_html__( 'Site Title Typography', 'di-magazine' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => '.headermain h3.site-name-pr',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'h1_typog',
	'label'       => esc_html__( 'H1 / Headline 1 Typography', 'di-magazine' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => '400',
		'font-size'      => '22px',
		'line-height'    => '1.5',
		'letter-spacing' => '0.2px',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h1, .h1',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'h2_typog',
	'label'       => esc_html__( 'H2 / Headline 2 Typography', 'di-magazine' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h2, .h2',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'h3_typog',
	'label'       => esc_html__( 'H3 / Headline 3 Typography', 'di-magazine' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.5',
		'letter-spacing' => '0.2px',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h3, .h3',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'h4_typog',
	'label'       => esc_html__( 'H4 / Headline 4 Typography', 'di-magazine' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '20px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h4, .h4',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'h5_typog',
	'label'       => esc_html__( 'H5 / Headline 5 Typography', 'di-magazine' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '20px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h5, .h5',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'h6_typog',
	'label'       => esc_html__( 'H6 / Headline 6 Typography', 'di-magazine' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '20px',
		'line-height'    => '1.1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => 'body h6, .h6',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'p_typog',
	'label'       => esc_html__( 'Paragraph Typography', 'di-magazine' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Fauna One',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'line-height'    => '1.7',
		'letter-spacing' => '0.2px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.maincontainer p',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'top_menu_typog',
	'label'       => esc_html__( 'Main Menu Typography', 'di-magazine' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Rajdhani',
		'variant'        => '600',
		'font-size'      => '16px',
		'line-height'    => '22px',
		'letter-spacing' => '0px',
		'text-transform' => 'uppercase',
	),
	'output'      => array(
		array(
			'element' => '.navbarprimary ul li a',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'widget_ul_ol_typog',
	'label'       => esc_html__( 'Widgets UL/OL Typography', 'di-magazine' ),
	'description' => esc_html__( 'Widgets Unordered List / Ordered List Typography', 'di-magazine' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '15px',
		'line-height'    => '1.5',
		'letter-spacing' => '0.1px',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => '.widget_sidebar_main ul li, .widget_sidebar_main ol li',
		),
		array(
			'element' => '.widgets_footer ul li, .widgets_footer ol li',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'body_ul_ol_li_typog',
	'label'       => esc_html__( 'Container UL/OL Typography', 'di-magazine' ),
	'description' => esc_html__( 'Typography for list in main contents.', 'di-magazine' ),
	'section'     => 'typography_options',
	'default'     => array(
		'font-family'    => 'Fjord One',
		'variant'        => 'regular',
		'font-size'      => '15px',
		'line-height'    => '1.7',
		'letter-spacing' => '0',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.entry-content ul li, .entry-content ol li',
		),
	),
	'transport' => 'auto',
) );

//typography END

//top bar
Kirki::add_section( 'top_bar', array(
	'title'          => esc_html__( 'Top Bar Options', 'di-magazine' ),
	'panel'          => 'di_magazine_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'display_top_bar',
	'label'       => esc_html__( 'Top Bar Feature', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable Top Bar', 'di-magazine' ),
	'section'     => 'top_bar',
	'default'     => '1',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'display_sicons_top_bar',
	'label'       => esc_html__( 'Social Icons', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable Social Icons', 'di-magazine' ),
	'section'     => 'top_bar',
	'default'     => '1',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 's_link_open',
	'label'       => esc_html__( 'Social Links in New Tab?', 'di-magazine' ),
	'description' => esc_html__( 'Open social links in new tab or same.', 'di-magazine' ),
	'section'     => 'top_bar',
	'default'     => '1',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
		array(
			'setting'  => 'display_sicons_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

do_action( 'di_magazine_top_bar' );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'select',
	'settings'    => 'tpbr_left_view',
	'label'       => esc_html__( 'Top Bar Left Content View', 'di-magazine' ),
	'description' => esc_html__( 'Menu or Text/HTML or Disable?', 'di-magazine' ),
	'section'     => 'top_bar',
	'default'     => '1',
	'choices'     => array(
		'1' 	=> esc_html__( 'Current Date', 'di-magazine' ),
		'2' 	=> esc_html__( 'Menu', 'di-magazine' ),
		'3' 	=> esc_html__( 'Text / HTML', 'di-magazine' ),
		'4' 	=> esc_html__( 'Disable', 'di-magazine' ),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'editor',
	'settings'    => 'top_bar_left_content',
	'label'       => esc_html__( 'Top Bar Left Content', 'di-magazine' ),
	'description' => esc_html__( 'Text / HTML of Top Bar Left', 'di-magazine' ),
	'section'     => 'top_bar',
	'default'     => '<p><span class="fa fa-phone"></span> ' . esc_html__( 'Call:', 'di-magazine' ) . ' <a href="tel:0123456789">' . esc_html__( '0123456789', 'di-magazine' ) . '</a></p>',
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.topbar_ctmzr',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'top_bar_left_content' => array(
			'selector'        => '.topbar_ctmzr',
			'render_callback' => function() {
				echo wp_kses_post( get_theme_mod( 'top_bar_left_content', '<p><span class="fa fa-phone"></span> ' . __( 'Call:', 'di-magazine' ) . ' <a href="tel:0123456789">0123456789</a> | <span class="fa fa-envelope-o"></span> ' . __( 'Email:', 'di-magazine' ) . ' <a href="mailto:info@example.com">info@example.com</a></p>' ) );
			},
		),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
		array(
			'setting'  => 'tpbr_left_view',
			'operator' => '==',
			'value'    => 3,
		),
	)
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'top_bar_seach_icon',
	'label'       => esc_html__( 'Search Icon', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable Search Icon', 'di-magazine' ),
	'section'     => 'top_bar',
	'default'     => '1',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );

do_action( 'di_magazine_top_bar_search_form' );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'top_bar_typog',
	'label'       => esc_html__( 'Top Bar Typography', 'di-magazine' ),
	'section'     => 'top_bar',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '15px',
		'line-height'    => '22px',
		'letter-spacing' => '0px',
		'text-transform' => 'capitalize',
	),
	'output'      => array(
		array(
			'element' => '.bgtoph',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'display_top_bar',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

//top bar END


// Social profile
Kirki::add_section( 'social_options', array(
	'title'          => esc_html__( 'Social Profile', 'di-magazine' ),
	'panel'          => 'di_magazine_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_facebook',
	'label'			=> esc_html__( 'Facebook Link', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> 'http://facebook.com',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_twitter',
	'label'			=> esc_html__( 'Twitter Link', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> 'http://twitter.com',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_youtube',
	'label'			=> esc_html__( 'YouTube Link', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> 'http://youtube.com',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_vk',
	'label'			=> esc_html__( 'VK Link', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_okru',
	'label'			=> esc_html__( 'Ok.ru (odnoklassniki) Link', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_linkedin',
	'label'			=> esc_html__( 'Linkedin Link', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_pinterest',
	'label'			=> esc_html__( 'Pinterest Link', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_instagram',
	'label'			=> esc_html__( 'Instagram Link', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_telegram',
	'label'			=> esc_html__( 'Telegram Link', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_snapchat',
	'label'			=> esc_html__( 'Snapchat Link', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_flickr',
	'label'			=> esc_html__( 'Flickr Link', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_reddit',
	'label'			=> esc_html__( 'Reddit Link', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_tumblr',
	'label'			=> esc_html__( 'Tumblr Link', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_yelp',
	'label'			=> esc_html__( 'Yelp Link', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_whatsappno',
	'label'			=> esc_html__( 'WhatsApp Number', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'text',
	'settings'		=> 'sprofile_link_skype',
	'label'			=> esc_html__( 'Skype Id', 'di-magazine' ),
	'description'	=> esc_html__( 'Leave empty for disable', 'di-magazine' ),
	'section'		=> 'social_options',
	'default'		=> '',
) );
//social profile END

//Header layout
Kirki::add_section( 'header_layout_section', array(
	'title'          => esc_html__( 'Header Layout Options', 'di-magazine' ),
	'panel'          => 'di_magazine_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'radio-image',
	'settings'		=> 'header_layout',
	'label'			=> esc_html__( 'Select Header Layout', 'di-magazine' ),
	'description'	=> esc_html__( 'Save and reload front page for alignment', 'di-magazine' ),
	'section'		=> 'header_layout_section',
	'default'		=> '1',
	'choices'		=> array(
		'1'		=> get_template_directory_uri() . '/assets/images/header-1.png',
		'2'		=> get_template_directory_uri() . '/assets/images/header-2.png',
		'3'		=> get_template_directory_uri() . '/assets/images/header-3.png',
		'4'		=> get_template_directory_uri() . '/assets/images/header-4.png',
		'5'		=> get_template_directory_uri() . '/assets/images/header-5.png',
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'slider',
	'settings'    => 'custom_logo_width',
	'label'       => esc_html__( 'Logo Width', 'di-magazine' ),
	'description' => esc_html__( 'To resize selected logo image.', 'di-magazine' ),
	'section'     => 'title_tagline',
	'default'     => '360',
	'priority'    => 9,
	'choices'     => array(
		'min'  => '10',
		'max'  => '600',
		'step' => '1',
	),
	'output' => array(
		array(
			'element'	=> '.custom-logo',
			'property'	=> 'width',
			'suffix'	=> 'px',
		),
	),
	'transport' => 'auto',
	'active_callback'  => 'has_custom_logo',
) );
//Header layout END

// Front page settings
Kirki::add_section( 'front_page_section', array(
	'title'          => esc_html__( 'Front Page Options', 'di-magazine' ),
	'panel'          => 'di_magazine_options',
	'capability'     => 'edit_theme_options',
) );

// Front top slider, just below menu
Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'frnt_top_onoff',
	'label'       => esc_html__( 'Top News / Posts Slider', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable top news / posts slider (just below header menu)', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '0',
	'priority'    => 10,
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'frnt_top_slider_docs',
	'label'       => esc_html__( 'Top News / Posts Slider', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_html__( 'Top news slider displays just below main menu. it works base on tag. if you want to include sports news / posts in this slider, just add a tag i.e. sport to all sports news / posts and then select sport tag below. simply, top news / posts slider will display news / posts containing below selected tag.', 'di-magazine' ) . '</div>',
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_top_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'select',
	'settings'    => 'frnt_top_slider_tag',
	'label'       => __( 'Select Tag', 'di-magazine' ),
	'description' => __( 'Select a tag to include news / posts in top slider.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '',
	'priority'    => 10,
	'choices'     => Kirki_Helper::get_terms( 'post_tag' ),
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_top_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'number',
	'settings'    => 'frnt_top_slider_num',
	'label'       => esc_html__( 'Number of News / Posts', 'di-magazine' ),
	'description' => esc_html__( 'How much news / posts you want to include in top slider?', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => 3,
	'choices'     => array(
		'min'  => 1,
		'step' => 1,
	),
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_top_onoff',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'frnt_top_slider_tag',
			'operator' => '!=',
			'value'    => '',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'frnt_top_slider_typog_hdln',
	'label'       => esc_html__( 'Front Top Slider Headline Typography', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'line-height'    => '1.5',
		'letter-spacing' => '0.2px',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => '.front-page-top .owl-item .dim-item .diowl-overlay .diowl-text h3',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_top_onoff',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'frnt_top_slider_tag',
			'operator' => '!=',
			'value'    => '',
		),
	),
) );

do_action( 'di_magazine_front_top_slidr' );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'frnt_top_slider_sep',
	'label'       => '',
	'section'     => 'front_page_section',
	'default'     => '<hr />',
) );


// Front page bottom left slider
Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'frnt_btm_lft_onoff',
	'label'       => esc_html__( 'Secondary Left Slider', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable secondary left news slider (just below top slider in left side)', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '0',
	'priority'    => 10,
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'frnt_btm_lft_docs',
	'label'       => esc_html__( 'Secondary News Slider', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_html__( 'It also works base on post tag. simply, slider will display news / post containing below selected tag.', 'di-magazine' ) . '</div>',
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_btm_lft_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'select',
	'settings'    => 'frnt_btm_lft_slider_tag',
	'label'       => __( 'Select Tag', 'di-magazine' ),
	'description' => __( 'Select a tag to include news in secondary slider.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '',
	'priority'    => 10,
	'choices'     => Kirki_Helper::get_terms( 'post_tag' ),
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_btm_lft_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'number',
	'settings'    => 'frnt_btm_lft_slider_num',
	'label'       => esc_html__( 'Number of News', 'di-magazine' ),
	'description' => esc_html__( 'How much news you want to include in secondary slider?', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => 3,
	'choices'     => array(
		'min'  => 1,
		'step' => 1,
	),
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_btm_lft_onoff',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'frnt_btm_lft_slider_tag',
			'operator' => '!=',
			'value'    => '',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'frnt_btm_lft_slider_typog_hdln',
	'label'       => esc_html__( 'Secondary Left Slider Headline Typography', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '18px',
		'line-height'    => '1.5',
		'letter-spacing' => '0.2px',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => '.dim-front-right .dim-item-btm .diowl-overlay-btm h3.dim-h3head-btm',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_btm_lft_onoff',
			'operator' => '==',
			'value'    => '1',
		),
		array(
			'setting'  => 'frnt_btm_lft_slider_tag',
			'operator' => '!=',
			'value'    => '',
		),
	),
) );

do_action( 'di_magazine_front_secondry_left' );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'frnt_btm_lft_slider_sep',
	'label'       => '',
	'section'     => 'front_page_section',
	'default'     => '<hr />',
) );

// Front page bottom right posts grid
Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'frnt_btm_rgt_onoff',
	'label'       => esc_html__( 'Secondary Right Posts Grid', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable secondary right posts grid (just below top slider in right side)', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '0',
	'priority'    => 10,
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'frnt_btm_rgt_docs',
	'label'       => esc_html__( 'Secondary Posts Grid', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_html__( 'Secondary posts grid will display news / post containing below selected tag.', 'di-magazine' ) . '</div>',
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_btm_rgt_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'select',
	'settings'    => 'frnt_btm_rgt_slider_tag',
	'label'       => __( 'Select Tag', 'di-magazine' ),
	'description' => __( 'Select a tag to include news in secondary posts grid.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '',
	'priority'    => 10,
	'choices'     => Kirki_Helper::get_terms( 'post_tag' ),
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_btm_rgt_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'frnt_btm_rgt_slider_typog_hdln',
	'label'       => esc_html__( 'Secondary Right Posts Grid Headline Typography', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '18px',
		'line-height'    => '1.2',
		'letter-spacing' => '0.2px',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => '.dim-front-left .dimasonry-secondary-right .diowl-overlay h3.dim-h3head',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_btm_rgt_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

do_action( 'di_magazine_front_secondry_right' );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'frnt_cat_typo_sep',
	'label'       => '',
	'section'     => 'front_page_section',
	'default'     => '<hr />',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'front_categories_typog_hdln',
	'label'       => esc_html__( 'Categories Headline Typography', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => 'regular',
		'font-size'      => '22px',
		'line-height'    => '1.5',
		'letter-spacing' => '0.2px',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => '.front-category-loop .front-single-category-contents-h1',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'front_categories_typog_p',
	'label'       => esc_html__( 'Categories Paragraph Typography', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'line-height'    => '1.7',
		'letter-spacing' => '0.2px',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => '.front-category-loop .front-single-category-contents-exerpt p',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'frnt_cat_o_onoff_sep',
	'label'       => '',
	'section'     => 'front_page_section',
	'default'     => '<hr />',
) );

// Front page first category news section.
Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'frnt_cat_1_onoff',
	'label'       => esc_html__( 'First Section Category', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable first front section category.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '1',
	'priority'    => 10,
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'select',
	'settings'    => 'frnt_cat_1_cat',
	'label'       => __( 'Select Category', 'di-magazine' ),
	'description' => __( 'Select a category to include news in first category section.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => Kirki_Helper::get_terms( 'category' ),
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_cat_1_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'number',
	'settings'    => 'frnt_cat_1_cat_num',
	'label'       => esc_html__( 'Number of News', 'di-magazine' ),
	'description' => esc_html__( 'How much news / posts you want to display in first category section.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => 4,
	'choices'     => array(
		'min'  => 1,
		'step' => 1,
	),
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_cat_1_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

do_action( 'di_magazine_front_first_cagry' );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'frnt_cat_1_onoff_sep',
	'label'       => '',
	'section'     => 'front_page_section',
	'default'     => '<hr />',
) );

// Front page second category news section.
Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'frnt_cat_2_onoff',
	'label'       => esc_html__( 'Second Section Category', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable secondary front section category.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '1',
	'priority'    => 10,
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'select',
	'settings'    => 'frnt_cat_2_cat',
	'label'       => __( 'Select Category', 'di-magazine' ),
	'description' => __( 'Select a category to include news in second category section.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => Kirki_Helper::get_terms( 'category' ),
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_cat_2_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'number',
	'settings'    => 'frnt_cat_2_cat_num',
	'label'       => esc_html__( 'Number of News', 'di-magazine' ),
	'description' => esc_html__( 'How much news / posts you want to display in second category section.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => 4,
	'choices'     => array(
		'min'  => 1,
		'step' => 1,
	),
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_cat_2_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

do_action( 'di_magazine_front_scnd_cagry' );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'frnt_cat_2_onoff_sep',
	'label'       => '',
	'section'     => 'front_page_section',
	'default'     => '<hr />',
) );


// Front page third category news section.
Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'frnt_cat_3_onoff',
	'label'       => esc_html__( 'Third Section Category', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable third front section category.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '1',
	'priority'    => 10,
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'select',
	'settings'    => 'frnt_cat_3_cat',
	'label'       => __( 'Select Category', 'di-magazine' ),
	'description' => __( 'Select a category to include news in third category section.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => Kirki_Helper::get_terms( 'category' ),
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_cat_3_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'number',
	'settings'    => 'frnt_cat_3_cat_num',
	'label'       => esc_html__( 'Number of News', 'di-magazine' ),
	'description' => esc_html__( 'How much news / posts you want to display in third category section.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => 4,
	'choices'     => array(
		'min'  => 1,
		'step' => 1,
	),
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_cat_3_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

do_action( 'di_magazine_front_trd_cagry' );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'frnt_cat_3_onoff_sep',
	'label'       => '',
	'section'     => 'front_page_section',
	'default'     => '<hr />',
) );

// Front page fore category news section.
Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'frnt_cat_4_onoff',
	'label'       => esc_html__( 'Fourth Section Category', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable third fourth section category.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '1',
	'priority'    => 10,
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'select',
	'settings'    => 'frnt_cat_4_cat',
	'label'       => __( 'Select Category', 'di-magazine' ),
	'description' => __( 'Select a category to include news in fourth category section.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => Kirki_Helper::get_terms( 'category' ),
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_cat_4_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'number',
	'settings'    => 'frnt_cat_4_cat_num',
	'label'       => esc_html__( 'Number of News', 'di-magazine' ),
	'description' => esc_html__( 'How much news / posts you want to display in fourth category section.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => 4,
	'choices'     => array(
		'min'  => 1,
		'step' => 1,
	),
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_cat_4_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

do_action( 'di_magazine_front_forth_cagry' );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'frnt_cat_4_onoff_sep',
	'label'       => '',
	'section'     => 'front_page_section',
	'default'     => '<hr />',
) );


// Front page Fifth category news section.
Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'frnt_cat_5_onoff',
	'label'       => esc_html__( 'Fifth Section Category', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable third fifth section category.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '1',
	'priority'    => 10,
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'select',
	'settings'    => 'frnt_cat_5_cat',
	'label'       => __( 'Select Category', 'di-magazine' ),
	'description' => __( 'Select a category to include news in fifth category section.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => Kirki_Helper::get_terms( 'category' ),
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_cat_5_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'number',
	'settings'    => 'frnt_cat_5_cat_num',
	'label'       => esc_html__( 'Number of News', 'di-magazine' ),
	'description' => esc_html__( 'How much news / posts you want to display in fifth category section.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => 4,
	'choices'     => array(
		'min'  => 1,
		'step' => 1,
	),
	'active_callback'  => array(
		array(
			'setting'  => 'frnt_cat_5_onoff',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

do_action( 'di_magazine_front_fidthl_cagry' );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'frnt_cat_5_onoff_sep',
	'label'       => '',
	'section'     => 'front_page_section',
	'default'     => '<hr />',
) );

do_action( 'di_magazine_front_page_categories_settigns' );

// Front page sidebar layout
Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'radio-image',
	'settings'    => 'frntpg_layout',
	'label'       => esc_html__( 'Front Page Layout', 'di-magazine' ),
	'description' => esc_html__( 'Layout of front page below secondary large section.', 'di-magazine' ),
	'section'     => 'front_page_section',
	'default'     => 'fullw',
	'choices'     => array(
		'fullw'	  => get_template_directory_uri() . '/assets/images/fullw.png',
		'rights'  => get_template_directory_uri() . '/assets/images/rights.png',
		'lefts'   => get_template_directory_uri() . '/assets/images/lefts.png',
	),
) );



// Front page sidebar layout END

// Front page settings END



// Blog
Kirki::add_section( 'blog_options', array(
	'title'          => esc_html__( 'News Archive Options', 'di-magazine' ),
	'panel'          => 'di_magazine_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'toggle',
	'settings'		=> 'archive_post_thumbnail',
	'label'			=> esc_html__( 'Thumbnail on Archive Post', 'di-magazine' ),
	'description'	=> esc_html__( 'Enable/Disable Thumbnail on Archive/Loop Page', 'di-magazine' ),
	'section'		=> 'blog_options',
	'default'		=> '1',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'posts_meta_disply',
	'label'       => esc_html__( 'Display Post Meta on Archive', 'di-magazine' ),
	'description' => esc_html__( 'Show/Hide post meta on archive / loop posts like: author, category, date.', 'di-magazine' ),
	'section'     => 'blog_options',
	'default'     => '1',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'sticky_dt_disply',
	'label'       => esc_html__( 'Display Sticky Post Date', 'di-magazine' ),
	'description' => esc_html__( 'Show/Hide date of sticky post on archive/loop page.', 'di-magazine' ),
	'section'     => 'blog_options',
	'default'     => '1',
	'active_callback'  => array(
		array(
			'setting'  => 'posts_meta_disply',
			'operator' => '==',
			'value'    => 1,
			),
		)
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'select',
	'settings'    => 'excerpt_or_content',
	'label'       => esc_html__( 'Display Excerpt or Content on Archive', 'di-magazine' ),
	'section'     => 'blog_options',
	'default'     => 'excerpt',
	'choices'     => array(
		'excerpt' => esc_html__( 'Display Excerpt', 'di-magazine' ),
		'content' => esc_html__( 'Display Content', 'di-magazine' ),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'number',
	'settings'    => 'excerpt_length',
	'label'       => esc_html__( 'Excerpt Length', 'di-magazine' ),
	'description' => esc_html__( 'How much words you want to display on Archive page?', 'di-magazine' ),
	'section'     => 'blog_options',
	'default'     => 40,
	'choices'     => array(
		'min'  => 1,
		'step' => 1,
	),
	'active_callback'  => array(
		array(
			'setting'  => 'excerpt_or_content',
			'operator' => '==',
			'value'    => 'excerpt',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'select',
	'settings'    => 'display_archive_pagination',
	'label'       => esc_html__( 'Display Pagination on Archive', 'di-magazine' ),
	'description' => esc_html__( 'Which type of pagination, you want to display?', 'di-magazine' ),
	'section'     => 'blog_options',
	'default'     => 'nextprev',
	'choices'     => array(
		'nextprev'	=> esc_html__( 'Next Previous Pagination', 'di-magazine' ),
		'number' 	=> esc_html__( 'Number Pagination', 'di-magazine' ),
		'disable' 	=> esc_html__( 'Disable', 'di-magazine' ),
	),
) );


Kirki::add_field( 'di_magazine_config', array(
	'type'     => 'text',
	'settings' => 'loop_oldr_enty_txt',
	'label'    => esc_html__( 'Older Entries Text', 'di-magazine' ),
	'section'  => 'blog_options',
	'default'  => esc_html__( 'Older News', 'di-magazine' ),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.oldr_entry_txt',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'loop_oldr_enty_txt' => array(
			'selector'        => '.oldr_entry_txt',
			'render_callback' => function() {
				return esc_html( get_theme_mod( 'loop_oldr_enty_txt' ) );
			},
		),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'display_archive_pagination',
			'operator' => '==',
			'value'    => 'nextprev',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'     => 'text',
	'settings' => 'loop_nwr_enty_txt',
	'label'    => esc_html__( 'Newer Entries Text', 'di-magazine' ),
	'section'  => 'blog_options',
	'default'  => esc_html__( 'Newer News', 'di-magazine' ),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.nwr_entry_txt',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'loop_nwr_enty_txt' => array(
			'selector'        => '.nwr_entry_txt',
			'render_callback' => function() {
				return esc_html( get_theme_mod( 'loop_nwr_enty_txt' ) );
			},
		),
	),
	'active_callback'  => array(
		array(
			'setting'  => 'display_archive_pagination',
			'operator' => '==',
			'value'    => 'nextprev',
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'select',
	'settings'    => 'blog_list_grid',
	'label'       => esc_html__( 'Posts View on Archive', 'di-magazine' ),
	'description' => esc_html__( 'Display List or Grid?', 'di-magazine' ),
	'section'     => 'blog_options',
	'default'     => 'grid2c',
	'choices'     => array(
		'list'		=> esc_html__( 'List', 'di-magazine' ),
		'grid2c'	=> esc_html__( 'Grid 2 Column', 'di-magazine' ),
		'grid3c'	=> esc_html__( 'Grid 3 Column', 'di-magazine' ),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'radio-image',
	'settings'    => 'blog_archive_layout',
	'label'       => esc_html__( 'Archive / Loop Layout', 'di-magazine' ),
	'section'     => 'blog_options',
	'default'     => 'fullw',
	'choices'     => array(
		'fullw'	  => get_template_directory_uri() . '/assets/images/fullw.png',
		'rights'  => get_template_directory_uri() . '/assets/images/rights.png',
		'lefts'   => get_template_directory_uri() . '/assets/images/lefts.png',
	),
) );

do_action( 'di_magazine_blog_options' );

// Blog END - Archive options

// Single post / news options

Kirki::add_section( 'single_post_options', array(
	'title'          => esc_html__( 'Single News Options', 'di-magazine' ),
	'panel'          => 'di_magazine_options',
	'capability'     => 'edit_theme_options',
) );


Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'breadcrumbx_setting',
	'label'       => esc_html__( 'Breadcrumb', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable Breadcrumb', 'di-magazine' ),
	'section'     => 'single_post_options',
	'default'     => '1',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'single_post_thumbnail',
	'label'       => esc_html__( 'Thumbnail on Single Post', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable Thumbnail on Single Post', 'di-magazine' ),
	'section'     => 'single_post_options',
	'default'     => '1',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'post_meta_disply',
	'label'       => esc_html__( 'Display Post Meta on Single Post', 'di-magazine' ),
	'description' => esc_html__( 'Show/Hide post meta on single post like: author, category, date.', 'di-magazine' ),
	'section'     => 'single_post_options',
	'default'     => '1',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'post_tags_disply',
	'label'       => esc_html__( 'Display Tags on Single Post', 'di-magazine' ),
	'description' => esc_html__( 'Show/Hide tags on single post below content.', 'di-magazine' ),
	'section'     => 'single_post_options',
	'default'     => '1',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'select',
	'settings'    => 'post_date_view',
	'label'       => esc_html__( 'Post Date View', 'di-magazine' ),
	'description' => esc_html__( 'Which date do you want to display for single post?', 'di-magazine' ),
	'section'     => 'single_post_options',
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__( 'Display Publish Date', 'di-magazine' ),
		'2' => esc_html__( 'Display Updated Date', 'di-magazine' ),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'radio-image',
	'settings'    => 'blog_single_layout',
	'label'       => esc_html__( 'Single Post Layout', 'di-magazine' ),
	'section'     => 'single_post_options',
	'default'     => 'rights',
	'choices'     => array(
		'fullw'	  => get_template_directory_uri() . '/assets/images/fullw.png',
		'rights'  => get_template_directory_uri() . '/assets/images/rights.png',
		'lefts'   => get_template_directory_uri() . '/assets/images/lefts.png',
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'info_sgl_pst_typo',
	'section'     => 'single_post_options',
	'default'     => '<hr />',
) );

do_action( 'di_magazine_single_post_options' );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'info_sgl_2_pst_typo',
	'section'     => 'single_post_options',
	'default'     => '<hr />',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'sgl_pst_h1_typo',
	'label'       => esc_html__( 'News Headline Typography', 'di-magazine' ),
	'section'     => 'single_post_options',
	'default'     => array(
		'font-family'    => 'Arvo',
		'variant'        => '400',
		'font-size'      => '22px',
		'line-height'    => '1.5',
		'letter-spacing' => '0.2px',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => '.left-content.dflt-anews-pst .single-posst.anews .content-second h1.the-title.entry-title',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'sgl_pst_pra_typo',
	'label'       => esc_html__( 'News Paragraph Typography', 'di-magazine' ),
	'section'     => 'single_post_options',
	'default'     => array(
		'font-family'    => 'Fauna One',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'line-height'    => '1.7',
		'letter-spacing' => '0.2px',
		'text-transform' => 'inherit',
	),
	'output'      => array(
		array(
			'element' => '.left-content.dflt-anews-pst .single-posst.anews .content-third .entry-content p',
		),
	),
	'transport' => 'auto',
) );

// Single post / news options END

//color options
Kirki::add_section( 'color_options', array(
	'title'          => esc_html__( 'Color Options', 'di-magazine' ),
	'panel'          => 'di_magazine_options',
	'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'default_a_color',
	'label'       	=> esc_html__( 'Default Links Color', 'di-magazine' ),
	'description'	=> esc_html__( 'This will be color of all default links.', 'di-magazine' ),
	'section'     	=> 'color_options',
	'default'     	=> apply_filters( 'di_magazine_default_a_color', '#00b359' ),
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => 'body a',
			'property' => 'color',
		),
		array(
			'element'  => '.widget_sidebar_main ul li::before',
			'property' => 'color',
		),
		array(
			'element'  => '.navigation.pagination .nav-links .page-numbers, .navigation.pagination .nav-links .page-numbers:last-child',
			'property' => 'border-color',
		),
	),
	'transport' => 'auto',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        	=> 'color',
	'settings'    	=> 'default_a_mover_color',
	'label'       	=> esc_html__( 'Default Links Color Mouse Over', 'di-magazine' ),
	'description'	=> esc_html__( 'This will be color of all default links on mouse over.', 'di-magazine' ),
	'section'     	=> 'color_options',
	'default'     	=> apply_filters( 'di_magazine_default_a_mover_color', '#000000' ),
	'choices'     	=> array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element'  => 'body a:hover, body a:focus',
			'property' => 'color',
		),
		array(
			'element'  => '.widget_sidebar_main ul li:hover::before',
			'property' => 'color',
		),
	),
	'transport' => 'auto',
) );

do_action( 'di_magazine_color_options' );

//color options END

//footer widgets section - footer means footer widget section (footer copyright not covered)
Kirki::add_section( 'footer_options', array(
    'title'          => esc_html__( 'Footer Widget Options', 'di-magazine' ),
    'panel'          => 'di_magazine_options',
    'capability'     => 'edit_theme_options',
) );


Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'endis_ftr_wdgt',
	'label'       => esc_html__( 'Footer Widgets', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable Footer Widgets.', 'di-magazine' ),
	'section'     => 'footer_options',
	'default'     => '0',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'			=> 'radio-image',
	'settings'		=> 'ftr_wdget_lyot',
	'label'			=> esc_html__( 'Footer Widget Layout', 'di-magazine' ),
	'description'	=> esc_html__( 'Save and go to Widgets page to add.', 'di-magazine' ),
	'section'		=> 'footer_options',
	'default'		=> '3',
	'choices'		=> array(
		'1'		=> get_template_directory_uri() . '/assets/images/ftrwidlout1.png',
		'2'		=> get_template_directory_uri() . '/assets/images/ftrwidlout2.png',
		'3'		=> get_template_directory_uri() . '/assets/images/ftrwidlout3.png',
		'4'		=> get_template_directory_uri() . '/assets/images/ftrwidlout4.png',
		'48'	=> get_template_directory_uri() . '/assets/images/ftrwidlout48.png',
		'84'	=> get_template_directory_uri() . '/assets/images/ftrwidlout84.png',
	),
	'active_callback'  => array(
		array(
			'setting'  => 'endis_ftr_wdgt',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'mn_footer_typog',
	'label'       => esc_html__( 'Footer Widgets Typography', 'di-magazine' ),
	'section'     => 'footer_options',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '15px',
		'line-height'    => '1.7',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => '.footer',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'endis_ftr_wdgt',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'mn_footer_hdln_typog',
	'label'       => esc_html__( 'Footer Widgets Headline Typography', 'di-magazine' ),
	'section'     => 'footer_options',
	'default'     => array(
		'font-family'    	=> 'Roboto',
		'variant'        	=> 'regular',
		'font-size'      	=> '17px',
		'line-height'    	=> '1.1',
		'letter-spacing' 	=> '1px',
		'text-transform' 	=> 'uppercase',
		'text-align' 		=> 'left',
	),
	'output'      => array(
		array(
			'element' => '.footer h3.widgets_footer_title',
		),
	),
	'transport' => 'auto',
	'active_callback'  => array(
		array(
			'setting'  => 'endis_ftr_wdgt',
			'operator' => '==',
			'value'    => 1,
		),
	),
) );

do_action( 'di_magazine_footer_widget_options' );

//footer section END

//footer copyright section
Kirki::add_section( 'footer_copy_options', array(
    'title'          => esc_html__( 'Footer Copyright Options', 'di-magazine' ),
    'panel'          => 'di_magazine_options',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'editor',
	'settings'    => 'left_footer_setting',
	'label'       => esc_html__( 'Footer Left', 'di-magazine' ),
	'description' => esc_html__( 'Content of Footer Left Side', 'di-magazine' ),
	'section'     => 'footer_copy_options',
	'default'     => '<p>' . esc_html__( 'Site Title, Some rights reserved.', 'di-magazine' ) . '</p>',
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.cprtlft_ctmzr',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'left_footer_setting' => array(
			'selector'        => '.cprtlft_ctmzr',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'left_footer_setting' ) );
			},
		),
	),
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'editor',
	'settings'    => 'center_footer_setting',
	'label'       => esc_html__( 'Footer Center', 'di-magazine' ),
	'description' => esc_html__( 'Content of Footer Center Side', 'di-magazine' ),
	'section'     => 'footer_copy_options',
	'default'     => '<p><a href="#">' . esc_html__( 'Terms of Use - Privacy Policy', 'di-magazine' ) . '</a></p>',
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '.cprtcntr_ctmzr',
			'function' => 'html',
		),
	),
	'partial_refresh' => array(
		'center_footer_setting' => array(
			'selector'        => '.cprtcntr_ctmzr',
			'render_callback' => function() {
				return wp_kses_post( get_theme_mod( 'center_footer_setting' ) );
			},
		),
	),
) );

do_action( 'di_magazine_footer_copyright_right_setting' );

do_action( 'di_magazine_footer_copyright' );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'typography',
	'settings'    => 'cprt_footer_typog',
	'label'       => esc_html__( 'Footer Copyright Typography', 'di-magazine' ),
	'section'     => 'footer_copy_options',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '15px',
		'line-height'    => '1',
		'letter-spacing' => '0',
		'text-transform' => 'inherit'
	),
	'output'      => array(
		array(
			'element' => '.footer-copyright',
		),
	),
	'transport' => 'auto',
) );

//footer copyright section END

//misc section
Kirki::add_section( 'misc_options', array(
    'title'          => esc_html__( 'MISC Options', 'di-magazine' ),
    'panel'          => 'di_magazine_options',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'stickymenu_setting',
	'label'       => esc_html__( 'Sticky Menu', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable Sticky Menu (for Large Devices)', 'di-magazine' ),
	'section'     => 'misc_options',
	'default'     => '0',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'back_to_top',
	'label'       => esc_html__( 'Back To Top Button', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable Back To Top Button', 'di-magazine' ),
	'section'     => 'misc_options',
	'default'     => '1',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'toggle',
	'settings'    => 'loading_icon',
	'label'       => esc_html__( 'Page Loading Icon', 'di-magazine' ),
	'description' => esc_html__( 'Enable/Disable Page Loading Icon', 'di-magazine' ),
	'section'     => 'misc_options',
	'default'     => '0',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'image',
	'settings'    => 'loading_icon_img',
	'label'       => esc_html__( 'Upload Custom Loading Icon', 'di-magazine' ),
	'description' => esc_html__( 'It will replace default loading icon.', 'di-magazine' ),
	'section'     => 'misc_options',
	'default'     => '',
	'active_callback'  => array(
		array(
			'setting'  => 'loading_icon',
			'operator' => '==',
			'value'    => 1,
		),
	)
) );
//misc section END

//Theme Info section
Kirki::add_section( 'theme_info', array(
    'title'          => esc_html__( 'Theme Info', 'di-magazine' ),
    'panel'          => 'di_magazine_options',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'custom_dib_demo',
	'label'       => esc_html__( 'Di Magazine Demo', 'di-magazine' ),
	'section'     => 'theme_info',
	'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_html__( 'You can check demo of ', 'di-magazine' ) . ' <a target="_blank" href="http://demo.dithemes.com/di-magazine/">' . esc_html__( 'Di Magazine Theme Here', 'di-magazine' ) . '</a>.</div>',
) );

Kirki::add_field( 'di_magazine_config', array(
	'type'        => 'custom',
	'settings'    => 'custom_dib_docs',
	'label'       => esc_html__( 'Di Magazine Docs', 'di-magazine' ),
	'section'     => 'theme_info',
	'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_html__( 'You can check documentation of ', 'di-magazine' ) . ' <a target="_blank" href="https://dithemes.com/di-magazine-free-wordpress-theme-documentation/">' . esc_html__( 'Di Magazine Theme Here', 'di-magazine' ) . '</a>.</div>',
) );

do_action( 'di_magazine_cutmzr_theme_info' );

//Theme Info section END
