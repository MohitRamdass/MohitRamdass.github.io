<?php
/**
 * Di Magazine Engine. This file is responsible for theme setup, scripts, styles, sidebar registration.
 *
 * @package Di Magazine
 */

/**
 * Class Di_Magazine_Engine.
 */
class Di_Magazine_Engine {

	/**
	 * Instance object.
	 *
	 * @var instance
	 */
	public static $instance;

	/**
	 * Get_instance method.
	 *
	 * @return instance instance of the class.
	 */
	public static function get_instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

	/**
	 * Construct method.
	 */
	public function __construct() {
		$this->set_constants();
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts_and_styles' ) );
		add_action( 'customize_preview_init', array( $this, 'customizer_scripts_and_styles' ) );
		add_action( 'widgets_init', array( $this, 'sidebar_registration' ) );
	}

	/**
	 *  Set constants.
	 */
	public function set_constants() {
		define( 'DI_MAGAZINE_VERSION', wp_get_theme( 'di-magazine' )->get( 'Version' ) );
	}

	/**
	 * Theme setup.
	 */
	public function setup() {

		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 730;
		}

		load_theme_textdomain( 'di-magazine', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'align-wide' );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'html5', array( 'gallery', 'caption' ) );

		add_theme_support( 'post-formats', array( 'quote' ) );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 730, 300, true );
		add_image_size( 'di-magazine-recentpostthumb', 90, 90, true );
		add_image_size( 'di-magazine-owl-top', 450, 300, true );
		add_image_size( 'di-magazine-owl-bottom-left', 617, 496, true );
		add_image_size( 'di-magazine-owl-bottom-right', 310, 208, true );
		add_image_size( 'di-magazine-category-posts-carousel', 360, 360, true );

		// This theme uses wp_nav_menu() at two locations.
		register_nav_menus( array(
			'primary'		=> __( 'Top Main Menu', 'di-magazine' ),
			'topbarleft'	=> __( 'Top Bar Left Menu', 'di-magazine' ),
		) );

		add_theme_support( 'custom-background', array(
			'default-color'      => '#fcfcfc',
			'default-attachment' => 'fixed',
		) );

		add_theme_support( 'custom-header', array(
			'width'         => 1350,
			'height'        => 260,
			'flex-width'    => true,
			'flex-height'   => true,
			'uploads'       => true,
			'header-text'	=> false,
		) );

		add_theme_support( 'custom-logo', array(
			'height'		=> '100',
			'width'			=> '360',
			'flex-height'	=> true,
			'flex-width'	=> true,
		) );

		add_editor_style( array( '//fonts.googleapis.com/css?family=Raleway', get_template_directory_uri() . '/assets/css/style.css', get_template_directory_uri() . '/assets/css/editor-style.css' ) );

	}

	/**
	 * Scripts_and_styles of theme.
	 */
	public function scripts_and_styles() {

		// Load bootstrap css.
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '4.0.0', 'all' );

		// Load font-awesome file.
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '4.7.0', 'all' );

		// Load default css file.
		wp_enqueue_style( 'di-magazine-style-default', get_stylesheet_uri(), array( 'bootstrap', 'font-awesome' ), DI_MAGAZINE_VERSION, 'all' );

		// Load css/style.css file.
		wp_enqueue_style( 'di-magazine-style-core', get_template_directory_uri() . '/assets/css/style.css', array( 'bootstrap', 'font-awesome', 'di-magazine-style-default' ), DI_MAGAZINE_VERSION, 'all' );

		// Load owl.carousel css files if we are on front page

		// Load owl.carousel css.
		wp_enqueue_style( 'owl-carousel', trailingslashit( get_template_directory_uri() ) . 'assets/css/owl.carousel.css', array( 'di-magazine-style-core' ), '2.2.1', 'all' );

		// Load owl.carousel default css.
		wp_enqueue_style( 'owl-theme-default', trailingslashit( get_template_directory_uri() ) . 'assets/css/owl.theme.default.css', array( 'owl-carousel', 'di-magazine-style-core' ), '2.2.1', 'all' );


		// Load bootstrap js.
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), '4.0.0', true );

		// Load script file.
		wp_enqueue_script( 'di-magazine-script', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), DI_MAGAZINE_VERSION, true );

		// Load html5shiv.
		wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.js', array(), '3.7.3', false );
		wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

		// Load respond js.
		wp_enqueue_script( 'respond', get_template_directory_uri() . '/assets/js/respond.js', array(), DI_MAGAZINE_VERSION, false );
		wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

		// load comment-reply js.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Load stickymenu js depends on jquery and if enabled by customizer.
		if ( get_theme_mod( 'stickymenu_setting', '0' ) == 1 && ! is_page_template( 'template-landing-page.php' ) ) {
			wp_enqueue_script( 'di-magazine-stickymenu', get_template_directory_uri() . '/assets/js/stickymenu.js', array( 'jquery' ), DI_MAGAZINE_VERSION, 'true' );
		}

		// Load back to top js depends on jquery and if enabled by customizer.
		if ( get_theme_mod( 'back_to_top', '1' ) == 1 ) {
			wp_enqueue_script( 'di-magazine-backtotop', get_template_directory_uri() . '/assets/js/backtotop.js', array( 'jquery' ), DI_MAGAZINE_VERSION, true );
		}

		// Preloader icon js depends on jquery and if enabled by customizer.
		if ( get_theme_mod( 'loading_icon', '0' ) == 1 ) {
			wp_enqueue_script( 'di-magazine-loadicon', get_template_directory_uri() . '/assets/js/loadicon.js', array( 'jquery' ), DI_MAGAZINE_VERSION, true );
		}

		// CSP Search js depends on jquery and if enabled by customizer and not on landing page.
		if ( get_theme_mod( 'top_bar_seach_icon', '1' ) == 1 && get_theme_mod( 'display_top_bar', '1' ) == 1 && ! is_page_template( 'template-landing-page.php' ) ) {
			wp_enqueue_script( 'di-magazine-csp-search', get_template_directory_uri() . '/assets/js/scpsearch.js', array( 'jquery' ), DI_MAGAZINE_VERSION, true );
		}

		// Load front page masonry js theme code, masonry
		if( is_front_page() ) {
			wp_enqueue_script( 'di-magazine-masonry', get_template_directory_uri() . '/assets/js/masonry.js', array( 'jquery', 'imagesloaded', 'masonry' ), DI_MAGAZINE_VERSION, true );
		}

		// Load masonry-blog-posts.js on blog and archive page.
		if( ( is_home() || is_archive() || is_search() ) && ( get_theme_mod( 'blog_list_grid', 'grid2c' ) == 'grid2c' || get_theme_mod( 'blog_list_grid', 'grid2c' ) == 'grid3c' ) ) {
			wp_enqueue_script( 'di-magazine-masonry-blog-posts', get_template_directory_uri() . '/assets/js/masonry-blog-posts.js', array( 'jquery', 'imagesloaded', 'masonry' ), DI_MAGAZINE_VERSION, true );
		}

		// Load owl.carousel js file if we are on front page 
		wp_enqueue_script( 'owl-carousel', trailingslashit( get_template_directory_uri() ) . 'assets/js/owl.carousel.js', array( 'jquery' ), '2.2.1', true );

		if( is_front_page() )  {
			wp_enqueue_script( 'di-magazine-front-left-owl-carousel', trailingslashit( get_template_directory_uri() ) . 'assets/js/owl.carousel.dim.js', array( 'jquery', 'owl-carousel' ), DI_MAGAZINE_VERSION, true );
		}

		wp_enqueue_script( 'di-magazine-owl-carousel', trailingslashit( get_template_directory_uri() ) . 'assets/js/owl.carousel.widget-categy-posts-slider.js', array( 'jquery', 'owl-carousel' ), DI_MAGAZINE_VERSION, true );

		
	}

	/**
	 * [customizer_scripts_and_styles description]
	 * @return [type] [description]
	 */
	public function customizer_scripts_and_styles() {

		wp_enqueue_style( 'di-magazine-customize-preview', get_template_directory_uri() . '/assets/css/customizer.css', array( 'customize-preview' ), DI_MAGAZINE_VERSION, 'all' );

		wp_enqueue_script( 'di-magazine-customize-preview', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), DI_MAGAZINE_VERSION, true );

	}

	/**
	 * Sidebar_registration.
	 */
	public function sidebar_registration() {
		register_sidebar( array(
			'name'			=> __( 'Blog Sidebar', 'di-magazine' ),
			'id'			=> 'sidebar-1',
			'description'	=> __( 'Widgets for Blog sidebar. If you are using Full Width Layout in customize, then this sidebar will not display.', 'di-magazine' ),
			'before_widget'	=> '<div id="%1$s" class="widget_sidebar_main clearfix %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3 class="right-widget-title">',
			'after_title'	=> '</h3>',
		) );

		register_sidebar( array(
			'name'			=> __( 'Page Sidebar', 'di-magazine' ),
			'id'			=> 'sidebar_page',
			'description'	=> __( 'Widgets for Page sidebar. Choose Sidebar Template to display it. Page edit screen > Page Attributes > Template.', 'di-magazine' ),
			'before_widget'	=> '<div id="%1$s" class="widget_sidebar_main clearfix %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3 class="right-widget-title">',
			'after_title'	=> '</h3>',
		) );

		register_sidebar( array(
			'name'			=> __( 'Front Page Sidebar', 'di-magazine' ),
			'id'			=> 'sidebar_frontpage',
			'description'	=> __( 'Widgets for Front Page sidebar.', 'di-magazine' ),
			'before_widget'	=> '<div id="%1$s" class="widget_sidebar_main clearfix %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '<h3 class="right-widget-title">',
			'after_title'	=> '</h3>',
		) );

		register_sidebar( array(
			'name'			=> __( 'Top Header right', 'di-magazine' ),
			'id'			=> 'sidebar_header',
			'description'	=> __( 'Widgets for top header right. You can select header layout accordingly here: Dashboard > Appearance > Customize > Di Magazine Options > Header Layout Options.', 'di-magazine' ),
			'before_widget'	=> '<div id="%1$s" class="widgets_header fl_right_header_spsl clearboth %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '',
			'after_title'	=> '',
		) );

		register_sidebar( array(
			'name'			=> __( 'Top Header Left', 'di-magazine' ),
			'id'			=> 'sidebar_header_left',
			'description'	=> __( 'Widgets for top header left. You can select header layout accordingly here: Dashboard > Appearance > Customize > Di Magazine Options > Header Layout Options.', 'di-magazine' ),
			'before_widget'	=> '<div id="%1$s" class="widgets_header_left clearboth %2$s">',
			'after_widget'	=> '</div>',
			'before_title'	=> '',
			'after_title'	=> '',
		) );

		// Footer widget register base on settings.
		$enordis = absint( get_theme_mod( 'endis_ftr_wdgt', '0' ) );
		$layout = absint( get_theme_mod( 'ftr_wdget_lyot', '3' ) );
		if ( $enordis != 0 ) {
			if ( $layout == 48 || $layout == 84 ) {
				register_sidebar( array(
					'name'			=> __( 'Footer Widget 1', 'di-magazine' ),
					'id'			=> 'footer_1',
					'description'	=> __( 'Widgets for footer 1', 'di-magazine' ),
					'before_widget'	=> '<div id="%1$s" class="widgets_footer clearfix %2$s">',
					'after_widget'	=> '</div>',
					'before_title'	=> '<h3 class="widgets_footer_title">',
					'after_title'	=> '</h3>',
				) );

				register_sidebar( array(
					'name'			=> __( 'Footer Widget 2', 'di-magazine' ),
					'id'			=> 'footer_2',
					'description'	=> __( 'Widgets for footer 2', 'di-magazine' ),
					'before_widget'	=> '<div id="%1$s" class="widgets_footer clearfix %2$s">',
					'after_widget'	=> '</div>',
					'before_title'	=> '<h3 class="widgets_footer_title">',
					'after_title'	=> '</h3>',
				) );
			} else {
				for( $i = 1; $i <= $layout; $i++ ) {
					register_sidebar( array(
						'name'			=> __( 'Footer Widget ', 'di-magazine' ) . $i,
						'id'			=> 'footer_' . $i,
						'description'	=> __( 'Widgets for footer ', 'di-magazine' ) . $i,
						'before_widget'	=> '<div id="%1$s" class="widgets_footer clearfix %2$s">',
						'after_widget'	=> '</div>',
						'before_title'	=> '<h3 class="widgets_footer_title">',
						'after_title'	=> '</h3>',
					) );
				}
			}
		}

		// Front page widgets before each category 1 to 5
		if( get_theme_mod( 'frnt_cat_1_onoff', '1' ) == '1' ) {
			register_sidebar( array(
				'name'			=> __( 'Front Page 1', 'di-magazine' ),
				'id'			=> 'front_page_categoty_1',
				'description'	=> __( 'Front page widgets before category 1.', 'di-magazine' ),
				'before_widget'	=> '<div id="%1$s" class="front_page_container_wdgt front_page_wdgt_1 clearfix %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<h3 class="widget-title">',
				'after_title'	=> '</h3>',
			) );
		}

		if( get_theme_mod( 'frnt_cat_2_onoff', '1' ) == '1' ) {
			register_sidebar( array(
				'name'			=> __( 'Front Page 2', 'di-magazine' ),
				'id'			=> 'front_page_categoty_2',
				'description'	=> __( 'Front page widgets before category 2.', 'di-magazine' ),
				'before_widget'	=> '<div id="%1$s" class="front_page_container_wdgt front_page_wdgt_2 clearfix %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<h3 class="widget-title">',
				'after_title'	=> '</h3>',
			) );
		}

		if( get_theme_mod( 'frnt_cat_3_onoff', '1' ) == '1' ) {
			register_sidebar( array(
				'name'			=> __( 'Front Page 3', 'di-magazine' ),
				'id'			=> 'front_page_categoty_3',
				'description'	=> __( 'Front page widgets before category 3.', 'di-magazine' ),
				'before_widget'	=> '<div id="%1$s" class="front_page_container_wdgt front_page_wdgt_3 clearfix %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<h3 class="widget-title">',
				'after_title'	=> '</h3>',
			) );
		}

		if( get_theme_mod( 'frnt_cat_4_onoff', '1' ) == '1' ) {
			register_sidebar( array(
				'name'			=> __( 'Front Page 4', 'di-magazine' ),
				'id'			=> 'front_page_categoty_4',
				'description'	=> __( 'Front page widgets before category 4.', 'di-magazine' ),
				'before_widget'	=> '<div id="%1$s" class="front_page_container_wdgt front_page_wdgt_4 clearfix %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<h3 class="widget-title">',
				'after_title'	=> '</h3>',
			) );
		}

		if( get_theme_mod( 'frnt_cat_5_onoff', '1' ) == '1' ) {
			register_sidebar( array(
				'name'			=> __( 'Front Page 5', 'di-magazine' ),
				'id'			=> 'front_page_categoty_5',
				'description'	=> __( 'Front page widgets before category 5.', 'di-magazine' ),
				'before_widget'	=> '<div id="%1$s" class="front_page_container_wdgt front_page_wdgt_5 clearfix %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<h3 class="widget-title">',
				'after_title'	=> '</h3>',
			) );
		}

		// Front page widgets before each category END
	}
}
Di_Magazine_Engine::get_instance();
