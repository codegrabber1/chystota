<?php
/**
 * Template part for displaying Order From and Contact block with phone number and socials
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Chystota
 */

?>


<!-- Contact block with phone number and socials -->
<section class="s_blocks">
	<div class="block clearfix">
		<h2>Haven't find what you were looking for?</h2>
		<span>Call Us on <?php if( mcw_get_option( 'mcw_phone' ) ): ?>
				<a href=""><?php echo mcw_get_option( 'mcw_phone' )?></a>
			<?php endif; ?>or find Us in socails</span>
	</div>
	<div class="block clearfix">
        <?php if( mcw_get_option('mcw_viber' ) ): ?>
		    <a href="viber://chat?number=<?php echo mcw_get_option('mcw_viber' )?>" class="socials" target="_blank"><i class="fab fa-viber"></i> Viber</a>
        <?php endif;?>
        <?php if( mcw_get_option( 'mcw_whatsapp' ) ):?>
		    <a href="whatsapp://send?phone=<?php echo mcw_get_option('mcw_whatsapp' )?>" class="socials" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        <?php endif;?>
        <?php if( mcw_get_option( 'mcw_fb_url' ) ):?>
		    <a href="<?php echo mcw_get_option( 'mcw_fb_url' );?>" class="socials" target="_blank"><i class="fab fa-facebook"></i>Facebook</a>
        <?php endif;?>
        <?php if( mcw_get_option( 'mcw_inst_url' ) ):?>
		    <a href="<?php echo mcw_get_option( 'mcw_inst_url' );?>" class="socials" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
        <?php endif;?>
	</div>
</section><!-- !Contact block with phone number and socials -->