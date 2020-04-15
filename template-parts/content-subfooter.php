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
		<h2><?php echo __( "Не знайшли, що шукали ?" )?></h2>
		<span>Зателефонуйте нам <?php if( mcw_get_option( 'mcw_phone' ) ): ?>
				<a href=""><?php echo mcw_get_option( 'mcw_phone' )?></a>
			<?php endif; ?>або знайдіть нас у соціальних мережах</span>
	</div>
	<div class="block clearfix">
		<div class="socials-block">
		<?php if( mcw_get_option('mcw_viber' ) ): ?>
		    <a href="viber://chat?number=<?php echo mcw_get_option('mcw_viber' )?>" class="socials" target="_blank">
			<i class="fab fa-viber"></i> <span class="d-none d-sm-block d-md-block d-lg-block">Viber</span></a>
        <?php endif;?>
        <?php if( mcw_get_option( 'mcw_telegram' ) ):?>
		    <a href="https://telegram.im/<?php echo mcw_get_option('mcw_telegram' )?>" class="socials" target="_blank">
			<i class="fab fa-whatsapp"></i> <span class="d-none d-sm-block d-md-block d-lg-block">Telegram</span> </a>
        <?php endif;?>
        <?php if( mcw_get_option( 'mcw_fb_url' ) ):?>
		    <a href="<?php echo mcw_get_option( 'mcw_fb_url' );?>" class="socials" target="_blank">
			<i class="fab fa-facebook"></i><span class="d-none d-sm-block d-md-block d-lg-block">Facebook</span></a>
        <?php endif;?>
        <?php if( mcw_get_option( 'mcw_inst_url' ) ):?>
		    <a href="<?php echo mcw_get_option( 'mcw_inst_url' );?>" class="socials" target="_blank">
                <i class="fab fa-instagram"></i> <span class="d-none d-sm-block d-md-block d-lg-block">Instagram</span></a>
        <?php endif;?>
		</div>	
        
	</div>
</section><!-- !Contact block with phone number and socials -->