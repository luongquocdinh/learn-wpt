<?php
/*
Template Name: Brands
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
        <li><a href="../" class="pageLink">TOP<span></span></a></li>
        <li><a href="../brand/" class="pageLink">BRAND<span></span></a></li>
      </ul>
    </nav>
          <?php 
				$terms = get_terms( array(
				    'taxonomy' => 'brand_category',
				    'hide_empty' => false,
				) );
          ?>
    <section id="products">
      <a href="../brand/tenpan.html" class="pageLink btn_about_product"><span>ミルボン製品について</span></a>
      <header class="header">
        <h1>BRAND</h1>
        <p>ミルボン製品はヘアデザイナーのアドバイスによりご使用いただく美容室専売品です。</p>
        <form method="post" action="<?php echo get_post_type_archive_link('milbon-brands'); ?>" class="form-filter-category" >
	        <div class="category">
	          <div class="btn"><a href="#">CATEGORY SELECT<span></span></a></div>
	          <div class="pullDown">
	          <ul>
	            <li><a class="pageLink" href="<?php echo esc_url( get_post_type_archive_link( 'milbon-brands' ) ); ?>">All</a></li>
	            <?php
	            	if( !empty( $terms ) ) {
	            		foreach ( $terms as $term ) {
	            ?>
	            			<li>
	            				<a href="<?php echo esc_url(get_category_link( get_cat_ID($term->name)) ); ?>" class="pageLink category-filter" data-slug="<?php echo esc_attr( $term->slug ) ?>">
	            					<?php echo esc_html( $term->name ) ?>
	            				</a>
	            			</li>
	            			<?php
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
      		}else{
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
						}else{
							$milbon_brands_term = '';
						}
					}else{
						$milbon_brands_term = '';
					}
      		?>
					<div class="column">
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
							<div class="more"><span class="t">VIEW DETAIL →</span><span class="line"></span></div>
						</a>
					</div>
<?php
      			}
      		endif;
      	?>

      </section>
    </section>
  </div><!-- end contents -->

<?php get_footer(); ?>