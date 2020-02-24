<?php
/**
 * Template Name: Blog page
 * Template post type: post, page
 * Description: A page Template to display content of blog
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @file    blog-page.php
 * @author  codegrabber <[makecodework@gmail.com]>
 *
 * @package Chystota
 */
get_header();
?>
<div id="primary" class="content-area">
        <main id="main" class="discount-main">
            <header class="discount-head">
                <?php echo the_date();?>
                <?php the_title(); ?>
            </header>
            <center>
                <?php while( have_posts() ) : the_post()?>
                <?php the_content();?>
                <?php endwhile;?>
            </center>
            <?php
            if( mcw_get_option( 'blog_category' ) ):
                $id = mcw_get_option( 'blog_category' );
                $args = array(
                    'cat' => $id,
                    'post_status' => 'published',
                    'ignore_stycky_posts'   => 1,
                    'post__not_in'  => get_option( 'sticky_posts' ),
                 );
                $query = new WP_Query( $args );
                if( $query -> have_posts() ) :
             ?>
            <div class="container">
                <div class="row">
                    <div class="col">
                    <?php
                        while( $query -> have_posts() ) : $query->the_post(); ?>
                            <div class="blog-content clearfix">
                                <div class="blog-img">
                                    <?php the_post_thumbnail();?>
                                </div>
                                <div class="blog-item">
                                    <div class="item">
                                    <a href="<?php the_permalink()?>"><?php the_title();?></a>
                                    <?php the_excerpt( '');?>
                                    </div>
                                </div>
                             </div>
                        <?php endwhile; endif;wp_reset_postdata();// End of the loop.
                      ?>
                      <?php endif;wp_reset_query();?>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
    get_footer();
?>