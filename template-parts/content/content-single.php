
<h1 class="page-title text-white mt-0 mb-4 fw-bolder border-bottom">Discussion</h1>
<?php 
/** Template parts content is just a reusable section of the website. */

if ( is_attachment() ) {
    // Parent post navigation.
    the_post_navigation(
        array(
            /* translators: %s: Parent post link. */
            'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
        )
    );
}

get_template_part( 'template-parts/component/comments' );
// Check if user is logged in
if (is_user_logged_in()) {
    // User is logged in, display a message or perform any other action
    get_template_part( 'template-parts/component/comment' );
} else {
    get_template_part( 'template-parts/component/button-comment' );
}

?>