<?php
/**
 * The functions.php file behaves like a WordPress plugin, adding features and functionality to a 
 * WordPress site. You can use it to call WordPress functions and to define your own functions.
 */

require_once( __DIR__ . '/functions/roles-and-capabilities/pending_editor_role.php');

/**
 * Enqueue scripts and styles
 */
require_once( __DIR__ . '/functions/enqueue/import_css_js.php');

//General
require_once( __DIR__ . '/functions/general/import_general_settings.php');
require_once( __DIR__ . '/functions/general/import_site_description.php');
require_once( __DIR__ . '/functions/general/import_menu.php');
require_once( __DIR__ . '/functions/general/modify-excerpt.php');
require_once( __DIR__ . '/functions/general/modify_archive_description.php');

function remove_tag_from_archive_title($title) {
    if (is_tag()) {
        $title = single_tag_title('', false); // Get the tag title without "Tag" word
    }
    return $title;
}
add_filter('get_the_archive_title', 'remove_tag_from_archive_title');