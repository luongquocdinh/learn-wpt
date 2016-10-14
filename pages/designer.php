
<!-- /////////////////////////////////////////////////////////////////////////
contents
//////////////////////////////////////////////////////////////////////////////-->
<div id="contents">

    <!-- /////////////////////////////////////////////////////////////////////////
       breadcrumb
    //////////////////////////////////////////////////////////////////////////////-->
    <nav id="breadcrumb">
        <ul>
            <li><a href="../" class="pageLink">TOP<span></span></a></li>
            <li><a href="../beauty/" class="pageLink">FOR HAIR DESIGNER<span></span></a></li>
        </ul>
    </nav>

    <section id="beauty">
        <header class="header">
            <h1>FOR HAIR DESIGNER</h1>
            <p>ミルボンは美容師のみなさまへ向けた様々な活動を行っています。</p>
        </header>

        <section class="list">
            <?php $loop = new WP_Query( array( 'post_type' => 'milbon-links', 'posts_per_page' => 8 ) ); ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                <div class="column">
                    <a href="<?php echo get_post_meta(get_the_ID(), "_title_japanese", true)?>" target="_blank">
                        <div class="visual">
                            <img src="<?php the_post_thumbnail_url( 'full' );  ?>" height="126" width="224" alt="<?php echo get_the_title() ?>">
                        </div>
                        <div class="over">
                            <div class="bg"></div>
                            <span>
                                <?php echo get_the_title() ?>
                                  <p class="text"><?php echo get_the_content() ?></p>
                                  <p class="icon">VISIT SITE</p>
                              </span>
                        </div>
                    </a>
                </div>
            <?php endwhile; wp_reset_query(); ?>
        </section>
    </section>
</div><!-- end contents -->