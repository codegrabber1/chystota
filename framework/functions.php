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
         require( get_template_directory() . "/framework/widgets/widget_responses_count.php" );
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
        'name' => esc_html__( 'Blocks on front page', 'chystota' ),
        'id'    => 'frontpage',
        'description' => esc_html__( 'Add a widgets here', 'chystota' )
    );
    register_sidebar( $args );

    /**
     * Creates a place for Reviews count.
     * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
     */
     $args = array (
	     'name' => esc_html__( 'Blocks on the middle of the category page', 'chystota' ),
	     'id'    => 'middlepage',
	     'description' => esc_html__( 'Add a widgets here', 'chystota' )
     );
     register_sidebar( $args );

	/**
	 * Creates a place for Reviews count.
	 * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
	 */
	$args = array (
		'name' => esc_html__( 'Blocks above the footer of the category page', 'chystota' ),
		'id'    => 'abovethefooter',
		'description' => esc_html__( 'Add a widgets here', 'chystota' )
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

    wp_enqueue_style( 'chystota-superfishcss', 'https://cdnjs.cloudflare.com/ajax/libs/superfish/1.7.9/css/superfish.min.css' );

    wp_enqueue_style( 'chystota-mmenucss', 'https://cdnjs.cloudflare.com/ajax/libs/jQuery.mmenu/7.0.3/jquery.mmenu.all.css' );

    wp_enqueue_style( 'chystota-owlcss', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css' );

    wp_enqueue_style( 'style', get_stylesheet_uri() );

    wp_enqueue_script( 'chystota-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), '20151215', true );
    
    wp_enqueue_script( 'chystota-semanticjs', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js', array(), '20151215', true );

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

function admin_scripts() {
	if( is_admin() ) {
		wp_enqueue_script('mcw_upload', get_template_directory_uri() .'/framework/options/js/upload.js', array('jquery'));
	}
}
add_action( 'admin_init', 'admin_scripts' );

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

function wpds_parent_category_template()
{
	if (!is_category())
		return true;
	$catObj = get_queried_object();
	// Перезаписываем шаблон для определенной рубрики "design", чьей родительской рубрикой является "projects"
	if (is_category($catObj->category_nicename) && cat_is_ancestor_of($catObj->parent, $catObj->term_id)) {

		$top_term = get_top_term( $catObj->taxonomy );
		$temp_cat_name = $top_term->slug; // название термина
		$template = TEMPLATEPATH . "/category-{$temp_cat_name}.php";
		// загружаем, если файл шаблона существует.
		if (file_exists($template)) {
			load_template($template);
			exit;
		}
	}
}
