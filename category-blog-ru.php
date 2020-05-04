<?php
/**
 * Template Name: Blog page
 * Template post type: post, page
 * Description: A page Template to display content of blog
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @file    blog-page.php
 * @author  codegrabber <[chystota@gmail.com]>
 *
 * @package chystota
 */
get_header();
?>
    <div id="primary" class="content-area">
        <main id="main" class="discount-main">
            <?php
			if( mcw_get_option( 'blog_category' ) ):
			if( get_query_var ( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			} else {
				$paged = 1;
			}

			$id = mcw_get_option( 'blog_category' );?>
            <header class="discount-head">
				<?php
                       echo get_cat_name( $id);
                ?>
            </header>
			<?php
                $args = array(
				'cat' => $id,
				'post_status' => 'published',
				'ignore_stycky_posts'   => 1,
				'post__not_in'  => get_option( 'sticky_posts' ),
				'paged' => $paged
			);
			$query = new WP_Query( $args );

			?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        
						<?php if( $query -> have_posts() ) :?>
							<?php
							while( $query->have_posts() ) : $query->the_post(); ?>
                                <div class="blog-content clearfix">
									<?php get_template_part( 'template-parts/content', 'excerpt' ); ?>
                                </div>
							<?php
							endwhile;

						endif;wp_reset_query();
						endif;// End of the loop.
						echo chystota_pagination();
						?>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
						<?php get_sidebar();?>
                    </div>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
?>