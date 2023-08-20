<?php

// Get the current tag ID
$current_tag_id = get_queried_object_id();

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'tag__in' => array($current_tag_id),
    'orderby' => 'rand',
);
// Create a new instance of WP_Query
$query = new WP_Query($args);

// Output the related posts
if ($query->have_posts()) {
    echo '<ul class="alert alert-light related-posts list-unstyled border-0 rounded-0" role="alert">';
    while ($query->have_posts()) {
        $query->the_post();
        echo '<li>';
        echo '<a class="text-white" href="' . get_permalink() . '">' . get_the_title() . '</a>';
        echo '</li>';
    }
    echo '</ul>';
    // Restore original post data
    wp_reset_postdata();
} else {
    echo 'No related posts found.';
}