<?php get_header('sp'); ?>

    <!-- /////////////////////////////////////////////////////////////////////////
news
//////////////////////////////////////////////////////////////////////////////-->
    <section id="news">

        <!-- 詳細 -->
        <article class="detail">
            <!-- CMS:カテゴリ｜更新日 -->

            <div class="meta"><span class="category">TIN TỨC</span> ｜ <span class="date"><?php echo get_the_date('Y-m-d'); ?></span></div>
            <!-- CMS:タイトル -->
            <h2><?php the_title(); ?></h2>
            <!-- CMS:本文 -->
            <div class="entry">
                <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
                else:
                    ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>
            </div>

            <footer class="footer">
                <div class="contact"><a href="<?php echo esc_url( home_url( '/' ) ) . 'contact'; ?>">LIÊN HỆ</a></div>
                <ul class="sns">
                    <li class="sns01"><a href="http://www.facebook.com/share.php?u=http://www.milbon.co.jp/news/detail/91" onclick="window.open(this.href,'facebookwindow','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><span>Share</span></a></li>
                    <li class="sns02"><a href="https://twitter.com/intent/tweet?original_referer=http://www.milbon.co.jp/news/detail/91&amp;text=ミルボンWEBサイトのリニューアルについて&amp;tw_p=tweetbutton&amp;url=http://www.milbon.co.jp/news/detail/91" onclick="window.open(this.href,'tweetwindow','width=550,height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><span>Tweet</span></a></li>
                    <li class="sns03"><a href="https://plus.google.com/share?url=http://www.milbon.co.jp/news/detail/91" onclick="window.open(this.href,'googlewindow','width=530,height=470,personalbar=0,toolbar=0,scrollbars=1,resizable=1');return false;"><span>Share</span></a></li>
                </ul>
            </footer>

        </article>

        <nav class="navigation">
            <ul>
                <li class="prev">
                    <a href="<?php echo esc_url(get_permalink(get_previous_post()->ID)); ?>"></a>
                </li>
                <li class="all"><a href="<?php echo esc_url(get_post_type_archive_link( 'milbon-news' )); ?>">View ALL News</a></li>
                <li class="next">
                    <a href="<?php echo esc_url(get_permalink(get_next_post()->ID)); ?>"></a>
                </li>
            </ul>
        </nav>

    </section>

<?php get_footer('sp'); ?>