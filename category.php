<?php

get_header(); ?>
		<div id="main_banner">
			<img src="<?php echo get_template_directory_uri(); ?>/images/top/banner.jpg" alt="自分自分”を生きる!!" width="940" height="256"/>
		</div>
		<section id="primary">
			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>
			<div class="wrap_box">	
				<?php if(is_category( '1' )) : ?>
				
					<h2><img src="<?php echo get_template_directory_uri(); ?>/images/blog/h2_01.jpg" alt="ブログ" width="90" height="40"/></h2>
				
				<?php else : ?>
				<h2>
					<?php echo single_cat_title( '', false )?>
				</h2>
				<?php endif; ?>
				<div class="box">
					<?php	
					$max = $wp_query->post_count - 1;
					while(have_posts()) : the_post(); ?>
							<?php if($i == 0) $class = " first"; else
								if($i == $max) $class = " last"; else $class = ''; ?>
							<dl class="text<?php echo $class;?>">
								<dd><?php global $post; echo mysql2date('Y年m月d日', $post->post_date, false); ?></dd>
								<dt><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dt>
							</dl>
							<?php $i++; ?>
					<?php endwhile; ?>
					<?php if (function_exists('wp_corenavi')) wp_corenavi('paged'); ?>					
				</div>
			</div>
		<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>


			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
