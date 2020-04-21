<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix single-posst anews'); ?>>
	<div class="content-first" itemscope itemtype="http://schema.org/CreativeWork">
		
		<div class="content-second">
			<h1 class="the-title entry-title" itemprop="headline"><?php the_title(); ?></h1>
		</div>
				
		<div class="content-third">
		
			<?php
			if( get_theme_mod( 'post_meta_disply', '1' ) == 1 ) {
				di_magazine_entry_meta();
			}
			?>

			<div class="entry-content" itemprop="text">
					
				<?php
				if( get_theme_mod( 'single_post_thumbnail', '1' ) == '1' ) {
					the_post_thumbnail('large', array('class'=>'aligncenter'));
				}
				?>

					
				<?php the_content(); ?>
                
                    <?php
                    $relatedTeams = get_field('related_teams');
                    echo '<hr class="section-break">';
                    echo '<h2 class="headline headline--medium"> Pro Player(s) playing for this Team </h2>';
                    echo '<ul class="link-list min-list">';
                    if($relatedTeams){
                        foreach($relatedTeams as $teams){
                            ?>
                            <li><a href="<?php echo get_the_permalink($teams);?>">
                                <?php echo get_the_title($teams);?>
                                </a>
                            </li>
                        <?php	
                        }
                    }
                    
                    else
                    echo "This team currently has no roster";
                        echo '</ul>';
                    ?>
       
					
				<div class="clearfix pdt20"></div>
					
				<?php
				wp_link_pages( array(
						'before'           => '<p class="pagelinks">' . __( 'Pages:', 'di-magazine' ),
						'after'            => '</p>',
						'link_before'      => '<span class="pagelinksa">',
						'link_after'       => '</span>',
						)
				);
				?>
					
				<?php
				if( get_theme_mod( 'post_tags_disply', '1' ) == '1' ) { 
					if( has_tag() ) { ?>
						<div class="singletags"><?php the_tags( '', ' ', '' ); ?></div>
				<?php
					}
				}
				?>
					
			</div>
			
		</div>
		
	</div>
</div>
