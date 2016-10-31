<?php
get_header('sp');
?>
?><!-- /////////////////////////////////////////////////////////////////////////
beauty
//////////////////////////////////////////////////////////////////////////////-->
<section id="beauty">
    <header class="header">
        <?php
        while ( have_posts() ) :
            the_post();
            echo get_post_meta(get_the_ID(), '_sp_page_content',true);
        endwhile;
        wp_reset_query();
        ?>
    </header>
    <section class="contents">
    <?php
        $loop = new WP_Query( array(
            'post_type' => 'milbon-links',
            'posts_per_page' => 8,
            'tax_query' => array(
                array(
                    'taxonomy' => 'link_category',
                    'field' => 'slug',
                    'terms' => 'hairdesign-slug'
                )
            ),
        )  );
        if($loop->have_posts()):
            while ( $loop->have_posts() ) : $loop->the_post();
    ?>

        <div class="column">
            <a href="<?php echo get_post_meta($post->ID, "_location", true); ?>" target="_blank">
                <img src="<?php the_post_thumbnail_url( 'full' );  ?>" height="126" width="224" alt="<?php echo get_the_title() ?>">
                <h2><?php echo get_the_title() ?></h2>
                <p>
                    <?php echo get_the_content() ?>
                </p>
                <div class="visit"><span>XEM TRANG WEB</span></div>
            </a>
        </div>
    <?php
            endwhile;
        endif;
    ?>
    </section>
</section>
<?php
get_footer('sp');
?>