<?php
// Get the comments for the current post
$comments = get_comments(array(
    'post_id' => get_the_ID(),
    'status' => 'approve', // Show only approved comments
));

// Check if there are comments
if ($comments) {
    echo '<ul class="comment-list list-unstyled">';
    foreach ($comments as $comment) {
        // Display each comment
        ?>
        <li class="comment">
            <div class="comment-author">
                <span class="comment-author-name"><?php echo get_comment_author(); ?></span>
                <span class="comment-date"><?php echo get_comment_date(); ?></span>
            </div>
            <div class="comment-content"><?php echo wpautop($comment->comment_content); ?></div>
        </li>
        <?php
    }
    echo '</ul>';
}
