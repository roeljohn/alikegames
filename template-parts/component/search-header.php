<?php
if (is_front_page()) {
    // Logic for the WordPress homepage
    $tagline = get_bloginfo('description');
    echo $tagline;
} else {
    get_search_form();
}