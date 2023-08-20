<?php

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'orderby' => 'rand',
);
// Create a new instance of WP_Query
$query = new WP_Query($args);

// Output the related posts
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        get_template_part( 'template-parts/component/card');
    }
    // Restore original post data
    wp_reset_postdata();
} else {
    echo '<div class="p-3">';
    echo 'No related posts found.';
    echo '</div>';
}

