<?php
// Get all categories
$categories = get_terms(
    array(
        'taxonomy' => 'category',
        'hide_empty' => false,
    )
);

// Output the categories with HTML tags
if ($categories) {
    foreach ($categories as $category) {
        echo '<a type="button" class="btn btn-outline-light rounded-0 position-relative btn-sm me-3" href="' . get_category_link($category->term_id) . '">' . $category->name . ' <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">' . $category->count . '<span class="visually-hidden">unread messages</span></span></a>';
    }
} else {
    echo 'No categories found.';
}