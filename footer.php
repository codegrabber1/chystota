<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Chystota
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="footer-info">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-4">
						<div class="f_widget">
							<div class="f-title"><?php _e( 'Services', 'chystota' )?></div>
							<div class="f-content">
								<ul>
									<li><a href="#">Category 1</a></li>
									<li><a href="#">Category 2</a></li>
									<li><a href="#">Category 3</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="f_widget">
							<div class="f-title"><?php _e( 'About Us', 'chystota' )?></div>
							<div class="f-content">
								<ul>
									<li><a href="#">Category 1</a></li>
									<li><a href="#">Category 2</a></li>
									<li><a href="#">Category 3</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col col-md-4">
						<div class="f_widget">
							<div class="f-content">
								<ul class="f-social clearfix">
									<?php if( mcw_get_option( 'mcw_fb_url' ) ):?>
									<li><a href="<?php echo mcw_get_option( 'mcw_fb_url' )?>">
										<i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
									<?php endif;?>
									<?php if( mcw_get_option( 'mcw_inst_url' ) ):?>
									<li><a href="<?php echo mcw_get_option( 'mcw_inst_url' )?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
									<?php endif;?>
									<?php if( mcw_get_option( 'mcw_youtube_url' ) ):?>
									<li><a href="<?php echo mcw_get_option( 'mcw_youtube_url' )?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
									<?php endif;?>
									<li><a href="#">linl 4</a></li>
								</ul>
								<div class="f-social clearfix">
									<?php if( mcw_get_option( 'mcw_phone' ) ): ?>
									<?php echo mcw_get_option( 'mcw_phone' )?>
									<?php endif; ?>
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
