<?php
/**
 * Plugin Name: Chystota: Services.
 * Plugin URI:
 * Description: This widget displays the list of your serveces.
 * Version: 1.0
 * Author: O.Poruchenko
 * Author URI: makecodework@gmail.com
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'chystota_services_widgets' );
function chystota_services_widgets(){
	register_widget( 'chystota_services_widget' );
}
/**
 * Class chystota_services_widget.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.
 */
class chystota_services_widget extends WP_Widget {
	/**
	 * Widget setup
	 */
	function __construct(){
		$widget_options = [
			'classname'     => 'f_widget',
			'description'   => __( 'Displays the information about your services.', 'chystota' )
		];
		parent::__construct( 'chystota_services_widget', __( 'Chystota: About our Services' ), $widget_options );
	}
	/**
	 * Display the widget on the screen.
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget-title', $instance['title'] );
		$cats = $instance['category'];
		$cats_display = explode(", ", $cats);
		$entries_display    = $instance['entries_display'];
//		echo "<pre>";
//		var_dump( $cats_display );
//		echo "</pre>";
//		exit();

		if( empty( $entries_display ) ) {
			$entries_display = '3';
		}

		$args = array(
			'include'         => $cats,
//			'ignore_sticky_posts' => 1,
//			'order'               => 'DESC',
//			'post_type'           => 'post',
//			'taxonomy'            => 'category',
//			'post__not_in'        => [1],
//			'posts_per_page'      => $entries_display,
            
		);
		$query = get_terms( $args );
//		echo "<pre>";
//		var_dump( $query );
//		echo "</pre>";
//		exit();
		?>
		<?php if( $title ):?>
		<div class="f-title"><?php echo $title; ?></div>
		<?php endif;?>
			<div class="f-content">
				<ul>
					<?php foreach( $query as $id => $name ): ;
					?>
					<li><a href="<?php echo get_category_link($name->term_id) ?>"><?php echo $name->name?></a></li>
					<?php endforeach;?>
				</ul>
			</div>
			<?php
	}
	/**
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['entries_display'] = $new_instance['entries_display'];
		$instance['category'] = !empty($new_instance['category']) ? implode(",",$new_instance['category']) : 0;
		
		return $instance;
	}
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	public function form( $instance ) {
		$defaults = array( 'title' => '', 'entries_display' => 3, 'category' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults );
		$instance['category'] = !empty($instance['category']) ? explode(",",$instance['category']) : array();
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Ttile', 'chystota' ); ?></label>
			<input type="text"
			       id="<?php echo $this->get_field_id('title'); ?>"
			       name="<?php echo $this->get_field_name('title'); ?>"
			       value="<?php echo $instance['title']; ?>" style="width:100%;" /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'entries_display' ); ?>">
				<?php _e( 'How many categories to display?', 'chystota' ); ?></label>
			<input type="text"
			       id="<?php echo $this->get_field_id('entries_display'); ?>"
			       name="<?php echo $this->get_field_name('entries_display'); ?>"
			       value="<?php echo $instance['entries_display']; ?>" style="width:100%;" /></p>
		<p>
        <label for="<?php echo $this->get_field_id( 'category' ); ?>">
            <?php _e( 'Filter by Category:', 'chystota' ); ?>
        </label></p>
	    <?php $args = array(
		    'post_type' => array('post', 'page'),
		    'taxonomy' => 'category',
	    );
	    $terms = get_categories( $args );
	    //print_r($terms);
	    foreach( $terms as $id => $name ) {
	    $checked = "";
	    if(in_array($name->term_id, $instance['category'])){
		    $checked = "checked='checked'";
	    }
	    ?>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('category'); ?>"
               name="<?php echo $this->get_field_name('category[]'); ?>"
               value="<?php echo $name->term_id; ?>"  <?php echo $checked; ?>/>

            <label for="<?php echo $this->get_field_id('category'); ?>"><?php echo $name->name; ?></label><br />
        <?php

	    } 
	}
}