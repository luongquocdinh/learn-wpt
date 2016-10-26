<?php
/**
 * Template Name: Page Office
 *
 * @package WordPress
 * @subpackage Milbon
 */
get_header();
?>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/company/office/script.js"></script>
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
                <li><a href="../../company/gaiyou.html" class="pageLink">CÔNG TY<span></span></a></li>
                <li><a href="../../company/office/" class="pageLink">CÁC CHI NHÁNH<span></span></a></li>
            </ul>
        </nav>

        <?php
        $args = array(
            'posts_per_page'    => -1,
            'category_name'     => 'office'
        );
        $query = new WP_Query($args);
        $posts = array();
        ?>

        <section id="officeImage">
            <div class="slideArea">
                <ul>
                    <?php
                    if($query->have_posts()):
                        while($query->have_posts()):
                            $query->the_post();
                            ?>
                            <li>
                                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                            </li>
                            <?php
                            array_push($posts, array('title' => get_the_title(), 'excerpt' => get_the_excerpt(), 'permanlink' => get_the_permalink()));
                        endwhile;
                        wp_reset_query();
                    endif;
                    ?>
                </ul>
            </div>
        </section>

        <section id="office">
            <header class="header">
                <h1>OUR OFFICE</h1>
                <!-- <p>［ 拠点一覧 ］</p> -->
            </header>
            <section class="contents list">
                <h2>［ 国内拠点一覧 ］　<a href="http://www.milbon.com/ja/about/#network" target="_blank">海外拠点</a></h2>
                <div class="list">
                    <?php
                    if(!empty($posts)):
                        foreach($posts as $value):
                            ?>
                            <div class="column">
                                <a href="<?php echo $value['permanlink']; ?>" class="pageLink">
                                    <dl>
                                        <dt><?php echo $value['title']; ?></dt>
                                        <dd><?php echo $value['excerpt']; ?></dd>
                                    </dl>
                                </a>
                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </section>
        </section>
    </div><!-- end contents -->
<?php
get_footer();
?>