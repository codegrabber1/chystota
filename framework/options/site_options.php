<?php
/**
 * The Theme Options page
 *
 * This page is implemented using the Settings API
 * http://codex.wordpress.org/Settings_API
 *
 * @package  codegramcwer
 * @file     site_options.php
 * @author   codegramcwer [Oleg Poruchenko]
 * @link    [makecodework@gmail.com]
 */
/**
 * Properly enqueue styles and scripts for our theme options page.
 *
 * This function is attached to the admin_enqueue_scripts action hook.
 *
 */
add_action( 'admin_init', 'mcw_register_admin_scripts' );

function mcw_register_admin_scripts() {
	wp_enqueue_style( 'mcw_colorpicker_css', get_template_directory_uri() . '/framework/options/css/color-picker.css' );
	wp_enqueue_style( 'mcw_theme_options_css', get_template_directory_uri() . '/framework/options/css/mcw_options.css' );
	wp_enqueue_style('thickbox');
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script('mcw_colorpicker', get_template_directory_uri() . '/framework/options/js/colorpicker.js', array( 'jquery' ));
	wp_enqueue_script('mcw_select_js', get_template_directory_uri() . '/framework/options/js/jquery.customSelect.min.js', array( 'jquery' ));
	wp_enqueue_script( 'mcw_theme_optionsjs', get_template_directory_uri() . '/framework/options/js/options.js', array( 'jquery', 'mcw_select_js' ) );
}

/*
 * ==================
 * Set default options.
 * ==================
*/
function mcw_init_options(){
	$options = get_options( 'mcw_options' );
	if ( false === $options ) {
		$options = mcw_default_options();
	}
	update_option( 'mcw_options', $options );
}
add_action( 'after_setup_theme', 'mcw_init_options', 9 );
/*
 * ==================
 * Register the options page.
 * ==================
*/
function mcw_theme_add_page() {
	$mcw_options_page = add_theme_page( __( 'Theme options', 'chystota' ), __( 'Theme options', 'chystota' ), 'edit_theme_options', 'mcw_options', 'mcw_theme_options_page' );
	add_action( 'admin_print_styles-' . $mcw_options_page, 'mcw_theme_options_scripts' );
}
add_action( 'admin_menu', 'mcw_theme_add_page' );

/*
 * ==================
 * Include scripts to the options page only.
 * ==================
*/
function mcw_theme_options_scripts(){
	if ( ! did_action( 'mcw_enqueue_media' ) ){
		wp_enqueue_media();
	}
	wp_enqueue_script('mcw_upload', get_template_directory_uri() .'/framework/options/js/upload.js', array('jquery'));
}
/*
* ==================
* Register the theme options setting.
* ==================
*/

function mcw_register_settings() {
	register_setting( 'mcw_options', 'mcw_options', 'mcw_validate_options' );
}
add_action( 'admin_init', 'mcw_register_settings' );

