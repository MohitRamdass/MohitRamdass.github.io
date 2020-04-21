<?php
/*
 * The main class of the child theme.
 */
class Magazine_News_Plus_Engine {

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
	 * [__construct description]
	 */
	public function __construct() {
		$this->set_constants();
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts_and_styles' ) );
	}

	/**
	 * [set_constants description]
	 */
	public function set_constants() {
		define( 'Magazine_News_Plus', wp_get_theme( 'magazine-news-plus' )->get( 'Version' ) );
	}

	/**
	 * [setup description]
	 * @return [type] [description]
	 */
	public function setup() {

		register_nav_menus( array(
			'footer'	=> __( 'Footer Menu', 'magazine-news-plus' ),
		) );

		add_image_size( 'magazine-news-plus-recent-news-carousel', 360, 360, true );

	}

	/**
	 * [scripts_and_styles description]
	 * @return [type] [description]
	 */
	public function scripts_and_styles() {
		// Parent theme CSS.
	    wp_enqueue_style( 'di-magazine-style-default', get_template_directory_uri() . '/style.css' );

	    // Magazine News Plus CSS files.
	    wp_enqueue_style( 'magazine-news-plus-style',  get_stylesheet_directory_uri() . '/style.css', array( 'bootstrap', 'font-awesome', 'di-magazine-style-default', 'di-magazine-style-core' ), Magazine_News_Plus, 'all' );

	    // Load owl.carousel css.
		wp_enqueue_style( 'owl-carousel', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/css/owl.carousel.css', array( 'di-magazine-style-core' ), '2.2.1', 'all' );

		// Load owl.carousel default css.
		wp_enqueue_style( 'owl-theme-default', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/css/owl.theme.default.css', array( 'owl-carousel', 'di-magazine-style-core' ), '2.2.1', 'all' );

		wp_enqueue_script( 'owl-carousel', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/js/owl.carousel.js', array( 'jquery' ), '2.2.1', true );

		wp_enqueue_script( 'magazine-news-plus-owl-carousel', trailingslashit( get_stylesheet_directory_uri() ) . 'assets/js/owl.carousel.mnp.js', array( 'jquery', 'owl-carousel' ), Magazine_News_Plus, true );
	}


}
Magazine_News_Plus_Engine::get_instance();
