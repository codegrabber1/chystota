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
		if( has_category( $slug ) ) : ?>
	<main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
			//the_post_navigation();
		endwhile; // End of the loop.??>
	</main><!-- #main -->
</div><!-- #primary -->
	<?php
		get_sidebar();
	else: ?><?php
		get_template_part( 'template-parts/content', 'front' );
	endif; ?>
<?php
get_footer();