/*
 * ==================
 * Output the options page.
 * ==================
*/
function mcw_theme_options_page(){
	global $post;
	?>
	<div id="mcw_admin">
		<header class="header">
			<div class="main">
				<div class="left">
					<h2><?php bloginfo( 'name' );?></h2>
				</div>
				<div class="theme_info"><?php echo _e('Theme settings', 'chystota'); ?></div>
			</div>
		</header> <!-- /header -->
        <div class="options-wrap">
               <div class="tabs">
                   <ul>
                       <li class="general first"><a href="#general"><i class="icon-cogs"></i><?php echo _e('General', 'chystota'); ?></a></li>
                       <li class="category"><a href="#category"><?php echo _e( 'Categories', 'chystota' );?></a></li>
                       <li class="vartist"><a href="#vartist"><?php echo _e( 'Prices', 'chystota' );?></a></li>
                       <li class="seo"><a href="#seo"><?php echo _e( 'SEO', 'chystota' );?></a></li>
                       <li class="reset"><a href="#reset"><i class="icon-refresh"></i><?php echo _e( 'Reset', 'chystota' );?></a></li>
                   </ul>
               </div>
            <div class="options_form">
                <?php if( isset( $_GET['settings-updated'] ) ):?>
                    <div class="updated fade">
                        <p>
			                <?php _e( 'Theme setup has been updated successfully', '' );?>
                        </p>
                    </div>
                <?php endif;?>
                <form action="options.php" method="post">
                    <?php settings_fields( 'mcw_options' )?>
                    <?php $options = get_option( 'mcw_options' )?>
                    <div class="tab_content">
                        <div id="general" class="tab_block">
                            <h2><?php _e( 'Main Settings', 'chystota' );?></php></h2>
                            <div class="fields_wrap">
                                <div class="field infobox">
                                    <p><strong>
			                                <?php _e( 'How to upload an image?', 'chystota' );?>
                                        </strong></p>
	                                <?php _e( 'You can manually specify the URL for the logo and other images or download the image from your computer.', 'chystota' );?>
                                </div>
                                <h3><?php _e( 'Header settings', 'chystota' );?></h3>
                                <div class="field field-upload">
                                    <label for="mcw_logo_url"><?php _e( 'Download the logo', 'chystota' );?></label>
                                    <input type="text" id="mcw_options[mcw_logo_url]" class="upload_image" name="mcw_options[mcw_logo_url]" value="<?php echo esc_attr($options['mcw_logo_url']); ?>">

                                    <input class="upload_image_button" id="mcw_logo_upload_button" type="button" value="Upload" />
                                    <span class="description long updesc"><?php _e('Upload a logo image or specify a path. Max width: 300px.', 'codegramcwer'); ?>
                             </span>
                                </div>
                                <div class="field">
                                    <label for="mcw_favicon"><?php _e('Upload Favicon', 'chystota'); ?></label>
                                    <input id="mcw_options[mcw_favicon]" class="upload_image" type="text" name="mcw_options[mcw_favicon]" value="<?php echo esc_attr($options['mcw_favicon']); ?>" />
                                    <input class="upload_image_button" id="mcw_favicon_button" type="button" value="Upload" />
                                    <span class="description updesc"><?php _e('Upload your 16x16 px favicon.', 'chystota'); ?></span>
                                </div>
                                <div class="field">
                                    <label for="mcw_apple_touch"><?php _e('Apple Touch Icon', 'chystota'); ?></label>
                                    <input id="mcw_options[mcw_apple_touch]" class="upload_image" type="text" name="mcw_options[mcw_apple_touch]" value="<?php echo esc_attr($options['mcw_apple_touch']); ?>" />
                                    <input class="upload_image_button" id="mcw_apple_touch_button" type="button" value="Upload" />
                                    <span class="description updesc"><?php _e('Upload your 114px by 114px icon.', 'chystota'); ?></span>
                                </div>

                                <div class='field'>
                                    <label><?php _e( 'Choose the links color', 'chystota' );?></label>
                                    <div id="mcw_links_color_selector" class="color-pic"><div style="background-color:<?php echo $options['mcw_links_color']?>"></div></div>
                                    <input style="width: 80px; margin-right: 5px" id="mcw_links_color" type="text" name="mcw_options[mcw_links_color]" value="<?php echo $options['mcw_links_color'];?>">
                                    <span class="description chkdesc"><?php _e( 'Choose a color of the links.', 'chystota' ); ?></span>
                                </div>
                                <h3><?php _e( 'Set social links', 'chystota' );?></h3>
                                <div class="field">
                                    <label for="mcw_options[mcw_fb_url]"><?php _e( 'Facebook URL', 'chystota' );?></label>
                                    <input type="text" id="mcw_options[mcw_fb_url]" name="mcw_options[mcw_fb_url]" value="<?php echo esc_attr( $options['mcw_fb_url'] );?>" />
                                    <span class="description long"><?php _e( "Enter full facebook-URL starting with <strong> https:// </strong>, or leave blank.", 'chystota' );?></span>
                                </div>
                                <div class="field">
                                    <label for="mcw_options[mcw_inst_url]"><?php _e( 'Instagram URL', 'chystota' );?></label>
                                    <input type="text" id="mcw_options[mcw_inst_url]" name="mcw_options[mcw_inst_url]" value="<?php echo esc_attr( $options['mcw_inst_url'] );?>" />
                                    <span class="description long"><?php _e( "Enter full instagram-URL starting with <strong> https:// </strong>, or leave blank.", 'chystota' );?></span>
                                </div>
                                <div class="field">
                                    <label for="mcw_options[mcw_youtube_url]"><?php _e( 'Youtube URL', 'chystota' );?></label>
                                    <input id="mcw_options[mcw_youtube_url]" name="mcw_options[mcw_youtube_url]" type="text" value="<?php echo esc_attr($options['mcw_youtube_url']); ?>" />
                                    <span class="description long"><?php _e( "Enter full youtube-URL starting with <strong> https:// </strong>, or leave blank.", 'chystota' ); ?></span>
                                </div>
                                <div class="field">
                                    <label for="mcw_options[mcw_phone]"><?php _e( 'Phone', 'chystota' );?></label>
                                    <input id="mcw_options[mcw_phone]" name="mcw_options[mcw_phone]" type="text" value="<?php echo esc_attr ( $options['mcw_phone']);?>">
                                    <span class="description long"><?php _e( "Enter your phone number, or leave blank.", 'chystota' ); ?></span>
                                </div>
                                <div class="field">
                                    <label for="mcw_options[mcw_phone_kyiv]"><?php _e( 'Phone Kyiv', 'chystota' );?></label>
                                    <input id="mcw_options[mcw_phone_kyiv]" name="mcw_options[mcw_phone_kyiv]" type="text" value="<?php echo esc_attr ( $options['mcw_phone_kyiv']);?>">
                                    <span class="description long"><?php _e( "Enter your phone number, or leave blank.", 'chystota' ); ?></span>
                                </div>
                                <h3><?php _e( 'Contact Card', 'chystota' );?></h3>
                                <div class="field">
                                    <label for="mcw_options[contact_email]"><?php _e( 'Contact Email', 'chystota' );?></label>
                                    <input type="text" name="mcw_options[contact_email]" id="mcw_options[contact_email]" value="<?php echo esc_attr( $options['contact_email'] );?>">
                                    <span class="desc long"><?php _e( "Enter your contact email for customers.", 'chystota' ); ?></span>
                                </div>
                            </div>
                        </div>  <!-- #general -->
                        <div id="category" class="tab_block">
                            <h2><?php _e( 'Set categories', 'chystota' );?></h2>
                            <div class="fields_wrap">
                                <div class="field">
                                    <h3><?php _e( 'Choose a category for the FAQ page', 'chystota' );?></h3>
                                    <label for="mcw_options[faq_category]"><?php _e( 'Photo Category', 'chystota' )?></label>

                                    <select name="mcw_options[faq_category]" id="mcw_options[faq_category]" class="styled">
                                        <?php
                                            $categories = get_categories( array ( 'hide_empty' => 1, 'hierarchical' => 0 ));
                                        ?>
                                        <option <?php selected( 0 == $options['faq_category'] )?> value="0">
                                            <?php _e( 'All categories', 'chystota' );?>
                                        </option>
                                        <?php
                                            if( $categories ):
                                             foreach( $categories as $cat ) : ?>
                                                 <option <?php selected( $cat->term_id == $options['faq_category'] )?>
                                                         value="<?php echo $cat->term_id;?>"><?php echo $cat->cat_name?>
                                                 </option>
                                        <?php endforeach; endif;?>
                                    </select>
                                    <span class="desc long"><?php _e( "Choose a category for the FAQ page.", 'chystota' ); ?></span>
                                </div>
                                <div class="field">
                                    <h3><?php _e( 'Choose a category for the discount page', 'chystota' );?></h3>
                                    <label for="mcw_options[discount_category]"><?php _e( 'Discount Category', 'chystota' )?></label>

                                    <select name="mcw_options[discount_category]" id="mcw_options[discount_category]" class="styled">
                                        <?php
                                            $categories = get_categories( array ( 'hide_empty' => 1, 'hierarchical' => 0 ));
                                        ?>
                                        <option <?php selected( 0 == $options['discount_category'] )?> value="0">
                                            <?php _e( 'All categories', 'chystota' );?>
                                        </option>
                                        <?php
                                            if( $categories ):
                                             foreach( $categories as $cat ) : ?>
                                                 <option <?php selected( $cat->term_id == $options['discount_category'] )?>
                                                         value="<?php echo $cat->term_id;?>"><?php echo $cat->cat_name?>
                                                 </option>
                                        <?php endforeach; endif;?>
                                    </select>
                                    <span class="desc long"><?php _e( "Choose a category for the discount page.", 'chystota' ); ?></span>
                                </div>

                                <div class="field">
                                    <h3><?php _e( 'Choose a category for your blog', 'chystota' );?></h3>
                                    <label for="mcw_options[blog_category]"><?php _e( 'Blog', 'chystota' );?></label>
                                    <select name="mcw_options[blog_category]" id="mcw_options[blog_category]" class="styled">
		                                <?php
		                                    $categories = get_categories( array ( 'hide_empty' => 1 ));
		                                ?>
                                        <option <?php selected( 0 == $options['blog_category'] )?> value="0">
			                                <?php _e( 'All categories', 'chystota' );?>
                                        </option>
		                                <?php
		                                if( $categories ):
			                                foreach( $categories as $cat ) : ?>
                                                <option <?php selected( $cat->term_id == $options['blog_category'] )?>
                                                        value="<?php echo $cat->term_id;?>"><?php echo $cat->cat_name?>
                                                </option>
			                                <?php endforeach; endif;?>
                                    </select>
                                    <span class="desc "><?php _e( "Choose a category for your blog.", 'chystota' ); ?></span>
                                </div>

                            </div>
                        </div>  <!-- #category -->
                        <div id="vartist" class="tab_block"">
                        vartist
                        </div>
                        <div id="seo" class="tab_block">
                            <div class="field infobox">
                                <p><strong><?php _e('Analytics for the site', 'chystota'); ?></strong></p>
		                        <?php _e('For increasing a searching rating is used Google.', 'chystota'); ?>
                            </div>
                            <h3><?php _e('Meta info', 'chystota'); ?></h3>
                            <div class="field">
                                <label for="mcw_options[mcw_homepage_title]"><?php _e('The name of the home page', 'chystota'); ?></label>
                                <input id="mcw_options[mcw_homepage_title]" name="mcw_options[mcw_homepage_title]" type="text" value="<?php echo esc_attr($options['mcw_homepage_title']); ?>" />
                                <span class="description"><?php _e( 'Enter the name of the home page.', 'chystota' ); ?></span>
                            </div>
                            <div class="field">
                                <label for="mcw_options[mcw_meta_description]"><?php _e('Description', 'chystota'); ?></label>
                                <textarea id="mcw_options[mcw_meta_description]" class="textarea" name="mcw_options[mcw_meta_description]"><?php echo esc_attr($options['mcw_meta_description']); ?></textarea>
                                <span class="description"><?php _e( 'Add a description.', 'chystota' ); ?></span>
                            </div>

                            <div class="field">
                                <label for="mcw_options[mcw_meta_keywords]"><?php _e('Keywords', 'chystota'); ?></label>
                                <textarea id="mcw_options[mcw_meta_keywords]" class="textarea"  name="mcw_options[mcw_meta_keywords]"><?php echo esc_attr($options['mcw_meta_keywords']); ?></textarea>
                                <span class="description"><?php _e( 'Add keywords. You can add more keywords separated by commas.', 'chystota' ); ?></span>
                            </div>
                        </div>

                        <div id="reset" class="tab_block">
                            <h2><?php _e( 'Reset', 'chystota' ); ?></h2>
                            <div class="fields_wrap">
                                <div class="field warningbox">
                                    <p><strong><?php _e( 'Atention!', 'chystota' );?></strong></p>
	                                <?php _e( 'You will lose all your theme settings and your own side panels. The theme will reset the original settings.', 'chystota' );?>
                                </div>
                                <div class="field">
                                    <p class="reset-info"><?php _e( 'If you want to restore the initial settings, click on the button.', 'chystota' );?></p>
                                    <input type="submit" name="mcw_option[reset]" class="button-primary" value="<?php _e( 'Reset the initial settings', 'chystota' );?>">
                                </div>
                            </div>
                        </div> <!-- #reset -->
                    </div>

            </div>  <!-- .options_form-->
        </div>    <!-- .options-wrap-->
        <div class="options-footer">
            <input type="submit" name="mcw_options[submit]" class="button-primary" value="<?php _e( 'Save Settings', 'chystota' ); ?>" />
        </div>
        </form>
	</div> <!-- #mcw_admin-->
	<?php
}

