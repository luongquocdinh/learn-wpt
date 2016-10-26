<?php
get_header('sp');
?>
?><!-- /////////////////////////////////////////////////////////////////////////
beauty
//////////////////////////////////////////////////////////////////////////////-->
<section id="beauty">
    <header class="header">
        <h1>FOR<br>HAIR DESIGNER</h1>
        <p>ミルボンは美容師のみなさまへ向けた<br>
            様々な活動を行っています。</p>
    </header>
    <section class="contents">
    <?php
        $loop = new WP_Query( array( 'post_type' => 'milbon-links', 'posts_per_page' => 8 ) );
        if($loop->have_posts()):
            while ( $loop->have_posts() ) : $loop->the_post();
    ?>

        <div class="column">
            <a href="<?php echo get_post_meta(get_the_ID(), "_title_japanese", true)?>" target="_blank">
                <img src="<?php the_post_thumbnail_url( 'full' );  ?>" height="126" width="224" alt="<?php echo get_the_title() ?>">
                <h2><?php echo get_the_title() ?></h2>
                <p>
                    <?php echo get_the_content() ?>
                </p>
                <div class="visit"><span>VISIT SITE</span></div>
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