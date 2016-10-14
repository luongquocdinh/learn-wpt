<?php
/**
 * The Template for displaying single posts brands.
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
					<a href="<?php echo esc_url(get_post_type_archive_link( 'milbon-brands' )); ?>" class="pageLink">
						BRAND
						<span></span>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url( get_permalink( $post->ID ) );  ?>" class="pageLink">
						PLARMIA
						<span></span>
					</a>
				</li>
			</ul>
		</nav>
		<section id="products">
			<a href="#" class="pageLink btn_about_product">
				<span>ミルボン製品について</span>
			</a>
			<div class="btn_return">
				<a href="<?php echo esc_url(get_post_type_archive_link( 'milbon-brands' )); ?>" class="pageLink">
					<span class="arrow_img">←</span>
					<span class="text">VIEW ALL BRAND</span>
					<span class="line"></span>
				</a>
			</div>
			<div class="mainvisual" style="opacity: 1;">
				<div class="visual view" style="height: 223px; background: url(&quot;../../../wp-content/themes/slz-dinhlq/files/img/brand/2016/04/20160415160646_1.png&quot;) center center / cover no-repeat;">
				</div>
			</div>
			<article class="detail" style="margin-top: 223px;">
				<header class="detail_header">
					<h1><img src="../../../wp-content/themes/slz-dinhlq/files/img/brand/2016/05/20160521133208_1.jpg" alt="PLARMIA" style="width: 400px; display: block; margin: 0 auto;"></h1>
				</header>
				<div class="scrolldown" style="display: none; opacity: 1;">
					<a href="#"><span>SCROLLDOWN</span></a>
				</div>
				<section class="detail_main view">
					<div class="category"><?php the_title(); ?></div>
					<div class="ja"><?php echo get_post_meta($post->ID, "_title_japanese", true); ?></div>
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
				</section>
			</article>
			<nav class="detail_prev">
				<a href="#" class="pageLink">
					<div class="arrow" style="left: 0px;"></div>
					<div class="over" style="opacity: 0;">
						<div class="image">
							<img src="<?php get_featured_url(get_previous_post()->ID); ?>">
						</div>
					</div>
				</a>
			</nav>
			<nav class="detail_next">
				<a href="#" class="pageLink">
					<div class="arrow" style="left: 0px;"></div>
					<div class="over" style="opacity: 0;">
						<div class="image">
							<img src="<?php get_featured_url(get_next_post()->ID) ?>">
						</div>
					</div>
				</a>
			</nav>
		</section>
	</div>
	<?php get_footer(); ?>	
</div>
