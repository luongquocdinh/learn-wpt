<?php get_header('sp'); ?>


<?php
while ( have_posts() ) :
    the_post();
    echo get_post_meta(get_the_ID(), '_sp_page_content',true);
endwhile;
wp_reset_query();
?>

<?php get_footer('sp'); ?>