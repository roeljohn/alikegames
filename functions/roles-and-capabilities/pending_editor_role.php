<?php

// Add new user role: Pending Editor
function add_pending_editor_role() {
    add_role('pending_editor', 'Pending Editor', get_role('editor')->capabilities);
}
add_action('init', 'add_pending_editor_role');

// Require approval for all posts by Pending Editors
function require_approval_for_pending_editors($post_id, $post, $update) {
    $user_id = get_current_user_id();
    $user = get_userdata($user_id);

    if (in_array('pending_editor', $user->roles) && $post->post_status !== 'pending') {
        $post_status = 'pending';
        wp_update_post(array('ID' => $post_id, 'post_status' => $post_status));
    }
}
add_action('save_post', 'require_approval_for_pending_editors', 10, 3);

function create_content_editor_role() {
    add_role(
        'epithet',
        'Epithet',
        array(
            'read' => true,
            'edit_posts' => true,
            'edit_others_posts' => true,
            'publish_posts' => true,
            'edit_published_posts' => true,
            'edit_private_posts' => true,
            'edit_pending_posts' => true,
            'edit_published_pages' => true,
            'edit_others_pages' => true,
            'edit_private_pages' => true,
            'edit_pending_pages' => true,
        )
    );
}
add_action( 'init', 'create_content_editor_role' );


function epithet_capabilities() {
    $role = get_role( 'epithet' );

    // Add basic post editing capabilities
    $role->add_cap( 'read' );
    $role->add_cap( 'edit_posts' );
    $role->add_cap( 'edit_others_posts' );
    $role->add_cap( 'publish_posts' );

    // Add capabilities for approving posts
    $role->add_cap( 'edit_published_posts' );
    $role->add_cap( 'edit_private_posts' );
    $role->add_cap( 'edit_pending_posts' );
    $role->add_cap( 'edit_published_pages' );
    $role->add_cap( 'edit_others_pages' );
    $role->add_cap( 'edit_private_pages' );
    $role->add_cap( 'edit_pending_pages' );
}
add_action( 'init', 'epithet_capabilities' );

function save_pending_changes( $post_id ) {
    if ( current_user_can( 'edit_posts' ) ) {
        if ( isset( $_POST['pending_changes'] ) ) {
            $pending_changes = sanitize_text_field( $_POST['pending_changes'] );
            update_post_meta( $post_id, 'pending_changes', $pending_changes );
        }
    }
}
add_action( 'save_post', 'save_pending_changes' );

function approve_pending_changes( $post_id ) {
    if ( current_user_can( 'publish_posts' ) ) {
        $pending_changes = get_post_meta( $post_id, 'pending_changes', true );
        if ( $pending_changes ) {
            $post = get_post( $post_id );
            $post->post_content = $pending_changes;
            wp_update_post( $post );
            delete_post_meta( $post_id, 'pending_changes' );
        }
    }
}
add_action( 'admin_init', 'approve_pending_changes' );