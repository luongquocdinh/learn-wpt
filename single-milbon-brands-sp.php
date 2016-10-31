<?php get_header('sp'); ?>


    <!-- /////////////////////////////////////////////////////////////////////////
products
//////////////////////////////////////////////////////////////////////////////-->

    <section id="products" class="product_detail">
        <!-- メインビジュアル -->
        <div class="mainvisual">
            <!-- CMS:ブランド画像 -->
            <img src="<?php
            $image_id =  get_post_meta($post->ID, '_attachment_file_id', true);
            if($image_id === '')
                echo get_template_directory_uri().'/images/no_image_brand.jpg';
            else
                echo wp_get_attachment_url($image_id);
            ?>">
        </div>

        <!-- 詳細 -->
        <article class="detail">
            <section class="detail_main">
                <!-- CMS:ブランド名 -->
                <h1>
                    <?php
                    $logo_id = get_post_meta($post->ID, '_attachment_logo_id', true);
                    if ($logo_id === '') :
                        echo '';
                    else :
                        ?>
                        <img src="<?php echo wp_get_attachment_url($logo_id); ?>" alt="<?php the_title(); ?>" style="width: 400px; display: block; margin: 0 auto;">
                        <?php
                    endif;
                    ?>
                </h1>
                <!-- ナビゲーション -->
                <nav class="detail_prev">
                    <!-- CMS:前のブランドURL -->
                    <a href="<?php echo esc_url(get_permalink(get_previous_post()->ID)); ?>"></a>
                </nav>
                <nav class="detail_next">
                    <!-- CMS:次のブランドURL -->
                    <a href="<?php echo esc_url(get_permalink(get_next_post()->ID)); ?>"></a>
                </nav>

                <!-- CMS:カテゴリ -->
                <div class="category"><?php echo get_first_cateogry($post->ID, 'brand_category'); ?></div>
                <!-- CMS:ブランド名日本語 -->
                <div class="ja">
                    <?php
                    if (get_post_meta($post->ID,'_title_japanese', true) != '') {
                        echo esc_html( "[" . get_post_meta($post->ID,'_title_japanese', true) . "]" );
                    }
                    ?>
                </div>
                <!-- CMS:本文 -->
                <div class="entry">
                    <?php
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                    wp_reset_query();
                    else:
                        ?>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>
                </div>

                <h3>COLLECTION</h3>
                <!-- CMS:商品一覧 -->
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
                    if ($shortcode_collection_query->have_posts()) :
                        while($shortcode_collection_query->have_posts()) : $shortcode_collection_query->the_post();
                    ?>

                    <!-- ▼商品項目 -->
                    <div class="column">
                        <!-- CMS:商品URL -->
                        <a href="<?php echo esc_url(add_query_arg( 'brandID', $brand_id, get_permalink($post->ID))); ?>">
                            <!-- CMS:商品画像 -->
                            <div class="image">
                                <img src="<?php echo get_featured_url($post->ID); ?>" alt="<?php the_title() ?>"/><span></span>
                            </div>
                            <!-- CMS:商品目名 -->
                            <p class="productName"><?php the_title(); ?></p>
                        </a>
                    </div>
                    <?php
                        endwhile;
                    wp_reset_query();
                    endif;
                    ?>
                </div>
            </section>

            <a href="<?php echo esc_url( home_url( '/' ) ) . 'brand_tenpan/';?>" class="btn_about_product">Về sản phẩm của Milbon</a>

            <nav class="navigation">
                <ul>
                    <li class="prev">
                        <a href="<?php echo esc_url(get_permalink(get_previous_post()->ID)); ?>"></a>
                    </li>
                    <li class="all"><a href="<?php echo esc_url(get_post_type_archive_link( 'milbon-brands' )); ?>">Xem tất cả</a></li>
                    <li class="next">
                        <a href="<?php echo esc_url(get_permalink(get_next_post()->ID)); ?>"></a>
                    </li>
                </ul>
            </nav>
        </article>
    </section>

<?php get_footer('sp'); ?>