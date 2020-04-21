<?php
// Return from file if disabled in customize
if( get_theme_mod( 'frnt_top_onoff', '0' ) != '1' ) {
	return;
}
?>
<div class="container-fluid front-page-top">
	<div class="owl-carousel owl-theme dim-owl dim-owl-top">

		<?php
		$r = new WP_Query( array(
			'posts_per_page'		=> absint( get_theme_mod( 'frnt_top_slider_num', '3' ) ),
			'no_found_rows'			=> true,
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> true,
			'tag_id'				=> absint( get_theme_mod( 'frnt_top_slider_tag', '' ) ),
		) );

		if( $r->have_posts() ) {
			while( $r->have_posts() ) : $r->the_post();
				?>
				<div class="item dim-item">	
					<a class="dim-firsta" href="<?php the_permalink(); ?>">
						<?php
						if( has_post_thumbnail() ) {
							echo '<figure class="dim-figure">';
								the_post_thumbnail( 'di-magazine-owl-top', ['class' => 'img-fluid'] );
							echo '</figure>';
						} else {
						?>
							<figure class="dim-figure">
								<img src="<?php echo esc_url( trailingslashit( get_template_directory_uri() ) . 'assets/images/dim-owl-top-default.jpg' ); ?>" class="attachment-di-magazine-owl-top size-di-magazine-owl-top wp-post-image img-fluid" alt="" width="450" height="300">
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
			wp_reset_postdata();
		}

		?>
	</div>
</div>