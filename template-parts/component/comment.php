<hr/>
<div id="respond">
    <h1 class="comment-reply-title fw-bold">Leave a Comment</h1>
    <form action="<?php echo esc_url(site_url('/wp-comments-post.php')); ?>" method="post" id="commentform">
        <?php if (!is_user_logged_in()) : ?>
            <p class="comment-form-author">
                <input id="author" name="author" type="text" placeholder="Your Name" required>
            </p>
            <p class="comment-form-email">
                <input id="email" name="email" type="email" placeholder="Your Email" required>
            </p>
        <?php endif; ?>
        
        <p class="comment-form-comment">
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" placeholder="Your Comment" required></textarea>
        </p>
        
        <?php // Custom PHP code ?>
        <?php if (is_user_logged_in()) : ?>
        
        <?php else : ?>
            <p class="comment-form-cookies-consent">
                <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" />
                <label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>
            </p>
        <?php endif; ?>

        <p class="form-submit">
            <input class="btn btn-outline-light float-end" name="submit" type="submit" id="submit" value="Post Comment">
            <?php comment_id_fields(); ?>
        </p>
        <?php do_action('comment_form', $post->ID); ?>
    </form>
</div>