<?php get_header('sp'); ?>

    <section id="office" class="detail">
        <nav id="breadcrumb">
            <ul>
                <li>CÔNG TY</li>
                <li>CÁC CHI NHÁNH</li>
            </ul>
        </nav>
        <?php while(have_posts()): the_post(); ?>
        <section class="contents">
            <?php
            //var_dump(get_post_meta(get_the_ID(), '_office_slider_shortcode_milbon', true));
            echo do_shortcode(get_post_meta(get_the_ID(), '_office_slider_shortcode_milbon', true));
            ?>
            <div class="detail">
                <h2><?php echo get_the_title(); ?></h2>
                <?php the_content(); ?>
            </div>
        </section>
        <?php endwhile; ?>
    </section>



<?php get_footer('sp'); ?>