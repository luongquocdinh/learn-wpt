<?php
/**
 * Template Name: Page Contact
 *
 * @package WordPress
 * @subpackage Milbon
 */
get_header();

while ( have_posts() ) :
    the_post();
    the_content();
endwhile;

get_footer();

