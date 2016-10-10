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

    <section id="news">
      <header class="header">
        <h1>NEWS</h1>
        <div class="category">
          <div class="btn"><a href="#">CATEGORY SELECT<span></span></a></div>
          <div class="pullDown">
          <ul>
            <li><a class="pageLink" href="../news/index/1">NEWS</a></li>
            <li><a class="pageLink" href="../news/index/2">NEW RELEASE</a></li>
            <li><a class="pageLink" href="../news/index/3">COMPANY</a></li>
          </ul>
          </div>
        </div>
      </header>
      <!-- ▼一覧　CMS: 9件表示 -->
      <section class="list">
         <?php
            // GET BLOG POSTS
            $shortcode_blog_query = new WP_Query(array(
              'post_type' => 'milbon-news',
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
            <a href="<?php echo get_post_meta($post->ID, "_location", true); ?>" class="" target="_blank">
              <div class="visual">
                <img src="
                  <?php
                    if ( has_post_thumbnail($post->ID) ) :
                        get_featured_url($post->ID);
                    endif;
                  ?>" height="126" width="224" ">
              </div>
              <div class="meta">
                <span class="category"><?php the_title(); ?>
                </span> | <span class="date"><?php the_date(); ?></span>
              </div>
              <p>「平成27年度 繊維学会 論文賞」を受賞</p>
              <div class="more"><span class="t">READ MORE →</span><span class="line"></span>
              </div>
            </a>
          </div>
        ?php } ?>
        <?php 
          endwhile;
        }
        ?>
      </section>
    </section>
  </div>

<?php get_footer(); ?>