/*
 * ==================
 * Return default array of options.
 * ==================
*/
function mcw_default_options(){
    $options = array(
         'mcw_logo_url'         => get_template_directory_uri().'/css/images/logo.png',
         'mcw_favicon'          => '',
         'mcw_apple_touch'      => '',
         'mcw_fb_url'           => '',
         'mcw_inst_url'         => '',
         'mcw_youtube_url'      => '',
         'mcw_phone'            => '',
         'mcw_phone_kyiv'       => '',
         'discount_category'    => 0,
         'faq_category'         => 0,
         'blog_category'        => 0,
         'contact_email'        => '',
         'mcw_homepage_title'   => get_bloginfo( 'name' ),
         'mcw_meta_description' => '',
         'mcw_meta_keywords'    => '',



    );

    return $options;
}
/*
 * ==================
 * Sanitize and validate options.
 * ==================
*/
function mcw_validate_options( $input ){
    $submit = ( ! empty( $input['submit'] ) ? true : false );
    $reset = ( ! empty( $input['reset'] ) ? true : false );
    if( $submit ) :
        $input['mcw_logo_url']          = esc_url_raw( $input['mcw_logo_url'] );
	    $input['mcw_favicon']           = esc_url_raw($input['mcw_favicon']);
	    $input['mcw_apple_touch']       = esc_url_raw($input['mcw_apple_touch']);
        $input['mcw_fb_url']            = esc_url_raw( $input['mcw_fb_url'] );
        $input['mcw_inst_url']          = esc_url_raw( $input['mcw_inst_url'] );
        $input['mcw_youtube_url']       = esc_url_raw( $input['mcw_youtube_url'] );
        $input['mcw_phone']             = wp_filter_nohtml_kses( $input['mcw_phone'] );
        $input['mcw_phone_kyiv']        = wp_filter_nohtml_kses( $input['mcw_phone_kyiv'] );
        $input['contact_email']         = wp_filter_nohtml_kses( $input['contact_email' ] );
	    $input['mcw_homepage_title']    = wp_filter_post_kses( $input['mcw_homepage_title'] );
	    $input['mcw_meta_keywords']     = wp_filter_post_kses( $input['mcw_meta_keywords'] );
	    $input['mcw_meta_description']  = wp_filter_post_kses( $input['mcw_meta_description'] );


	    /**
         *  FAQ category.
         */
        $categories = get_categories( array( 'hide_empty' => 0, 'hierarchical' => 0 ) );
        $cat_ids = array();
        foreach( $categories as $category )
            $cat_ids[] = $category->term_id;
        if( !in_array( $input['faq_category'], $cat_ids ) && ( $input['faq_category'] ) !=0 )
            $input['faq_category'] = $options['faq_category'];

        /**
	     *  Discount category.
	     */
        $categories = get_categories( array( 'hide_empty' => 0, 'hierarchical' => 0 ) );
        $cat_ids = array();
        foreach( $categories as $category )
            $cat_ids[] = $category->term_id;
        if( !in_array( $input['discount_category'], $cat_ids ) && ( $input['discount_category'] ) !=0 )
	        $input['discount_category'] = $options['discount_category'];

	    /**
	     *  Video category.
	     */
	    $categories = get_categories( array( 'hide_empty' => 0, 'hierarchical' => 0 ) );
	    $cat_ids = array();
	    foreach( $categories as $category )
		    $cat_ids[] = $category->term_id;
	    if( !in_array( $input['blog_category'], $cat_ids ) && ( $input['blog_category'] ) !=0 )
		    $input['blog_category'] = $options['blog_category'];

        return $input;
    elseif( $reset ) :
        $input = mcw_default_options();
        return $input;
    endif;
}

if ( ! function_exists( 'mcw_get_option' ) ) :
	/*
	 * ==================
	 * Used to output theme options is an elegant way.
	 * @uses get_option() To retrieve the options array.
	 * ==================
	*/
	function mcw_get_option( $option ) {
		$options = get_option( 'mcw_options', mcw_default_options() );
		return isset( $options[ $option ]) ?  $options[ $option ] : '';
	}
endif;