<?php
/*
Template Name: News
*/
get_header(); ?>

<div id="contents">
    <!-- /////////////////////////////////////////////////////////////////////////
       breadcrumb
    //////////////////////////////////////////////////////////////////////////////-->
    <nav id="breadcrumb">
      <ul>
        <li><a href="../" class="pageLink">TOP<span></span></a></li>
        <li><a href="../news/" class="pageLink">NEWS<span></span></a></li>
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
        <h1>NEWS</h1>
        <form method="post" action="<?php echo get_post_type_archive_link('milbon-news'); ?>" class="form-filter-category" >
        <div class="category">
          <div class="btn"><a href="#">CATEGORY SELECT<span></span></a></div>
          <div class="pullDown">
          <ul>
	            <li><a class="pageLink" href="<?php echo esc_url( get_post_type_archive_link( 'milbon-news' ) ); ?>">All</a></li>
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
								<img src="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) ); ?>" height="139" width="300" alt="<?php echo get_the_title( $post->ID ); ?>">
							</div>
							<div class="date">
								<span class="category"><?php echo esc_html( $milbon_brands_term ); ?></span> ｜ <span class="day"><?php echo get_the_date('Y-m-d', $post->ID); ?></span>
							</div>
							<div class="brandName"><?php echo esc_html( get_the_title( $post->ID ) ); ?></div>
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
  </div>

<?php get_footer(); ?>