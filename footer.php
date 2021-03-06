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
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 col-md-4">
						<div class="f_widget">
                            <?php if ( !dynamic_sidebar( 'footer-left' ) ):?>
                                      <h6>Put widget here</h6>
                            <?php endif;?>

						</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="f_widget">
							<?php if ( !dynamic_sidebar( 'footer-middle' ) ):?>
                                <h3>Put widget here</h3>
							<?php endif;?>
						</div>
					</div>
					<div class="col col-md-4">
						<div class="f_widget">
							<div class="f-content">
								<ul class="f-social clearfix">
									<?php if( mcw_get_option( 'mcw_fb_url' ) ):?>
									<li><a href="<?php echo mcw_get_option( 'mcw_fb_url' )?>" target="_blank">
										<i class="fab fa-facebook"></i></a></li>
									<?php endif;?>
									<?php if( mcw_get_option( 'mcw_inst_url' ) ):?>
									<li><a href="<?php echo mcw_get_option( 'mcw_inst_url' )?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
									<?php endif;?>
									<?php if( mcw_get_option( 'mcw_youtube_url' ) ):?>
									<li><a href="<?php echo mcw_get_option( 'mcw_youtube_url' )?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
									<?php endif;?>
									<li><a href="#" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2859 3333" shape-rendering="geometricPrecision" width="18" height="18" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd">
                                                <path fill="#fff" d="M2081 0c55 473 319 755 778 785v532c-266 26-499-61-770-225v995c0 1264-1378 1659-1932 753-356-583-138-1606 1004-1647v561c-87 14-180 36-265 65-254 86-398 247-358 531 77 544 1075 705 992-358V1h551z"/></svg>
                                        </a>
                                    </li>
								</ul>
								<div class="f-social clearfix">
									<?php if( mcw_get_option( 'mcw_phone' ) ): ?>
									<a class="f-phone" href="tel:<?php echo mcw_get_option( 'mcw_phone' )?>"><?php echo mcw_get_option( 'mcw_phone' )?></a>
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
<script>
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "#ffffff"
            },
            "button": {
                "background": "#8ec760",
                "text": "#ffffff"
            }
        },
        "showLink": false,
        "theme": "classic",
        "position": "bottom-left",
        "content": {
            "message": "Продовжуючи працювати з нашим веб-сайтом ви погоджуєтеся з використанням файлів cookie та політикою конфіденційності.",
            "dismiss": "Зрозуміло!"
        }
    });
</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/uk_UA/sdk.js#xfbml=1&version=v6.0&appId=498188843586746&autoLogAppEvents=1"></script>
<!-- start webpushr tracking code -->
<!-- <script>(function(w,d, s, id) {if(typeof(w.webpushr)!=='undefined') return;w.webpushr=w.webpushr||function(){(w.webpushr.q=w.webpushr.q||[]).push(arguments)};var js, fjs = d.getElementsByTagName(s)[0];js = d.createElement(s); js.id = id;js.src = "https://cdn.webpushr.com/app.min.js";
        fjs.parentNode.appendChild(js);}(window,document, 'script', 'webpushr-jssdk'));
    webpushr('init','BJ1J9WrDgfVQmFoAoqUsywiwP9neYGrEsjAHZRnWp0sStGypo-Aot80uCGdkJDWOqPdyRJnmgBNzValWV2nqm-w');</script> -->
<!-- end webpushr tracking code -->
</body>
</html>
