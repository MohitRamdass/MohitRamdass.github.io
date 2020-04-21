<?php
/**
 * Refresh and postMeaage / partial refresh handle.
 * @param  [type] $wp_customize [description]
 * @return [type]               [description]
 */
function di_magazine_pr_handle( $wp_customize ) {
	// Full refresh on logo select or switch.
	$wp_customize->get_setting( 'custom_logo' )->transport 	= 'refresh';

	// Blog name partial refresh handle.
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-name-pr',
		'render_callback' => function() {
			return esc_html( get_bloginfo( 'name' ) );
		},
	) );

	// Blog tagline / description partial refresh handle.
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description-pr',
		'render_callback' => function() {
			return esc_html( get_bloginfo( 'description' ) );
		},
	) );

	// Blog header_image partial refresh handle.
	$wp_customize->get_setting( 'header_image' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'header_image', array(
		'selector' => '.wp-custom-header',
	) );

	// Top Main menu partial refresh handle.
	$wp_customize->add_setting(
		'top_main_menu_hidden_field', array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'top_main_menu_hidden_field', array(
			'priority' => 25,
			'type'     => 'hidden',
			'section'  => 'menu_locations',
		)
	);

	$wp_customize->get_setting( 'top_main_menu_hidden_field' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'top_main_menu_hidden_field', array(
			'selector'	=> '.nav.navbar-nav.primary-menu',
		)
	);

	// For top bar current date
	$wp_customize->add_setting(
		'top_bar_cd_hidden_field', array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'top_bar_cd_hidden_field', array(
			'priority' => 25,
			'type'     => 'hidden',
			'section'  => 'top_bar',
		)
	);

	$wp_customize->get_setting( 'top_bar_cd_hidden_field' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'top_bar_cd_hidden_field', array(
			'selector'	=> '.topbardt',
		)
	);

	// For front page top slider
	$wp_customize->get_setting( 'frnt_top_slider_tag' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'frnt_top_slider_tag', array(
			'selector'	=> '.dim-owl-top',
		)
	);

	// For front page secondary left slider
	$wp_customize->get_setting( 'frnt_btm_lft_slider_tag' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'frnt_btm_lft_slider_tag', array(
			'selector'	=> '.dim-owl-btm',
		)
	);

	// For front page secondary right grid
	$wp_customize->get_setting( 'frnt_btm_rgt_slider_tag' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'frnt_btm_rgt_slider_tag', array(
			'selector'	=> '.dimasonry-secondary-right',
		)
	);
	
	// For front page categories section
	$wp_customize->get_setting( 'frnt_cat_1_cat' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'frnt_cat_1_cat', array(
			'selector'	=> '.front-single-category-headline',
		)
	);
	
	// For back to top icon.
	$wp_customize->get_setting( 'back_to_top' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'back_to_top', array(
			'selector'	=> '#back-to-top',
		)
	);
	
	// For social profile.
	$wp_customize->get_setting( 'sprofile_link_facebook' )->transport   = 'refresh';
	$wp_customize->selective_refresh->add_partial( 'sprofile_link_facebook', array(
			'selector'	=> '.sicons_ctmzr',
		)
	);

}
add_action( 'customize_register', 'di_magazine_pr_handle', 9999999 );

/**
 * Preview respective page on section open
 * @return [type] [description]
 */
function di_magazine_add_customize_controls_scripts() {
?>
<script type="text/javascript">
wp.customize.section( 'front_page_section', function( section ) {
	section.expanded.bind( function( isExpanded ) {
		if ( isExpanded ) {
			wp.customize.previewer.previewUrl.set( '<?php echo esc_url( home_url() ); ?>' );
		}
	} );
} );
</script>
<?php
}
add_action( 'customize_controls_print_scripts', 'di_magazine_add_customize_controls_scripts', 30 );
