<?php get_header('sp'); ?>


    <!-- /////////////////////////////////////////////////////////////////////////
products
//////////////////////////////////////////////////////////////////////////////-->

    <section id="products" class="product_detail">
        <!-- メインビジュアル -->
        <div class="mainvisual">
            <!-- CMS:ブランド画像 -->
            <img src="<?php echo get_template_directory_uri(); ?>/files/img/brand/2016/04/20160415160646_1.png">
        </div>

        <!-- 詳細 -->
        <article class="detail">
            <section class="detail_main">
                <!-- CMS:ブランド名 -->
                <h1><img src="<?php echo get_template_directory_uri(); ?>/files/img/brand/2016/05/20160521133208_1.jpg" alt="<?php echo get_the_title(); ?>"></h1>
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
                    else:
                        ?>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>
                </div>

                <h3>COLLECTION</h3>
                <!-- CMS:商品一覧 -->
                <div class="product_list">

                    <!-- ▼商品項目 -->
                    <div class="column">
                        <!-- CMS:商品URL -->
                        <a href="../../../brand/product/65">
                            <!-- CMS:商品画像 -->
                            <div class="image">
                                <img src="<?php echo get_template_directory_uri(); ?>/files/img/product/2016/05/20160521142931_1.png" alt="プラーミア　リファイニング"/>                                        <span></span>
                            </div>
                            <!-- CMS:商品目名 -->
                            <p class="productName">プラーミア　リファイニング</p>
                        </a>
                    </div>

                </div>
            </section>

            <a href="<?php echo esc_url( home_url( '/' ) ) . 'brand_tenpan/';?>" class="btn_about_product">Về sản phẩm của Milbon</a>

            <nav class="navigation">
                <ul>
                    <li class="prev">
                        <a href="<?php echo esc_url(get_permalink(get_previous_post()->ID)); ?>"></a>
                    </li>
                    <li class="all"><a href="<?php echo esc_url(get_post_type_archive_link( 'milbon-brands' )); ?>">View ALL Brands</a></li>
                    <li class="next">
                        <a href="<?php echo esc_url(get_permalink(get_next_post()->ID)); ?>"></a>
                    </li>
                </ul>
            </nav>
        </article>
    </section>

<?php get_footer('sp'); ?>