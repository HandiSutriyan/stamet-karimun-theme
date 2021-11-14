<?php
get_header();

while(have_posts()) {
    the_post(); ?>
    <h2>Ini Haaman Page bukan Post </h2>
    <h2><?php the_title() ?></h2>
    <p><?php the_content() ?></p>
    <?php  }
get_footer( );
?>