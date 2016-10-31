<?php
/*
*/
get_header(); ?>

	<!-- /////////////////////////////////////////////////////////////////////////
	   contents
  //////////////////////////////////////////////////////////////////////////////-->
  <div id="contents">

    <!-- /////////////////////////////////////////////////////////////////////////
       breadcrumb
    //////////////////////////////////////////////////////////////////////////////-->
    <nav id="breadcrumb">
      <ul>
        <li><a href="<?php echo esc_url(home_url('/')) ?>" class="pageLink">TRANG CHỦ<span></span></a></li>
        <li><a href="<?php echo esc_url( get_post_type_archive_link( 'milbon-brands' ) ); ?>" class="pageLink">SẢN PHẨM<span></span></a></li>
      </ul>
    </nav>
          <?php 
				$terms = get_terms( array(
				    'taxonomy' => 'brand_category',
				    'hide_empty' => true,
				) );
          ?>
    <section id="products">
      <a href="<?php echo esc_url( home_url( '/' ) ) . 'brand_tenpan/';?>" class="pageLink btn_about_product"><span>Về sản phẩm của Milbon</span></a>
      <header class="header">
        <h1>SẢN PHẨM</h1>
        <p>Những sản phẩm của Milbon được bán tại các salon chuyên nghiệp dưới sự tư vấn của các hair design.</p>
        <form method="post" action="<?php echo get_post_type_archive_link('milbon-brands'); ?>" class="form-filter-category" >
	        <div class="category">
	          <div class="btn"><a href="#">CHỌN DANH MỤC<span></span></a></div>
	          <div class="pullDown">
	          <ul>
	            <li><a class="pageLink" href="<?php echo esc_url( get_post_type_archive_link( 'milbon-brands' ) ); ?>">Tất cả</a></li>
	            <?php
	            	if( !empty( $terms ) ) {
	            		foreach ( $terms as $term ) {
	            			echo '<li><a class="pageLink category-filter" data-slug="'. esc_attr( $term->slug ) .'" href="javascript:void(0)">'. esc_html( $term->name ) .'</a></li>';
	            		}
	            	}
	            ?>
	          </ul>
	          </div>
	        </div>
        </form>
      </header>
      <!-- ▼一覧　9件表示 -->
      <section class="list">
      	<?php 
      		if( !isset( $_POST['cat-slug'] ) ) {
						$args = array(
							'post_type' => 'milbon-brands',
						);
						$query = new WP_Query( $args );
      		} else {
      			$term_slug = $_POST['cat-slug'];
						$args = array(
							'post_type' => 'milbon-brands',
							'tax_query' => array(
								array(
									'taxonomy' => 'brand_category',
									'field'    => 'slug',
									'terms'    => $term_slug,
								),
							),
						);
						$query = new WP_Query( $args );
      		}
      		$milbon_brands_term = '';
      		if( !empty( $query->posts ) ):
      			foreach ( $query->posts as $post ) {	
	      			$tax = get_post_taxonomies( $post->ID );
							if( !empty( $tax ) ) {
								$category_brand = get_the_terms($post->ID, $tax[0]);
								if( !empty( $category_brand ) ) {
									$milbon_brands_term = $category_brand[0]->name;
								} else {
									$milbon_brands_term = '';
								}
							} else {
								$milbon_brands_term = '';
							}
      		?>
					<div class="column show">
						<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="pageLink">
							<div class="visual view">
								<img src="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) ); ?>" height="139" width="300" alt="<?php echo get_the_title( $post->ID ); ?>">
							</div>
							<div class="date">
								<span class="category"><?php echo esc_html( $milbon_brands_term ); ?></span> ｜ <span class="day"><?php echo get_the_date('Y-m-d', $post->ID); ?></span>
							</div>
							<div class="brandName"><?php echo esc_html( get_the_title( $post->ID ) ); ?></div>
							<div class="ja">
								<?php
			            if (get_post_meta($post->ID,'_title_japanese', true) !== '') { 
			              echo esc_html( "[" . get_post_meta($post->ID,'_title_japanese', true) . "]" );
			            } 
		            ?>
							</div>
							<p><?php echo wp_kses_post( nl2br( wp_trim_words(get_the_excerpt( $post->ID ), 15, ' [...]') ) ); ?></p>
							<div class="more"><span class="t">CHI TIẾT →</span><span class="line"></span></div>
						</a>
					</div>
				<?php
      			}
      		endif;
      	?>
				<div class="readmore"><a href="#" id="loadmore">LOAD MORE<span></span></a></div>
      </section>
    </section>
  </div><!-- end contents -->
<?php get_footer(); ?>