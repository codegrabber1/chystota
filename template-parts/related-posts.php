<?php
$number = 2;
$args = array();

$categories = get_the_category( $post->ID );
if( $categories  ) {
	$category_ids = array();
	foreach( $categories as $category ) $category_ids[] = $category->term_id;

	$args = array(
		'category__in' => $category_ids,
		'post__not_in' => array($post->ID),
		'showposts'=> $number,
	);
}
if( $args ):
	$query = new WP_Query( $args );
	if( $query->have_posts()  ):
        while( $query->have_posts() ): $query->the_post();?>
        <div class="blog-content clearfix">
            <div class="blog-img">
	            <?php chystota_post_thumbnail(); ?>
            </div>
            <div class="blog-item">
                <div class="item">
                    <a href="<?php the_permalink()?>"><?php the_title();?></a>
			        <?php the_excerpt( );?>
                </div>
            </div>
        </div>
<?php endwhile; endif; endif; wp_reset_query();?>
