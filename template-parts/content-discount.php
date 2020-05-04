<?php
/**
 * Template part for displaying start content in discount-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package chystota
 */

?>
<article class="discount">

      <?php the_post_thumbnail();?>
      <h3><?php the_title(); ?></h3>

      <?php the_content();?>
</article>