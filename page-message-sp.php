<?php get_header('sp');

while ( have_posts() ) :
    the_post();
    echo get_post_meta(get_the_ID(), '_sp_page_content',true);
endwhile;

get_footer('sp'); ?>