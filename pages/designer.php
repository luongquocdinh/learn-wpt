
<!-- /////////////////////////////////////////////////////////////////////////
contents
//////////////////////////////////////////////////////////////////////////////-->
<div id="contents">

    <!-- /////////////////////////////////////////////////////////////////////////
       breadcrumb
    //////////////////////////////////////////////////////////////////////////////-->
    <nav id="breadcrumb">
        <ul>
            <li><a href="<?php echo esc_url(home_url('/')) ?>" class="pageLink">TRANG CHỦ<span></span></a></li>
            <li><a href="<?php echo esc_url( home_url( '/' ) ) . 'beauty'; ?>" class="pageLink">DÀNH CHO NHÀ TẠO MẪU TÓC<span></span></a></li>
        </ul>
    </nav>

    <section id="beauty">
        <header class="header">
            <?php
            if(have_posts()) {
                while(have_posts()) {
                    the_post();
                    the_content();
                }
                wp_reset_query();
            }
            ?>

        </header>

        <section class="list">
            <?php $loop = new WP_Query( array(
                'post_type' => 'milbon-links',
                'posts_per_page' => 8,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'link_category',
                        'field' => 'slug',
                        'terms' => 'hairdesign-slug'
                    )
                ),
                ) ); ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                <div class="column">
                    <a href="<?php echo get_post_meta($post->ID, "_location", true); ?>" target="_blank">
                        <div class="visual">
                            <img src="<?php the_post_thumbnail_url( 'full' );  ?>" height="126" width="224" alt="<?php echo get_the_title() ?>">
                        </div>
                        <div class="over">
                            <div class="bg"></div>
                            <span>
                                <?php echo get_the_title() ?>
                                  <p class="text"><?php echo get_the_content() ?></p>
                                  <p class="icon">XEM TRANG WEB</p>
                              </span>
                        </div>
                    </a>
                </div>
            <?php endwhile; wp_reset_query(); ?>
        </section>
    </section>
</div><!-- end contents -->