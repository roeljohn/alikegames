<?php
// Specify the menu location or slug
$menu_location = 'footer-right';

// Retrieve the menu
$menu_items = wp_get_nav_menu_items($menu_location);

// Display the menu
if ($menu_items) {
    echo '<ul class="nav">';

    foreach ($menu_items as $menu_item) {
        echo '<li class="nav-item"><a class="nav-link link-body-emphasis px-2" href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
    }

    echo '</ul>';
} else {
    echo 'Menu not found.';
}