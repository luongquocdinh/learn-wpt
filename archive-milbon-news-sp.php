<?php get_header('sp'); ?>

    <!-- /////////////////////////////////////////////////////////////////////////
           news
        //////////////////////////////////////////////////////////////////////////////-->
    <section id="news">
        <header class="header">
            <h1>TIN TỨC</h1>
            <div class="category">
                <div class="btn"><a href="#"><span>CHỌN DANH MỤC</span></a></div>
                <?php
                $terms = get_terms( array(
                    'taxonomy' => 'news_category',
                    'hide_empty' => false,
                ) );
                ?>
                <div class="pullDown">
                    <ul>
                        <li><a href="<?php echo esc_url( get_post_type_archive_link( 'milbon-news' ) ); ?>">TẤT CẢ</a></li>
                    <?php
                    if( !empty( $terms ) ) :
                        foreach ( $terms as $term ) :
                    ?>
                    <li>
                        <a href="<?php echo esc_url(get_category_link( get_cat_ID($term->name)) ); ?>" class="pageLink category-filter" data-slug="<?php echo esc_attr( $term->slug ) ?>">
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
        <!-- ▼一覧　8件表示 -->
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
                <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="" target="_blank">
                    <div class="visual">
                        <img src="<?php
                    if ( has_post_thumbnail($post->ID) )
                        echo get_featured_url($post->ID);
                    else
                        echo get_template_directory_uri().'/images/no_image.jpg'; ?>" height="126" width="224" alt="<?php echo get_the_title( $post->ID ); ?>">
                    </div>
                    <div class="sum">
                        <div class="meta">
                            <span class="category"><?php echo esc_html( $milbon_brands_term ); ?></span> ｜ <span class="date"><?php echo get_the_date('Y-m-d', $post->ID); ?></span>
                        </div>
                        <p><?php the_title(); ?></p>
                        <div class="more">Xem thêm →</div>
                    </div>
                </a>
            </div>
             <?php
                endforeach;
            endif;
            ?>

        </section>
    </section>

<?php get_footer('sp'); ?>