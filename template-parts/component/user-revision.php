<?php
// Define the post ID for which you want to list the editors
$post_id = get_the_ID(); // Replace 123 with your actual post ID

// Retrieve post revisions
$revisions = wp_get_post_revisions($post_id);

// Extract user information from revisions
$editors = array();
foreach ($revisions as $revision) {
    $user_id = $revision->post_author;
    $user_info = get_userdata($user_id);

    // Add user information to the editors array
    $editors[$user_id] = $user_info->display_name;
}

// Display the list of editors
echo '<ul>';
foreach ($editors as $user_id => $display_name) {
    echo '<li>' . $display_name . '</li>';
}
echo '</ul>';