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
		<a href="#" class="socials"><i class="fab fa-viber"></i> Viber</a>
		<a href="#" class="socials"><i class="fab fa-whatsapp"></i> WhatsApp</a>
		<a href="#" class="socials"><i class="fab fa-facebook"></i>Facebook</a>
		<a href="#" class="socials"><i class="fab fa-instagram"></i> Instagram</a>
	</div>
</section><!-- !Contact block with phone number and socials -->