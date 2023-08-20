<?php

function custom_remove_tag_base() {
    global $wp_rewrite;
    $wp_rewrite->tag_structure = '%tag%';
}
add_action( 'init', 'custom_remove_tag_base' );



add_theme_support( 'post-thumbnails' );