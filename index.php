<?php get_header(); ?>

<!-- /////////////////////////////////////////////////////////////////////////
     top
  //////////////////////////////////////////////////////////////////////////////-->
  <section id="top">
    <ul>
      <li><img src="<?php echo get_template_directory_uri(); ?>/images/top/visual.jpg" height="700" width="1200" alt=""></li>
    </ul>
    <h1><img src="<?php echo get_template_directory_uri(); ?>/images/top/top_copy.png" width="349" alt="美しさを拓く。MILBON"></h1>
    <div class="scrolldown"><a href="#"><span>SCROLL DOWN</span></a></div>
  </section>


  <!-- /////////////////////////////////////////////////////////////////////////
     comment
  //////////////////////////////////////////////////////////////////////////////-->
  <section id="comment">
    <p>この度の熊本地方の地震により被災された皆さまに、心よりお見舞い申し上げます。一日も早い復旧をお祈り申し上げます。</p>
  </section>


  <!-- /////////////////////////////////////////////////////////////////////////
     topBrand
  //////////////////////////////////////////////////////////////////////////////-->
  <section id="topBrand">
    <h2>BRAND</h2>
    <a href="<?php echo esc_url( get_post_type_archive_link( 'milbon-brands' ) ); ?>" class="pageLink view"><span class="text">VIEW ALL BRANDS</span><span class="arrow"><span class="arrow_img">→</span></span><span class="line"></span></a>
    <div class="slide-area">
      <div class="slide-inner">
        <div class="slide">
          <?php
            // GET BLOG POSTS
            $shortcode_blog_query = new WP_Query(array(
              'post_type' => 'milbon-brands',
              'meta_query' => array(
                array(
                  'key' => 'field_id',
                  'value' => 'yes',
                  'compare' => '='
                )
              ),
              'order' => 'ASC'
            ));
          ?>

           <?php
           if ( $shortcode_blog_query->have_posts()) {
            while($shortcode_blog_query->have_posts()) : $shortcode_blog_query->the_post(); ?>
                <div class="column">
                  <a href="<?php echo esc_url( get_permalink( $post->ID ) );  ?>" class="pageLink">
                    <div class="visual"><img src="
                      <?php 
                        if ( has_post_thumbnail($post->ID) ) :
                            get_featured_url($post->ID);
                        endif;
                      ?>" height="450" width="800" alt="Villa Lodola">
                    </div>
                    <div class="date"><span class="category"><?php the_title(); ?></span> ｜ <span class="day"><?php the_date('Y-m-d'); ?> UPDATE</span></div>
                    <div class="over">
                      <div class="over-inner">
                        <p class="brandName"><img src=""></p>
                        <?php 
                          $cat = array();
                          foreach (get_the_category($post_id) as $c) {
                            $cat = get_category($c);
                            array_push($cats, $cat->name);
                          }
                          if (sizeOf($cats) > 0) {
                            $post_categories = implode(', ', $cats);
                          }

                        ?>
                        <p class="ja"><?php echo esc_html( get_post_meta($post->ID,'_title_japanese', true) ); ?></p>

                          <span class="detail">VIEW DETAIL →<span></span></span>
                      </div>
                    </div>
                  </a>
                  <div class="site"><a href="http://www.villalodola.jp/" target="_blank"><span>BRAND SITE</span></a></div>
                </div>     
            <?php 
              endwhile;
            }
            ?>
        </div>
      </div>
      <a href="#" class="prev"><div class="bg"></div><div class="arrow"><span></span></div></a>
      <a href="#" class="next"><div class="bg"></div><div class="arrow"><span></span></div></a>
      <ul class="navi">
        <li><a href="#"><span></span></a></li>
        <li><a href="#"><span></span></a></li>
        <li><a href="#"><span></span></a></li>
      </ul>
    </div>
  </section>



  <!-- /////////////////////////////////////////////////////////////////////////
     topLinks
  //////////////////////////////////////////////////////////////////////////////-->
  <section id="topLinks">
    <h2>LINKS</h2>
    <ul class="view">
      <li class="list01"><a href="./beauty/" class="pageLink"><span class="text">VIEW ALL FOR HAIR DESINGERS</span><span class="arrow"><span class="arrow_img">→</span></span><span class="line"></span></a></li>
      <li class="list02"><a href="./brand/" class="pageLink"><span class="text">VIEW ALL BRAND</span><span class="arrow"><span class="arrow_img">→</span></span><span class="line"></span></a></li>
      <li class="list03"><a href="#" class="pageLink"><span class="text">VIEW ALL GROUP</span><span class="arrow"><span class="arrow_img">→</span></span><span class="line"></span></a></li>
    </ul>
    <ul class="navi">
      <li><a href="list01" class="active">FOR HAIR DESIGNER<span></span></a></li>
      <li><a href="list02">BRAND<span></span></a></li>
      <li><a href="list03">GROUP<span></span></a></li>
    </ul>

    <!-- FOR HAIR DESIGNER LIST -->
    <?php
        // GET BLOG POSTS
        $shortcode_blog_query = new WP_Query(array(
          'post_type' => 'milbon-links',
          'tax_query' => array(
              array(
                'taxonomy' => 'link_category',
                'field' => 'slug',
                'terms' => 'hairdesign-slug'
              )
           ),
          'showposts' => 4,
          'order' => 'ASC'
        ));
    ?>
    <div class="list list01">
    <?php if ( $shortcode_blog_query->have_posts() ) {
      while($shortcode_blog_query->have_posts()) : $shortcode_blog_query->the_post(); ?>
      <div class="column">
        <a href="<?php echo get_post_meta($post->ID, "_location", true); ?>" target="_blank">
          <div class="visual"><img src="
            <?php
              if ( has_post_thumbnail($post->ID) ) :
                  get_featured_url($post->ID);
              endif;
           ?>
           " height="126" width="224" alt="<?php the_title(); ?>"></div>
          <div class="defalt"><span><?php the_title(); ?></span></div>
          <div class="over"><div class="bg"></div><span><?php the_title(); ?><p><?php the_content(); ?></p></span><p class="icon">VISIT SITE</p></div>
        </a>
      </div>
      <?php
        endwhile;
      }
      wp_reset_query();
      ?>

    </div>


    <!-- BRAND LIST -->
     <?php
      // GET BLOG POSTS
        $shortcode_blog_query = new WP_Query(array(
          'post_type' => 'milbon-links',
          'tax_query' => array(
              array(
                'taxonomy' => 'link_category',
                'field' => 'slug',
                'terms' => 'brand-slug'
              )
           ),
          'showposts' => 4,
          'order' => 'ASC'
        ));

    ?>

    <div class="list list02">
      <?php if ( $shortcode_blog_query->have_posts() ) {
      while($shortcode_blog_query->have_posts()) : $shortcode_blog_query->the_post(); ?>
      <div class="column">
        <a href="<?php echo get_post_meta($post->ID, "_location", true); ?>" target="_blank">
          <div class="visual"><img src="
            <?php
              if ( has_post_thumbnail($post->ID) ) :
                  get_featured_url($post->ID);
              endif;
           ?>
           " height="126" width="224" alt="<?php the_title(); ?>"></div>
          <div class="defalt"><span><?php the_title(); ?></span></div>
          <div class="over"><div class="bg"></div><span><?php the_title(); ?><p><?php the_content(); ?></p></span><p class="icon">VISIT SITE</p></div>
        </a>
      </div>
      <?php
        endwhile;
      }
      ?>
    </div>

    <!-- GROUP LIST -->
     <?php
      // GET BLOG POSTS
        $shortcode_blog_query = new WP_Query(array(
          'post_type' => 'milbon-links',
          'tax_query' => array(
              array(
                'taxonomy' => 'link_category',
                'field' => 'slug',
                'terms' => 'group-slug'
              )
           ),
          'showposts' => 4,
          'order' => 'ASC'
        ));

    ?>

    <div class="list list03">
      <?php if ( $shortcode_blog_query->have_posts() ) {
      while($shortcode_blog_query->have_posts()) : $shortcode_blog_query->the_post(); ?>
      <div class="column">
        <a href="<?php echo get_post_meta($post->ID, "_location", true); ?>" target="_blank">
          <div class="visual"><img src="
            <?php
              if ( has_post_thumbnail($post->ID) ) :
                  get_featured_url($post->ID);
              endif;
           ?>
           " height="126" width="224" alt="<?php the_title(); ?>"></div>
          <div class="defalt"><span><?php the_title(); ?></span></div>
          <div class="over"><div class="bg"></div><span><?php the_title(); ?><p><?php the_content(); ?></p></span><p class="icon">VISIT SITE</p></div>
        </a>
      </div>
      <?php
        endwhile;
      }
      ?>
    </div>
  </section>

  <!-- /////////////////////////////////////////////////////////////////////////
     topNews
  //////////////////////////////////////////////////////////////////////////////-->
  <section id="topNews">
    <h2>NEWS</h2>
    <ul class="view">
      <li><a href="<?php echo esc_url( get_post_type_archive_link( 'milbon-news' ) ); ?>" class="pageLink"><span class="text">VIEW ALL NEWS</span><span class="arrow"><span class="arrow_img">→</span></span><span class="line"></span></a></li>
    </ul>
    <!-- NEWS LIST -->
    <?php
      // GET BLOG POSTS
      $shortcode_blog_query = new WP_Query(array(
        'post_type' => 'milbon-news',
        'showposts' => 4,
        'order' => 'ASC'
      ));
    ?>
    <div class="list">
      <?php if ( $shortcode_blog_query->have_posts() ) {
      while($shortcode_blog_query->have_posts()) : $shortcode_blog_query->the_post(); ?>
      <div class="column">
        <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="pageLink" target="_self">
          <div class="visual"><img src="
            <?php
              if ( has_post_thumbnail($post->ID) ) :
                  get_featured_url($post->ID);
              endif;
           ?>
           " height="126" width="224" alt="<?php the_title(); ?>"></div>
          <div class="meta"><span class="category">
            <?php 
              get_first_cateogry($post->ID, 'news_category');
            ?>
              
            </span> ｜ <span class="date">
              <?php
                the_date('Y-m-d'); 
              ?>
            
            </span></div>
            <p><?php the_title();?></p>
          <div class="more"><span class="t">READ MORE →</span><span class="line"></span></div>
        </a>
      </div>
      <?php
        endwhile;
      }
      ?>

    </div>
  </section>


<?php get_footer(); ?>
