<?php
// Specify the post ID
$post_id = get_the_ID(); // Replace with your post ID

// Get the tags for the specified post
$tags = wp_get_post_tags($post_id);

// Randomize the order of the tags
shuffle($tags);

// Output the tags
if ($tags) {
    echo '<ul class="list-group list-group-flush text-white">';
    $counter = 0;
    foreach ($tags as $tag) {
        echo '<li class="list-group-item bg-body-tertiary border-0"> <i class="fa-solid fa-tag"></i> <a class="text-white" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
        ' . $tag->count . '
        <span class="visually-hidden">unread messages</span>
      </span></a></li>';
        $counter++;
        if ($counter >= 5) {
            break;
        }
    }
    echo '</ul>';
} else {
    echo '<div class="p-3">';
    echo 'No related posts found.';
    echo '</div>';
}