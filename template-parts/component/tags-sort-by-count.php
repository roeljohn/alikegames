<?php
// Get all tags
$tags = get_tags(array(
    'hide_empty' => false, // Set to false to include tags with no posts
));

// Sort the tags based on the post count
usort($tags, function ($a, $b) {
    return $b->count - $a->count;
});

foreach ($tags as $tag) {
    echo '<a type="button" class="btn btn-outline-light rounded-0 position-relative btn-sm btn-sm me-3 mb-3" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . ' <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">' . $tag->count . '</span></a>';
}