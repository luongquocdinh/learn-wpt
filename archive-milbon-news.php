<?php
/*
*/
get_header(); ?>

<div id="contents">
    <!-- /////////////////////////////////////////////////////////////////////////
       breadcrumb
    //////////////////////////////////////////////////////////////////////////////-->
    <nav id="breadcrumb">
      <ul>
        <li><a href="<?php echo esc_url(home_url('/')) ?>" class="pageLink">TRANG CHỦ<span></span></a></li>
        <li><a href="../news/" class="pageLink">TIN TỨC<span></span></a></li>
      </ul>
    </nav>
          <?php 
				$terms = get_terms( array(
				    'taxonomy' => 'news_category',
				    'hide_empty' => false,
				) );
          ?>
    <section id="news">
      <header class="header">
        <h1>TIN TỨC</h1>
        <form method="post" action="<?php echo get_post_type_archive_link('milbon-news'); ?>" class="form-filter-category" >
        <div class="category">
          <div class="btn"><a href="#">CHỌN DANH MỤC<span></span></a></div>
          <div class="pullDown">
          <ul>
	            <li><a class="pageLink" href="<?php echo esc_url( get_post_type_archive_link( 'milbon-news' ) ); ?>">All</a></li>
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
      <!-- ▼一覧　CMS: 9件表示 -->
      <section class="list">
      	<?php 
      		if( !isset( $_POST['cat-slug'] ) ) {
				$args = array(
					'post_type' => 'milbon-news',
				);
				$query = new WP_Query( $args );
      		}else{
      			$term_slug = $_POST['cat-slug'];
				$args = array(
					'post_type' => 'milbon-news',
					'tax_query' => array(
						array(
							'taxonomy' => 'news_category',
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
								<img src="
									<?php
		              if ( has_post_thumbnail($post->ID) ) :
		                  get_featured_url($post->ID);
		              else:
		            ?>
		            <?php echo get_template_directory_uri(); ?>/images/no_image.jpg"
		            <?php endif; ?>
								" height="126" width="224" alt="<?php echo get_the_title( $post->ID ); ?>">
							</div>
							<div class="date">
								<span class="category"><?php echo esc_html( $milbon_brands_term ); ?></span> ｜ <span class="day"><?php echo get_the_date('Y-m-d', $post->ID); ?></span>
							</div>
							<div class="brandName"><?php echo esc_html( get_the_title( $post->ID ) ); ?></div>
							<p><?php echo wp_kses_post( nl2br( wp_trim_words(get_the_excerpt( $post->ID ), 15, ' [...]') ) ); ?></p>
							<div class="more"><span class="t">CHI TIẾT →</span><span class="line"></span></div>
						</a>
					</div>
<?php
      			}
      		endif;
      	?>
      </section>
    </section>
  </div>

<?php get_footer(); ?>