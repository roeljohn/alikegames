<?php

function remove_p_tag_from_excerpt($excerpt) {
    $excerpt = str_replace('<p>', '', $excerpt);
    $excerpt = str_replace('</p>', '', $excerpt);
    return $excerpt;
}
add_filter('the_excerpt', 'remove_p_tag_from_excerpt');