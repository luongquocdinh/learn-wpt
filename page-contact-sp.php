<?php get_header('sp');

while ( have_posts() ) :
    the_post();
    the_content();
endwhile;

get_footer('sp');
