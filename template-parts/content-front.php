<?php
/**
 * Template part for displaying start content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Chystota
 */

?>
<div class="blocks single-block <?php echo get_post_meta($post->ID, 'css-style', true)?> clearfix">
    <div class="item-service">
        <div class="block-content single-content clearfix">
            <h1><?php the_title();?></h1>
            <p>Descring the service in two rows Descring the service in two rowsDescring the service</p>
            <p class='order-btn'>Детальніше</p>
        </div>
        <div class="block-img clearfix">
            <?php the_post_thumbnail( )?>
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
<?php

    if( is_category()) {
        echo 'hello';
    }
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