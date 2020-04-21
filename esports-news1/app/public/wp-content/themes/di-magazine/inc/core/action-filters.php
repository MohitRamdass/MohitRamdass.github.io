<?php

/**
 * Admin Info bar.
 */

function di_magazine_admin_notice() {
	global $current_user ;
	$user_id = $current_user->ID;
	
	/* Check that the user hasn't already clicked to ignore the message */
	if( ! get_user_meta( $user_id, 'di_magazine_ignore_notice' ) ) {
		echo '<div class="updated"><p>';
		
		printf( __( 'Thank you for activating Di Magazine Theme. Let start from <a target="_blank" href="%1$s">Video Tutorials</a> | <a target="_blank" href="%2$s">Documentation</a> | <a target="_blank" href="%3$s">Visit Demo</a> | <a target="_blank" href="%4$s">Customize Now</a> | <a href="%5$s">Hide it</a>', 'di-magazine' ), 'https://www.youtube.com/watch?v=mt44vnwahsI&list=PLi1mp3OyXn1YWy0L3UW_BguSjJAKywKlg', 'https://dithemes.com/di-magazine-free-wordpress-theme-documentation/', 'http://demo.dithemes.com/di-magazine/', esc_url( get_admin_url() . 'customize.php' ) , esc_url( add_query_arg( 'di_magazine_notics_ignore', '0' ) ) );
		
		echo "</p></div>";
	}
}
add_action( 'admin_notices', 'di_magazine_admin_notice' );

function di_magazine_handle_notic() {
	global $current_user;
	$user_id = $current_user->ID;
	if( isset( $_GET['di_magazine_notics_ignore']) && '0' == $_GET['di_magazine_notics_ignore'] ) {
		add_user_meta( $user_id, 'di_magazine_ignore_notice', 'true', true );
	}
}
add_action( 'admin_init', 'di_magazine_handle_notic' );

function di_magazine_delete_user_meta_ignore_notice() {
	global $current_user;
	$user_id = $current_user->ID;
	if( get_user_meta( $user_id, 'di_magazine_ignore_notice' ) ) {
		delete_user_meta( $user_id, 'di_magazine_ignore_notice' );
	}
}
add_action('switch_theme', 'di_magazine_delete_user_meta_ignore_notice');

/**
 * Admin Info bar END.
 */

if( ! is_admin() ) {

	//custom excerpt length
	function di_magazine_custom_excerpt_length( $length ) {
		return absint( get_theme_mod( 'excerpt_length', '40' ) );
	}
	add_filter( 'excerpt_length', 'di_magazine_custom_excerpt_length', 999 );

	//custom excerpt last ...... replace
	function di_magazine_excerpt_more( $more ) {
		global $post;
		return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '"> ' . __( 'Read more', 'di-magazine' ) . '&#8230;</a>';
	}
	add_filter( 'excerpt_more', 'di_magazine_excerpt_more', 1001 );
	
}

// Add class="table table-bordered" to default calendar.
function di_magazine_calendar_modify( $html ) {
	return str_replace( 'id="wp-calendar"', 'id="wp-calendar" class="table table-bordered"', $html );
}
add_filter( 'get_calendar', 'di_magazine_calendar_modify' );


// Comment form fields name, email, url only.
function di_magazine_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
		
	$fields   =  array(

		'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name', 'di-magazine' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		'<input class="form-control" placeholder="' . __( 'Your name', 'di-magazine' ) . '" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
		
		'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email', 'di-magazine' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		'<input class="form-control" placeholder="' . __( 'Your email', 'di-magazine' ) . '" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
		
		'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website', 'di-magazine' ) . '</label> ' .
		'<input class="form-control" placeholder="' . __( 'Your website', 'di-magazine' ) . '" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'   
		
		);
	return $fields;
}
add_filter( 'comment_form_default_fields', 'di_magazine_comment_form_fields' );


//comment form text area and submit button
function di_magazine_comment_form( $args ) {
	$args['comment_field'] = '<div class="form-group comment-form-comment">
	<label for="comment">' . _x( 'Comment', 'noun' , 'di-magazine' ) . '<span class="required"> *</span></label> 
	<textarea class="form-control" placeholder="' . __( 'Your comment', 'di-magazine' ) . '" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
	</div>';
	
	$args['class_submit'] = 'masterbtn'; // since WP 4.1
	
	return $args;
}
add_filter( 'comment_form_defaults', 'di_magazine_comment_form' );


// Add code in head.
function di_magazine_the_head_contain() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<?php if ( is_singular() && pings_open( get_queried_object() ) ) { ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php } ?>
	
	<?php
}
add_action( 'di_magazine_the_head', 'di_magazine_the_head_contain' );

