<?php
get_header( 'front-page' );
$frontpage_layout = esc_attr( get_theme_mod( 'frntpg_layout', 'fullw' ) );
?>
<div class="<?php if( $frontpage_layout == 'rights' ) { echo 'col-md-8'; } elseif( $frontpage_layout == 'lefts' ) { echo 'col-md-8 layoutleftsidebar'; } else { echo 'col-md-12'; } ?>">
	<div class="left-content front-categories thefrontpg" >

		<!-- First category on front page -->
		<?php
		if( get_theme_mod( 'frnt_cat_1_onoff', '1' ) == '1' ) {

			if( is_active_sidebar( 'front_page_categoty_1' ) ) {
				dynamic_sidebar( 'front_page_categoty_1' );
			}

			$dimfcat = absint( get_theme_mod( 'frnt_cat_1_cat', '1' ) );
			$r = new WP_Query( array(
				'posts_per_page'		=> absint( get_theme_mod( 'frnt_cat_1_cat_num', '4' ) ),
				'no_found_rows'			=> true,
				'post_status'			=> 'publish',
				'ignore_sticky_posts'	=> true,
				'cat'					=> $dimfcat,
			) );

			if( $r->have_posts() ) {
				?>
				<div class="front-single-category front-category-loop first-cat-section">
					<div class="front-single-category-headline">
						<h1><a href="<?php echo esc_url( get_category_link( $dimfcat ) ); ?>"><?php echo esc_html( get_cat_name( $dimfcat ) ); ?></a></h1>
						<p><a href="<?php echo esc_url( get_category_link( $dimfcat ) ); ?>"><?php esc_html_e( 'View All', 'di-magazine' ) ?></a></p>
					</div>

					<div class="front-single-category-dimasonry">
						<?php
						while( $r->have_posts() ) : $r->the_post();
						?>

						<div class="front-single-category-contents front-single-category-dimasonry-item">

							<div class="dim-front-cat-imgs">
								<?php
								if( has_post_thumbnail() ) {
									echo '<figure class="dim-front-cat-img">';
										the_post_thumbnail( 'di-magazine-owl-top', ['class' => 'img-fluid'] );
									echo '</figure>';
								} else {
								?>
									<figure class="dim-front-cat-img">
										<img class="front-single-category-contents-img" src="<?php echo esc_url( trailingslashit( get_template_directory_uri() ) . 'assets/images/dim-owl-top-default.jpg' ); ?>" />
									</figure>
								<?php
								}
								?>
							</div>

							<h3 class="front-single-category-contents-h1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<p class="front-single-category-contents-meta">
								<span class="front-single-category-contents-pdate">
									<a href="<?php the_permalink(); ?>"><span class="fa fa-clock-o"> </span> <?php the_date(); ?></a>
								</span>

								<span class="front-single-category-contents-author">
									<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="fa fa-user-o"> </span> <?php the_author(); ?></a>
								</span>
							</p>
							
							<div class="front-single-category-contents-exerpt">
								<?php the_excerpt(); ?>
							</div>

						</div>

					<?php
						endwhile;
						wp_reset_postdata();
					?>
					</div>
				</div>
				<?php
			}
		}
		?>
		<!-- First category on front page END -->


		<!-- Second category on front page -->
		<?php
		if( get_theme_mod( 'frnt_cat_2_onoff', '1' ) == '1' ) {

			if( is_active_sidebar( 'front_page_categoty_2' ) ) {
				dynamic_sidebar( 'front_page_categoty_2' );
			}

		?>
			<div class="clearfixfrntpg"></div>
			<?php
			$dimfcat = absint( get_theme_mod( 'frnt_cat_2_cat', '1' ) );
			$r = new WP_Query( array(
				'posts_per_page'		=> absint( get_theme_mod( 'frnt_cat_2_cat_num', '4' ) ),
				'no_found_rows'			=> true,
				'post_status'			=> 'publish',
				'ignore_sticky_posts'	=> true,
				'cat'					=> $dimfcat,
			) );

			if( $r->have_posts() ) {
				?>
				<div class="front-single-category front-category-loop sec-cat-section">

					<div class="front-single-category-headline">
						<h1><a href="<?php echo esc_url( get_category_link( $dimfcat ) ); ?>"><?php echo esc_html( get_cat_name( $dimfcat ) ); ?></a></h1>
						<p><a href="<?php echo esc_url( get_category_link( $dimfcat ) ); ?>"><?php esc_html_e( 'View All', 'di-magazine' ) ?></a></p>
					</div>

					<div class="front-single-category-dimasonry">
						<?php
							while( $r->have_posts() ) : $r->the_post();
						?>

						<div class="front-single-category-contents front-single-category-dimasonry-item">
							
							<div class="dim-front-cat-imgs">
								<?php
								if( has_post_thumbnail() ) {
									echo '<figure class="dim-front-cat-img">';
										the_post_thumbnail( 'di-magazine-owl-top', ['class' => 'img-fluid'] );
									echo '</figure>';
								} else {
								?>
									<figure class="dim-front-cat-img">
										<img class="front-single-category-contents-img" src="<?php echo esc_url( trailingslashit( get_template_directory_uri() ) . 'assets/images/dim-owl-top-default.jpg' ); ?>" />
									</figure>
								<?php
								}
								?>
							</div>

							<h3 class="front-single-category-contents-h1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<p class="front-single-category-contents-meta">
								<span class="front-single-category-contents-pdate">
									<a href="<?php the_permalink(); ?>"><span class="fa fa-clock-o"> </span> <?php the_date(); ?></a>
								</span>

								<span class="front-single-category-contents-author">
									<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="fa fa-user-o"> </span> <?php the_author(); ?></a>
								</span>
							</p>
							
							<div class="front-single-category-contents-exerpt">
								<?php the_excerpt(); ?>
							</div>

						</div>

						<?php
							endwhile;
							wp_reset_postdata();
						?>

					</div>
				</div>
				<?php
			}
		}
		?>
		<!-- Second category on front page END -->


		<!-- Third category on front page -->
		<?php
		if( get_theme_mod( 'frnt_cat_3_onoff', '1' ) == '1' ) {

			if( is_active_sidebar( 'front_page_categoty_3' ) ) {
				dynamic_sidebar( 'front_page_categoty_3' );
			}

		?>
			<div class="clearfixfrntpg"></div>
			<?php
			$dimfcat = absint( get_theme_mod( 'frnt_cat_3_cat', '1' ) );
			$r = new WP_Query( array(
				'posts_per_page'		=> absint( get_theme_mod( 'frnt_cat_3_cat_num', '4' ) ),
				'no_found_rows'			=> true,
				'post_status'			=> 'publish',
				'ignore_sticky_posts'	=> true,
				'cat'					=> $dimfcat,
			) );

			if( $r->have_posts() ) {
				?>
				<div class="front-single-category front-category-loop trd-cat-section">

					<div class="front-single-category-headline">
						<h1><a href="<?php echo esc_url( get_category_link( $dimfcat ) ); ?>"><?php echo esc_html( get_cat_name( $dimfcat ) ); ?></a></h1>
						<p><a href="<?php echo esc_url( get_category_link( $dimfcat ) ); ?>"><?php esc_html_e( 'View All', 'di-magazine' ) ?></a></p>
					</div>

					<div class="front-single-category-dimasonry">
						<?php
							while( $r->have_posts() ) : $r->the_post();
						?>

						<div class="front-single-category-contents front-single-category-dimasonry-item">
							
							<div class="dim-front-cat-imgs">
								<?php
								if( has_post_thumbnail() ) {
									echo '<figure class="dim-front-cat-img">';
										the_post_thumbnail( 'di-magazine-owl-top', ['class' => 'img-fluid'] );
									echo '</figure>';
								} else {
								?>
									<figure class="dim-front-cat-img">
										<img class="front-single-category-contents-img" src="<?php echo esc_url( trailingslashit( get_template_directory_uri() ) . 'assets/images/dim-owl-top-default.jpg' ); ?>" />
									</figure>
								<?php
								}
								?>
							</div>

							<h3 class="front-single-category-contents-h1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<p class="front-single-category-contents-meta">
								<span class="front-single-category-contents-pdate">
									<a href="<?php the_permalink(); ?>"><span class="fa fa-clock-o"> </span> <?php the_date(); ?></a>
								</span>

								<span class="front-single-category-contents-author">
									<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="fa fa-user-o"> </span> <?php the_author(); ?></a>
								</span>
							</p>
							
							<div class="front-single-category-contents-exerpt">
								<?php the_excerpt(); ?>
							</div>

						</div>

						<?php
							endwhile;
							wp_reset_postdata();
						?>

					</div>
				</div>
				<?php
			}
		}
		?>
		<!-- Third category on front page END -->


		<!-- Four category on front page -->
		<?php
		if( get_theme_mod( 'frnt_cat_4_onoff', '1' ) == '1' ) {

			if( is_active_sidebar( 'front_page_categoty_4' ) ) {
				dynamic_sidebar( 'front_page_categoty_4' );
			}

		?>
			<div class="clearfixfrntpg"></div>
			<?php
			$dimfcat = absint( get_theme_mod( 'frnt_cat_4_cat', '1' ) );
			$r = new WP_Query( array(
				'posts_per_page'		=> absint( get_theme_mod( 'frnt_cat_4_cat_num', '4' ) ),
				'no_found_rows'			=> true,
				'post_status'			=> 'publish',
				'ignore_sticky_posts'	=> true,
				'cat'					=> $dimfcat,
			) );

			if( $r->have_posts() ) {
				?>
				<div class="front-single-category front-category-loop frth-cat-section">

					<div class="front-single-category-headline">
						<h1><a href="<?php echo esc_url( get_category_link( $dimfcat ) ); ?>"><?php echo esc_html( get_cat_name( $dimfcat ) ); ?></a></h1>
						<p><a href="<?php echo esc_url( get_category_link( $dimfcat ) ); ?>"><?php esc_html_e( 'View All', 'di-magazine' ) ?></a></p>
					</div>

					<div class="front-single-category-dimasonry">
						<?php
							while( $r->have_posts() ) : $r->the_post();
						?>

						<div class="front-single-category-contents front-single-category-dimasonry-item">
							
							<div class="dim-front-cat-imgs">
								<?php
								if( has_post_thumbnail() ) {
									echo '<figure class="dim-front-cat-img">';
										the_post_thumbnail( 'di-magazine-owl-top', ['class' => 'img-fluid'] );
									echo '</figure>';
								} else {
								?>
									<figure class="dim-front-cat-img">
										<img class="front-single-category-contents-img" src="<?php echo esc_url( trailingslashit( get_template_directory_uri() ) . 'assets/images/dim-owl-top-default.jpg' ); ?>" />
									</figure>
								<?php
								}
								?>
							</div>

							<h3 class="front-single-category-contents-h1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<p class="front-single-category-contents-meta">
								<span class="front-single-category-contents-pdate">
									<a href="<?php the_permalink(); ?>"><span class="fa fa-clock-o"> </span> <?php the_date(); ?></a>
								</span>

								<span class="front-single-category-contents-author">
									<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="fa fa-user-o"> </span> <?php the_author(); ?></a>
								</span>
							</p>
							
							<div class="front-single-category-contents-exerpt">
								<?php the_excerpt(); ?>
							</div>

						</div>

						<?php
							endwhile;
							wp_reset_postdata();
						?>

					</div>
				</div>
				<?php
			}
		}
		?>
		<!-- Four category on front page END -->


		<!-- Fifth category on front page -->
		<?php
		if( get_theme_mod( 'frnt_cat_5_onoff', '1' ) == '1' ) {

			if( is_active_sidebar( 'front_page_categoty_5' ) ) {
				dynamic_sidebar( 'front_page_categoty_5' );
			}

		?>
			<div class="clearfixfrntpg"></div>
			<?php
			$dimfcat = absint( get_theme_mod( 'frnt_cat_5_cat', '1' ) );
			$r = new WP_Query( array(
				'posts_per_page'		=> absint( get_theme_mod( 'frnt_cat_5_cat_num', '4' ) ),
				'no_found_rows'			=> true,
				'post_status'			=> 'publish',
				'ignore_sticky_posts'	=> true,
				'cat'					=> $dimfcat,
			) );

			if( $r->have_posts() ) {
				?>
				<div class="front-single-category front-category-loop fifth-cat-section">

					<div class="front-single-category-headline">
						<h1><a href="<?php echo esc_url( get_category_link( $dimfcat ) ); ?>"><?php echo esc_html( get_cat_name( $dimfcat ) ); ?></a></h1>
						<p><a href="<?php echo esc_url( get_category_link( $dimfcat ) ); ?>"><?php esc_html_e( 'View All', 'di-magazine' ) ?></a></p>
					</div>

					<div class="front-single-category-dimasonry">
						<?php
							while( $r->have_posts() ) : $r->the_post();
						?>

						<div class="front-single-category-contents front-single-category-dimasonry-item">
							
							<div class="dim-front-cat-imgs">
								<?php
								if( has_post_thumbnail() ) {
									echo '<figure class="dim-front-cat-img">';
										the_post_thumbnail( 'di-magazine-owl-top', ['class' => 'img-fluid'] );
									echo '</figure>';
								} else {
								?>
									<figure class="dim-front-cat-img">
										<img class="front-single-category-contents-img" src="<?php echo esc_url( trailingslashit( get_template_directory_uri() ) . 'assets/images/dim-owl-top-default.jpg' ); ?>" />
									</figure>
								<?php
								}
								?>
							</div>

							<h3 class="front-single-category-contents-h1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<p class="front-single-category-contents-meta">
								<span class="front-single-category-contents-pdate">
									<a href="<?php the_permalink(); ?>"><span class="fa fa-clock-o"> </span> <?php the_date(); ?></a>
								</span>

								<span class="front-single-category-contents-author">
									<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="fa fa-user-o"> </span> <?php the_author(); ?></a>
								</span>
							</p>
							
							<div class="front-single-category-contents-exerpt">
								<?php the_excerpt(); ?>
							</div>

						</div>

						<?php
							endwhile;
							wp_reset_postdata();
						?>

					</div>
				</div>
				<?php
			}
		}
		?>
		<!-- Fifth category on front page END -->

		<?php do_action( 'di_magazine_front_page_categories_render' ); ?>

	</div>
</div>
<?php if( $frontpage_layout == 'rights' || $frontpage_layout == 'lefts' ) { get_sidebar( 'front-page' ); } ?>
<?php get_footer(); ?>
