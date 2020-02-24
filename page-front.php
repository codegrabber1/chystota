<?php
/**
 * Template Name: Main page
 * Template post type: post, page
 * Description: A page Template to display content on the main page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @file    front-page.php
 * @author  codegrabber <[makecodework@gmail.com]>
 *
 * @package Chystota
 */
get_header();
?>
<!-- FEATURES -->
<section class="featured_block">
<?php
	if( is_front_page() ){
        if ( ! dynamic_sidebar( 'feature' ) ):?>
         <?php endif;
	}
?>
</section><!-- !FEATURES -->
<!-- Testimonials -->
<section class="reviews">
    <div class="review-block">
        Google
    </div>
    <div class="review-block">
        Facebook
    </div>
</section><!-- !Testimonials -->
<!-- Order From  -->
<section>
    <div class="order-form">
        <div class="order-block ">
            <div class="order_content clearfix">
                <h2>Enjoy your clean</h2>
                <p>
                    Leave your phone number and we call you immediately.
                    Don't waste your time and money for nothing
                </p>
                <form action="" method="post">
                    <input type="tel" value="" placeholder="Your phone">
                    <input type="submit" value="Make order">
                </form>
            </div>
        </div>
        <div class="adver-pict">
            HERE IS A PICTURE
        </div>
    </div>
</section><!-- !Order From  -->

<!-- Contact block with phone number and socials -->
<section class="s_blocks">
    <div class="block clearfix">
        <h2>Haven't find what you were looking for?</h2>
        <span>Call Us on <?php if( mcw_get_option( 'mcw_phone' ) ): ?>
        <a href=""><?php echo mcw_get_option( 'mcw_phone' )?></a>
                                    <?php endif; ?>or find Us in socails</span>
    </div>
    <div class="block clearfix">
        <a href="#" class="socials"><i class="fab fa-viber"></i> Viber</a>
        <a href="#" class="socials"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        <a href="#" class="socials"><i class="fab fa-facebook"></i>Facebook</a>
        <a href="#" class="socials"><i class="fab fa-instagram"></i> Instagram</a>
    </div>
</section><!-- !Contact block with phone number and socials -->
<?php
get_footer();
