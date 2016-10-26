<?php
get_header('sp');
?>
<script src="<?php echo get_template_directory_uri(); ?>/js-sp/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js-sp/concept/script.js"></script>
 <!-- /////////////////////////////////////////////////////////////////////////
concept
    //////////////////////////////////////////////////////////////////////////////-->
    <section id="concept">
      <header class="header">
        <h1>TRIẾT LÝ</h1>
      </header>
      <section class="movie">
        <div id="player"></div>
        <a href="#" class="btn_play"><img src="<?php echo get_template_directory_uri(); ?>/images-sp/concept/movie.jpg" alt=""></a>
      </section>
      <section class="about">
          <?php
          while ( have_posts() ) :
              the_post();
              the_content();
          endwhile;
          ?>
      </section>
      <section class="product">
          <a href=".<?php echo esc_url( home_url( '/' ) ) . 'brand_tenpan/';?>">
        <h3>VỀ SẢN PHẨM CỦA MILBON</h3>
        <div class="ja"></div>
        <div class="view">CHI TIẾT →</div>
      </a>
      </section>

          <!-- GROUP LIST -->
      <section class="list">
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

          if ( $shortcode_blog_query->have_posts() ) :
            while($shortcode_blog_query->have_posts()) : $shortcode_blog_query->the_post();
          ?>
        <div class="column">
            <a href="<?php echo get_post_meta($post->ID, "_location", true); ?>" target="_blank">
            <div class="visual">
                <img src="
                    <?php
                if ( has_post_thumbnail($post->ID) ) :
                    get_featured_url($post->ID);
                endif;
                ?>
                " height="126" width="224" alt="<?php the_title(); ?>">
            </div>
            <div class="defalt">
              <p class="title"><?php the_title(); ?></p>
              <p class="title_ja">
                  <?php
                  if (get_post_meta($post->ID,'_title_japanese', true) != '') {
                      echo esc_html( "[" . get_post_meta($post->ID,'_title_japanese', true) . "]" );
                  }
                  ?>
              </p>
            </div>
          </a>
        </div>
        <?php
            endwhile;
          wp_reset_query();
          endif;
          ?>
      </section>
    </section>

<?php get_footer('sp'); ?>

