<?php
/**
 * Plugin Name: chystota: Facebook Likebox
 * Plugin URI:
 * Description: This widget displays the Facebook likebox with the stream in the sidebar.
 * Version: 1.0
 * Author: chystota
 * Author URI: chystota@gmail.com
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 */

add_action( 'widgets_init', 'chystota_facebook_widgets' );
function chystota_facebook_widgets() {
	register_widget( 'chystota_facebook_widget' );
}

class chystota_facebook_widget extends WP_Widget {
	/**
	 * Widget setup.
	 */
	public function __construct( ) {
		$widget_ops = [
			'classname'     => 'f_widget',
			'description'   => __( 'Displays Facebook like box in the sidebar of the theme.', 'chystota' )
		];
		parent ::__construct( 'chystota_facebook_widget',__( 'chystota: Facebook Likebox', 'chystota' ), $widget_ops);
	}

	/**
	 * @param array $args
	 * @param array $instance
	 * Display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );
		$page_url   = $instance['page_url'];
		$width      = $instance['width'];
		$height     = '400';
		$tabs 		= $instance['tabs'];
		$title 		= apply_filters( 'widget_title', $instance['title'] );
		$show_faces = isset( $instance['show_faces'] ) ? 'true' : 'false';
		$hide_cover = isset( $instance['hide_cover'] ) ? 'true' : 'false';
		$show_header = isset( $instance['show_header'] ) ? 'true' : 'false';


		if( $show_faces == 'true') 	{
			$height = '230';
		}

		if( $tabs ) {
			$height = '500';
		}

		if( $show_header == 'true') {
			$height = '300';
		}

		if( $page_url ) :
			echo $before_widget;

			if ( $title ) { ?>
				<h3 class="fb-widget-title"><?php echo $title; ?></h3>
				<?php
			}
			?>
			<div class="fb-container">
				<div>
                    <iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo urlencode($page_url); ?>&amp;tabs=<?php echo $tabs; ?>&amp;width=<?php echo $width; ?>&amp;small_header=<?php echo $show_header; ?>&amp;adapt_container_width=true&amp;hide_cover=<?php echo $hide_cover;?>&amp;show_facepile=<?php echo $show_faces; ?>&amp;appId=498188843586746" width="<?php echo $width; ?>px" height="<?php echo $height; ?>px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
				</div>
			</div>
            
			<?php
			echo $after_widget;
		endif;
	}
	/**
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array
	 * Update widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['page_url'] = $new_instance['page_url'];
		$instance['width'] = $new_instance['width'];
		$instance['tabs'] = $new_instance['tabs'];
		$instance['show_faces'] = $new_instance['show_faces'];
		$instance['show_stream'] = $new_instance['show_stream'];
		$instance['hide_cover'] = $new_instance['hide_cover'];
		$instance['show_header'] = $new_instance['show_header'];

		return $instance;
	}
	/**
	 * @param array $instance
	 * @return string
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {
		$defaults = array( 'title' => 'Find us on Facebook', 'page_url' => '', 'width' => '400', 'tabs' => 'timeline', 'show_faces' => 'on', 'show_header' => false, 'hide_cover' => false);
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'chystota'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('page_url'); ?>"><?php _e('Facebook Page URL:', 'chystota') ?></label>
			<input type="text" class="widefat" style="width: 100%;" id="<?php echo $this->get_field_id('page_url'); ?>" name="<?php echo $this->get_field_name('page_url'); ?>" value="<?php echo $instance['page_url']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('Width:', 'chystota') ?></label>
			<input type="text" class="widefat" style="width: 70px;" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo $instance['width']; ?>" />
		</p>


		<p>
			<label for="<?php echo $this->get_field_id('tabs'); ?>"><?php _e('News line:', 'chystota') ?></label>
			<select id="<?php echo $this->get_field_id('tabs'); ?>" name="<?php echo $this->get_field_name('tabs'); ?>" class="widefat" style="width:100%;">
				<option <?php if ('' == $instance['tabs']) echo 'selected="selected"'; ?>>--- none ---</option>
				<option <?php if ('timeline' == $instance['tabs']) echo 'selected="selected"'; ?>>timeline</option>
				<option <?php if ('events' == $instance['tabs']) echo 'selected="selected"'; ?>>events</option>
				<option <?php if ('messages' == $instance['tabs']) echo 'selected="selected"'; ?>>messages</option>
			</select>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_faces'], 'on'); ?> id="<?php echo $this->get_field_id('show_faces'); ?>" name="<?php echo $this->get_field_name('show_faces'); ?>" />
			<label for="<?php echo $this->get_field_id('show_faces'); ?>"><?php _e('Show faces', 'chystota') ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['hide_cover'], 'on'); ?> id="<?php echo $this->get_field_id('hide_cover'); ?>" name="<?php echo $this->get_field_name('hide_cover'); ?>" />
			<label for="<?php echo $this->get_field_id('hide_cover'); ?>"><?php _e('Hide cover', 'chystota') ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_header'], 'on'); ?> id="<?php echo $this->get_field_id('show_header'); ?>" name="<?php echo $this->get_field_name('show_header'); ?>" />
			<label for="<?php echo $this->get_field_id('show_header'); ?>"><?php _e('Show small facebook header', 'chystota') ?></label>
		</p>

	<?php }
}  // end class.