<?php
/**
 * Template Name: Frequent Question page
 * Template post type: post, page
 * Description: A page Template to display content on the faq page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @file    page-faq.php
 * @author  codegrabber <[makecodework@gmail.com]>
 *
 * @package Chystota
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <header class="discount-header">
                        <?php the_title(); ?>
                    </header>
                    <?php
                        $dId = mcw_get_option( 'faq_category');
                        $args = array(
                            'cat' => $dId,
                            'post_status'           => 'published',
                            'ignore_stycky_posts'   => 1,
                            'post__not_in' => get_option('sticky_posts'),
                         );
                        $wp_query = new WP_Query( $args );
                        if( $wp_query -> have_posts() )
                    ?>
                        <div class="accordion-container">
                            <?php
                            while ( $wp_query->have_posts() ) : $wp_query -> the_post();
                                get_template_part( 'template-parts/content', 'faq' );
                            endwhile; wp_reset_query();
                            // End of the loop.
                            ?>
                        </div>
                 </div>
            </div>
        </div>
    </main><!-- #main -->
    </div><!-- #primary -->
<?php
    get_footer();
?>