<?php
/**
 *
 */
get_header();
?>
<div class="blocks single-block <?php echo get_post_meta($post->ID, 'css-style', true)?> clearfix">
    <div class="item-service">
        <div class="block-content single-content clearfix">
            <h1><?php the_title();?></h1>
            <?php while( have_posts()): the_post();
                    the_content();
                endwhile;?>
        </div>
        <div class="block-img clearfix">
            <?php the_post_thumbnail( ) ; ?>
        </div>
    </div>
</div>
<?php

    if( single_cat_title() === 'matrass') : ?>
	    <section class="price-block">
            <div class="container">
			    <div class="row">
				    <div class="col">
					    <h2><?php echo single_cat_title()?></h2>
				    </div>
			    </div>
		    </div>
		    <div class="container">
			    <div class="prices">
				    <div class="price-item">
					    Matrass
				    </div>
				    <div class="price-item">
					    hj,h,hj,
				    </div>
				    <div class="price-item">
					    qwfpkqwfmqwp
				    </div>
			    </div>
		    </div>
	    </section>
	    <?php 
    endif;
?>
<section>
         sliader
</section>
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
?>