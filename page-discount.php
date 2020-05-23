<?php
/**
 * Template Name: Discount page
 * Template post type: post, page
 * Description: A page Template to display content on the discount page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @file    page-discount.php
 * @author  codegrabber <[makecodework@gmail.com]>
 *
 * @package Chystota
 */
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="discount-main">
        <div class="">
            <header class="discount-head">
                <?php the_title(); ?>
            </header>
            <?php
                $dId = mcw_get_option( 'discount_category');
                $args = array(
                    'cat' => $dId,
                    'post_status'           => 'published',
                    'ignore_sticky_posts'   => 1,
                    'post__not_in' => get_option('sticky_posts'),
                 );
                $wp_query = new WP_Query( $args );
                if( $wp_query -> have_posts() )
            ?>
            <div id="discount-block" class="owl-carousel">
                <?php
                    while ( $wp_query->have_posts() ) : $wp_query -> the_post();
                        get_template_part( 'template-parts/content', 'discount' );
                    endwhile; wp_reset_query();
                ?>
            </div>
             <section class="order-section">
                 <?php if( dynamic_sidebar( 'descount-widget' )) : ?>
                 <?php endif; ?>
             </section>
        </div>
    </main>
</div>
<?php
    get_footer()
?>