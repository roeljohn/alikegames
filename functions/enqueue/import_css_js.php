<?php
/**
 * Enqueue scripts and styles
 */
function ph_job_list_enqueue_scripts() {
  // all styles
  wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/dist/css/bootstrap.css', array(), '5.3.0' );
  wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0' );
  // all scripts
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/dist/js/bootstrap.min.js', array('jquery'), '20120206', true );
  wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/font-awesome/css/all.min.css');
}
add_action( 'wp_enqueue_scripts', 'ph_job_list_enqueue_scripts' );