// Add overflowhide class to body if page preloader enabled. overflowhide class will be remove using js after page loaded.
if( get_theme_mod( 'loading_icon', '0' ) == 1 ) {
	add_filter( 'body_class', 'di_magazine_body_overflowhide' );
}

function di_magazine_body_overflowhide( $classes ) {
	return array_merge( $classes, array( 'overflowhide' ) );
}

//add classes to logo in some case
$header_layout = absint( get_theme_mod( 'header_layout', '1' ) );
if( $header_layout == 2 || $header_layout == 5 ) {
	add_filter( 'get_custom_logo', 'di_magazine_change_logo_class' );
}

function di_magazine_change_logo_class( $html ) {
    $html = str_replace( 'custom-logo', 'custom-logo aligncenter', $html );
    return $html;
}

// Footer copyright right content
function di_magazine_footer_copyright_right_setting_front_cntnt() {
	echo '<p>' . __( 'WordPress', 'di-magazine' ) . ' <a target="_blank" href="https://dithemes.com/di-magazine-free-wordpress-theme/"><span class="fa fa-thumbs-o-up"></span> ' . __( 'Di Magazine', 'di-magazine' ) . '</a> ' . __( 'Theme', 'di-magazine' ) . '</p>';
}
add_action('di_magazine_footer_copyright_right_setting_front', 'di_magazine_footer_copyright_right_setting_front_cntnt' );

//di_magazine_page_sidebar_file content
function di_magazine_page_sidebar_file_clbk() {
	if( is_active_sidebar( 'sidebar_page' ) ) {
		dynamic_sidebar( 'sidebar_page' );
	}
}
add_action( 'di_magazine_page_sidebar_file', 'di_magazine_page_sidebar_file_clbk' );

// di_magazine_post_sidebar_file content
function di_magazine_post_sidebar_file_clbk() {
	if( is_active_sidebar( 'sidebar-1' ) ) {
		dynamic_sidebar( 'sidebar-1' );
	}
}
add_action( 'di_magazine_post_sidebar_file', 'di_magazine_post_sidebar_file_clbk' );

// header image content
function di_magazine_hdrimg_file_clbk() {

	// Get current post ID (if on blog, then checks current posts page for it's ID)
	if ( is_home() ) {
		$di_post_id = get_option( 'page_for_posts' );
	} else {
		$di_post_id = get_the_ID();
	}

	// Do not load, if disabled using meta box option.
	if( $di_post_id ) {
		if( get_post_meta( $di_post_id, '_di_magazine_hide_hdrimg', true ) == '1' ) {
			return;
		}
	}

	if( has_header_image() ) { ?>
	<div class="container-fluid">
		<div class="row">
			<div class="alignc wd100">
				<?php the_custom_header_markup(); ?>
			</div>
		</div>
	</div>
	<?php
	}
}
add_action( 'di_magazine_hdrimg_file', 'di_magazine_hdrimg_file_clbk' );

/**
 * Kirki action content free version.
 */
function di_magazine_top_bar_search_form_free_content_field() {
	Kirki::add_field( 'di_magazine_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_topbar_freecon',
		'label'       => esc_html__( 'Color Options', 'di-magazine' ),
		'section'     => 'top_bar',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_html__( 'Color options are available in', 'di-magazine' ) . ' <a target="_blank" href="https://dithemes.com/product/di-magazine-pro-wordpress-theme/">' . esc_html__( 'Di Magazine Pro', 'di-magazine' ) . '</a>.</div>',
		'active_callback'  => array(
			array(
				'setting'  => 'display_top_bar',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );
}
add_action( 'di_magazine_top_bar_search_form', 'di_magazine_top_bar_search_form_free_content_field' );

function di_magazine_color_options_free_content_field() {
	Kirki::add_field( 'di_magazine_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_clroptions_freecon',
		'label'       => esc_html__( 'More Colors', 'di-magazine' ),
		'section'     => 'color_options',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_html__( 'More color options are available in', 'di-magazine' ) . ' <a target="_blank" href="https://dithemes.com/product/di-magazine-pro-wordpress-theme/">' . esc_html__( 'Di Magazine Pro', 'di-magazine' ) . '</a>.</div>',
	) );
}
add_action( 'di_magazine_color_options', 'di_magazine_color_options_free_content_field' );

function di_magazine_blog_options_free_content_field() {
	Kirki::add_field( 'di_magazine_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_blog_options_freecon',
		'label'       => esc_html__( 'Color Options', 'di-magazine' ),
		'section'     => 'blog_options',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_html__( 'Color options are available in', 'di-magazine' ) . ' <a target="_blank" href="https://dithemes.com/product/di-magazine-pro-wordpress-theme/">' . esc_html__( 'Di Magazine Pro', 'di-magazine' ) . '</a>.</div>',
	) );	
}
add_action( 'di_magazine_blog_options', 'di_magazine_blog_options_free_content_field' );


