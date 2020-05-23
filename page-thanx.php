<?php
/**
 * * Template Name: Thanx page
 *
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package chystota
 */

get_header();
?>
	<div class="no-sidebar">
		<div id="primary" class="content-area">
			<main id="main" class="">

				<section class="thx-bg">
					<div class="page-content">
                        <?php
                            while(have_posts()):
	                            the_post();  ?>
                                <?php the_post_thumbnail();?> 

                                <h2><?php the_title();?></h2>

                                <?php the_content();?>
                                <div class="big_buttons">
	                            <?php if( mcw_get_option( 'mcw_fb_url' ) ):?>
                                    <a href="<?php echo mcw_get_option( 'mcw_fb_url' )?>" target="_blank" class="fbBt">
                                        <i class="fab fa-facebook-square"></i>
                                        Facebook</a>
                                <?php endif;?>
	                            <?php if( mcw_get_option( 'mcw_inst_url' ) ):?>
                                    <a href="<?php echo mcw_get_option( 'mcw_inst_url' ) ;?>" target="_blank" class="instBt">
                                        <i class="fab fa-instagram"></i>
                                        Instagram</a>
                                <?php endif;?>

                                </div>
                            <?php

                            endwhile;
                        ?>


					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php
get_footer();
