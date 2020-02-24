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
     * Creates a sidebar
     * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
     */
    $args = array(
        'name' => esc_html__( 'Feature', 'chystota' ),
        'id'    => 'feature',
        'description' => esc_html__( 'Add this widgets here to show your features', 'chystota' )
    );
    register_sidebar( $args );
}
add_action( 'widgets_init', 'chystota_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function chystota_scripts() {
    wp_enqueue_style( 'chystota-bootstrapcss', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap-grid.min.css' );

    wp_enqueue_style( 'chystota-fontawesomecss', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css' );

    wp_enqueue_style( 'chystota-superfishcss', 'https://cdnjs.cloudflare.com/ajax/libs/superfish/1.7.9/css/superfish.min.css' );

    wp_enqueue_style( 'chystota-mmenucss', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/7.0.3/jquery.mmenu.all.css' );

    wp_enqueue_style( 'chystota-owlcss', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css' );

    wp_enqueue_style( 'style', get_stylesheet_uri() );

    wp_enqueue_script( 'chystota-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), '20151215', true );

    wp_enqueue_script( 'chystota-fawjs', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js', array(), '20151215', true );

    wp_enqueue_script( 'chystota-superfishjs', 'https://cdnjs.cloudflare.com/ajax/libs/superfish/1.7.9/js/superfish.min.js', array(), '20151215', true );

    wp_enqueue_script( 'chystota-mmenujs', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/7.0.3/jquery.mmenu.all.js', array(), '20151215', true );

    wp_enqueue_script( 'chystota-owljs', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array(), '20151215', true );

    wp_enqueue_script( 'chystota-myjs', get_template_directory_uri() . '/js/custom.js', array(), '', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'chystota_scripts' );

function mcw_get_first_cat(){
    $category = get_the_category();

    if ($category){

        $output = "";
        if (isset($category[0]->term_id)){

            $cat1_id = $category[0]->term_id;
            $wt_category_meta = get_option( "wt_category_meta_color_$cat1_id" );
            $output .= '<span class="entry-cat-bg main-color-bg cat'.$cat1_id.'-bg">';
            $output .= '<i class="fa fa-folder"></i>';
            $output .= '<a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->name.'</a>';
            $output .= '</span>';
        }

        echo $output;

    }
}
add_action('publish_page', 'add_custom_field_automatically');
add_action('publish_post', 'add_custom_field_automatically');

function add_custom_field_automatically($post_ID) {
    global $wpdb;
    if(!wp_is_post_revision($post_ID)) {
        add_post_meta($post_ID, 'css-style', 'custom value', true);
    }
}