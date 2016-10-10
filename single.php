<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
		<div id="main_banner">
			<img src="<?php echo get_template_directory_uri(); ?>/images/top/banner.jpg" alt="“自分自分”を生きる!!" width="940" height="256"/>
		</div>
		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<h2><span><?php the_title(); ?> (<?php the_date(); ?>)</span></h2>
					<div class="content_wrapper text10">
					<?php the_content(); ?>
					</div>
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>