<?php
// Get the current post's tags
$current_post_tags = get_the_tags();

if ($current_post_tags) {
    // Create an array of tag IDs
    $tag_ids = array();
    foreach ($current_post_tags as $tag) {
        $tag_ids[] = $tag->term_id;
    }

    // Get related posts based on the selected tags
    if (isset($_GET['filtered_tags'])) {
        $filtered_tag_ids = $_GET['filtered_tags'];

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'tag__in' => $filtered_tag_ids,
            'post__not_in' => array(get_the_ID()), // Exclude the current post
        );

        $related_posts_query = new WP_Query($args);

        if ($related_posts_query->have_posts()) {
            echo '<ul>';
            while ($related_posts_query->have_posts()) {
                $related_posts_query->the_post();
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
            wp_reset_postdata();
        } else {
            echo 'No related posts found.';
        }
    }

    // Display the filter form
    echo '<form action="" method="get">';
    foreach ($current_post_tags as $tag) {
        echo '<label><input type="checkbox" name="filtered_tags[]" value="' . $tag->term_id . '"> ' . $tag->name . '</label><br>';
    }
    echo '<input type="submit" value="Filter">';
    echo '</form>';
}
?>