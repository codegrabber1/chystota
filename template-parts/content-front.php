<?php
/**
 * Template part for displaying start content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package chystota
 */

?>
<div class="blocks single-block <?php echo get_post_meta($post->ID, 'css-style', true)?> clearfix">
    <div class="item-service">
        <div class="block-content single-content clearfix">
            <h1><?php the_title();?></h1>
            <?php the_content();?>
            
        </div>
        <div class="block-img clearfix">
            <?php the_post_thumbnail( ) ; ?>
        </div>
    </div>
</div>
<section class="price-block">
    <div class="container">
        <div class="prices">
            <div class="price-item">
                <h3>title</h3>
                <p>parametry</p>
                <span>rozmiry</span>
            </div>
            <div class="price-item">
                <h3>title</h3>
                <p>parametry</p>
                <span>rozmiry</span>
            </div>
            <div class="price-item">
                <h3>title</h3>
                <p>parametry</p>
                <span>rozmiry</span>
            </div>
        </div>
    </div>
</section>
<?php

    if( !is_category()) {
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