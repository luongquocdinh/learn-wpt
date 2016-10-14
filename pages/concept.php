

<script src="<?php echo get_template_directory_uri(); ?>/js/concept/script.js"></script>
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
            <li><a href="../concept/" class="pageLink">CONCEPT<span></span></a></li>
        </ul>
    </nav>


    <section id="concept">
        <a href="../brand/tenpan.html" class="btn_about_product pageLink"><span>ミルボン製品について</span></a>

        <!-- メインビジュアル -->
        <div class="mainvisual">
            <!-- CMS:ブランド画像 -->
            <div class="visual" style="background: url(<?php echo get_template_directory_uri(); ?>/images/concept/mainvisual.jpg) no-repeat center center;background-size: cover;">
                <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/concept/btn_play.png" alt=""></a>
            </div>
        </div>

        <!-- 詳細 -->
        <article class="detail">
            <header class="detail_header">
                <h1>CONCEPT</h1>
                <div class="scrolldown"><a href="#"><span>SCROLL DOWN</span></a></div>
            </header>
            <section class="detail_main">
                <?php
                while ( have_posts() ) :
                    the_post();
                    the_content();
                endwhile;
                ?>
                <section class="product">
                    <a href="../brand/tenpan.html" class="pageLink">
                        <h3>OUR PRODUCT</h3>
                        <div class="ja">［ ミルボン製品について ］</div>
                        <div class="view">VIEW DETAIL →<span class="line"></span></div>
                    </a>
                </section>
            </section>

            <h4>MILBON GROUP SITE</h4>
            <section class="list">
                <div class="column">
                    <a href="http://www.milbon.co.jp/ir/" target="_blank">
                        <div class="visual"><img src="<?php echo get_template_directory_uri(); ?>/images/header_group_image01.jpg" height="126" width="224" alt="IR SITE"></div>
                        <div class="defalt"><span>IR SITE</span></div>
                        <div class="over"><div class="bg"></div><span>IR SITE<p>［ IRサイト ］</p></span><p class="icon">VISIT SITE</p></div>
                    </a>
                </div>
                <div class="column">
                    <a href="http://www.milbon.com/" target="_blank">
                        <div class="visual"><img src="<?php echo get_template_directory_uri(); ?>/images/header_group_image02.jpg" height="126" width="224" alt="GLOBAL SITE"></div>
                        <div class="defalt"><span>GLOBAL SITE</span></div>
                        <div class="over"><div class="bg"></div><span>GLOBAL SITE<p>［ グローバルサイト ］</p></span><p class="icon">VISIT SITE</p></div>
                    </a>
                </div>
                <div class="column">
                    <a href="http://www.milbon.co.jp/recruit/" target="_blank">
                        <div class="visual"><img src="<?php echo get_template_directory_uri(); ?>/images/header_group_image03.jpg" height="126" width="224" alt="RECRUIT SITE 2017"></div>
                        <div class="defalt"><span>RECRUIT SITE 2017</span></div>
                        <div class="over"><div class="bg"></div><span>RECRUIT SITE 2017<p>［ 採用情報サイト ］</p></span><p class="icon">VISIT SITE</p></div>
                    </a>
                </div>
            </section>
        </article>

    </section>
</div><!-- end contents -->