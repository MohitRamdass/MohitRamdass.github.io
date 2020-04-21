<?php
if( get_theme_mod( 'frnt_btm_rgt_onoff', '0' ) != '1' ) {
	echo '<div class="col-md-6 dim-front-left"></div>';
	return;
}
?>
<div class="col-md-6 dim-front-left">

	<?php
	$r = new WP_Query( array(
		'posts_per_page'		=> 4,
		'no_found_rows'			=> true,
		'post_status'			=> 'publish',
		'ignore_sticky_posts'	=> true,
		'tag_id'				=> absint( get_theme_mod( 'frnt_btm_rgt_slider_tag', '' ) ),
	) );

	if( $r->have_posts() ) {
		?>
		<div class="dimasonry-secondary-right">
			<?php
				while( $r->have_posts() ) : $r->the_post();
			?>
			<div class="dim-item dimasonrybox-secondary-right">	
				<a class="dim-firsta" href="<?php the_permalink(); ?>">	
					<?php
					if( has_post_thumbnail() ) {
						echo '<figure class="dim-figure-btm-right">';
						the_post_thumbnail( 'di-magazine-owl-bottom-right', ['class' => 'img-fluid'] );
						echo '</figure>';
					} else {
					?>
						<figure class="dim-figure-btm-right">
							<img src="<?php echo esc_url( trailingslashit( get_template_directory_uri() ) . 'assets/images/dim-owl-bottom-right-default.jpg' ); ?>" class="img-fluid dim-img-btm" alt="" width="616" height="478">
						</figure>
					<?php
					}
					?>

				</a>
				<div class="diowl-overlay">
					<div class="diowl-text">
						<h3 class="dim-h3head"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<span class="diowl-cat"><?php the_category( ' ' ); ?></span>
					</div>
				</div>
			</div>
			<?php
			endwhile;
			?>
		</div>
	<?php
	wp_reset_postdata();
	}
	?>

</div>
