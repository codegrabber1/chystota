<?php
/**
 *
 */
get_header();
?>
<div class="blocks single-block <?php echo get_post_meta($post->ID, 'css-style', true)?> clearfix">
    <div class="item-service">
        <div class="block-content d-none d-sm-none d-md-block single-content clearfix">
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
<!-- Prices-->
<?php
    //if( single_cat_title() == 'carpet') : ?>
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
                        <h3>Price</h3>
                        <p>parametry</p>
                        <span>two-seater</span>
				    </div>
				    <div class="price-item">
                        <h3>Price</h3>
                        <p>parametry</p>
                        <span>triple</span>
				    </div>
				    <div class="price-item">
                        <h3>Price</h3>
                        <p>parametry</p>
                        <span>angle</span>
				    </div>
			    </div>
		    </div>
	    </section>
	    <?php 
    //endif;
?>
<!-- !Prices-->
 <section class="phases">
        <div class="phases-blocks">
            <div class="block-text">
                <div class="text-block">
                    <h2>Чистка у два етапи</h2>
                    <p>Спочатку ми робимо суху вакуумну чистку — підготовлюємо матрац/диван/килим професійним порохотягом. Забираємо з поверхні бруд, що накопичився та вибиваємо пил до 40 см зсередини. Потім беремося за вологу хімічну чистку, яка забере всі плями та запах.</p>
                </div>
            </div>
            <div class="block-video">
                video
            </div>
        </div>
         <div class="phases-blocks">
             <div class="block-text">
                 <div class="text-block">
                     <h2>Хімія</h2>
                     <p>Спочатку ми робимо суху вакуумну чистку — підготовлюємо матрац/диван/килим професійним порохотягом. Забираємо з поверхні бруд, що накопичився та вибиваємо пил до 40 см зсередини. Потім беремося за вологу хімічну чистку, яка забере всі плями та запах.</p>
                 </div>
             </div>
             <div class="block-video">
                 video
             </div>
         </div>
 </section>
<!-- Testimonials -->
<?php
    get_template_part( 'template-parts/content', 'response' );
?>
    <!-- !Testimonials -->

<section>

    <?php
    $fields = get_field( 'sliders_category' );
    $cat = get_category($fields);
    $cat_name  = get_cat_name($cat->cat_ID);
//    var_dump($cat_name);
//    exit ;
    $args = array(
        'cat' => $cat->cat_ID,
        'post_type'           => 'post',
        'ignore_sticky_posts' => 1,
        'order'               => 'ASC',
        'include'             => $cat_name,
        'taxonomy'            => 'post',
    );
    $query = new WP_Query( $args );
//    echo "<pre>";
//    var_dump($query);
//    echo "</pre>";
//    exit;
    while( $query->have_posts() ): $query->the_post();
    ?>
        <h1><?php echo the_title();?></h1>

		    <?php the_post_thumbnail( )?>
       
    <?php endwhile;wp_reset_query();?>
</section>
    <!-- Order From and Contact block with phone number and socials -->
<?php
    get_template_part( 'template-parts/content', 'subfooter' );
?>
<?php
get_footer();
?>