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

    <section id="products">
      <a href="../brand/tenpan.html" class="pageLink btn_about_product"><span>ミルボン製品について</span></a>
      <header class="header">
        <h1>BRAND</h1>
        <p>ミルボン製品はヘアデザイナーのアドバイスによりご使用いただく美容室専売品です。</p>
        <div class="category">
          <div class="btn"><a href="#">CATEGORY SELECT<span></span></a></div>
          <div class="pullDown">
          <ul>
            <li><a class="pageLink" href="../brand/haircolor.html">HAIR COLOR</a></li>
            <li><a class="pageLink" href="../brand/haircare.html">HAIR CARE</a></li>
            <li><a class="pageLink" href="../brand/perm.html">PERM</a></li>
            <li><a class="pageLink" href="../brand/styling.html">STYLING</a></li>
          </ul>
          </div>
        </div>
      </header>
      <!-- ▼一覧　9件表示 -->
      <section class="list">
        <?php
            // GET BLOG POSTS
            $shortcode_blog_query = new WP_Query(array(
              'post_type' => 'milbon-brands',
              // 'tax_query' => array(
              //     array(
              //       'taxonomy' => 'link_category',
              //       'field' => 'slug',
              //       'terms' => 'hairdesign-slug'
              //     )
              //  ),
              'order' => 'ASC'
            ));
        ?>
        <?php if ( $shortcode_blog_query->have_posts() ) {
            while($shortcode_blog_query->have_posts()) : $shortcode_blog_query->the_post(); ?>
            <div class="column">
                <a href="<?php echo get_post_meta($post->ID, "_location", true); ?>">
                    <div class="visual view"><img src="
                        <?php
                          if ( has_post_thumbnail($post->ID) ) :
                              get_featured_url($post->ID);
                          endif;
                        ?>" height="126" width="224"">
                   </div>
                   <div class="date"><span class="category"><?php the_title(); ?></span> | <span class="day"><?php the_date(); ?> UPDATE</span>
                   </div>
                   <div class="brandName">PLARMIA</div>
                    <div class="ja">        ［ プラーミア ］    </div>
                    <p>年齢を重ね、変化する髪と地肌。ボリュームも、まとまりも、ダメージも、地肌から毛先までのさまざまな違和感をポジティ...</p>
                    <div class="more"><span class="t">VIEW DETAIL →</span><span class="line"></span></div>
                </a>
            </div>
            ?php } ?>
            <?php 
              endwhile;
            }
            ?>
      </section>
    </section>
  </div><!-- end contents -->

<?php get_footer(); ?>