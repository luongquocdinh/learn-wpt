<?php
/**
 * The Template for displaying single posts brands.
 */

get_header(); ?>
	<div id="contents" class="product_detail">
		<nav id="breadcrumb">
			<ul>
				<li>
					<a href="<?php echo esc_url(home_url('/')) ?>" class="pageLink">
						TRANG CHỦ
						<span></span>
					</a>
				</li>
				<li>
					<a href="<?php echo esc_url(get_post_type_archive_link( 'milbon-brands' )); ?>" class="pageLink">
						SẢN PHẨM
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
		<section id="products">
			<a href="#" class="pageLink btn_about_product">
				<span>Về sản phẩm của Milbon</span>
			</a>
			<div class="btn_return">
				<a href="<?php echo esc_url(get_post_type_archive_link( 'milbon-brands' )); ?>" class="pageLink">
					<span class="arrow_img">←</span>
					<span class="text">XEM TOÀN BỘ</span>
					<span class="line"></span>
				</a>
			</div>
			<div class="mainvisual" style="opacity: 1;">
				<div class="visual view" style="height: 223px; background: url(
				<?php
					$image_id =  get_post_meta($post->ID, '_attachment_file_id', true);
					if($image_id === '')
						echo get_template_directory_uri().'/files/img/brand/2016/04/20160415160646_1.png';
					else
						echo wp_get_attachment_url($image_id);
				?>) center center / cover no-repeat;">
				</div>
			</div>
			<article class="detail" style="margin-top: 223px;">
				<header class="detail_header">
					<h1>
						<?php
							$logo_id = get_post_meta($post->ID, '_attachment_logo_id', true);
							if ($logo_id === '') {
								echo '';
							}
							else {						  
						?>
								<img src="<?php echo wp_get_attachment_url($logo_id); ?>" alt="<?php the_title(); ?>" style="width: 400px; display: block; margin: 0 auto;">
						<?php
							}
						?>
						
					</h1>
				</header>
				<div class="scrolldown" style="display: none; opacity: 1;">
					<a href="#"><span>CUỘN XUỐNG</span></a>
				</div>
				<section class="detail_main view">
					<div class="category">
						<?php
							echo get_first_cateogry($post->ID, 'brand_category');
						?>
					</div>
					<div class="ja">
						<?php
							if (get_post_meta($post->ID,'_title_japanese', true) != '') {
								echo esc_html( "[" . get_post_meta($post->ID,'_title_japanese', true) . "]" );
							}
					 	?>
					</div>
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
					<nav class="detail_prev">
						<a href="<?php echo esc_url(get_permalink(get_previous_post()->ID)); ?>" class="pageLink">
							<div class="arrow" style="left: 0px;"></div>
							<div class="over" style="opacity: 0;">
								<div class="image">
									<img src="<?php get_featured_url(get_previous_post()->ID); ?>">
								</div>
							</div>
						</a>
					</nav>
					<nav class="detail_next">
						<a href="<?php echo esc_url(get_permalink(get_next_post()->ID)); ?>" class="pageLink">
							<div class="arrow" style="left: 0px;"></div>
							<div class="over" style="opacity: 0;">
								<div class="image">
									<img src="<?php get_featured_url(get_next_post()->ID) ?>">
								</div>
							</div>
						</a>
					</nav>
					<h3>COLLECTION</h3>
					<div class="product_list">
					<?php
						$brand_id = $post->ID;
						$category_collection = get_post_meta($post->ID, 'custom_element_grid_class_meta_box',true);
						$shortcode_collection_query = new WP_Query(array(
							'post_type' => 'brands-collection',
							'order'	=> 'ASC',
							'tax_query' => array(
								array(
									'taxonomy' => 'collection_category',
									'field' => 'slug',
									'terms' => $category_collection
								)
							)
						));
					?>

	          <?php
          		if ($shortcode_collection_query->have_posts()) {
          			while($shortcode_collection_query->have_posts()) : $shortcode_collection_query->the_post();
          		?>
            		<div class="column">
            			<a href="<?php echo esc_url(add_query_arg( 'brandID', $brand_id, get_permalink($post->ID))); ?>">
	            			<div class="image">
	            			<img src="<?php echo get_featured_url($post->ID); ?>" alt="<?php the_title() ?>">
							<span></span></div>
	            			<p class="productName" align="center">
	            				<?php the_title(); ?>
	            			</p>
            			</a>
            		</div>
              <?php
            	endwhile;
            }
            ?>
					</div>
				</section>
			</article>
			<?php 
				$shortcode_blog_query = new WP_Query(array(
					'post_type' => 'milbon-brands',
					'order' => 'ASC'
				));
			?>		
		</section>
	</div>
	<?php get_footer(); ?>
