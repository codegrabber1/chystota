<?php

get_header();
?>
<div class="scrolled-content clearfix">
    <div class="single-block <?php echo get_post_meta($post->ID, 'css-style', true)?> clearfix">
    <div class="item-service clearfix">
            <div class="item-serveice-content d-none d-sm-none d-md-block d-lg-block clearfix">    
                <h1><?php _e('Выездная химчистка диванов в Львове', 'chystota');?> </h1>
                <?php while( have_posts()): the_post();
                        the_content();
                    endwhile;?>
                <a class="order-button" href="#orderPhone"><?php echo __( 'Заказать чистку', 'chystota' );?></a>
            </div>
        </div>
        <div class="block-img clearfix">
            <img src="<?php echo get_field( 'full_pict' );?>" alt="<?php //the_title();?>">
        </div>
            <!-- Floating button -->
        <div class="float-btn-sticky d-md-none d-lg-none clearfix">
            <a class="sticky-button" href="#order-color"><?php echo __( 'Заказать чистку', 'chystota' );?></a>
        </div><!-- #Floating button -->
</div>


<!-- Prices-->
<section class="price-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col price-block-title ">
                <h2><?php _e( 'Стоимость чистки диванов', 'chystota' );?></h2>
                <img src="<?php echo get_field( 'icon' );?>" alt="<?php echo bloginfo( 'name' );?>">
            </div>
        </div>
    </div>
<!--    The Prices of cleaning -->
    <div class="container-fluid">
        <div class="prices">
            <div class="prices-title ">
                <h3><?php echo $title?></h3>
                <img src="<?php echo $icon?>" alt="<?php echo $title?>">
            </div>
            <?php
            $fields = get_field( 'price_category' );
            $cat = get_category($fields);
            $cat_name  = get_cat_name($cat->cat_ID);
            
            $args = array(
                'cat'                 => $cat->cat_ID,
                'category__in'        => $cat->cat_ID,
                'post_type'           => 'post',
                'ignore_sticky_posts' => 1,
                'order'               => 'ASC',
                'include'             => $cat_name,
                'taxonomy'            => 'post',
                'posts_per_page'      => 3
            );
            $query = new WP_Query( $args );
            if( $query->have_posts() ):
                while( $query->have_posts() ): $query->the_post(); ?>
                <div class="price-item">
                    <h3 class="d-none d-sm-none d-md-block d-lg-block"><?php the_title()?></h3>
                    <h3 class="d-block d-sm-block d-md-none d-lg-none"><?php the_excerpt();?></h3>
                    <div class="price-content">
                        <?php the_content()?>
                        <span class="price-excerpt d-block d-sm-block d-md-none d-lg-none"><?php the_title()?></span>
                    </div>
                    <span class="d-none d-sm-none d-md-block d-lg-block"><?php the_excerpt();?></span>
                </div>
	        <?php endwhile; endif; wp_reset_query();?>
            
        </div>
    </div>
</section><!-- !Prices of cleaning-->

<!--The phases of cleaning -->
 <section class="phases">
     <?php
        $phases = get_field( 'choose_a_category' );

        $cat = get_category($phases);
        $cat_name  = get_cat_name($cat->cat_ID);

        $args = array(
            'cat'                 => $cat->cat_ID,
            'category__in'        => $cat->cat_ID,
            'post_type'           => 'post',
            'ignore_sticky_posts' => 1,
            'order'               => 'ASC',
            'include'             => $cat_name,
            'taxonomy'            => 'post',
            'posts_per_page'      => 3
        );
        $query = new WP_Query( $args );
        if( $query->have_posts() ):
            while( $query->have_posts() ): $query->the_post();
                ?>
        <div class="phases-blocks">
            <div class="block-text">
                <div class="text-block">
                    <h2><?php the_title();?></h2>
                    <p><?php the_excerpt();?></p>
                </div>
            </div>
            <div class="block-video">
                <?php
                    the_post_thumbnail();
                ?>
            </div>
        </div>
        <?php endwhile; endif; wp_reset_query();?>
 </section>    <!-- !The phases of cleaning -->


<?php
    if( is_category() ):
        if( dynamic_sidebar( 'middlepage' )) : ?>
            <?php
        endif;
    endif;
?>
<!-- Slider with responses. -->
<section class="s-response">

    <h2> <?php _e( 'Результаты нашей работы', 'chystota' );?> </h2>
    <!-- Section slider. -->
    <div id="resp-slider" class="owl-carousel">
        <?php

        $fields = get_field( 'sliders_category' );

        $cat = get_category($fields);
        $cat_name  = get_cat_name($cat->cat_ID);

        $args = array(
            'cat'                 => $cat->cat_ID,
            'category__in'        => $cat->cat_ID,
            'post_type'           => 'post',
            'ignore_sticky_posts' => 1,
            'order'               => 'ASC',
            'include'             => $cat_name,
            'taxonomy'            => 'post',
        );
        
        $query = new WP_Query( $args );
        if( $query->have_posts() ):
            while( $query->have_posts() ): $query->the_post();
                ?>
                <div class="response">
                    <?php the_post_thumbnail( )?>
                    <div class="response-items">
                        <div class="r-item">
                            <div class="author-pic">
                                <img src="<?php echo get_field( 'avatar',$post->ID );?>" alt="<?php echo get_field( 'avatar',$post->ID );?>">
                                <p><?php echo the_title();?></p>
                            </div>
                            <?php the_content();?>
                        </div>
                        <div class="r-item">
                            <a class="fb" href="<?php echo get_field( 'link_to_avatar' );?>" target="_blank">
                                <i class="fas fa-share"></i>
                                <i class="fab fa-facebook-square"></i>
                            </a>
                        </div>
                    </div>
                </div>

            <?php endwhile; endif; wp_reset_query();?>
    </div>
   
</section> <!-- !Slider with responses. -->

<?php
if( is_category() ):
	if( dynamic_sidebar( 'abovethefooter' )) : ?>
	<?php
	endif;
endif;
?>
<!-- Order From and Contact block with phone number and socials -->
<?php
    get_template_part( 'template-parts/content', 'subfooter' );
?>
<?php
  get_footer(  );
?>