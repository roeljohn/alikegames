<?php
// Get the current post ID
$post_id = get_the_ID();

// Get the current post's categories
$categories = wp_get_post_categories($post_id);

// Get the current post's tags
$tags = wp_get_post_tags($post_id);

// Prepare arguments for WP_Query
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 20,
    'category__in' => $categories,
    'tag__in' => wp_list_pluck($tags, 'term_id'), // Retrieve tag IDs from the tags array
    'post__not_in' => array($post_id), // Exclude the current post
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
    echo '</h4>';
    echo '</ul>';
    // Restore original post data
    wp_reset_postdata();
} else {
    echo 'No related posts found.';
}
