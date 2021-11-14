<?php
function stamet_files(){
    wp_enqueue_style( 'stamet_main_styles', get_stylesheet_uri());
}


add_action('wp_enqueue_scripts','stamet_files');