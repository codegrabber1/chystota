<?php
/**
 * Template Name: Blog page
 * Template post type: post, page
 * Description: A page Template to display content of blog
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @file    blog-page.php
 * @author  codegrabber <[chystota@gmail.com]>
 *
 * @package chystota
 */
?>
<div class="blog-img clearfix">
	<?php the_post_thumbnail();?>
</div>
<div class="item-text clearfix">
	<h2><a href="<?php the_permalink()?>"><?php the_title();?></a></h2>
	<p><?php the_excerpt( );?></p>
</div>
