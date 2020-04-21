<?php
// Return if disabled in customize but add a col-md-6 so right side keep there.
if( get_theme_mod( 'frnt_btm_lft_onoff', '0' ) != '1' ) {
	echo '<div class="col-md-6 dim-front-right"></div>';
	return;
}
?>
<div class="col-md-6 dim-front-right">
	<div class="front-page-btm">
		<div class="owl-carousel owl-theme dim-owl-btm">

			<?php
			$r = new WP_Query( array(
				'posts_per_page'		=> absint( get_theme_mod( 'frnt_btm_lft_slider_num', '3' ) ),
				'no_found_rows'			=> true,
				'post_status'			=> 'publish',
				'ignore_sticky_posts'	=> true,
				'tag_id'				=> absint( get_theme_mod( 'frnt_btm_lft_slider_tag', '' ) ),
			) );

			if( $r->have_posts() ) {
				while( $r->have_posts() ) : $r->the_post();
			?>
				<div class="item dim-item-btm">	
					<a class="dim-firsta-btm" href="<?php the_permalink(); ?>">
						<?php
						if( has_post_thumbnail() ) {
							echo '<figure class="dim-figure-btm">';
							the_post_thumbnail( 'di-magazine-owl-bottom-left', ['class' => 'img-fluid'] );
							echo '</figure>';
						} else {
						?>
							<figure class="dim-figure-btm">
								<img src="<?php echo esc_url( trailingslashit( get_template_directory_uri() ) . 'assets/images/dim-owl-bottom-left-default.jpg' ); ?>" class="img-fluid dim-img-btm" alt="" width="616" height="478">
							</figure>
						<?php
						}
						?>
					</a>
					<div class="diowl-overlay-btm">
						<div class="diowl-text-btm ">
							<h3 class="dim-h3head-btm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<!---<span class="diowl-cat-btm"><?php the_category( ' ' ); ?></span>--->
							
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
</div>
