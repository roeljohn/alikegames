<div class="mb-3">
<?php
// Get the current post ID
$post_id = get_the_ID();

// Get the tags for the current post
$tags = wp_get_post_tags($post_id);


// Output the tags with custom HTML
if ($tags) {
    foreach ($tags as $tag) {
        echo '<a type="button" class="btn btn-outline-light rounded-0 position-relative btn-sm btn-sm me-3 mb-3" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . ' <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">' . $tag->count . '</span></a>';
    }
} else {
    echo '<div class="p-3">';
    echo 'No related posts found.';
    echo '</div>';
}
?>
</div>