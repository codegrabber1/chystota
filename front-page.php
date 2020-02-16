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
<section class="featured_block">
<?php
	if( is_home() && is_front_page() ){
        if ( ! dynamic_sidebar( 'feature' ) ):?>

         <?php endif;
		//get_template_part( 'template-parts/content', 'front' );
	}
?>
</section>
<?php
get_footer();
