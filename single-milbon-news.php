<?php 
/**
 * The Template for displaying single posts news.
 */
get_header(); ?>
<div class="wrapper" style="opacity: 1;">
	<div id="contents" class="product_detail">
		<nav id="breadcrumb">
			<ul>
				<li>
					<a href="./../../" class="pageLink">
						TOP
						<span></span>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url(get_post_type_archive_link( 'milbon-news' )); ?>" class="pageLink">
						NEWS
						<span></span>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url( get_permalink( $post->ID ) );  ?>" class="pageLink">
						<?php the_title(); ?>
						<span></span>
					</a>
				</li>
			</ul>
		</nav>
		<section id="news">
			<div class="btn_return" style="margin-top:20px;">
				<a href="<?php echo esc_url(get_post_type_archive_link( 'milbon-news' )); ?>" class="pageLink">
					<span class="arrow_img">←</span>
					<span class="text">View All News</span>
					<span class="line"></span>
				</a>
			</div>
			<header class="header">
				<h1>NEWS</h1>
			</header>
			<article class="detail">
				<div class="meta">
					<span class="category">NEWS</span> | 
					<span class="date"><?php echo get_the_date('Y-m-d'); ?></span>
				</div>
				<h2><?php the_title(); ?></h2>
				<div class="entry">
					<?php 
							if ( have_posts() ) : while ( have_posts() ) : the_post();
							  	the_content();
								endwhile;
							else:
						?> 		
						  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
						<?php endif; ?>
				</div>
				<footer class="footer">
					<div class="contact">
						<a href="../../contact"><?php the_title(); ?></a>
					</div>
					<ul class="sns">
						<li class="sns01">
							<a href="http://www.facebook.com/share.php?u=http://www.milbon.co.jp/news/detail/95" onclick="window.open(this.href,'facebookwindow','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;">
								<span>Share</span>
							</a>
						</li>
						<li class="sns02">
							<a href="https://twitter.com/intent/tweet?original_referer=http://www.milbon.co.jp/news/detail/95&amp;text=ヘアデイナー様向けコンテンツに「PROMOTION TOOL DOWNLOAD」を追加しました。&amp;tw_p=tweetbutton&amp;url=http://www.milbon.co.jp/news/detail/95" onclick="window.open(this.href,'tweetwindow','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;">
								<span>Tweet</span>
							</a>
						</li>
						<li class="sns03">
							<a href="https://plus.google.com/share?url=http://www.milbon.co.jp/news/detail/95" onclick="window.open(this.href,'googlewindow','width=530,height=470,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;">
								<span>Share</span>
							</a>
						</li>
					</ul>
				</footer>
			</article>
			<nav class="detail_next">
				<a href="<?php echo esc_url( get_permalink( get_next_post()->ID )); ?>" class="pageLink">
					<div class="arrow" style="left: 0px;"></div>
					<div class="over" style="opacity: 0;">
						<div class="image">
							<img src="
									<?php
		              if ( has_post_thumbnail($post->ID) ) :
		                  get_featured_url($post->ID);
		              else:
		            ?>
		            <?php echo get_template_directory_uri(); ?>/images/no_image.jpg"
		            <?php endif; ?>
								">
						</div>
					</div>
				</a>
			</nav>
		</section>
	</div>
	<?php get_footer(); ?>	
</div>		