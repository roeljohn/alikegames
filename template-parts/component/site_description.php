<?php
        $custom_site_description = get_option('custom_site_description');

        // Display the custom site description
        if (!empty($custom_site_description)) {
            echo '<p>' . esc_html($custom_site_description) . '</p>';
        }