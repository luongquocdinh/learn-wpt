<?php get_header(); ?>

<div id="contents" class="office_detail">

    <!-- /////////////////////////////////////////////////////////////////////////
       breadcrumb
    //////////////////////////////////////////////////////////////////////////////-->
    <nav id="breadcrumb">
        <ul>
            <li><a href="../../" class="pageLink">TOP<span></span></a></li>
            <li><a href="../../company/gaiyou.html" class="pageLink">COMPANY<span></span></a></li>
            <li><a href="../../company/office/" class="pageLink">OUR OFFICE<span></span></a></li>
            <li><a href="../../company/office/office01" class="pageLink">本社・中央研究所<span></span></a></li>
        </ul>
    </nav>
    <?php while(have_posts()): the_post(); ?>
    <section id="office">
        <div class="btn_return"><a href="./" class="pageLink"><span class="arrow"><span class="arrow_img">←</span></span><span class="text">VIEW ALL OFFICE</span><span class="line"></span></a></div>
        <header class="header">
            <h1><?php echo get_the_title(); ?></h1>
            <p>［ 拠点一覧 ］</p>
        </header>
        <section class="contents">
            <div class="imageArea">
                <?php
                    //var_dump(get_post_meta(get_the_ID(), '_office_slider_shortcode_milbon', true));
                    echo do_shortcode(get_post_meta(get_the_ID(), '_office_slider_shortcode_milbon', true));
                ?>
            </div>
            <div class="detail">
                <?php the_content(); ?>
            </div>
        </section>
    </section>
    <?php endwhile; ?>
</div><!-- end contents -->
<?php get_footer(); ?>
