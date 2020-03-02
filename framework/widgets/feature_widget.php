<?php
/**
 * Plugin Name: Chystota: Feature
 * Plugin URI:
 * Description: This widget displays the information about your features.
 * Version: 1.0
 * Author: O.Poruchenko
 * Author URI: makecodework@gmail.com
 *
 */

/**
 * Add function to widgets_init that'll load our widget.
 */

add_action( 'widgets_init', 'chystota_feature_widgets' );

function chystota_feature_widgets() {
    register_widget( 'chystota_feature_widget' );
}
/**
 * Class chystota_about_widget.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.
 */
 class chystota_feature_widget extends WP_Widget {
    /**
     * Widget setup
     */
    function __construct(){
        /**
         * Widget settings
         */
        $widget_ops = [
            'classname'     => 'f_widget',
            'description'   => __( 'Displays the information about your features.', 'chystota' )
        ];
        parent::__construct( 'chystota_feature_widget', __( 'Chystota: Features', 'chystota' ) ,$widget_ops );

    }
    /**
     * Display the widget on the screen.
     * @param array $args
     * @param array $instance
     */
    function widget( $args, $instance ){
        extract( $args );

	    $postCats           = $instance[ 'category' ];
	    $categories_display = explode(",", $postCats);
        $entries_display    = $instance['entries_display'];

        if( empty( $entries_display ) ) {
            $entries_display = '3';
        }


        $args = array(
            'cat'                 => $categories_display,
            'category__in'        => $categories_display,
            'post_type'           => 'post',
            'ignore_sticky_posts' => 1,
            'order'               => 'DESC',
            'include'             => $categories_display,
            'number'              => $entries_display,
            'taxonomy'            => 'category',
            'post__not_in'        => [1],
            'posts_per_page'      => $entries_display,

        );

	    $query = new WP_Query( $args );

        if( $query -> have_posts() ):
        ?>
        <div class="blocks clearfix">
            <?php
                while( $query->have_posts() ): $query->the_post();
                global $post; ?>

            <div class="block-item " >
                <div class="block-content clearfix">
                    <h1><?php echo the_title();?></h1>
                    <p><?php the_content();?></p>
                    <span class='block-price'><?php get_the_excerpt()?></span>
                    <?php the_post_thumbnail( )?>
                    <?php $cats = wp_get_post_categories($post->ID); ;?>
                    <?php foreach( $cats as $cat ): $category = get_category($cat);?>
                    <p class='link-more'>
                        <a href="<?php echo get_category_link($category->cat_ID);?>">Детальніше</a></p>
                    <?php endforeach;?>
                </div>
            </div>
        <?php endwhile;?>
        </div>
        <?php
        endif;wp_reset_query();
    }

	 /**
	  * @param array $new_instance
	  * @param array $old_instance
	  *
	  * @return array
	  */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

	    $instance['category'] = !empty($new_instance['category']) ? implode(",",$new_instance['category']) : 0;
        $instance['entries_display'] = $new_instance['entries_display'];
        return $instance;
    }
    /**
     * Displays the widget settings controls on the widget panel.
     * Make use of the get_field_id() and get_field_name() function
     * when creating your form elements. This handles the confusing stuff.
     */
    function form( $instance ){
        $defaults = array( 'entries_display' => 3, 'ids' => '' );
        $instance = wp_parse_args( (array) $instance, $defaults );
        $instance['category'] = !empty($instance['category']) ? explode(",",$instance['category']) : array();
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'entries_display' ); ?>">
                <?php _e( 'How many features to display?', 'chystota' ); ?></label>
            <input type="text"
            id="<?php echo $this->get_field_id('entries_display'); ?>"
            name="<?php echo $this->get_field_name('entries_display'); ?>"
            value="<?php echo $instance['entries_display']; ?>" style="width:100%;" /></p>

        <p>
        <label for="<?php echo $this->get_field_id( 'category' ); ?>">
            <?php _e( 'Filter by Category:', 'chystota' ); ?>

            </label>
	    <?php $args = array(
		    'post_type' => 'post',
		    'taxonomy' => 'category',
	    );
	    $terms = get_categories( $args );
	    foreach( $terms as $id => $name ) {
	    $checked = "";
	    echo $name->term_id;
	    if(in_array($name->term_id, $instance['category'])){
		    $checked = "checked='checked'";
	    }
	    ?>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('category'); ?>"
               name="<?php echo $this->get_field_name('category[]'); ?>"
               value="<?php echo $name->term_id; ?>"  <?php echo $checked; ?>/>

            <label for="<?php echo $this->get_field_id('category'); ?>"><?php echo $name->name; ?></label><br />
        <?php }
    }
 }

