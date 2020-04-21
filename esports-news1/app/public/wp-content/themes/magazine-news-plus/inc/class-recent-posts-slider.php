<?php

class Magazine_News_Plus_Class_Recent_Posts_Carousel extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'magazine_news_plus_recent_posts_carousel',
			'description' => __( 'Display recent news carousel.', 'magazine-news-plus' ),
			'customize_selective_refresh' => false,
		);
		parent::__construct( 'magazine_news_plus_recent_posts_carousel', __( 'Recent News Carousel', 'magazine-news-plus' ), $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$dinprodis = ! empty( $instance['dinprodis'] ) ? $instance['dinprodis'] : '5';

		echo $args['before_widget'];

		if( ! empty( $title ) ) {
			echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
		}
		?>
		<div class="di-recet-news-cur owl-carousel owl-theme">

			<?php
			$r = new WP_Query( array(
			'posts_per_page'		=> absint( $dinprodis ),
			'post_status'			=> 'publish',
			'ignore_sticky_posts'	=> true,
			'post_type'      		=> 'post',
			'order'					=> 'DESC',
			) );

			if( $r->have_posts() ) {
				while ( $r->have_posts() ) : $r->the_post();
					$proimglink = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'magazine-news-plus-recent-news-carousel' );
					$proimglink = $proimglink[0];
					?>
					<div class="item">

						<a class="rpctitle" href="<?php the_permalink(); ?>">
						<?php
						if( $proimglink ) {
						?>
							<img class="img-fluid csidproimg" src="<?php echo esc_url( $proimglink ); ?>">
						<?php
						} else {
							?>
							<img class="img-fluid csidproimg" src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/default360x245.jpg' ); ?>">
							<?php
						}
						?>

						<p class="rpctitleouttr"><?php the_title(); ?></p>
						</a>

					</div>
					<?php
				endwhile;
				wp_reset_postdata();
			}
			?>

		</div>
		<?php
		
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$dinprodis = ! empty( $instance['dinprodis'] ) ? $instance['dinprodis'] : '5';
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'magazine-news-plus' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'dinprodis' ) ); ?>"><?php esc_html_e( 'Number of products to show:', 'magazine-news-plus' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'dinprodis' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'dinprodis' ) ); ?>" type="number" step="1" min="1" value="<?php echo absint( $dinprodis ); ?>" size="3"></p>

		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['dinprodis'] = absint( $new_instance['dinprodis'] );
		return $instance;
	}
}

function Magazine_News_Plus_recent_posts_carousel() {
	register_widget( 'Magazine_News_Plus_Class_Recent_Posts_Carousel' );
}
add_action( 'widgets_init', 'Magazine_News_Plus_recent_posts_carousel' );
