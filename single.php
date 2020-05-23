<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Chystota
 */

get_header();
?>

<div id="primary" class="content-area">
<?php
	$id = mcw_get_option( 'blog_category' );
	$slug = get_the_category_by_ID( $id );
		if( has_category( $slug ) || has_category('blog-ru')) : ?>
	<main id="main" class="site-main ">
        <div class="container">
            <div class="post-date">
                <?php echo get_the_date( 'j F Y' )?>
            </div>
            <header class="fullpage-blog-header">
		        <?php
		        if ( is_singular() ) :
			        the_title( '<h1 class="entry-title">', '</h1>' );
		        else :
			        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		        endif;

		        if ( 'post' === get_post_type() ) :
			        ?>
		        <?php endif; ?>
            </header><!-- .entry-header -->
            <div class="row">
                <div class="col-md-12">
	                <?php
	                while ( have_posts() ) :
		                the_post();
		                get_template_part( 'template-parts/content', get_post_type() );

	                endwhile; ?><!-- // End of the loop.-->
                </div>


            </div>
        </div>
	</main><!-- #main -->
    <!--  Related post. -->
    <div class="discount-main">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?php get_template_part( 'template-parts/related-posts' )?>
                    </div>
                </div>
            </div>
    </div> <!--  !Related post. -->

</div><!-- #primary -->
	<?php
	    else:

		while ( have_posts() ) :  the_post(); ?>
		 <?php   get_template_part( 'template-parts/content', 'front' ); ?>
		<?php endwhile;
	endif; ?>
<?php
get_footer();
