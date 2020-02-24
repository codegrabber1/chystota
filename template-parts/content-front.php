<?php
/**
 * Template part for displaying start content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Chystota
 */

?>
<div class="blocks <?php echo get_post_meta($post->ID, 'css-style', true)?> clearfix">
    <div class="item ">
        <div class="block-content clearfix">
            <h1><?php the_title();?></h1>
            <p>Descring the service in two rows Descring the service in two rowsDescring the service</p>
            <div class="block-img">
                <?php the_post_thumbnail( )?>
            </div>

            <p class='link-more'><a href="#">Детальніше</a></p>
        </div>
    </div>
</div>
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                prices!
            </div>
        </div>
    </div>
</section>