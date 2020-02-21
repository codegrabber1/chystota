<?php
/**
 * Template Name: Blog page
 * Template post type: post, page
 * Description: A page Template to display content of blog.
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
        <main id="main" class="site-main">

        <?php
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content', 'blog' );

        endwhile; // End of the loop.
        ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
    get_footer();
?>