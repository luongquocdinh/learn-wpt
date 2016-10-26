<?php get_header('sp'); ?>
<?php
while ( have_posts() ) :
    the_post();
    the_content();
endwhile;
?>
<?php get_footer('sp'); ?>