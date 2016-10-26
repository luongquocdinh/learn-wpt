<?php get_header('sp'); ?>
    <script src="<?php echo get_template_directory_uri(); ?>/js-sp/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js-sp/company/office/script.js"></script>

    <section id="office">
        <nav id="breadcrumb">
            <ul>
                <li>CÔNG TY</li>
                <li>CÁC CHI NHÁNH</li>
            </ul>
        </nav>

        <header class="header">
            <h1>CÁC CHI NHÁNH</h1>
        </header>

        <section class="contents">
            <h2>［ 国内拠点一覧 ］　<a href="http://www.milbon.com/ja/about/#network" target="_blank">海外拠点</a></h2>
            <div class="list">
                <?php
                $args = array(
                    'posts_per_page'    => '10',
                    'category_name'     => 'office'
                );
                $query = new WP_Query($args);
                $posts = array();
                if($query->have_posts()):
                    while($query->have_posts()):
                        $query->the_post();
                ?>
                <div class="column">
                    <a href="<?php echo get_the_permalink(); ?>" class="pageLink">
                        <dl>
                            <dt><?php echo get_the_title(); ?></dt>
                            <dd><?php echo get_the_excerpt(); ?></dd>
                        </dl>
                    </a>
                </div>
                <?php
                    endwhile;
                wp_reset_query();
                endif;
                ?>
            </div>
        </section>
    </section>

<?php get_footer('sp'); ?>