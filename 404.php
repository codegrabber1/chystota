<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package chystota
 */

get_header();
?>
	<div class="no-sidebar">
		<div id="primary" class="content-area">
			<main id="main" class="">

				<section class="error-404 not-found">
					<div class="page-content">
						<h2>Упс.. Сторінка не знайдена</h2>
						<p>Нажаль, сторінки яку ви шукаєте не існує. Спробуйте повернутись на головну.</p>

						<a href="<?php echo home_url();?>" class="not-found-btn"> На головну</a>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php
get_footer();
