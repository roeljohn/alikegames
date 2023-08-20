<?php

// Add custom site description field to General Settings page
function add_site_description_field() {
    add_settings_field(
        'custom_site_description',
        'Site Description',
        'render_site_description_field',
        'general',
        'default',
        array('label_for' => 'custom_site_description')
    );

    register_setting('general', 'custom_site_description');
}
add_action('admin_init', 'add_site_description_field');

// Render the custom site description field
function render_site_description_field() {
    $custom_site_description = get_option('custom_site_description');
    echo '<textarea name="custom_site_description" id="custom_site_description" class="large-text">' . esc_textarea($custom_site_description) . '</textarea>';
}

// Move custom site description field under Site Title
function move_site_description_field() {
    ?>
    <script>
        jQuery(document).ready(function($) {
            $('#custom_site_description').closest('tr').insertAfter($('#blogdescription').closest('tr'));
        });
    </script>
    <?php
}
add_action('admin_head-options-general.php', 'move_site_description_field');