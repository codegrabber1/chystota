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
<section class="featured_block">
<?php
	if( is_front_page() ){
        if ( ! dynamic_sidebar( 'feature' ) ):?>
         <?php endif;
	}
?>
</section><!-- !FEATURES -->
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
