<?php
/**
 * Plugin Name: Chystota: The form for callback.
 * Plugin URI:
 * Description: This widget displays the form for callback.
 * Version: 1.0
 * Author: chystota
 * Author URI: makecodework@gmail.com
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 */
 add_action( 'widgets_init', 'chystota_callback_widgets' );

 function chystota_callback_widgets(){
    register_widget( 'chystota_callback_widget' );
 }
/**
 * Class chystota_callback_widget.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.
 */
 class chystota_callback_widget extends WP_Widget {
	 /**
	  * chystota_sibscribe_widget constructor.
	  *
	  */
    function __construct(){
        /**
         * Widget settings
         */
        $widget_ops = [
            'classname'     => 'f_widget',
            'description'   => __( 'Displays the form for callback.', 'chystota' )
        ];
        parent::__construct( 'chystota_callback_widget', __( 'Chystota: The form for callback ', 'chystota' ) ,$widget_ops );

    }
    /**
     * Display the widget on the screen.
     * @param array $args
     * @param array $instance
     */
    function widget( $args, $instance ){
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $description = $instance['description'];
        $image = $instance['image'];
        ?>
        <div class="order-form">
            <div class="order-block ">
                <div class="order_content clearfix">
                    <h2><?php echo $title?></h2>
                    <p>
                        <?php echo $description;?>
                    </p>
                    <form action="" method="post">
                        <input type="tel" value="" placeholder="Your phone">
                        <input type="submit" value="<?php _e( 'Make order', 'chystota' );?>">
                    </form>
                </div>
            </div>
            <div class="adver-pict">
                <img src="<?php echo $image;?>" alt="chystota">
            </div>
        </div>
        <?php
    }

    function update( $new_instance, $old_instance ){
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['description'] = $new_instance['description'];
        $instance['image'] = $new_instance['image'];
        return $instance;

    }
    /**
     * Displays the widget settings controls on the widget panel.
     * Make use of the get_field_id() and get_field_name() function
     * when creating your form elements. This handles the confusing stuff.
     */
    function form( $instance ){
        $defaults = array();
        $instance = wp_parse_args( (array) $instance, $defaults );?>
<p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">
                <?php _e('Title:', 'chystota') ?>

            </label>
            <input class="widefat"
                id="<?php echo $this->get_field_id( 'title' ); ?>"
                name="<?php echo $this->get_field_name( 'title' ); ?>"
                value="<?php echo $instance['title']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('link'); ?>">
                <?php _e(' Description:', 'chystota') ?>
            </label>
            <textarea rows="8" class="widefat"
                id="<?php echo $this->get_field_id( 'description' ); ?>"
                name="<?php echo $this->get_field_name( 'description' ); ?>">
                <?php echo format_to_edit( $instance['description'] ); ?>
            </textarea></p>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image URL:', 'chystota') ?></label>
            <input class="widefat"
                id="<?php echo $this->get_field_id('image'); ?>"
                name="<?php echo $this->get_field_name('image'); ?>"
                value="<?php echo $instance['image']; ?>" />

            <input type="submit" class="button"
                name="<?php echo $this->get_field_name( 'uploader_button' ); ?>"
                id="<?php echo $this->get_field_id( 'uploader_button' ); ?>"
                value="<?php _e( 'Select an Image', 'chystota' ); ?>"
                onclick="imageWidget.uploader( '<?php echo $this->id; ?>', '<?php echo $id_prefix; ?>' ); return false;" />

        </p>


        <?php

    }
 }