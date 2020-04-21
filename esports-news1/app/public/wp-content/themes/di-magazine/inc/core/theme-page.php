<?php

add_action( 'admin_menu', 'di_magazine_theme_page' );
function di_magazine_theme_page() {
	add_theme_page(
		__( 'Di Magazine Theme', 'di-magazine' ),
		__( 'Di Magazine Theme', 'di-magazine' ),
		'manage_options',
		'di-magazine-theme',
		'di_magazine_theme_page_callback'
	);
}

function di_magazine_theme_page_callback() {
?>
	<div class="wrap">
		<h1><?php _e( 'Di Magazine Theme Info', 'di-magazine' ); ?></h1>
		<br />
		<div class="container-fluid" style="border: 2px dashed #C3C3C3;">
			<div class="row">

				<div class="col-md-6" style="padding:0px;">
					<img class="img-fluid" src="<?php echo get_template_directory_uri() . '/screenshot.png'; ?>" />
				</div>

				<div class="col-md-6">

					<h2><?php _e( 'Di Magazine WordPress Theme', 'di-magazine' ); ?></h2>

					<p style="font-size:16px;"><?php _e( 'Di Magazine is a responsive, SEO friendly, fast to load, customizable and full functional WordPress theme for magazine websites. it is specially design and developed for magazine websites and comes with front page.', 'di-magazine' ); ?></p>

					<p style="font-size:16px;"><?php _e( 'Front page features: Top News Slider, Secondary Left News Slider, Secondary Right News Grid, Categories wise News Section, Front Page Layout. Theme features: One Click Demo Import, Typography Options, Social Profile, Top Bar Section, Header Layouts, Header Widgets for Advertisement and other Elements, Footer Widgets, Footer Copyright Section, Custom Recent News Widget, Social Profile Widget, Full Width Layout, Left Sidebar Layout, Right Sidebar Layout, Sticky Menu, Mega Menu Support, Back To Top Button Icon, Page Preloader and much more.', 'di-magazine' ); ?></p>

					<?php
					if( ! function_exists( 'di_magazine_pro' ) ) {
					?>
					<p style="font-size:16px;"><b><?php _e( 'Di Magazine Pro Features: ', 'di-magazine' ); ?></b><?php _e( 'Additional five categories on front page, Advance color options, Option to display different header image on page and post, Create unlimited sidebar areas, Option to select created sidebar area, Customize footer right credit section, Slider in Header, Quick and Direct support by theme developers.', 'di-magazine' ); ?><p>
					<?php
					}
					?>

					<div style="text-align: center;" >

						<a target="_blank" class="btn btn-outline-success btn-sm" href="http://demo.dithemes.com/di-magazine/" role="button"><?php _e( 'Theme Demo', 'di-magazine' ); ?></a>

						<a target="_blank" class="btn btn-outline-success btn-sm" href="https://dithemes.com/di-magazine-free-wordpress-theme-documentation/" role="button"><?php _e( 'Theme Docs', 'di-magazine' ); ?></a>

						<a target="_blank" class="btn btn-outline-success btn-sm" href="<?php echo esc_url( get_dashboard_url() ).'customize.php'; ?>" role="button"><?php esc_html_e( 'Theme Options', 'di-magazine' ); ?></a>

						<?php
						if( function_exists( 'di_magazine_pro' ) ) {
						?>
							<a target="_blank" class="btn btn-outline-success btn-sm" href="https://dithemes.com/my-tickets/" role="button"><?php _e( 'Get Premium Support', 'di-magazine' ); ?></a>
							<?php
						} else {
							?>
							<a target="_blank" class="btn btn-outline-success btn-sm" href="https://dithemes.com/product/di-magazine-pro-wordpress-theme/" role="button"><?php _e( 'Get Di Magazine Pro', 'di-magazine' ); ?></a>
							<?php
						}
						?>

					</div>
					<br />

				</div>
			</div>
		</div>
	</div>
<?php
}


// Enqueue js css files only if pagenow is themes.php and query string is page=di-magazine-them.
global $pagenow;
if ( 'themes.php' === $pagenow && 'page=di-magazine-theme' === $_SERVER['QUERY_STRING'] ) {
	add_action( 'admin_enqueue_scripts', 'di_magazine_admin_js_css' );
}

function di_magazine_admin_js_css() {
	// Load bootstrap css.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '4.0.0', 'all' );
	// Load bootstrap js.
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), '4.0.0', true );
}
