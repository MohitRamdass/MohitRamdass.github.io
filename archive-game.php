<?php
get_header();
$archive_layout = esc_attr( get_theme_mod( 'blog_archive_layout', 'fullw' ) );
?>
<div class="<?php if( $archive_layout == 'rights' ) { echo 'col-md-8'; } elseif( $archive_layout == 'lefts' ) { echo 'col-md-8 layoutleftsidebar'; } else { echo 'col-md-12'; } ?>">
	
    <div class="left-content" >
		
		<?php if( is_archive() ) { ?>
		<div class="content-first postsloop">
			
			<div class="content-second">
				<h1 class="the-title">All Games</h1>
			</div>
			
			<?php the_archive_description( '<div class="content-third"><p class="archive-description">', '</p></div>' ); ?>

		</div>
		<?php } ?>
		
		<?php if( is_search() ) { ?>
		<div class="content-first">
			
			<div class="content-second">
				<h1 class="the-title"><?php printf( __( 'Search Results for: %s', 'di-magazine' ), get_search_query() ); ?></h1>
			</div>
				
		</div>
		<?php } ?>
		
		
		<?php
		if( have_posts() ) {
			echo '<div class="dimasonry">';

            $Games = new WP_Query(array(
                'posts_per_page' => -1,
                'post_type' => 'game',
                'orderby' => 'title',
                'order' => 'ASC'
            ));
			while( $Games->have_posts() ) : $Games->the_post();

				get_template_part( 'template-parts/content', 'loop' );

			endwhile;

			echo '</div>';

			di_magazine_posts_pagination();

		} else {
			get_template_part( 'template-parts/content', 'none' );
		}
		?>
	</div>
</div>
<?php if( $archive_layout == 'rights' || $archive_layout == 'lefts' ) { get_sidebar(); } ?>
<?php get_footer(); ?>
