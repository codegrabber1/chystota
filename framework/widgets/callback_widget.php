<?php
/**
 * Plugin Name: chystota: The form for callback.
 * Plugin URI:
 * Description: This widget displays the form for callback.
 * Version: 1.0
 * Author: chystota
 * Author URI: chystota@gmail.com
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
        parent::__construct( 'chystota_callback_widget', __( 'chystota: The form for callback ', 'chystota' ) ,$widget_ops );


    }
    /**
     * Display the widget on the screen.
     * @param array $args
     * @param array $instance
     */
    function widget( $args, $instance ){
        extract( $args );
        $title                  = apply_filters('widget_title', $instance['title']);
        $description            = apply_filters('widget_text', $instance['description']);
        $image                  = $instance['image'];
        $chystota_order_color   = wp_filter_nohtml_kses( $instance['chystota_order_color'] );
        $chystota_tex_color     = wp_filter_nohtml_kses( $instance['chystota_text_color'] );

        ?>
        <div class="order-form" id="orderPhone" style="background-color: <?php echo $chystota_order_color;?>">
            <div id="order-color" class="order-block " style="color: <?php echo $chystota_tex_color?>;">
                <div class="order_content clearfix">
                    <h2><?php echo $title?></h2>
                    <p>
                        <?php esc_html_e( $description, 'chystota' );?>
                    </p>
                    <?php //echo do_shortcode( '[amoforms id="1"]', true )?>
                    <form action="" method="post" >
                        <input type="tel" value="" placeholder="<?php _e( 'Телефон', 'chystota' )?>">
                        <input type="submit" value="<?php _e( 'Заказать чистку', 'chystota' );?>">
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
        $instance                           = $old_instance;
        $instance['title']                  = $new_instance['title'];
        $instance['description']            = $new_instance['description'];
        $instance['image']                  = $new_instance['image'];
        $instance['chystota_order_color']   = wp_filter_nohtml_kses( $new_instance['chystota_order_color'] );
        $instance['chystota_text_color']    = wp_filter_nohtml_kses( $new_instance['chystota_text_color'] );
        return $instance;

    }
    /**
     * Displays the widget settings controls on the widget panel.
     * Make use of the get_field_id() and get_field_name() function
     * when creating your form elements. This handles the confusing stuff.
     */
    function form( $instance ){
        $defaults = array( 'title' => '', 'description' => '', 'image' => '', 'chystota_order_color' => '', 'chystota_text_color' => ''  );
        $instance = wp_parse_args( (array) $instance, $defaults );?>
<p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">
                <?php _e('Title:', 'chystota') ?>

            </label>
    <input type="text" id="<?php echo $this->get_field_id('title'); ?>"
           name="<?php echo $this->get_field_name('title'); ?>" 
           value="<?php echo $instance['title']; ?>" 
           style="width:100%;" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('link'); ?>">
                <?php _e(' Description:', 'chystota') ?>
            </label>
        <textarea rows="8" class="widefat"
            id="<?php echo $this->get_field_id( 'description' ); ?>"
            name="<?php echo $this->get_field_name( 'description' ); ?>">
            <?php echo format_to_edit( $instance['description'] ); ?>
        </textarea>
        </p>

        <p >
            <label for="<?php echo $this->get_field_id('chystota_text_color')?>"><?php _e( 'Set the text color', 'chystota' );?></label>

            <input 
                   class="widefat" style="width: 100%;"
                   id="<?php echo $this->get_field_id('chystota_text_color')?>" type="text"
                   name="<?php echo $this->get_field_name('chystota_text_color')?>"
                   value="<?php echo $instance['chystota_text_color'];?>">
            <p class="description chkdesc">
                <?php _e( 'Choose a color for the text on the block where the form is.', 'chystota' ); ?>
            </p>
        </p>
        
        <p class='field'>
            <label for="<?php echo $this->get_field_id('chystota_order_color')?>"><?php _e( 'Set the background color', 'chystota' );?></label>
            
            <input 
                   class="widefat" style="width: 100%;"
                   id="<?php echo $this->get_field_id('chystota_order_color')?>" type="text"
                   name="<?php echo $this->get_field_name('chystota_order_color')?>"
                   value="<?php echo $instance['chystota_order_color'];?>">
            <p class="description chkdesc">
                <?php _e( 'Choose a color for the block where the form is.', 'chystota' ); ?>
            </p>
        </p>

        <p class="field">
            <label for="<?php echo $this->get_field_id('image'); ?>"><?php _e('Image URL:', 'chystota') ?></label>

            <input type="text" class="widefat upload_image"
                id="<?php echo $this->get_field_id('image'); ?>"
                name="<?php echo $this->get_field_name('image'); ?>"
                value="<?php echo $instance['image']; ?>" />

            <input type="submit" class="upload_image_button"
                name="<?php echo $this->get_field_name( 'uploader_button' ); ?>"
                id="<?php echo $this->get_field_id( 'uploader_button' ); ?>"
                value="<?php _e( 'Select an Image', 'chystota' ); ?>"
                 />
        </p>
        <?php

    }
 }