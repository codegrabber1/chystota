<?php
/**
 * Template Name: Main page
 * Template post type: post, page
 * Description: A page Template to display content on the main page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @file    front-page.php
 * @author  codegrabber <[makecodework@gmail.com]>
 *
 * @package Chystota
 */
get_header();
?>
<!-- FEATURES -->
<section class="featured_block clearfix">
    <div class="blocks clearfix">
        <div class="block-item sofa">
            <?php
                $firstId = mcw_get_option( 'first_service');
                $args = array(
                    'cat'                   => $firstId,
                    'post_status'           => 'published',
                    'ignore_stycky_posts'   => 1,
                    'post__not_in'          => get_option('sticky_posts'),
                    'posts_per_page'        => 1,

                );
                $wp_query = new WP_Query( $args );
                while( $wp_query->have_posts() ): $wp_query->the_post();
                global $post;
                $cats = wp_get_post_categories( $post->ID );
                foreach( $cats as $cat ): $category = get_category($cat);
            ?>
           
            <a href="<?php echo get_category_link($category->cat_ID);?>">
                <div class="block-content clearfix">
                    <h1>
                        <?php echo the_title();?>
                    </h1>
                    <p><?php the_content();?></p>
                    <span class='block-price'>
                        <?php the_excerpt()?>
                    </span>                   
                </div>
                <div class="feat-img"><?php the_post_thumbnail( )?></div>
                <p class='link-more'> Детальніше</p>
            </a>
            <?php endforeach; endwhile;wp_reset_query();?>
        </div> <!-- #First service.-->
        <div class="block-item carpet">
            <?php
                $secondId = mcw_get_option( 'second_service');
                $args = array(
                    'cat'                   => $secondId,
                    'post_status'           => 'published',
                    'ignore_stycky_posts'   => 1,
                    'post__not_in'          => get_option('sticky_posts'),
                    'posts_per_page'        => 1,

                );
                $wp_query = new WP_Query( $args );
                while( $wp_query->have_posts() ): $wp_query->the_post();
                global $post;
                
                $cats = wp_get_post_categories( $post->ID );
                foreach( $cats as $cat ): $category = get_category($cat);
            ?>
            <a href="<?php echo get_category_link($category->cat_ID);?>">
                <div class="block-content clearfix">
                    <h1>
                        <?php echo the_title();?>
                    </h1>
                    <p><?php the_content();?></p>
                    <span class='block-price'>
                        <?php the_excerpt()?>
                    </span>
                    
                </div>
                <div class="feat-img"><?php the_post_thumbnail( )?></div>
                <p class='link-more'> Детальніше</p>
            </a>
            <?php endforeach; endwhile;wp_reset_query();?>
            </a>
        </div>
        <div class="block-item mattress">
            <?php
                $thirdId = mcw_get_option( 'third_service');
                $args = array(
                    'cat'                   => $thirdId,
                    'post_status'           => 'published',
                    'ignore_stycky_posts'   => 1,
                    'post__not_in'          => get_option('sticky_posts'),
                    'posts_per_page'        => 1,

                );
                $wp_query = new WP_Query( $args );
                while( $wp_query->have_posts() ): $wp_query->the_post();
                global $post;

                $cats = wp_get_post_categories( $post->ID );
                foreach( $cats as $cat ): $category = get_category($cat);
            ?>
            <a href="<?php echo get_category_link($category->cat_ID);?>">
                <div class="block-content clearfix">
                    <h1>
                        <?php echo the_title();?>
                    </h1>
                    <p><?php the_content();?></p>
                    <span class='block-price'>
                        <?php the_excerpt()?>
                    </span>
                    
                </div>
                <div class="feat-img"><?php the_post_thumbnail( )?></div>
                <p class='link-more'> Детальніше</p>
            </a>
            <?php endforeach; endwhile;wp_reset_query();?>
            </a>
        </div>
    </div>
</section><!-- !FEATURES -->
<?php
    if( is_category() ):
        if( dynamic_sidebar( 'abovethefooter' )) : ?>
     <?php
        endif;
    endif;
?>
<!-- Testimonials -->
<?php
    get_template_part( 'template-parts/content', 'response' );
?>
<!-- !Testimonials -->
<!-- Order From and Contact block with phone number and socials -->
<?php
    get_template_part( 'template-parts/content', 'subfooter' );
?>
<?php
get_footer();
