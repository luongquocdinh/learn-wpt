<?php
/**
 * The Template for displaying single posts news.
 */

get_header(); ?>
		<div id="main_banner">
			<img src="<?php echo get_template_directory_uri(); ?>/images/top/visual.jpg" alt="“自分自分”を生きる!!" width="940" height="256"/>
		</div>
		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<h2><span><?php the_title(); ?></span></h2>
					<div class="content_wrapper text10">
					<?php the_content(); ?>
					</div>
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>