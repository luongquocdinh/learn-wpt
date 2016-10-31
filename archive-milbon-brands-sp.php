<?php get_header('sp'); ?>


    <!-- /////////////////////////////////////////////////////////////////////////
products
//////////////////////////////////////////////////////////////////////////////-->
    <section id="products">
        <header class="header">
            <h1>SẢN PHẨM</h1>
            <a href="<?php echo esc_url( home_url( '/' ) ) . 'brand_tenpan/';?>" class="btn_about_product">Về sản phẩm của Milbon</a>
            <div class="category">
                <div class="btn"><a href="#"><span>CHỌN DANH MỤC</span></a></div>
                <div class="pullDown">
                    <?php
                    $terms = get_terms( array(
                        'taxonomy' => 'brand_category',
                        'hide_empty' => true,
                    ) );
                    ?>
                    <ul>
                        <li><a href="<?php echo esc_url( get_post_type_archive_link( 'milbon-brands' ) ); ?>">Tất cả</a></li>
                        <?php
                        if( !empty( $terms ) ) :
                            foreach ( $terms as $term ) :
                                ?>
                                <li>
                                    <a href="<?php echo esc_url(get_category_link( get_cat_ID($term->name)) ); ?>">
                                        <?php echo esc_html( $term->name ) ?>
                                    </a>
                                </li>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
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
            foreach ( $query->posts as $post ):

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
                <div class="brandName"><?php echo esc_html( get_the_title( $post->ID ) ); ?></div>
                <div class="ja">
                    <?php
                    if (get_post_meta($post->ID,'_title_japanese', true) !== '') {
                        echo esc_html( "[" . get_post_meta($post->ID,'_title_japanese', true) . "]" );
                    }
                    ?>
                </div>
                <div class="visual view"><a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>">
                        <img src="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ) ); ?>" height="139" width="300" alt="<?php echo esc_html( get_the_title( $post->ID ) ); ?>">
                    </a>
                </div>
                <div class="date"><span class="category"><?php echo esc_html( $milbon_brands_term ); ?></span> ｜ <span class="day"><?php echo get_the_date('Y-m-d', $post->ID); ?></span></div>
                <p><?php echo wp_kses_post( nl2br( wp_trim_words(get_the_excerpt( $post->ID ), 15, ' [...]') ) ); ?></p>
                <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>"><div class="more">CHI TIẾT →</div></a>
            </div>
            <?php
                endforeach;
            endif;
            ?>

        </section>
    </section>

<?php get_footer('sp'); ?>