function di_magazine_single_post_options_free_content_field() {
	Kirki::add_field( 'di_magazine_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_blog_single_options_freecon',
		'label'       => '',
		'section'     => 'single_post_options',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_html__( 'Color options are available in', 'di-magazine' ) . ' <a target="_blank" href="https://dithemes.com/product/di-magazine-pro-wordpress-theme/">' . esc_html__( 'Di Magazine Pro', 'di-magazine' ) . '</a>.</div>',
	) );	
}
add_action( 'di_magazine_single_post_options', 'di_magazine_single_post_options_free_content_field' );

function di_magazine_footer_widget_options_free_content_field() {
	Kirki::add_field( 'di_magazine_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_footer_options_freecon',
		'label'       => esc_html__( 'Color Options', 'di-magazine' ),
		'section'     => 'footer_options',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_html__( 'Color options are available in', 'di-magazine' ) . ' <a target="_blank" href="https://dithemes.com/product/di-magazine-pro-wordpress-theme/">' . esc_html__( 'Di Magazine Pro', 'di-magazine' ) . '</a>.</div>',
		'active_callback'  => array(
			array(
				'setting'  => 'endis_ftr_wdgt',
				'operator' => '==',
				'value'    => 1,
			),
		)
	) );
}
add_action( 'di_magazine_footer_widget_options', 'di_magazine_footer_widget_options_free_content_field' );

function di_magazine_footer_copyright_free_content_field() {
	Kirki::add_field( 'di_magazine_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_footer_copy_options_freecon',
		'label'       => esc_html__( 'Footer Right', 'di-magazine' ),
		'section'     => 'footer_copy_options',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_html__( 'Footer Right Option and Color Options are available in', 'di-magazine' ) . ' <a target="_blank" href="https://dithemes.com/product/di-magazine-pro-wordpress-theme/">' . esc_html__( 'Di Magazine Pro', 'di-magazine' ) . '</a>.</div>',
	) );
}
add_action( 'di_magazine_footer_copyright', 'di_magazine_footer_copyright_free_content_field' );

function di_magazine_cutmzr_theme_info_free_content_field() {
	Kirki::add_field( 'di_magazine_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_theme_info_sprt_freecon',
		'label'       => esc_html__( 'Di Magazine Support', 'di-magazine' ),
		'section'     => 'theme_info',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_html__( 'If you want our support, Please', 'di-magazine' ) . ' <a target="_blank" href="https://wordpress.org/support/theme/di-magazine">' . esc_html__( 'Create a Support Topic', 'di-magazine' ) . '</a>.</div>',
	) );

	Kirki::add_field( 'di_magazine_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_theme_info_pro_freecon',
		'label'       => esc_html__( 'Di Magazine Pro', 'di-magazine' ),
		'section'     => 'theme_info',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . __( 'Premium Features:<br />- Additional five categories on front page<br />- Advance Color Options<br />- Option to Update Footer Right Credit<br />- Sidebar areas Creation and Selection<br />- Advance Header Image<br />- Slider in Header<br />- Premium Support<br />', 'di-magazine' ) . ' <a target="_blank" href="https://dithemes.com/product/di-magazine-pro-wordpress-theme/">' . esc_html__( 'Get Di Magazine Pro', 'di-magazine' ) . '</a></div>',
	) );
}
add_action( 'di_magazine_cutmzr_theme_info', 'di_magazine_cutmzr_theme_info_free_content_field' );

function di_magazine_front_page_categories_settigns_free_content_field() {
	Kirki::add_field( 'di_magazine_config', array(
		'type'        => 'custom',
		'settings'    => 'custom_front_pg_cats',
		'label'       => '',
		'section'     => 'front_page_section',
		'default'     => '<div style="background-color: #333;border-radius: 9px;color: #fff;padding: 13px 7px;">' . esc_html__( 'Color options and additional five categories are available in', 'di-magazine' ) . ' <a target="_blank" href="https://dithemes.com/product/di-magazine-pro-wordpress-theme/">' . esc_html__( 'Di Magazine Pro', 'di-magazine' ) . '</a>.</div>',
	) );
}
add_action( 'di_magazine_front_page_categories_settigns', 'di_magazine_front_page_categories_settigns_free_content_field' );

/**
 * Kirki action content free version END.
 */


// Tag cloud widget css font size fix.
add_filter( 'widget_tag_cloud_args', 'di_magazine_tag_cloud_fontsize_fix', 10, 1 );
function di_magazine_tag_cloud_fontsize_fix( $args ) {
	$args['largest']  = 11;
	$args['smallest'] = 11;
	$args['unit']     = 'px';
	return $args;
}


