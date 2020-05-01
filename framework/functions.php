<?php
/**
 * Chystota functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Chystota
 */

if ( ! function_exists( 'chystota_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function chystota_setup() {

        /**
         * Load up our required theme files.
         *
         */
        require( get_template_directory() . "/framework/options/site_options.php" );
        require( get_template_directory() . "/framework/options/option_functions.php" );

        /**
         * Load up rewuired widgets.
         *
         */
         require( get_template_directory() . "/framework/widgets/feature_widget.php" );
         require( get_template_directory() . "/framework/widgets/callback_widget.php" );
         //require( get_template_directory() . "/framework/widgets/widget_responses_count.php" );
         require( get_template_directory() . "/framework/widgets/widget_facebook.php" );
         require( get_template_directory() . "/framework/widgets/widget_services.php" );


        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Chystota, use a find and replace
         * to change 'chystota' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'chystota', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'chystota' ),
            'menu-2' => esc_html__( 'Footer', 'chystota' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'chystota_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support( 'custom-logo', array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ) );
    }
endif;
add_action( 'after_setup_theme', 'chystota_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function chystota_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'chystota_content_width', 640 );
}
add_action( 'after_setup_theme', 'chystota_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chystota_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'chystota' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'chystota' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

     /**
     * Creates a place for Feature widget.
     * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
     */
    $args = array(
        'name' => esc_html__( 'Feature', 'chystota' ),
        'id'    => 'feature',
        'description' => esc_html__( 'Add a widget here to show your features', 'chystota' )
    );
    register_sidebar( $args );

    /**
     * Creates a place for Subscribe form.
     * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
     */
    $args = array(
        'name' => esc_html__( 'Block for widgets on the front page', 'chystota' ),
        'id'    => 'frontpage',
        'description' => esc_html__( 'Add a widgets here', 'chystota' )
    );
    register_sidebar( $args );

    /**
     * Creates a place for Reviews count.
     * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
     */
     $args = array (
	     'name' => esc_html__( 'Block for widgets in the middle of the category page', 'chystota' ),
	     'id'    => 'middlepage',
	     'description' => esc_html__( 'Add a widgets here', 'chystota' )
     );
     register_sidebar( $args );

	/**
	 * Creates a place for Reviews count.
	 * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	 */
	$args = array (
		'name' => esc_html__( 'Block for widgets above the footer for categories.', 'chystota' ),
		'id'    => 'abovethefooter',
		'description' => esc_html__( 'Add a widgets here', 'chystota' )
	);
	register_sidebar( $args );

	$args = array(
	    'name' => esc_html__( 'Block for widgets on the discount page.' ),
        'id'    => 'descount-widget',
        'description' => esc_html__( 'Add widgets here.' )
    );
	register_sidebar( $args );

	/**
	 *   Creates a place for widgets in the footer.
	 */
    $args = array(
        'name' => esc_html__( 'Footer Left', 'chystota' ),
        'id'    => 'footer-left',
        'description' => esc_html__( 'Add widgets here to place them on the left side of the footer', 'chystota' )
    );
    register_sidebar( $args );

    $args = array(
		'name' => esc_html__( 'Footer Middle', 'chystota' ),
		'id'    => 'footer-middle',
		'description' => esc_html__( 'Add widgets here to place them in the middle of the footer', 'chystota' )
	);
	register_sidebar( $args );
}
add_action( 'widgets_init', 'chystota_widgets_init' );

remove_filter( 'the_excerpt', 'wpautop' );
/**
 * Enqueue scripts and styles.
 */
function chystota_scripts() {
    wp_enqueue_style( 'chystota-bootstrapcss', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap-grid.min.css' );

   wp_enqueue_style( 'chystota-semanticcss', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css' );

   wp_enqueue_style( 'chystota-animatecss', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css' );

    wp_enqueue_style( 'chystota-fontawesomecss', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css' );

    wp_enqueue_style( 'chystota-owlcss', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css' );

    wp_enqueue_style( 'cookieconsent', 'https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css' );

    wp_enqueue_style( 'style', get_stylesheet_uri() );

    //wp_enqueue_script( 'chystota-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), '20151215', true );

    
    wp_enqueue_script( 'chystota-semanticjs', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js', array(), '20151215', true );

    wp_enqueue_script( 'chystota-fawjs', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js', array(), '20151215', true );

    wp_enqueue_script( 'chystota-owljs', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array(), '20151215', true );

	wp_enqueue_script( 'chystota-lang-js', '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2', array(), '', true );

	wp_enqueue_script( 'chystota-langjs', get_template_directory_uri() . '/js/lang.js', array(), '', true );

    wp_enqueue_script( 'chystota-myjs', get_template_directory_uri() . '/js/custom.js', array(), '', true );


    wp_enqueue_script("cookieconsentjs", "https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js",array(),false,true);

   function mihdan_add_defer_attribute( $tag, $handle ) {
    
        $handles = array(
            // 'chystota-semanticjs',
            'chystota-fawjs',
            // 'chystota-owljs',
            'chystota-myjs',
        );
            
        foreach( $handles as $defer_script) {
            if ( $defer_script === $handle ) {
                return str_replace( ' src', ' async="async" src', $tag );
            }
        }
        
        return $tag;
        }
        add_filter( 'script_loader_tag', 'mihdan_add_defer_attribute', 10, 2 );
   
   
    function add_data_attribute( $tag, $handle, $src ) {
		if ( 'cookieconsentjs' !== $handle )
			return $tag;

		return str_replace( ' src', ' data-cfasync="false" src', $tag );
	}


	add_filter( 'script_loader_tag', 'add_data_attribute', 10, 3 );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'chystota_scripts' );


function admin_scripts() {
	if( is_admin() ) {

		//wp_enqueue_style( 'mcw-colorcss', get_template_directory_uri() . '/framework/options/css/color-picker.css' );
		wp_enqueue_script('mcw_upload', get_template_directory_uri() .'/framework/options/js/upload.js', array('jquery'));
//		wp_enqueue_script('mcw_colorpicker', get_template_directory_uri() . '/framework/options/js/colorpicker.js', array( 'jquery' ), '', true);
//		wp_enqueue_script('mcw_select_js', get_template_directory_uri() . '/framework/options/js/jquery.customSelect.min.js', array( 'jquery' ), '', true);
		
	}
}
add_action( 'admin_init', 'admin_scripts' );

function custom_add_google_fonts() {
	wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,600;1,400;1,600&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'custom_add_google_fonts' );

/**
 * Pagination for archive, taxonomy, category, tag and search results pages
 *
 * @global $wp_query http://codex.wordpress.org/Class_Reference/WP_Query
 * @return Prints the HTML for the pagination if a template is $paged
 */
if ( !function_exists( 'chystota_pagination' ) ) :
	function chystota_pagination() {
		global $wp_query;

		$big = 999999999; // This needs to be an unlikely integer

		// For more options and info view the docs for paginate_links()
		// http://codex.wordpress.org/Function_Reference/paginate_links
		$paginate_links = paginate_links( array(
			'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'type'  => 'list',
			'mid_size' => 5
		) );

		// Display the pagination if more than one page is found
		if ( $paginate_links ) {
			echo '<div class="chystota_pagination">';
			echo $paginate_links;
			echo '</div><!--// end .pagination -->';
		}
	}
endif; // ends check for wt_pagination()
/**
 * Facebook and Open Graph nameservers
 */

function doctype_opengraph($output) {
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');

/**
 * Facebook Open Graph
 */

function fb_opengraph() {

    if(is_single()) {
        global $post;
        if( get_the_post_thumbnail( $post->ID, 'thumbnail' ) ){
            $thumbnail_id = get_post_thumbnail_id($post->ID);
            $thumbnail_object = get_post($thumbnail_id);
            $image = $thumbnail_object->guid;

        } else{
            $image = "//localhost/chystota.wp/wp-content/uploads/2020/02/logo.png";
        }

        ?>

    <meta property="og:url" content="<?php the_permalink() ?>"/>
    <meta property="og:title" content="<?php the_title(); ?>"/>
        <meta property="og:description" content="<?php echo $excerpt; ?>"/>
        <meta property="og:type" content="article"/>
        <meta property="og:url" content="<?php the_permalink(); ?>"/>
        <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>"/>
        <meta property="og:image" content="<?php echo $image; ?>"/>
    <meta property="fb:app_id" content="179481638828016" />

        <?php
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);

// подключаем функцию активации мета блока (my_extra_fields)
function true_custom_fields() {
	add_post_type_support( 'post', 'custom-fields'); // в качестве первого параметра укажите название типа поста
}

add_action('init', 'true_custom_fields');

// For Mailchimp  subscription.
function makecodework_mailchimp_subscriber_status( $email, $status, $list_id, $api_key ){
	$data = array(
		'apikey'        => $api_key,
		'email_address' => $email,
		'status'        => $status,

	);
	$mch_api = curl_init(); // initialize cURL connection

	curl_setopt($mch_api, CURLOPT_URL, 'https://' . substr($api_key,strpos($api_key,'-')+1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($data['email_address'])));
	curl_setopt($mch_api, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '.base64_encode( 'user:'.$api_key )));
	curl_setopt($mch_api, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
	curl_setopt($mch_api, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
	curl_setopt($mch_api, CURLOPT_TIMEOUT, 10);
	curl_setopt($mch_api, CURLOPT_POST, true);
	curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($mch_api, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json

	$result = curl_exec($mch_api);
	return $result;
}

/**
 * Disable the emoji's
 */
function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 if ( 'dns-prefetch' == $relation_type ) {
 /** This filter is documented in wp-includes/formatting.php */
 $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
 }

return $urls;
}
/**
 * Show Polylang Languages with Custom Markup
 * @param  string $class Add custom class to the languages container
 * @return string        
 */
function mcw_polylang_languages( $class = '' ) {

  if ( ! function_exists( 'pll_the_languages' ) ) return;

  // Gets the pll_the_languages() raw code
  $languages = pll_the_languages( array(
    'display_names_as'       => 'slug',
    'hide_if_no_translation' => 1,
    'raw'                    => true
  ) ); 

  $output = '';

  // Checks if the $languages is not empty
  if ( ! empty( $languages ) ) {

    // Creates the $output variable with languages container
    $output = '<div class="languages' . ( $class ? ' ' . $class : '' ) . '">';

    // Runs the loop through all languages
    foreach ( $languages as $language ) {
   
      // Variables containing language data
      $id             = $language['id'];
      $slug           = $language['slug'];
      $url            = $language['url'];
      $current        = $language['current_lang'] ? ' languages__item--current' : '';
      $no_translation = $language['no_translation'];

      // Checks if the page has translation in this language
      if ( ! $no_translation ) {
        
        // Check if it's current language
        if ( $current ) {
          // Output the language in a <span> tag so it's not clickable
          $output .= "<a href='#' class=\"languages__item$current\">$slug</a>";
          
        } else {
          // Output the language in an anchor tag
          $output .= "<a href=\"$url\" class=\"languages__item$current\">$slug</a>";
        }
      }

    }

    $output .= '</div>';

  }

  return $output;
}

// geo shortcode
function getCity($atts, $city) {

    $atts = [
        'city' => 'Київ',
        'no-city' => 'No city'
    ];
    if($city == $atts['city']){
        return $city;
    } else {
        return $atts['city'];
    }

    return 'Hello';

    
}
add_shortcode('getcity', 'getCity' );


