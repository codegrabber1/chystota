<?php
/**
 * Template part for displaying start content in faq-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Chystota
 */

?>

<article class="set">
    <a href="#">
      <?php the_title(); ?>
      <i class="fas fa-angle-down"></i>
    </a>
    <div class="content">
        <?php the_content();?>
    </div>
</article>