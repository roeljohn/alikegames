<?php

// Specify the category ID
$category_id = get_queried_object_id();

// Get the post IDs associated with the category
$post_ids = get_posts(array(
    'fields' => 'ids',
    'post_type' => 'post',
    'posts_per_page' => -1,
    'category__in' => $category_id,
));

// Get tags for the specified category
$tags = get_terms(array(
    'taxonomy' => 'post_tag',
    'object_ids' => $post_ids,
    'orderby' => 'count',
    'order' => 'DESC',
));

// Output the tags and their counts
if ($tags) {
    foreach ($tags as $tag) {
        echo '<a type="button" class="btn btn-outline-light position-relative btn-sm me-3" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . ' <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">' . $tag->count . '</span></a>';
    }
} else {
    echo 'No tags found for the specified category.';
}