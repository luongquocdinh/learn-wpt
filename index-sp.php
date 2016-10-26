<?php get_header('sp'); ?>

    <!-- /////////////////////////////////////////////////////////////////////////
         top
      //////////////////////////////////////////////////////////////////////////////-->
    <section id="top">
        <ul>
            <li><img src="<?php echo get_template_directory_uri(); ?>/images-sp/top/visual.jpg" height="700" width="1200" alt=""></li>
        </ul>
        <!-- <h1><img src="img/top/top_copy.png" height="18" width="349" alt="美しさを拓く。MILBON"></h1> -->
        <div class="scrolldown"><a href="#"><span class="text">CUỘN XUỐNG</span><span class="arrow"><span class="arrow_img"></span></span></a></div>
    </section>

    <!-- /////////////////////////////////////////////////////////////////////////
       comment
    //////////////////////////////////////////////////////////////////////////////-->
    <section id="comment">
        <!-- <p>この度の熊本地方の地震により被災された皆さまに、心よりお見舞い申し上げます。一日も早い復旧をお祈り申し上げます。</p> -->
    </section>

    <!-- /////////////////////////////////////////////////////////////////////////
       topBrand
    //////////////////////////////////////////////////////////////////////////////-->
    <section id="topBrand">
        <h2>DÒNG SẢN PHẨM</h2>
        <div class="slide-area">
            <div class="slide-inner flexslider">
                <ul class="slides">
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

                    if ( $shortcode_blog_query->have_posts()) :
                        while($shortcode_blog_query->have_posts()) : $shortcode_blog_query->the_post(); ?>
                    ?>

                    <!-- slide -->
                    <li class="column">
                        <div class="visual">
                            <img src="
                            <?php
                            if ( has_post_thumbnail($post->ID) ) :
                                get_featured_url($post->ID);
                            endif;
                            ?>" height="450" width="800" alt="<?php the_title(); ?>">
                            <div class="site"><a href="http://www.aujua.com/product/" target="_blank"><span>BRAND SITE</span></a></div>
                        </div>
                        <div class="date">
                            <span class="category"><?php echo get_first_cateogry($post->ID, 'brand_category'); ?></span> ｜ <span class="day"><?php the_date('Y-m-d'); ?> UPDATE</span></div>
                        <div class="over">
                            <div class="over-inner">
                                <p class="brandName"><img src="<?php echo get_template_directory_uri(); ?>/images/top/top_brand_hoverlogo_aujua.png" height="35" width="200" alt="Aujua"></p>
                                <p class="category">
                                    <?php echo get_first_cateogry($post->ID, 'brand_category'); ?>
                                </p>
                                <p class="ja"><?php
                                    if (get_post_meta($post->ID,'_title_japanese', true) != '') {
                                        echo esc_html( "[" . get_post_meta($post->ID,'_title_japanese', true) . "]" );
                                    }
                                    ?></p>
                                <a href="<?php echo esc_url( get_permalink( $post->ID ) );  ?>">CHI TIẾT →<span></span></a>
                            </div>
                        </div>
                    </li>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
        <a href="<?php echo esc_url(get_post_type_archive_link( 'milbon-brands' )); ?>" class="view"><span>XEM TOÀN BỘ SẢN PHẨM →</span></a>
    </section>


    <!-- /////////////////////////////////////////////////////////////////////////
       topLinks
    //////////////////////////////////////////////////////////////////////////////-->
    <section id="topLinks">
        <h2>LINKS</h2>
        <ul class="navi">
            <li><a href="list01" class="active">DÀNH CHO NHÀ TẠO MẪU TÓC<span></span></a></li>
            <li><a href="list02">SẢN PHẨM<span></span></a></li>
            <li><a href="list03">NHÓM<span></span></a></li>
        </ul>

        <!-- BEAUTY LIST -->
        <div class="list list01">
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
            if ( $shortcode_blog_query->have_posts() ) :
                while($shortcode_blog_query->have_posts()) : $shortcode_blog_query->the_post();
            ?>
            <div class="column">
                <a href="<?php echo get_post_meta($post->ID, "_location", true); ?>" target="_blank">
                    <div class="visual"><img src="
                        <?php
                        if ( has_post_thumbnail($post->ID) ) :
                            get_featured_url($post->ID);
                        endif;
                        ?>" height="126" width="224" alt="<?php the_title(); ?>">
                    </div>
                    <div class="defalt">
                        <p class="title"><?php the_title(); ?></p>
                    </div>
                </a>
            </div>
            <?php
                endwhile;
                wp_reset_query();
            endif;
            ?>
        </div>


        <!-- BRAND LIST -->
        <div class="list list02">
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

        if ( $shortcode_blog_query->have_posts() ) :
            while($shortcode_blog_query->have_posts()) : $shortcode_blog_query->the_post();
        ?>
        <div class="column">
                <a href="http://www.aujua.com/product/"  target="_blank">
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
                        <p class="title"><?php the_title(); ?>
                            <span class="title_ja">
                                <?php
                                if (get_post_meta($post->ID,'_title_japanese', true) != '') {
                                    echo esc_html( "[" . get_post_meta($post->ID,'_title_japanese', true) . "]" );
                                }
                                ?>
                            </span>
                        </p>
                    </div>
                </a>
            </div>
        <?php
            endwhile;
        wp_reset_query();
        endif;
        ?>
        </div>


        <!-- GROUP LIST -->
        <div class="list list03">
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
                while($shortcode_blog_query->have_posts()) : $shortcode_blog_query->the_post(); ?>
            ?>
            <div class="column">
                <a href="<?php echo get_post_meta($post->ID, "_location", true); ?> " target="_blank">
                    <div class="visual">
                        <img src="<?php
                        if ( has_post_thumbnail($post->ID) ) :
                            get_featured_url($post->ID);
                        endif;
                        ?>" height="126" width="224" alt="<?php the_title(); ?>"></div>
                    <div class="defalt">
                        <p class="title"><?php the_title(); ?><span class="title_ja"><?php
                                if (get_post_meta($post->ID,'_title_japanese', true) != '') {
                                    echo esc_html( "[" . get_post_meta($post->ID,'_title_japanese', true) . "]" );
                                }
                                ?></span></p>
                    </div>
                </a>
            </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>


    </section>

    <!-- /////////////////////////////////////////////////////////////////////////
       topNews
    //////////////////////////////////////////////////////////////////////////////-->
    <section id="topNews">
        <h2>TIN TỨC</h2>
        <!-- NEWS LIST -->
        <div class="list">
            <?php
            // GET BLOG POSTS
            $shortcode_blog_query = new WP_Query(array(
                'post_type' => 'milbon-news',
                'showposts' => 4,
                'order' => 'ASC'
            ));
            if ( $shortcode_blog_query->have_posts() ) :
                while($shortcode_blog_query->have_posts()) : $shortcode_blog_query->the_post();
            ?>
            <div class="column">
                <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="" target="_blank">
                    <div class="visual">
                        <img src="
                        <?php
                            if ( has_post_thumbnail($post->ID) )
                                echo get_featured_url($post->ID);
                            else
                                echo get_template_directory_uri() . '/images/no_image.jpg"';

                        ?>
                        " width="224" height="126" alt="<?php the_title(); ?>"./>                      </div>
                    <div class="sum">
                        <div class="meta">
                            <span class="category"><?php echo get_first_cateogry($post->ID, 'news_category'); ?></span> ｜ <span class="date"><?php
                                the_date('Y-m-d');
                                ?></span></div>
                        <p><?php the_title(); ?></p>
                        <div class="more">READ MORE →</div>
                    </div>
                </a>
            </div>
            <?php
                endwhile;
            endif;
            ?>

        </div>
        <a href="./news" class="view"><span>Xem toàn bộ tin tức →</span></a>
    </section>

<?php get_footer('sp'); ?>