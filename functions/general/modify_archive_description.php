<?php

function remove_p_tag_from_the_archive_description($excerpt) {
    $excerpt = str_replace('<p>', '', $excerpt);
    $excerpt = str_replace('</p>', '', $excerpt);
    return $excerpt;
}
add_filter('get_the_archive_description', 'remove_p_tag_from_the_archive_description');