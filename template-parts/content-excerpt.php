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
?>

<div class="blog-img">
	<?php the_post_thumbnail();?>
</div>
<div class="blog-item">
	<div class="item-text">
		<a href="<?php the_permalink()?>"><?php the_title();?></a>
		<?php the_excerpt( );?>
	</div>
</div>
